<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

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
}
