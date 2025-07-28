<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
    ];

    /**
     * Relasi ke model User.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relasi ke model Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
