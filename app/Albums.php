<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'album';

    protected $fillable = [
        'desc',
        'event_id',
        'images',
        'desc'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function events()
    {
        return $this->belongsTo('App\Events');
    }

}