<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users',['id'=>false, 'primary_key'=>['id']]);
        $table->addColumn('id','uuid')
              ->addColumn('user_fullname','string',['limit'=>100])
              ->addColumn('user_sexe','char',['limit'=>1])
              ->addColumn('user_contact','char',['length'=>8])
              ->addColumn('user_email','string',['length'=>50])
              ->addColumn('user_photo','text')
              ->addColumn('created','datetime')
              ->addColumn('modified','datetime')
              ->addColumn('deleted','datetime',['null'=>true])
              ->addColumn('created_by','uuid')
              ->addIndex(['user_contact','user_email'],['unique'=>true]);
        $table->create();
    }
}
