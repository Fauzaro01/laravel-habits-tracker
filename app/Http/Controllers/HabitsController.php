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
        return view('habits.index');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:250',
            'description' => 'nullable|max:500'
        ]);

        if(habits::isDuplicate($request->name, auth()->user()->id)) {
            return redirect()->back()->withErrors(["name" => "Nama Habits sudah ada."])->withInput();
        }

        habits::create([
            'id' => Str::random(12),
            'name' => $request->name,
            'description' => $request->description ?? "Deskripsi belum selesai diatur",
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->withSuccess('Berhasil menambahkan Habits baru!');
    }
}
