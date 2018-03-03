<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectContributorRoles Model
 *
 * @property \App\Model\Table\ProjectContributorRoleContentsTable|\Cake\ORM\Association\HasMany $ProjectContributorRoleContents
 * @property \App\Model\Table\ProjectContributorsTable|\Cake\ORM\Association\HasMany $ProjectContributors
 *
 * @method \App\Model\Entity\ProjectContributorRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectContributorRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectContributorRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectContributorRole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectContributorRolesTable extends Table
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

        $this->setTable('project_contributor_roles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ProjectContributorRoleContents', [
            'foreignKey' => 'project_contributor_role_id'
        ]);
        $this->hasMany('ProjectContributors', [
            'foreignKey' => 'project_contributor_role_id'
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
            ->scalar('role_denomination')
            ->maxLength('role_denomination', 100)
            ->requirePresence('role_denomination', 'create')
            ->notEmpty('role_denomination');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }
}
