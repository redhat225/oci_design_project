<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectContributorRoleContentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectContributorRoleContentsTable Test Case
 */
class ProjectContributorRoleContentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectContributorRoleContentsTable
     */
    public $ProjectContributorRoleContents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_contributor_role_contents',
        'app.project_contributor_roles',
        'app.project_contributors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectContributorRoleContents') ? [] : ['className' => ProjectContributorRoleContentsTable::class];
        $this->ProjectContributorRoleContents = TableRegistry::get('ProjectContributorRoleContents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectContributorRoleContents);

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
