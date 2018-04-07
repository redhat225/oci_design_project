<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectTicketsTable Test Case
 */
class ProjectTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectTicketsTable
     */
    public $ProjectTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_tickets',
        'app.projects',
        'app.project_types',
        'app.project_contributors',
        'app.user_accounts',
        'app.users',
        'app.roles',
        'app.role_privileges',
        'app.project_contributor_roles',
        'app.project_contributor_role_contents',
        'app.project_security_audit_reports',
        'app.project_security_audit_requirements',
        'app.project_security_requirements',
        'app.project_security_sheets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectTickets') ? [] : ['className' => ProjectTicketsTable::class];
        $this->ProjectTickets = TableRegistry::get('ProjectTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectTickets);

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
