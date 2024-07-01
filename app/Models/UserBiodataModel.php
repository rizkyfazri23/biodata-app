<?php

namespace App\Models;

use CodeIgniter\Model;

class UserBiodataModel extends Model
{
    protected $table = 'user_biodata';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 
        'position', 
        'name', 
        'identity_number', 
        'birth_place', 
        'birth_date', 
        'gender',
        'religion', 
        'blood_type',
        'marital_status', 
        'address_ktp', 
        'current_address', 
        'email',
        'phone_number', 
        'emergency_contact', 
        'skills', 
        'willing_to_relocate', 
        'expected_salary'
    ];
}
