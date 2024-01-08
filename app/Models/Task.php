<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $keyType = "string";
    protected $primaryKey = "id";

    protected $fillable = [
        'id', 'name', 'status',  'list_id'
    ];
}
