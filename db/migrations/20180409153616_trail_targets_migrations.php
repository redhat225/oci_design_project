<?php

use Phinx\Migration\AbstractMigration;
use Cake\Utility\Text;
use Cake\Core\Configure;

class TrailTargetsMigrations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // Create trail actions table
        $table = $this->table('trail_targets',['id'=>false, 'primary_key'=>['id']]);
        $table->addColumn('id','uuid')
        ->addColumn('target_denomination','string',['limit'=>100])
        ->addColumn('created','datetime')
        ->addColumn('modified','datetime')
        ->addIndex('target_denomination',['unique'=>true]);
        $table->create();
     
    }
}
