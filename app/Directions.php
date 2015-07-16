<?php
namespace App;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Directions extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    use ModelWithImageOrFileFieldsTrait;

    protected $table = 'directions';

    protected $fillable = [
        'name',
        'description',
        'video_link',
        'bg_src',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function getImageFields()
    {
        return [
            'bg_src' => 'directions/'
        ];
    }

    public function photos()
    {
        return $this->morphMany('\App\Pictures', 'parent');
    }

}