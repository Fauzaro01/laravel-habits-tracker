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
        "id", "name", "description", "daily_count", "user_id"
    ];

    public function logs()
    {
        return $this->hasMany(habits_logs::class, 'habit_id');
    }

    public static function isDuplicate($name, $userId): bool
    {
        return self::where('name', $name)->where('user_id', $userId)->exists();
    }

    public static function getHabitsByUser($userId)
    {
        return self::where('user_id', $userId)->get();
    }

    public static function findHabitsByUser($habitId, $userId): habits
    {
        return self::where('id', $habitId)
            ->where('user_id', $userId)
            ->first();
    }
}
