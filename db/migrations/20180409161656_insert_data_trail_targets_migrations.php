<?php

use Phinx\Migration\AbstractMigration;
use Cake\Utility\Text;
use Cake\Core\Configure;

class InsertDataTrailTargetsMigrations extends AbstractMigration
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
        // insert datas
        $now = new \DateTime();
        $now_formatted = $now->format('Y-m-d H:i:s');

        $targets = [
            [
                'id' => Text::uuid(),
                'target_denomination' => 'Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'target_denomination' => 'Fiche Sécurité Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'target_denomination' => 'Fiche Exigences Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],
            
            [
                'id' => Text::uuid(),
                'target_denomination' => 'Fiche Prérequis Audit',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            
            [
                'id' => Text::uuid(),
                'target_denomination' => 'Fiche Suivi Corrections',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            
            [
                'id' => Text::uuid(),
                'target_denomination' => 'Utilisateur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'target_denomination' => 'Assets',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'target_denomination' => 'Message',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'target_denomination' => 'Contributeur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

        ];

        $this->insert('trail_targets',$targets);
    }

    public function down(){
        $this->execute('DELETE FROM trail_targets');
    }
}
