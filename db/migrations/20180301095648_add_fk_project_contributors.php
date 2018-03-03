<?php

use Phinx\Migration\AbstractMigration;

class AddFkProjectContributors extends AbstractMigration
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
        $table = $this->table('project_contributors');
        $table->addForeignKey('user_account_id','user_accounts','id',['delete'=>'CASCADE','update'=>'CASCADE']);
        $table->addForeignKey('project_id','projects','id',['delete'=>'CASCADE','update'=>'CASCADE']);
        $table->addForeignKey('project_contributor_role_id','project_contributor_roles','id',['delete'=>'CASCADE','update'=>'CASCADE']);
        $table->update();
    }
}
