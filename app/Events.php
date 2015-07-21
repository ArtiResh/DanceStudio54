<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{

    protected $table = 'events';

    protected $fillable = [
        'name',
        'desc',
        'desc_full',
        'event_date',
        'images',
//        'images_desc'
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

    public function albums()
    {
        return $this->hasOne('App\Albums');
    }

}