<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity', 'unit_price');
    }

    public function grandTotal()
    {
        return $this->belongsToMany(Item::class, 'item_order')
            ->selectRaw('sum(item_order.quantity * item_order.unit_price) as total')
            ->groupBy('item_order.order_id');
    }
}
