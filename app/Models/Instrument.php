<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model
    protected $table = 'instruments';

    // Kolom-kolom yang dapat diisi (mass assignable attributes)
    protected $fillable = ['name', 'type', 'brand', 'description', 'stock_quantity', 'rental_price', 'condition', 'image'];

    // Kolom-kolom yang harus disembunyikan dari array dan JSON
    protected $hidden = [];

    // Kolom-kolom yang harus di-cast ke tipe data native
    protected $casts = [];

    public function users()
{
    return $this->belongsToMany(User::class)
                ->withPivot('rented_at', 'returned_at')
                ->withTimestamps();
}

}
