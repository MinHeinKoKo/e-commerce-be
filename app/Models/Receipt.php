<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','total','process'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_receipt','receipt_id','order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
