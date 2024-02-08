<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habits extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    protected $keyType = "string";

    protected $fillable = [
        "id", "name", "description", "user_id"
    ];

    public static function isDuplicate($name, $userId) {
        return self::where('name', $name)->where('user_id', $userId)->exists();
    }
}
