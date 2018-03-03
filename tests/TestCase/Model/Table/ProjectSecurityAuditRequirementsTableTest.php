<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSecurityAuditRequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectSecurityAuditRequirementsTable Test Case
 */
class ProjectSecurityAuditRequirementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSecurityAuditRequirementsTable
     */
    public $ProjectSecurityAuditRequirements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_security_audit_requirements',
        'app.projects',
        'app.project_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectSecurityAuditRequirements') ? [] : ['className' => ProjectSecurityAuditRequirementsTable::class];
        $this->ProjectSecurityAuditRequirements = TableRegistry::get('ProjectSecurityAuditRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSecurityAuditRequirements);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
