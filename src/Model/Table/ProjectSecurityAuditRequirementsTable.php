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
 * ProjectSecurityAuditRequirements Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityAuditRequirement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectSecurityAuditRequirementsTable extends Table
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

        $this->setTable('project_security_audit_requirements');
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('audit_requirement_content')
            ->requirePresence('audit_requirement_content', 'create')
            ->notEmpty('audit_requirement_content');

        $validator
            ->uuid('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

       $validator
            ->add('architecture_application', 'file', [
                'rule' => ['mimeType', ['image/jpeg','image/jpg','image/png','image/bitmap','image/gif']],
                'on' => function($context){

                return (!empty($context['architecture_application'])|| !empty($context['data']['architecture_application']) );
                }
            ])->add('architecture_application', 'fileSize',[
                'rule' => ['fileSize', '<', '3MB'],
                'on' => function($context){
                    return (!empty($context['architecture_application']) || !empty($context['data']['architecture_application']));

                }
            ]);

       $validator
            ->add('architecture_network', 'file', [
                'rule' => ['mimeType', ['image/jpeg','image/jpg','image/png','image/bitmap','image/gif']],
                'on' => function($context){

                return (!empty($context['architecture_network'])|| !empty($context['data']['architecture_network']) );
                }
            ])->add('architecture_network', 'fileSize',[
                'rule' => ['fileSize', '<', '3MB'],
                'on' => function($context){
                    return (!empty($context['architecture_network']) || !empty($context['data']['architecture_network']));

                }
            ]);

       $validator
            ->add('architecture_functional', 'file', [
                'rule' => ['mimeType', ['image/jpeg','image/jpg','image/png','image/bitmap','image/gif']],
                'on' => function($context){

                return (!empty($context['architecture_functional'])|| !empty($context['data']['architecture_functional']) );
                }
            ])->add('architecture_functional', 'fileSize',[
                'rule' => ['fileSize', '<', '3MB'],
                'on' => function($context){
                    return (!empty($context['architecture_functional']) || !empty($context['data']['architecture_functional']));

                }
            ]);


        return $validator;
    }

   public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){
        if(isset($data)){
            switch($data['action']){
                case 'create':
                    $tmp_data = $data;

                    $data['project_id'] = $tmp_data['requirement']['project']['id'];
                    unset($data['requirement']['project']);

                    // check architecture diagram if exist
                    // application
                    if(isset($data['requirement']['architecture']['application']) && $data['requirement']['architecture']['application']!='null'){
                            try{
                                $data['architecture_application'] = $data['requirement']['architecture']['application'];

                                $data['requirement']['architecture']['application_path'] =  Text::uuid().'.'.strtolower(pathinfo($data['requirement']['architecture']['application']['name'],PATHINFO_EXTENSION));

                                $data['architecture_application_path'] = $data['requirement']['architecture']['application_path'];
                            }catch(MainException $e){
                                throw new Exception\BadRequestException(__('MimeType Unrecognized'));
                            }
                    }
                    // network
                    if(isset($data['requirement']['architecture']['network']) && $data['requirement']['architecture']['network']!='null'){
                            try{
                                $data['architecture_network'] = $data['requirement']['architecture']['network'];

                                $data['requirement']['architecture']['network_path'] =  Text::uuid().'.'.strtolower(pathinfo($data['requirement']['architecture']['network']['name'],PATHINFO_EXTENSION));

                                $data['architecture_network_path'] = $data['requirement']['architecture']['network_path'];
                            }catch(MainException $e){
                                throw new Exception\BadRequestException(__('MimeType Unrecognized'));
                            }
                    }
                    // functional
                    if(isset($data['requirement']['architecture']['functional']) && $data['requirement']['architecture']['functional']!='null'){
                            try{
                                $data['architecture_functional'] = $data['requirement']['architecture']['functional'];

                                $data['requirement']['architecture']['functional_path'] =  Text::uuid().'.'.strtolower(pathinfo($data['requirement']['architecture']['functional']['name'],PATHINFO_EXTENSION));

                                $data['architecture_functional_path'] = $data['requirement']['architecture']['functional_path'];
                            }catch(MainException $e){
                                throw new Exception\BadRequestException(__('MimeType Unrecognized'));
                            }
                    }
                    $data['audit_requirement_content'] = json_encode($tmp_data['requirement']);
                break;
            }
        }   
    }

    public function beforeSave($event, $entity, $options){
            if($entity->isNew()){
                // save network diagram
                if(isset($entity->architecture_application))
                {
                                        if(!move_uploaded_file($entity->architecture_application['tmp_name'], WWW_ROOT.'sheets_assets/audit_security_requirements/'.$entity->architecture_application_path))
                                        return false;
                }

                if(isset($entity->architecture_network))
                {
                                        if(!move_uploaded_file($entity->architecture_network['tmp_name'], WWW_ROOT.'sheets_assets/audit_security_requirements/'.$entity->architecture_network_path))
                                        return false;
                }

                if(isset($entity->architecture_functional))
                {
                                        if(!move_uploaded_file($entity->architecture_functional['tmp_name'], WWW_ROOT.'sheets_assets/audit_security_requirements/'.$entity->architecture_functional_path))
                                        return false;
                }
            }
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
