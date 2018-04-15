<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trail Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $trail_parent_target
 * @property string $trail_content
 * @property string $trail_action_id
 * @property string $trail_target_id
 * @property string $user_account_id
 *
 * @property \App\Model\Entity\TrailAction $trail_action
 * @property \App\Model\Entity\TrailTarget $trail_target
 * @property \App\Model\Entity\UserAccount $user_account
 */
class Trail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'trail_parent_target' => true,
        'trail_content' => true,
        'trail_action_id' => true,
        'trail_target_id' => true,
        'user_account_id' => true,
        'trail_action' => true,
        'trail_target' => true,
        'user_account' => true
    ];
}
