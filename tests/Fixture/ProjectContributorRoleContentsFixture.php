<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectContributorRoleContentsFixture
 *
 */
class ProjectContributorRoleContentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'content_controller' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'content_action' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'project_contributor_role_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'project_contributor_role_id' => ['type' => 'index', 'columns' => ['project_contributor_role_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'project_contributor_role_contents_ibfk_1' => ['type' => 'foreign', 'columns' => ['project_contributor_role_id'], 'references' => ['project_contributor_roles', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'c783f7a8-dd0e-40a9-8d99-bf90382f881d',
            'content_controller' => 'Lorem ipsum dolor sit amet',
            'content_action' => 'Lorem ipsum dolor sit amet',
            'project_contributor_role_id' => 'ec069d49-4b2c-4d0a-b2e1-ae1f1a910795',
            'modified' => '2018-03-01 10:05:34',
            'created' => '2018-03-01 10:05:34',
            'deleted' => '2018-03-01 10:05:34'
        ],
    ];
}
