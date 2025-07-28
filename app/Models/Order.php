<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * Ini adalah "daftar tamu" yang diizinkan untuk diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'outlet_id',
        'status',
        'total_bill',
    ];

    /**
     * Relasi ke model User (pemesan).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Outlet.
     */
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    /**
     * Relasi ke model OrderItem (detail item pesanan).
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi ke model Payment
public function payments()
{
    return $this->hasMany(Payment::class);
}

// Accessor untuk menghitung sisa tagihan secara otomatis
public function getRemainingBillAttribute()
{
    return $this->total_bill - $this->paid_amount;
}
}
