<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Auth;

class StoryController extends Controller
{
    public function show($id){
        $story = Story::where('id', $id)->first();

        return view('pages.story-page', ['story' => $story]);
    }

    public function index(){
        $stories = Story::get();

        return view('cards.story-cards', ['stories' => $stories]);
    }

    public function showUpload(){
        return view('pages.story-form');
    }

    public function upload(Request $request){
        $validated = $request->validate([
            'title' => 'string|max:155|required',
            'subtitle' => 'string|max:155|required',
            'content' => 'string|required'
        ]);

        $story = Story::where('title', $validated['title'])->exists();

        if($story){
            return back()->withErrors(['title' => 'There is already a story with this title, try again...'])->withInput();
        }

        $story = Story::create([
            'author_id' => Auth::user()->id,
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'content' => $validated['content']
        ]);

        return redirect()->route('index.story')->with('success', 'Story successfully uploadade!');
    }

}
