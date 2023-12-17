<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
