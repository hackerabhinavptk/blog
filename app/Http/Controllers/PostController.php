<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Post;


class PostController extends Controller
{
    public function form(Request $request)
    {

        return view('form');
    }


    public function add(Request $request)
    {



        $request->validate([
            'title' => 'required|min:4|unique:post',

            'description' => 'required',

            'status' => 'required',
            'tag' => 'required',

            'type' => 'required',

            'image' => 'required|image|mimes:jpg,png,jpeg'

        ]);

        $image = time() . '.' . $request->file('image')->extension();

        $request->file('image')->move(public_path('images'), $image);


        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $tag = $request->tag;
        $type = $request->type;



        $post = new Post;

        $post->title = $title;
        $post->description = $description;


        if ($post->save()) {


            $detail = new Detail;

            $detail->author_id = auth()->user()->id;
            $detail->post_id = $post->id;
            $detail->status = $status;
            $detail->tag = $tag;
            $detail->type = $type;
            $detail->image = $image;
            if ($detail->save()) {
                $request->session()->flash('success', 'data submitted successfully');

            }


        } else {
            $request->session()->flash('error', 'data not submitted successfully');
        }

        return back();

    }

    public function detail(Request $request, $id)
    {

        $post_detail = Post::find($id);

        return view('detail', ['post_detail' => $post_detail]);

        // If we have defined a relationship between "Post" and "Detail" models, calling `$post_detail->detail` will retrieve the associated "Detail" model instance.
        // Once you have defined the relationship, you can use it to retrieve associated records. In this case, calling `$post_detail->detail` retrieves the associated "Detail" record based on the relationship defined in the "Post" model.

    }
}