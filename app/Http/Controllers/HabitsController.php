<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\habits;

class HabitsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('habit.index');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:250',
            'description' => "max:500"
        ]);

        habits::insert([
            'id' => Str::random(12),
            'name' => $request->name,
            'decription' => "Deskripsi belum selesai di atur",
            'user_id' => auth()->user()->id
        ]);

        return redirect('habits.index')->withSuccess('Berhasil menambahkan Habits baru!');
    }
}
