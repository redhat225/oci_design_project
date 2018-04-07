<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property string $id
 * @property string $project_fullname
 * @property string $project_priority
 * @property string $project_type_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $project_indices
 * @property string $project_criticity
 * @property string $user_account_id
 *
 * @property \App\Model\Entity\ProjectType $project_type
 * @property \App\Model\Entity\UserAccount $user_account
 * @property \App\Model\Entity\ProjectContributor[] $project_contributors
 * @property \App\Model\Entity\ProjectSecurityAuditReport[] $project_security_audit_reports
 * @property \App\Model\Entity\ProjectSecurityAuditRequirement[] $project_security_audit_requirements
 * @property \App\Model\Entity\ProjectSecurityRequirement[] $project_security_requirements
 * @property \App\Model\Entity\ProjectSecuritySheet[] $project_security_sheets
 * @property \App\Model\Entity\ProjectTicket[] $project_tickets
 */
class Project extends Entity
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
        'project_fullname' => true,
        'project_priority' => true,
        'project_type_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'project_indices' => true,
        'project_criticity' => true,
        'user_account_id' => true,
        'project_type' => true,
        'user_account' => true,
        'project_contributors' => true,
        'project_security_audit_reports' => true,
        'project_security_audit_requirements' => true,
        'project_security_requirements' => true,
        'project_security_sheets' => true,
        'project_tickets' => true
    ];
}
