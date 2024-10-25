<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public const STORAGE_DIR = 'images';

    public static function dir($name)
    {
        return self::STORAGE_DIR . '/' . $name;
    }
}
