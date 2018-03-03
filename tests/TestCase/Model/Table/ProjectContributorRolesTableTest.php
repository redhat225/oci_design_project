<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectContributorRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectContributorRolesTable Test Case
 */
class ProjectContributorRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectContributorRolesTable
     */
    public $ProjectContributorRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_contributor_roles',
        'app.project_contributor_role_contents',
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
        $config = TableRegistry::exists('ProjectContributorRoles') ? [] : ['className' => ProjectContributorRolesTable::class];
        $this->ProjectContributorRoles = TableRegistry::get('ProjectContributorRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectContributorRoles);

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
}
