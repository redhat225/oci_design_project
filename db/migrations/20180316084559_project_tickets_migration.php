<?php

use Phinx\Migration\AbstractMigration;

class ProjectTicketsMigration extends AbstractMigration
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
        $table = $this->table('project_tickets',['id'=>false,'primary_key'=> ['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('project_ticket_content','text')
              ->addColumn('project_ticket_path','text')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('deleted','datetime',['null'=>true])
              ->addColumn('project_id','uuid')
              ->addForeignKey('project_id','projects','id',['update'=>'CASCADE','delete'=>'CASCADE']);
        $table->create();   
    }
}