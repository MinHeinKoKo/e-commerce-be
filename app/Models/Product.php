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
    public function isDiscounted()
    {
        return Discount::where('status', 1)->exists();
    }
    public function calculateDiscountPrice()
    {
        $discount = Discount::where("status",1)->where(function ($query){
            $query->orWhere("expires_at", ">", now());
        })->first();

        if ($discount){
            $discountAmount = $this->price * ( $discount->discount_amount /100 ) ;
            return round( $this->price - $discountAmount , 2);
        }
        return $this->price;
    }
}
