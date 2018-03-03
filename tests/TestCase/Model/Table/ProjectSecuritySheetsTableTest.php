<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectSecuritySheetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectSecuritySheetsTable Test Case
 */
class ProjectSecuritySheetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectSecuritySheetsTable
     */
    public $ProjectSecuritySheets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.project_security_sheets',
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
        $config = TableRegistry::exists('ProjectSecuritySheets') ? [] : ['className' => ProjectSecuritySheetsTable::class];
        $this->ProjectSecuritySheets = TableRegistry::get('ProjectSecuritySheets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectSecuritySheets);

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
