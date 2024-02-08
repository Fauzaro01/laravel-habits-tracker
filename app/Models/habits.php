<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habits extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $timestamps = true;

    protected $hidden = [
        'user_id'
    ];

    protected $fillable = [
        "id", "name", "description", "user_id"
    ];

    public static function isDuplicate($name, $userId): bool {
        return self::where('name', $name)->where('user_id', $userId)->exists();
    }

    public static function getHabitsByUser($userId) {
        return self::where('user_id', $userId)->get();
    }
}
