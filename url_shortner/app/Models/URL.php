<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class URL extends Model
{
    use HasFactory;

    protected $fillable = ['destination', 'slug', 'views'];

    // protected function slug(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => config('app.url') . '/' .$value,
    //     );
    // }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
