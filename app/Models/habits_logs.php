<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class habits_logs extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $keyType = "string";

    protected $fillable = [
        "id", "date", "user_id", "habit_id"
    ];

    protected $hidden = [
        'user_id'
    ];

    public function habit()
    {
        return $this->belongsTo(habits::class, 'id');
    }
}
