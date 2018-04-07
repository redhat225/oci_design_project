<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;



/**
 * UserAccount Entity
 *
 * @property string $id
 * @property string $user_account_username
 * @property string $user_account_password
 * @property string $user_account_avatar
 * @property bool $user_account_is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $created_by
 * @property string $user_id
 * @property string $role_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\ProjectContributor[] $project_contributors
 * @property \App\Model\Entity\Project[] $projects
 */
class UserAccount extends Entity
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

    public function _setUserAccountPassword($value){
            if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
            }
    }

    protected $_accessible = [
        'user_account_username' => true,
        'user_account_password' => true,
        'user_account_avatar' => true,
        'user_account_is_active' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'created_by' => true,
        'user_id' => true,
        'user_account_avatar_candidate' => true,
        'role_id' => true,
        'user' => true,
        'role' => true,
        'project_contributors' => true,
        'projects' => true
    ];
}
