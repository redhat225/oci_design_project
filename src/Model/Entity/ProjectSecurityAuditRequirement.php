<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectSecurityAuditRequirement Entity
 *
 * @property string $id
 * @property string $audit_requirement_content
 * @property string $project_id
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectSecurityAuditRequirement extends Entity
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
        'audit_requirement_content' => true,
        'project_id' => true,
        'created_by' => true,
        'creator' => true,
        'is_new' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'project' => true,
        'architecture_application' => true,
        'architecture_application_path' => true,
        'architecture_network' => true,
        'architecture_network_path' => true,
        'architecture_functional' => true,
        'architecture_functional_path' => true,
    ];
}
