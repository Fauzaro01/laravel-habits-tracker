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

    public static function countLogsByDate($id) {
        $habit = self::with('logs')->find($id);
        $hitunganLogs = [];

        foreach ($habit->logs as $log) {
            $tanggal = $log->date;

            if(!isset($hitunganLogs[$tanggal])) {
                $hitunganLogs[$tanggal] = 1;
            } else {
                $hitunganLogs[$tanggal]++;
            }
        }

        return $hitunganLogs;
    }

    public static function recordHabit($id) {
        $habit = self::findOrFail($id);
        $habitLogs = self::countLogsByDate($id);
        $berhasil = 0;
        $gagal = 0;
        foreach($habitLogs as $key => $value) {
            ($value >= $habit->daily_count) ? $berhasil++ : $gagal++;
        }

        return ["berhasil" => $berhasil, "gagal" => $gagal];
    }
}
