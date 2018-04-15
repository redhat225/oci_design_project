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
 * Projects Model
 *
 * @property \App\Model\Table\ProjectTypesTable|\Cake\ORM\Association\BelongsTo $ProjectTypes
 * @property \App\Model\Table\UserAccountsTable|\Cake\ORM\Association\BelongsTo $UserAccounts
 * @property \App\Model\Table\ProjectContributorsTable|\Cake\ORM\Association\HasMany $ProjectContributors
 * @property \App\Model\Table\ProjectSecurityAuditReportsTable|\Cake\ORM\Association\HasMany $ProjectSecurityAuditReports
 * @property \App\Model\Table\ProjectSecurityAuditRequirementsTable|\Cake\ORM\Association\HasMany $ProjectSecurityAuditRequirements
 * @property \App\Model\Table\ProjectSecurityRequirementsTable|\Cake\ORM\Association\HasMany $ProjectSecurityRequirements
 * @property \App\Model\Table\ProjectSecuritySheetsTable|\Cake\ORM\Association\HasMany $ProjectSecuritySheets
 * @property \App\Model\Table\ProjectTicketsTable|\Cake\ORM\Association\HasMany $ProjectTickets
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProjectTypes', [
            'foreignKey' => 'project_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserAccounts', [
            'foreignKey' => 'user_account_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProjectContributors', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('ProjectSecurityAuditReports', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('ProjectSecurityAuditRequirements', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('ProjectSecurityRequirements', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('ProjectAssets', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('ProjectSecuritySheets', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('ProjectTickets', [
            'foreignKey' => 'project_id'
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
            ->scalar('project_fullname')
            ->maxLength('project_fullname', 200)
            ->requirePresence('project_fullname', 'create')
            ->notEmpty('project_fullname');

        $validator
            ->scalar('project_priority')
            ->maxLength('project_priority', 50)
            ->requirePresence('project_priority', 'create')
            ->notEmpty('project_priority');

        $validator
            ->scalar('project_duration_type')
            ->maxLength('project_duration_type', 100)
            ->requirePresence('project_duration_type', 'create')
            ->notEmpty('project_duration_type');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('project_indices')
            ->requirePresence('project_indices', 'create')
            ->notEmpty('project_indices');

        $validator
            ->scalar('project_criticity')
            ->maxLength('project_criticity', 30)
            ->requirePresence('project_criticity', 'create')
            ->notEmpty('project_criticity');

        return $validator;
    }



   public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if(isset($data['action'])){
            switch($data['action']){
                case 'create':
                    // set creator
                    $data['user_account_id'] =  $data['created_by_contributor'];
                    $data['project_fullname'] = strtoupper($data['project_name']);
                    // evaluate criticity
                    $is_project_critical = false;

                    if($data['project_priority']=='P0')
                        $is_project_critical = true;
                    
                    if($data['indices']['project_is_internet_connected'] == 'true' || $data['indices']['project_is_franchise_exposed'] == 'true' || $data['indices']['project_is_for_oci_and_subs'] == 'true' || $data['indices']['project_is_used_harmful_data'] == 'true' || $data['indices']['project_is_client_data_centralized'] == 'true')
                            $is_project_critical = true;

                    if($data['project_type_id']['project_type_denomination'] == 'Digitalisation' || $data['project_type_id']['project_type_denomination'] == 'OM' || $data['project_type_id']['project_type_denomination'] == 'Marketing')
                            $is_project_critical = true;

                    $data['project_type_id'] = $data['project_type_id']['id'];

                    if($is_project_critical)
                       $data['project_criticity'] = 'critical';
                    else
                       $data['project_criticity'] = 'noncritical';                   

                    $data['project_indices'] = json_encode($data['indices']);

                    // create contributors if necessary
                    if(isset($data['contributors'])){
                        if(count($data['contributors'])>0){
                                $data['project_contributors'] = [];
                                $user_accounts_table = TableRegistry::get('UserAccounts');

                                foreach ($data['contributors'] as $key => $value) {
                                    $user_account_id = $user_accounts_table->find()
                                                                           ->select('id')
                                                                           ->where(['user_id'=>$value['id']])
                                                                           ->first();
                                    // create project contributors
                                    $contributor = [
                                         'contributor_details' => 'ras', 
                                         'user_account_id' => $user_account_id->id, 
                                         'project_contributor_role_id'=> $value['assigned_role']['id'],  
                                         'created_by' => $data['created_by_contributor'],
                                         'creator' => $data['created_by_contributor']
                                    ];

                                    array_push($data['project_contributors'], $contributor);
                                }

                        }
                    }

                    $data['project_tickets'] = [
                        [
                            'project_ticket_path' => Text::uuid(),
                            'project_ticket_content' => $data['project_indices']
                        ]
                    ];



                break;

                default:

                break;
            }

        }
    }

    public function beforeSave($event, $entity, $options){

    }

    public function afterSave($event, $entity, $options){
            $trail_table = TableRegistry::get('Trails');
            $trail_action_table = TableRegistry::get('TrailActions');
            $trail_target_table = TableRegistry::get('TrailTargets');
            // get action
            if($entity->isNew())
                $search_action = "Création Projet";
            else
                $search_action = "Modification Projet";

            $action = $trail_action_table->find()->select(['id'])
                                          ->where(['action_denomination'=>$search_action])
                                          ->first();
            // get target
            $target = $trail_target_table->find()->select(['id'])
                                          ->where(['target_denomination'=>'Projet'])
                                          ->first();                

            $trail = $trail_table->newEntity();
            $trail->user_account_id = $entity->creator;
            $trail->trail_action_id = $action->id;
            $trail->trail_target_id = $target->id;
            $trail->trail_parent_target = $entity->id;

            if(!($trail->errors())){
               if(!($trail_table->save($trail)))
                throw new Exception\BadRequestException(__('error bad request save trail'));
            }else
              throw new Exception\BadRequestException(__('error bad request save trail'));
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
        $rules->add($rules->existsIn(['project_type_id'], 'ProjectTypes'));
        $rules->add($rules->existsIn(['user_account_id'], 'UserAccounts'));

        return $rules;
    }
}
