<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{

    protected $table = 'masters';

    protected $fillable = [
        'name',
        'description',
        'video_link',
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