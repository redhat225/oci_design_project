<?php

use Phinx\Migration\AbstractMigration;
use Cake\Utility\Text;

class InsertProjectContributorRoles extends AbstractMigration
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
        $table = $this->table('project_contributor_roles');
        $roles = ['Chef Projet','Sécurité Physique','Ressources Fraude','Ressource Juridique'];
        $role_insertions = [];
        $now = new \DateTime();
        $now_formatted = $now->format('Y-m-d H:i:s');

        for($i=1;$i<=(count($roles));$i++){
            $role_item = [
                'id' => Text::uuid(),
                'role_denomination' => $roles[$i-1],
                'created' => $now_formatted,
                'modified' => $now_formatted
            ];  
            array_push($role_insertions, $role_item);
        }

        $table->insert($role_insertions);

        $table->saveData();
    }

    public function down(){
        $this->execute('DELETE FROM project_contributor_roles');
    }
}
