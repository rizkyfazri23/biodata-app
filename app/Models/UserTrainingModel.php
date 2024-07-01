<?php

namespace App\Models;

use CodeIgniter\Model;

class UserTrainingModel extends Model
{
    protected $table = 'user_training';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'course_name', 'is_certificate', 'year'];
}
