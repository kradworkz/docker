<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    use HasFactory;
    
    public function designation()
    {
        return $this->belongsTo('App\Models\Dropdown', 'designation_id', 'id');
    }

    public function institution()
    {
        return $this->belongsTo('App\Models\Organization', 'institution_id', 'id');
    }
}
