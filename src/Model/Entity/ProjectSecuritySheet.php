<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectSecuritySheet Entity
 *
 * @property string $id
 * @property string $sheet_content
 * @property string $project_id
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectSecuritySheet extends Entity
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
        'sheet_content' => true,
        'project_id' => true,
        'created_by' => true,
        'created' => true,
        'creator' => true,
        'modified' => true,
        'is_new' => true,
        'deleted' => true,
        'project' => true,
        'network_diagram'=>true,
        'network_diagram_path' => true,
        'contributors' => true
    ];
}
