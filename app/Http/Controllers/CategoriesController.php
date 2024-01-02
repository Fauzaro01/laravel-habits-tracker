<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index() {
        $categories = Category::findByUserId(auth()->user()->id);
        return view('categories.index', compact('categories'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => "required",
        ]);

        Category::create([
            'id' => Str::random(6),
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->withSuccess("Data Berhasil di tambahkan!");
    }
}
