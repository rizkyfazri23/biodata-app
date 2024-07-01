<?php

namespace App\Models;

use CodeIgniter\Model;

class UserEmploymentModel extends Model
{
    protected $table = 'user_employment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'company_name', 'position', 'salary', 'year_from', 'year_to'];
}
