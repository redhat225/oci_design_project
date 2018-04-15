<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectContributor Entity
 *
 * @property string $id
 * @property string $contributor_details
 * @property string $user_account_id
 * @property string $project_id
 * @property string $project_contributor_role_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $created_by
 *
 * @property \App\Model\Entity\UserAccount $user_account
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\ProjectContributorRole $project_contributor_role
 */
class ProjectContributor extends Entity
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
        'contributor_details' => true,
        'user_account_id' => true,
        'project_id' => true,
        'project_contributor_role_id' => true,
        'created' => true,
        'creator' => true,
        'modified' => true,
        'deleted' => true,
        'created_by' => true,
        'user_account' => true,
        'project' => true,
        'project_contributor_role' => true
    ];
}
