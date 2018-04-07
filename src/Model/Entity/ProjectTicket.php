<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectTicket Entity
 *
 * @property string $id
 * @property string $project_ticket_content
 * @property string $project_ticket_path
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $project_id
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectTicket extends Entity
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
        'project_ticket_content' => true,
        'project_ticket_path' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'project_id' => true,
        'project' => true
    ];
}
