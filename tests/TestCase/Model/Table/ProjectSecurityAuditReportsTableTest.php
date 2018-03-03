<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSecurityAuditReportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectSecurityAuditReportsTable Test Case
 */
class ProjectSecurityAuditReportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSecurityAuditReportsTable
     */
    public $ProjectSecurityAuditReports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_security_audit_reports',
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
        $config = TableRegistry::exists('ProjectSecurityAuditReports') ? [] : ['className' => ProjectSecurityAuditReportsTable::class];
        $this->ProjectSecurityAuditReports = TableRegistry::get('ProjectSecurityAuditReports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSecurityAuditReports);

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
