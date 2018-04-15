<?php

use Phinx\Migration\AbstractMigration;

class ProjectAssetsMigrations extends AbstractMigration
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
        $table = $this->table('project_assets',['id'=>false, 'primary_key'=>['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('asset_base64','text')
              ->addColumn('asset_type','text')
              ->addColumn('asset_name','text')
              ->addColumn('created','datetime')
              ->addColumn('created_by','uuid')
              ->addColumn('modified','datetime')
              ->addColumn('project_id','uuid')
              ->addForeignKey('project_id','projects','id',['update'=>'CASCADE','delete'=>'CASCADE']);

        $table->create();
    }
}
