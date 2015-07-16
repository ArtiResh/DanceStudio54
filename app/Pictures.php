<?php
namespace App;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Pictures extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    use ModelWithImageOrFileFieldsTrait;

    protected $table = 'directions';

    protected $fillable = [
        'name',
        'src',
        'desc'
    ];
    protected $hidden = [
        'id',
        'src',
        'desc'
    ];

    public function getImageFields()
    {
        return [
            'bg_src' => 'directions/'
        ];
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}