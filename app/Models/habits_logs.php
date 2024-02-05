<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class habits_logs extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $keyType = "string";

    protected $fillable = [
        "id", "date", "user_id", "habit_id", "is_completed"
    ];
}
