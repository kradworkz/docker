<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;
    protected $table = 'researches';

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Dropdown', 'status_id', 'id');
    }

    public function iprstatus()
    {
        return $this->belongsTo('App\Models\Dropdown', 'iprstatus_id', 'id');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\Dropdown', 'specialty_id', 'id');
    }

    public function classification()
    {
        return $this->belongsTo('App\Models\Dropdown', 'classification_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }
}
