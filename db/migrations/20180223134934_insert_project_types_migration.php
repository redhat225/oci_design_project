<?php

use Phinx\Migration\AbstractMigration;
use Cake\Utility\Text;


class InsertProjectTypesMigration extends AbstractMigration
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
    public function up()
    {
        $table = $this->table('project_types');
        $rows = [];
        $project_types = ['POC','DDT-Réseaux','DDT-DSI','DDT-SVA','OM','Digitalisation','Marketing'];
        for($i=1; $i<=7; $i++){
            $now_date = new \DateTime('NOW');
            $now_date_formatted = $now_date->format('Y-m-d H:i:s');
            $row = [
                    'id' => Text::uuid(),
                    'project_type_denomination' => $project_types[$i-1],
                    'created' => $now_date_formatted,
                    'modified' => $now_date_formatted
            ];
            array_push($rows, $row);
        }

        $table->insert($rows);
        $table->saveData();
    }

    public function down(){
        $this->execute('DELETE FROM project_types');
    }
}
