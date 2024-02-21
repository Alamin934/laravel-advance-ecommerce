<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{OrderDetails,PaymentDetails};

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order_details(){
        return $this->hasMany(OrderDetails::class);
    }
    public function payment_details(){
        return $this->hasOne(PaymentDetails::class);
    }
}
