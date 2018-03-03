<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectContributorRole Entity
 *
 * @property string $id
 * @property string $role_denomination
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\ProjectContributorRoleContent[] $project_contributor_role_contents
 * @property \App\Model\Entity\ProjectContributor[] $project_contributors
 */
class ProjectContributorRole extends Entity
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
        'role_denomination' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'project_contributor_role_contents' => true,
        'project_contributors' => true
    ];
}
