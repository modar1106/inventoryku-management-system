<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'quantity',
        'transaction_date',
        'notes'
    ];

    // Relasi: Transaksi milik satu Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}