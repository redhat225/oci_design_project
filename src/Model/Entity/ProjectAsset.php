<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectAsset Entity
 *
 * @property string $id
 * @property string $asset_base64
 * @property string $asset_type
 * @property string $asset_name
 * @property \Cake\I18n\FrozenTime $created
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $project_id
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectAsset extends Entity
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
        'asset_base64' => true,
        'asset_type' => true,
        'asset_name' => true,
        'created' => true,
        'created_by' => true,
        'creator' => true,
        'modified' => true,
        'project_id' => true,
        'project' => true
    ];
}
