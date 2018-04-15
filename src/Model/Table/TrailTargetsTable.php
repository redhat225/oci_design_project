<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrailTargets Model
 *
 * @property \App\Model\Table\TrailsTable|\Cake\ORM\Association\HasMany $Trails
 *
 * @method \App\Model\Entity\TrailTarget get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrailTarget newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrailTarget[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrailTarget|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrailTarget patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrailTarget[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrailTarget findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TrailTargetsTable extends Table
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

        $this->setTable('trail_targets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Trails', [
            'foreignKey' => 'trail_target_id'
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
            ->scalar('target_denomination')
            ->maxLength('target_denomination', 100)
            ->requirePresence('target_denomination', 'create')
            ->notEmpty('target_denomination')
            ->add('target_denomination', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['target_denomination']));

        return $rules;
    }
}
