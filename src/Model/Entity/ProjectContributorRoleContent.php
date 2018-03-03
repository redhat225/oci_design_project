<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectContributorRoleContent Entity
 *
 * @property string $id
 * @property string $content_controller
 * @property string $content_action
 * @property string $project_contributor_role_id
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\ProjectContributorRole $project_contributor_role
 */
class ProjectContributorRoleContent extends Entity
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
        'content_controller' => true,
        'content_action' => true,
        'project_contributor_role_id' => true,
        'modified' => true,
        'created' => true,
        'deleted' => true,
        'project_contributor_role' => true
    ];
}
