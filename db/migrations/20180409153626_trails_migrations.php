<?php

use Phinx\Migration\AbstractMigration;

class TrailsMigrations extends AbstractMigration
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
        $table = $this->table('trails',['id'=>false, 'primary_key'=>['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('trail_parent_target','uuid')
              ->addColumn('trail_content','text',['null'=>true])
              ->addColumn('trail_action_id','uuid')
              ->addColumn('trail_target_id','uuid')
              ->addColumn('user_account_id','uuid');
        $table->addForeignKey('user_account_id','user_accounts','id',['update'=>'CASCADE', 'delete'=>'CASCADE'])
              ->addForeignKey('trail_target_id','trail_targets','id',['update'=>'CASCADE', 'delete'=>'CASCADE'])
              ->addForeignKey('trail_action_id','trail_actions','id',['update'=>'CASCADE', 'delete'=>'CASCADE']);
        $table->create();
    }
}
