<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','description','price','photo'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
