<?php
namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Pictures extends SleepingOwlModel
{
    /*protected $table = 'pictures';

    protected $fillable = [
        'desc',
        'src',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];*/

    public function parent()
    {
        return $this->morphTo();
    }
}