<?php

use Phinx\Migration\AbstractMigration;

class ProjectLinkedTables extends AbstractMigration
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
        // Security sheets projects
        $table = $this->table('project_security_sheets',['id'=>false, 'primary_key' => ['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('sheet_content','text')
              ->addColumn('project_id','uuid')
              ->addColumn('created_by','uuid')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('deleted','datetime',['null'=>true])
              ->addForeignKey('project_id','projects','id',['delete'=>'CASCADE', 'update'=>'CASCADE']);

        $table->create();

        // security exigences sheets
        $table = $this->table('project_security_requirements',['id'=>false, 'primary_key' => ['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('requirement_content','text')
              ->addColumn('project_id','uuid')
              ->addColumn('created_by','uuid')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('deleted','datetime',['null'=>true])
              ->addForeignKey('project_id','projects','id',['delete'=>'CASCADE', 'update'=>'CASCADE']);

        $table->create();

        // security prerequisites audit
        $table = $this->table('project_security_audit_requirements',['id'=>false, 'primary_key' => ['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('audit_requirement_content','text')
              ->addColumn('project_id','uuid')
              ->addColumn('created_by','uuid')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('deleted','datetime',['null'=>true])
              ->addForeignKey('project_id','projects','id',['delete'=>'CASCADE', 'update'=>'CASCADE']);
        $table->create();

        // security audit reports
        $table = $this->table('project_security_audit_reports',['id'=>false, 'primary_key' => ['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('audit_report_content','text')
              ->addColumn('project_id','uuid')
              ->addColumn('created_by','uuid')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('deleted','datetime',['null'=>true])
              ->addForeignKey('project_id','projects','id',['delete'=>'CASCADE', 'update'=>'CASCADE']);
        $table->create();


    }
}
