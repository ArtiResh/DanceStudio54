<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'desc',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
}