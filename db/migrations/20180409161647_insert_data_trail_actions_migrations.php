<?php

use Phinx\Migration\AbstractMigration;
use Cake\Utility\Text;
use Cake\Core\Configure;

class InsertDataTrailActionsMigrations extends AbstractMigration
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

        $actions = [
            [
                'id' => Text::uuid(),
                'action_denomination' => 'Création Utilisateur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Utilisateur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Suppression Utilisateur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],
            
            [
                'id' => Text::uuid(),
                'action_denomination' => 'Verrouillage Utilisateur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            
            [
                'id' => Text::uuid(),
                'action_denomination' => 'Réinitialisation Utilisateur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            
            [
                'id' => Text::uuid(),
                'action_denomination' => 'Création Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Création Fiche Sécurité Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Fiche Sécurité Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Création Fiche Exigence Sécurité Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Fiche Exigence Sécurité Projet',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Création Fiche Prérequis Audit',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Fiche Prérequis Audit',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Création Fiche Suivi Corrections',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Fiche Suivi Corrections',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Upload Informations',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Assignation SPOC',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Confirmation Point de suivi correction',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Infirmation Point de suivi correction',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Envoi message',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Définition Contributeur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Modification Rôle Contributeur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

            [
                'id' => Text::uuid(),
                'action_denomination' => 'Suppression Contributeur',
                'created' => $now_formatted,
                'modified' => $now_formatted
            ],

        ];

        $this->insert('trail_actions',$actions);
    }

    public function down(){
        $this->execute('DELETE FROM trail_actions');
    }
}
