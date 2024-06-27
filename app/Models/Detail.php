<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Mendefinisikan class Detail yang merupakan model Eloquent
class Detail extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung pembuatan instance model dengan factory

    // Mengatur atribut yang tidak boleh diisi secara massal (mass assignment)
    protected $guarded = ['id'];

    // Mendefinisikan relasi many-to-one dengan model User
    // Setiap detail terhubung dengan satu pengguna (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mendefinisikan relasi many-to-one dengan model Product
    // Setiap detail terhubung dengan satu produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
