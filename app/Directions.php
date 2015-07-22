<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{

    protected $table = 'directions';

    protected $fillable = [
        'name',
        'desc',
        'desc_detail',
        'video',
        'images',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function getImagesAttribute($value)
    {
        return preg_split('/,/', $value, -1, PREG_SPLIT_NO_EMPTY);
    }
    public function setImagesAttribute($images)
    {
        $this->attributes['images'] = implode(',', $images);
    }

}