<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',
        'notes',
        'delivery_charge',
        'tracking_code',
        'courier_status',
        'discount',
        'total_weight',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * ✅ Placeholder অনুযায়ী Grand Total হিসাব
     */
    public function getCalculatedGrandTotalAttribute(): float
    {
        $subtotal = $this->items->sum(function ($item) {
            return floatval($item->total_amount); // Placeholder এই ফিল্ড ইউজ করে
        });

        $deliveryCharge = floatval($this->delivery_charge ?? 0);
        $discount = floatval($this->discount ?? 0);

        return max(0, $subtotal + $deliveryCharge - $discount);
    }

    /**
     * ✅ সেভ করার সময় গ্র্যান্ড টোটাল ও ডেলিভারি চার্জ সেট করুন
     */
    protected static function booted(): void
    {
        static::saving(function (Order $order) {
            // যদি গ্র্যান্ড টোটাল আগে থেকেই সেট থাকে, তাহলে আর override করবে না
            if (is_null($order->grand_total)) {
                $order->grand_total = $order->calculated_grand_total;
            }
        });
    }

}
