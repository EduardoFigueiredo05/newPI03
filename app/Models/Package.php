<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'title', 'subtitle', 'slug', 
        'price', 'days', 'nights', 'start_date', 'end_date',
        'details_itinerary', 'details_included', 'details_conditions',
        'info_general', 'info_gastronomy', 'info_nightlife',
        'image_main', 'is_active'
    ];

    // Converte automaticamente para objeto de data do Carbon
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    // Um Pacote pertence a um País
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Um Pacote tem muitas Imagens (Galeria)
    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }

    // Um Pacote tem muitas Reservas
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}