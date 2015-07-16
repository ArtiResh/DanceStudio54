<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{
    protected $table = 'directions';
    protected $fillable = [
        'name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}