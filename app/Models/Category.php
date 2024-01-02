<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "id";
    protected $keyType = "string";
    

    protected $fillable = [
        "id", "name", "user_id"
    ];

    public static function findByUserId($userId) {
        return self::where('user_id', $userId)->get();
    }

}
