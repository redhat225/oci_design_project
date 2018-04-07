<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserAccountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserAccountsTable Test Case
 */
class UserAccountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserAccountsTable
     */
    public $UserAccounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('UserAccounts') ? [] : ['className' => UserAccountsTable::class];
        $this->UserAccounts = TableRegistry::get('UserAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserAccounts);

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

    /**
     * Test findAuth method
     *
     * @return void
     */
    public function testFindAuth()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
