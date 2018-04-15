<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception;
use \Exception as MainException;
use Cake\Utility\Text;

/**
 * ProjectSecuritySheets Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectSecuritySheet get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectSecuritySheet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectSecuritySheet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecuritySheet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSecuritySheet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecuritySheet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecuritySheet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */




class ProjectSecuritySheetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('project_security_sheets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */


    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){
        if(isset($data)){
            switch($data['action']){
                case 'create':
                    $tmp_data = $data;

                    $data['project_id'] = $tmp_data['project-sheet']['project']['id'];
                    unset($data['project-sheet']['project']);
               
                       
                    // save network diagram if exist
                    if(isset($data['project-sheet']['section1']['network_diagram']) && $data['project-sheet']['section1']['network_diagram']!='null'){
                            try{
                                $data['network_diagram'] = $data['project-sheet']['section1']['network_diagram'];

                                $data['project-sheet']['section1']['network_diagram_path'] =  Text::uuid().'.'.strtolower(pathinfo($data['project-sheet']['section1']['network_diagram']['name'],PATHINFO_EXTENSION));

                                $data['network_diagram_path'] = $data['project-sheet']['section1']['network_diagram_path'];
                            }catch(MainException $e){
                                throw new Exception\BadRequestException(__('MimeType Unrecognized'));
                            }
                    }


                    $data['sheet_content'] = json_encode($tmp_data['project-sheet']);         

                break;
            }
        }
    }

    public function beforeSave($event, $entity, $options){
            // save network diagram
            if(isset($entity->network_diagram))
            {
                                    if(!move_uploaded_file($entity->network_diagram['tmp_name'], WWW_ROOT.'sheets_assets/security_sheets/'.$entity->network_diagram_path))
                                    return false;
            }

            if(isset($entity->contributors)){
                if(count($entity->contributors)>0){
                    // check contributors
                    $project_contributor_table = TableRegistry::get('ProjectContributors');
                    $ProjectContributorsMapList = [];
                    $base_contributors = $project_contributor_table->find()->where(['project_id'=>$entity->project_id]);
                    foreach ($base_contributors as $base_contributor) {
                       array_push($ProjectContributorsMapList,$base_contributor->user_account_id);
                    }
                    foreach ($entity->contributors as $runtime_contributor){
                              // update contributor
                              if(in_array($runtime_contributor['user_accounts'][0]['id'], $ProjectContributorsMapList)){
                                    $saved_contributor = $project_contributor_table->find()->where(['user_account_id'=>$runtime_contributor['user_accounts'][0]['id']])->first();
                                    if($saved_contributor->project_contributor_role_id !== $runtime_contributor['assigned_role']){
                                          $saved_contributor->project_contributor_role_id = $runtime_contributor['assigned_role'];
                                          $saved_contributor->creator = $entity->creator;
                                          $saved_contributor->dirty('project_contributor_role_id',true);
                                          if(!$project_contributor_table->save($saved_contributor))
                                              throw new Exception\BadRequestException(__('Error saved old contributor'));
                                    }

                              }

                              // Create contributor
                              if(!in_array($runtime_contributor['user_accounts'][0]['id'], $ProjectContributorsMapList)){
                                  if($runtime_contributor['is_selected'] == 'true'){
                                                $new_contributor = $project_contributor_table->newEntity();
                                                $new_contributor->project_id = $entity->project_id;
                                                $new_contributor->user_account_id = $runtime_contributor['user_accounts'][0]['id'];
                                                $new_contributor->project_contributor_role_id = $runtime_contributor['assigned_role'];
                                                $new_contributor->created_by = $entity->created_by;
                                                $new_contributor->creator = $entity->creator;
                                                
                                                     if(!$project_contributor_table->save($new_contributor))
                                                         throw new Exception\BadRequestException(__('Error saved new contributor'));

                                  }
                              }

                        }

                }
            }



      
        if($entity->isNew())
        {


        }

    }
    public function afterSave($event, $entity, $options){
            $trail_table = TableRegistry::get('Trails');
            $trail_action_table = TableRegistry::get('TrailActions');
            $trail_target_table = TableRegistry::get('TrailTargets');
            // get action
            if($entity->is_new)
                $search_action = "Création Fiche Sécurité Projet";
            else
                $search_action = "Modification Fiche Sécurité Projet";

            $action = $trail_action_table->find()->select(['id'])
                                          ->where(['action_denomination'=>$search_action])
                                          ->first();
            // get target
            $target = $trail_target_table->find()->select(['id'])
                                          ->where(['target_denomination'=>'Fiche Sécurité Projet'])
                                          ->first();                

            $trail = $trail_table->newEntity();
            $trail->user_account_id = $entity->creator;
            $trail->trail_action_id = $action->id;
            $trail->trail_target_id = $target->id;
            $trail->trail_parent_target = $entity->project_id;

            if(!($trail->errors())){
               if(!($trail_table->save($trail)))
                throw new Exception\BadRequestException(__('error bad request save trail'));
            }else
              throw new Exception\BadRequestException(__('error bad request save trail'));
    }



    
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('sheet_content')
            ->requirePresence('sheet_content', 'create')
            ->notEmpty('sheet_content');

        $validator
            ->uuid('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

       $validator
            ->add('network_diagram', 'file', [
                'rule' => ['mimeType', ['image/jpeg','image/jpg','image/png','image/bitmap','image/gif']],
                'on' => function($context){

                return (!empty($context['network_diagram'])|| !empty($context['data']['network_diagram']) );
                }
            ])->add('network_diagram', 'fileSize',[
                'rule' => ['fileSize', '<', '3MB'],
                'on' => function($context){
                    return (!empty($context['network_diagram']) || !empty($context['data']['network_diagram']));

                }
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
