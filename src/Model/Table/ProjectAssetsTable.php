<?php
namespace App\Model\Table;

use Cake\Filesystem\File;
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
 * ProjectAssets Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectAsset get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectAsset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectAsset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectAsset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectAsset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectAsset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectAsset findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectAssetsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */

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
            ->scalar('asset_base64')
            ->requirePresence('asset_base64', 'create')
            ->notEmpty('asset_base64');

        $validator
            ->scalar('asset_type')
            ->requirePresence('asset_type', 'create')
            ->notEmpty('asset_type');

        $validator
            ->scalar('asset_name')
            ->requirePresence('asset_name', 'create')
            ->notEmpty('asset_name');

        $validator
            ->uuid('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->add('asset', 'fileSize',[
                'rule' => ['fileSize', '<=', '10MB'],
                'on' => function($context){
                    return (!empty($context['asset']) || !empty($context['data']['asset']));
                }
            ]);


        return $validator;
    }

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('project_assets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('UserAccounts',[
            'foreignKey' => 'created_by'
        ]);
    }

    public function afterSave($event, $entity, $options){
        if($entity->isNew()){
            // save trail
            $trail_table = TableRegistry::get('Trails');
            $trail_action_table = TableRegistry::get('TrailActions');
            $trail_target_table = TableRegistry::get('TrailTargets');
            // get action
            $search_action = "Upload Informations";

            $action = $trail_action_table->find()->select(['id'])
                                          ->where(['action_denomination'=>$search_action])
                                          ->first();
            // get target
            $target = $trail_target_table->find()->select(['id'])
                                          ->where(['target_denomination'=>'Assets'])
                                          ->first();                

            $trail = $trail_table->newEntity();
            $trail->user_account_id = $entity->creator;
            $trail->trail_action_id = $action->id;
            $trail->trail_target_id = $target->id;
            $trail->trail_content = json_encode($entity);
            $trail->trail_parent_target = $entity->project_id;

            if(!($trail->errors())){
               if(!($trail_table->save($trail)))
                throw new Exception\BadRequestException(__('error bad request save trail'));
            }else
              throw new Exception\BadRequestException(__('error bad request save trail'));
        }
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
