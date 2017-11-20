<?php
use Migrations\AbstractMigration;

class CreateTasks extends AbstractMigration
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
        $defaultIdOptions = ['default' => null, 'limit' => 11, 'null' => false, 'signed' => false];

        $table = $this->table('tasks');

        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('priority', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => false,
            'signed' => false
        ]);

        $table->addColumn('status', 'string', [
            'default' => 'pending',
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('category_id', 'integer', $defaultIdOptions);

        $table->addColumn('created_by', 'integer', $defaultIdOptions);

        $table->addColumn('done_by', 'integer', $defaultIdOptions);

        $table->addColumn('task_file', 'integer', $defaultIdOptions);

        $table->create();
    }
}
