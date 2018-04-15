<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectSecurityRequirement Entity
 *
 * @property string $id
 * @property string $requirement_content
 * @property string $project_id
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectSecurityRequirement extends Entity
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
        'requirement_content' => true,
        'project_id' => true,
        'created_by' => true,
        'is_new' => true,
        'creator' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'project' => true
    ];
}
