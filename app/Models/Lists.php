<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $keyType = "string";
    protected $primaryKey = "id";   

    protected $fillable = [
        'id', 'title', 'user_id'
    ];

    protected function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function task() {
        return $this->hasMany(Task::class, 'list_id');
    }
    
    public static function findByUserId($id) {
        return self::where('user_id', $id)->get();
    }
}
