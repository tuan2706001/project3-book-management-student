<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRegisterBooks extends Model
{
    use HasFactory;


    public $idBook;
    public $nameBooks;
    public $nameSubject;
    public $status;
}
