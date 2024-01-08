<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Lists;

class ListController extends Controller
{
    public function index($id) {
        $list = Lists::find($id)->first();
        return view('list.index', compact('list'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:4'
        ]);

        $page = Lists::create([
            'id' => Str::random(8),
            'title' => $request->title,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('list.index', $page->getAttribute('id'));
    }
}
