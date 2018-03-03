<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

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
