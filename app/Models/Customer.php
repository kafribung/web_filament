<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

   // Relation one to many
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
