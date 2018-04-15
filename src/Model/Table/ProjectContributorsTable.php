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
 * ProjectContributors Model
 *
 * @property \App\Model\Table\UserAccountsTable|\Cake\ORM\Association\BelongsTo $UserAccounts
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\ProjectContributorRolesTable|\Cake\ORM\Association\BelongsTo $ProjectContributorRoles
 *
 * @method \App\Model\Entity\ProjectContributor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectContributor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectContributor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectContributor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectContributorsTable extends Table
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

        $this->setTable('project_contributors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserAccounts', [
            'foreignKey' => 'user_account_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProjectContributorRoles', [
            'foreignKey' => 'project_contributor_role_id',
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
            ->scalar('contributor_details')
            ->requirePresence('contributor_details', 'create')
            ->notEmpty('contributor_details');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->uuid('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        return $validator;
    }

    public function afterSave($event, $entity, $options){

                                                // save trail
                                                $trail_table = TableRegistry::get('Trails');
                                                $trail_action_table = TableRegistry::get('TrailActions');
                                                $trail_target_table = TableRegistry::get('TrailTargets');
                                                // get action
                                                if($entity->isNew())
                                                  $search_action = 'Définition Contributeur';
                                                else
                                                  $search_action = 'Modification Rôle Contributeur';

                                                $action = $trail_action_table->find()->select(['id'])
                                                                              ->where(['action_denomination'=>$search_action])
                                                                              ->first();
                                                // get target
                                                $target = $trail_target_table->find()->select(['id'])
                                                                              ->where(['target_denomination'=>'Contributeur'])
                                                                              ->first();                

                                                $trail = $trail_table->newEntity();
                                                $trail->user_account_id = $entity->creator;
                                                $trail->trail_action_id = $action->id;
                                                $trail->trail_content = json_encode($entity);
                                                $trail->trail_target_id = $target->id;
                                                $trail->trail_parent_target = $entity->project_id;

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
        $rules->add($rules->existsIn(['user_account_id'], 'UserAccounts'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['project_contributor_role_id'], 'ProjectContributorRoles'));

        return $rules;
    }
}
