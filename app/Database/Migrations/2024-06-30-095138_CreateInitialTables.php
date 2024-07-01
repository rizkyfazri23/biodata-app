<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInitialTablesWithForeignKeys extends Migration
{
    public function up()
    {
        // Create 'user' table
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'is_admin' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user');

        // Create 'user_biodata' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'position' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'identity_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'birth_place' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'birth_date' => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'religion' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'blood_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
                'null'       => false,
            ],
            'marital_status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'address_ktp' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'current_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'phone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'emergency_contact' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'skills' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'willing_to_relocate' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false,
            ],
            'expected_salary' => [
                'type'       => 'FLOAT',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_biodata');

        // Create 'user_pekerjaan' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'company_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'position' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'salary' => [
                'type'       => 'FLOAT',
                'null'       => false,
            ],
            'year_from' => [
                'type'       => 'YEAR',
                'constraint' => 4,
                'null'       => false,
            ],
            'year_to' => [
                'type'       => 'YEAR',
                'constraint' => 4,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_employment');

        // Create 'user_pelatihan' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'course_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'is_certificate' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false,
            ],
            'year' => [
                'type'       => 'YEAR',
                'constraint' => 4,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_training');

        // Create 'user_pendidikan' table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'education_level' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'institution_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'major' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'graduation_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => false,
            ],
            'gpa' => [
                'type'       => 'FLOAT',
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_education');
    }

    public function down()
    {
        $this->forge->dropTable('user_education');
        $this->forge->dropTable('user_training');
        $this->forge->dropTable('user_employment');
        $this->forge->dropTable('user_biodata');
        $this->forge->dropTable('user');
    }
}