<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;
class nominas extends Model
{
    use HasFactory,Softdeletes;

    protected $primaryKey ='idn';
    protected $fillable = ['idn','fecha','dias','monto','ide'];
}
