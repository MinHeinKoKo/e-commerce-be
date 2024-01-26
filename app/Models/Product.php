<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name", "slug",
        "description","excerpt",
        "price", "quantity",
        "image" , "is_published",
        "is_visible", "category_id",
        "color_id", "size_id"
    ];

    public function color()
    {
        return $this->belongsTo(Color::class, "color_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function size()
    {
        return $this->belongsTo(Size::class, "size_id");
    }
}
