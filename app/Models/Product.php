<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','size_id','color_id','is_published','user_id','name','slug','description','excerpt','price','quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
