<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtoupper($value)
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Str::words($value,3,'...'),
            set: fn(string $value) => ucfirst($value)
        );
    }

}
