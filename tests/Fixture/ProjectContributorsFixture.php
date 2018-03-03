<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectContributorsFixture
 *
 */
class ProjectContributorsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'contributor_details' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'user_account_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'project_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'project_contributor_role_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_by' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'user_account_id' => ['type' => 'index', 'columns' => ['user_account_id'], 'length' => []],
            'project_id' => ['type' => 'index', 'columns' => ['project_id'], 'length' => []],
            'project_contributor_role_id' => ['type' => 'index', 'columns' => ['project_contributor_role_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'project_contributors_ibfk_3' => ['type' => 'foreign', 'columns' => ['project_contributor_role_id'], 'references' => ['project_contributor_roles', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_contributors_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_account_id'], 'references' => ['user_accounts', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'project_contributors_ibfk_2' => ['type' => 'foreign', 'columns' => ['project_id'], 'references' => ['projects', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'id' => '22af62fa-37ec-49e2-8a19-332b489f6239',
            'contributor_details' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'user_account_id' => '94356164-9319-49e4-a4c8-92161896ae61',
            'project_id' => '85e0f1e3-a9fd-409f-aa1e-1a2e773a9243',
            'project_contributor_role_id' => '56068f64-2ad8-4d21-a325-7e9b579b75e1',
            'created' => '2018-03-01 10:05:46',
            'modified' => '2018-03-01 10:05:46',
            'deleted' => '2018-03-01 10:05:46',
            'created_by' => '50e3d2a7-1d99-4a49-bd0e-0fc5acee829e'
        ],
    ];
}
