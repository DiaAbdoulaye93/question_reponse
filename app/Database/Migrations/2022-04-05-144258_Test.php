<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Test extends Migration
{
    protected $DBGroup = 'test';
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'name'       => ['type' => 'varchar', 'constraint' => 31],
            'uid'        => ['type' => 'varchar', 'constraint' => 31],
            'class'      => ['type' => 'varchar', 'constraint' => 63],
            'icon'       => ['type' => 'varchar', 'constraint' => 31],
            'summary'    => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
    }

    public function down()
    {
        //
    }
}
