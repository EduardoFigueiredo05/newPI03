<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['continent_id', 'name', 'slug', 'image_cover', 'short_description'];

    // Um País pertence a um Continente
    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }

    // Um País tem muitos Pacotes
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}