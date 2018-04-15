<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trails Model
 *
 * @property \App\Model\Table\TrailActionsTable|\Cake\ORM\Association\BelongsTo $TrailActions
 * @property \App\Model\Table\TrailTargetsTable|\Cake\ORM\Association\BelongsTo $TrailTargets
 * @property \App\Model\Table\UserAccountsTable|\Cake\ORM\Association\BelongsTo $UserAccounts
 *
 * @method \App\Model\Entity\Trail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TrailsTable extends Table
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

        $this->setTable('trails');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TrailActions', [
            'foreignKey' => 'trail_action_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TrailTargets', [
            'foreignKey' => 'trail_target_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserAccounts', [
            'foreignKey' => 'user_account_id',
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
            ->uuid('trail_parent_target')
            ->requirePresence('trail_parent_target', 'create')
            ->notEmpty('trail_parent_target');

        $validator
            ->scalar('trail_content')
            ->allowEmpty('trail_content');

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
        $rules->add($rules->existsIn(['trail_action_id'], 'TrailActions'));
        $rules->add($rules->existsIn(['trail_target_id'], 'TrailTargets'));
        $rules->add($rules->existsIn(['user_account_id'], 'UserAccounts'));

        return $rules;
    }
}
