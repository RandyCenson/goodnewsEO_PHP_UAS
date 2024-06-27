<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Mendefinisikan class Status yang merupakan model Eloquent
class Status extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung pembuatan instance model dengan factory

    // Mengatur atribut yang tidak boleh diisi secara massal (mass assignment)
    protected $guarded = ['id'];

    // Mendefinisikan relasi one-to-many dengan model Order
    // Satu status dapat memiliki banyak order
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
