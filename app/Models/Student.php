<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    public $timestamps = false;

    public $primaryKey = 'stu_id';

    public function getBlockNameAttribute()
    {
        if ($this->status == 0) {
            return "Hoạt động";
        } else {
            return  "Khóa";
        }
    }
}
