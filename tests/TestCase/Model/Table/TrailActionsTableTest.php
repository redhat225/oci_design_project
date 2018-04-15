<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrailActionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrailActionsTable Test Case
 */
class TrailActionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrailActionsTable
     */
    public $TrailActions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trail_actions',
        'app.trails',
        'app.trail_targets',
        'app.user_accounts',
        'app.users',
        'app.roles',
        'app.role_privileges',
        'app.project_contributors',
        'app.projects',
        'app.project_types',
        'app.project_security_audit_reports',
        'app.project_security_audit_requirements',
        'app.project_security_requirements',
        'app.project_security_sheets',
        'app.project_tickets',
        'app.project_contributor_roles',
        'app.project_contributor_role_contents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TrailActions') ? [] : ['className' => TrailActionsTable::class];
        $this->TrailActions = TableRegistry::get('TrailActions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TrailActions);

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
