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
 * ProjectSecurityRequirements Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectSecurityRequirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectSecurityRequirement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityRequirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityRequirement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSecurityRequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityRequirement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSecurityRequirement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectSecurityRequirementsTable extends Table
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

        $this->setTable('project_security_requirements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){
        if(isset($data)){
            switch($data['action']){
                case 'create':
                    $tmp_data = $data;

                    $data['project_id'] = $tmp_data['requirement']['project']['id'];
                    unset($data['requirement']['project']);
                    $data['requirement_content'] = json_encode($tmp_data['requirement']);         

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
            ->scalar('requirement_content')
            ->requirePresence('requirement_content', 'create')
            ->notEmpty('requirement_content');

        $validator
            ->uuid('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
