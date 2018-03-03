<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectContributorRoleContents Model
 *
 * @property \App\Model\Table\ProjectContributorRolesTable|\Cake\ORM\Association\BelongsTo $ProjectContributorRoles
 *
 * @method \App\Model\Entity\ProjectContributorRoleContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectContributorRoleContent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRoleContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRoleContent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectContributorRoleContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRoleContent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRoleContent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectContributorRoleContentsTable extends Table
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

        $this->setTable('project_contributor_role_contents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('content_controller')
            ->maxLength('content_controller', 100)
            ->requirePresence('content_controller', 'create')
            ->notEmpty('content_controller');

        $validator
            ->scalar('content_action')
            ->maxLength('content_action', 100)
            ->requirePresence('content_action', 'create')
            ->notEmpty('content_action');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->existsIn(['project_contributor_role_id'], 'ProjectContributorRoles'));

        return $rules;
    }
}
