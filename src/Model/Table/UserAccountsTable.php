<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserAccounts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\UserAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserAccount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserAccount|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserAccount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserAccount findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserAccountsTable extends Table
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

        $this->setTable('user_accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
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
            ->scalar('user_account_username')
            ->maxLength('user_account_username', 20)
            ->requirePresence('user_account_username', 'create')
            ->notEmpty('user_account_username');

        $validator
            ->scalar('user_account_password')
            ->requirePresence('user_account_password', 'create')
            ->notEmpty('user_account_password');

        $validator
            ->scalar('user_account_avatar')
            ->requirePresence('user_account_avatar', 'create')
            ->notEmpty('user_account_avatar');

        $validator
            ->boolean('user_account_is_active')
            ->requirePresence('user_account_is_active', 'create')
            ->notEmpty('user_account_is_active');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }


    public function findAuth(Query $query, array $options){
         $query->select(['id','user_account_username','user_account_password'])
                ->autoFields(true)
               ->contain(['Roles'])
               ->Where(['user_account_is_active'=>1]);
        return $query;
    }

}
