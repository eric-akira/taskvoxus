<?php
use Migrations\AbstractMigration;

class Createfiles extends AbstractMigration
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
        $table = $this->table('files');
        $table->addColumn('location', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('file_of', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('file_name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);
        $table->create();
    }
}
