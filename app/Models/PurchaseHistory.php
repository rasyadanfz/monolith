<?php

namespace App\Models;

use Database\Factories\PurchaseHistoryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $table = 'purchase_histories';
    protected $fillable = ['item_id', 'item_name', 'quantity', 'total_price', 'purchase_time'];

    public function user(){
        return $this->belongsTo(User::class);
    }  

}
