<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectContributorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectContributorsTable Test Case
 */
class ProjectContributorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectContributorsTable
     */
    public $ProjectContributors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_contributors',
        'app.user_accounts',
        'app.users',
        'app.roles',
        'app.role_privileges',
        'app.projects',
        'app.project_types',
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
        $config = TableRegistry::exists('ProjectContributors') ? [] : ['className' => ProjectContributorsTable::class];
        $this->ProjectContributors = TableRegistry::get('ProjectContributors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectContributors);

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
