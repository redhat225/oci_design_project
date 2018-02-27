<?php
use Migrations\AbstractMigration;

class CreateUserAccounts extends AbstractMigration
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
         $table= $this->table('user_accounts',['id'=>false,'primary_key'=>['id']]);
                $table->addColumn('id','uuid')
                ->addColumn('user_account_username','string',['limit'=>20])
                ->addColumn('user_account_password','text')
                ->addColumn('user_account_avatar','text',['default'=>null])
                ->addColumn('user_account_is_active','boolean',['default'=>true])
                ->addColumn('created','datetime')
                ->addColumn('modified','datetime')
                ->addColumn('deleted','datetime')
                ->addColumn('user_id','uuid')
                // ->addForeignKey('user_id'  ,['deleted'=>'CASCADE','update'=>'CASCADE'])
                ->create();

        $table = $this->table('user_accounts');
        $table->addForeignKey('user_id',['deleted'=>'CASCADE', 'update'=>'CASCADE'])
        ->update();
    }

    // public function up(){
    //     $table = $this->table('user_account');
    //     $table->addForeignKey('user_id',['deleted'=>'CASCADE', 'update'=>'CASCADE'])
    //     ->save();
    // }
}
