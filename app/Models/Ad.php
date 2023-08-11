<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'slug', 'cover_image', 'price', 'km', 'date_of_enrollment', 'brand', 'model', 'fuel_type', 'transmission', 'engine_enrollment', 'color', 'car_doors_number', 'description'];

    public static function generateSlug($name)
    {
        return Str::slug($name);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
