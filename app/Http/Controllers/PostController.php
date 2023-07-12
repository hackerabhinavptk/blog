<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Post;
use App\Models\Comment;


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
      
        $comments = Post::find($id)->comments;
        // in this $comments we are getting an instance of author method defined in comment model thats we can use author method because ultimately in the post model inside  there is Comment model called threrfore we can call that

        $total_comments = count($comments);
       

        return view('detail', ['post_detail' => $post_detail,'comments'=>$comments,'total_comments'=>$total_comments]);

        // If we have defined a relationship between "Post" and "Detail" models, calling `$post_detail->detail` will retrieve the associated "Detail" model instance.
        // Once you have defined the relationship, you can use it to retrieve associated records. In this case, calling `$post_detail->detail` retrieves the associated "Detail" record based on the relationship defined in the "Post" model.

    }


    public function comment_post(Request $request)
    {

        // dd($_REQUEST);

        $request->validate([
            'comment' => 'required|min:4',

        ]);

        $user_id = auth()->user()->id;
   
        $post_id = json_decode($request->post_id);
        

        $comment = $request->comment;

        $Comment = new Comment;

        $Comment->comment = $comment;
        $Comment->post_id = $post_id;
        $Comment->user_id = $user_id;

        if ($Comment->save()) {
            $request->session()->flash('success', 'commented successfully');

        } else {
            $request->session()->flash('error', ' sorry no comment');
        }

        return back();

    }


    public function Logout(Request $request){

        $request->session()->flush();

        return redirect('/login');
    }
}