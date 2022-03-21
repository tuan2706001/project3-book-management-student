<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSub extends Model
{
    use HasFactory;
    protected $table = "booksubscription";

    public $timestamps = false;

    public $primaryKey = "id";
}
