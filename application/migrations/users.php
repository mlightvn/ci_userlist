<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique'=>TRUE,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null'=>TRUE,
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null'=>TRUE,
				'default'=>NULL,
			),

			// 'description' => array(
			//         'type' => 'TEXT',
			//         'null' => TRUE,
			// ),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
