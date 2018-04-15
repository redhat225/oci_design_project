<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrailActions Model
 *
 * @property \App\Model\Table\TrailsTable|\Cake\ORM\Association\HasMany $Trails
 *
 * @method \App\Model\Entity\TrailAction get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrailAction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrailAction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrailAction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrailAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrailAction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrailAction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TrailActionsTable extends Table
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

        $this->setTable('trail_actions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Trails', [
            'foreignKey' => 'trail_action_id'
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
            ->scalar('action_denomination')
            ->maxLength('action_denomination', 100)
            ->requirePresence('action_denomination', 'create')
            ->notEmpty('action_denomination')
            ->add('action_denomination', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['action_denomination']));

        return $rules;
    }
}
