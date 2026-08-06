<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'purchase_date',
        'sold_at',
        'quantity',
        'purchase_price',
        'expected_selling_price',
        'actual_selling_price',
        'shipping_fee',
        'other_expenses',
        'status',
        'notes'
    ];

    protected $casts = [
        'purchase_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
