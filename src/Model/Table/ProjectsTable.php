<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
/**
 * Projects Model
 *
 * @property \App\Model\Table\ProjectTypesTable|\Cake\ORM\Association\BelongsTo $ProjectTypes
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
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if(isset($data['action'])){
            switch($data['action']){
                case 'create':
                    $data['project_fullname'] = strtoupper($data['project_name']);
                    $data['project_criticity'] = 'critical';
                    $data['project_indices'] = json_encode($data['indices']);
                break;

                default:

                break;
            }

        }
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

        return $rules;
    }
}
