<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Massassigment
    protected $fillable = [
        'title'
    ];

    // Timestamps
    public $timestamps = false;

    
    // Relation one to many
    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
