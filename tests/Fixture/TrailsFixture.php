<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrailsFixture
 *
 */
class TrailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'trail_parent_target' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'trail_content' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'trail_action_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'trail_target_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_account_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'user_account_id' => ['type' => 'index', 'columns' => ['user_account_id'], 'length' => []],
            'trail_target_id' => ['type' => 'index', 'columns' => ['trail_target_id'], 'length' => []],
            'trail_action_id' => ['type' => 'index', 'columns' => ['trail_action_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'trails_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_account_id'], 'references' => ['user_accounts', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'trails_ibfk_2' => ['type' => 'foreign', 'columns' => ['trail_target_id'], 'references' => ['trail_targets', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'trails_ibfk_3' => ['type' => 'foreign', 'columns' => ['trail_action_id'], 'references' => ['trail_actions', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
            'id' => '512ac7d5-3c3a-493e-8e2d-bc9e7e8282b8',
            'created' => '2018-04-10 02:21:08',
            'modified' => '2018-04-10 02:21:08',
            'trail_parent_target' => 'e7afd7e2-487b-4e49-b5c3-0e6dbeba359b',
            'trail_content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'trail_action_id' => 'fb865aec-0c6c-43d4-b501-489f00706e35',
            'trail_target_id' => '637dfc1d-df3b-4f05-ad5e-e1a5daf341e7',
            'user_account_id' => '5d89533e-e3ba-44f2-834d-3b5c55dbc541'
        ],
    ];
}
