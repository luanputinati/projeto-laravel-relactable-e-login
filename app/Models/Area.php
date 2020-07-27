<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model{
    
    protected $fillable = ['description', 'color'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
