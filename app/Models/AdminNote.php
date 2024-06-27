<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNote extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Jika Anda ingin menggunakan timestamps (created_at dan updated_at)
    public $timestamps = true;
}
