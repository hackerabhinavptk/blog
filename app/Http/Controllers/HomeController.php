<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function posts()
    {


        $id = auth()->user()->id;

        $posts_list = [];
        $detail = User::find($id)->posts; 

        //we can use above to show the logged in user posts and this below to get those posts which are not logged in users 

        // $detail = \App\Models\Detail::where('author_id', '!=', $id)->all();
         

        //when i did not used posts it gave me the id of the logged in user so posts are neccessary bcz we have used one to many relation... 

        if ($detail) {

            foreach ($detail as $single_post_detail) {

                $posts_list[$single_post_detail->post_id] = [

                    'author_name' => User::find($single_post_detail->author_id)->name,
                    'post_type' => $single_post_detail->post_type,
                    'post_title' => Post::find($single_post_detail->post_id)->title,
                    'post_description' => Post::find($single_post_detail->post_id)->description,
                    'post_image' => $single_post_detail->image,
                    'post_id' => $single_post_detail->id,

                ];
            }
        }
        //   dd($posts_list);


        return view('blog', ['posts_list' => $posts_list]);
    }

    public function index()
    {



        return view('home');
    }

}