<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseTag;
use App\Models\Tag;

class SearchController extends Controller
{
    
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($slug)
    {
        $tagId = Tag::where('slug', $slug)->first();
        $results = CourseTag::where('tag_id', $tagId->id)->get()
            ->map( function($result){
                return Course::find($result->course_id);
            });

        $data = [
            'results' => $results,
            'tagName'    => $tagId->name
        ];

        return view('search', $data);
    }
}
