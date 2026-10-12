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
        'sold_price',
        'shipping_fee',
        'other_expenses',
        'status',
        'notes'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'sold_at' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getTotalCostAttribute()
    {
        return $this->purchase_price
            + $this->shipping_fee
            + $this->other_expenses;
    }

    public function getProfitAttribute()
    {
        if ($this->sold_price === null) {
            return null;
        }

        return $this->sold_price - $this->total_cost;
    }
}
