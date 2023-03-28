<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class usuarios extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey ='idu';
    protected $fillable = ['idu','nombre','apellido','user','pasw','tipo','activo'];
}
