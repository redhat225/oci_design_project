<?php

use Phinx\Migration\AbstractMigration;

class ProjectContributorRoleContents extends AbstractMigration
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
        $table = $this->table('project_contributor_role_contents',['id'=>false, 'primary_key'=>['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('content_controller','string',['limit'=>100])
              ->addColumn('content_action','string',['limit'=>100])
              ->addColumn('project_contributor_role_id','uuid')
              ->addColumn('modified','datetime')
              ->addColumn('created','datetime')
              ->addColumn('deleted','datetime',['null'=>true]);
              
        $table->create();
    }
}
