<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSecurityRequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectSecurityRequirementsTable Test Case
 */
class ProjectSecurityRequirementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSecurityRequirementsTable
     */
    public $ProjectSecurityRequirements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_security_requirements',
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
        $config = TableRegistry::exists('ProjectSecurityRequirements') ? [] : ['className' => ProjectSecurityRequirementsTable::class];
        $this->ProjectSecurityRequirements = TableRegistry::get('ProjectSecurityRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSecurityRequirements);

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
