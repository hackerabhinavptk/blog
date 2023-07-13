<?php

// in this we use one to one relation and there is no match of post_id=3 because there was post_id=3 into detail table in post_id column and in post there is no
?>

@include('blog/header');



<div id="main-content" class="blog-page">

    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-8 mx-auto col-md-12 left-box">
                <div class="card single_post">
                    <div class="body">
                       
                        <div class="img-post">
                            <img class="card-img-top" src="{{ url('images/' . $post_detail->detail->image) }}"
                                alt="Card image cap">
                            <h5 class="card-title">{{ $post_detail->title }}</h5>
                            <p class="card-text">{{ $post_detail->description }}</p>

                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>{{'comments '.$total_comments}}</h2>
                        </div>
                        <div class="body">
                            @foreach($comments as $key=>$value)
                            <ul class="comment-reply list-unstyled">
                                <li class="row clearfix">
                                    <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail"
                                            src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                            alt="Awesome Image"></div>
                                    <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                        <h5 class="m-b-0">{{$value->author->name}} </h5>
                                        <p> {{$value['comment']}}</p>
                                        <ul class="list-inline">
                                            <li><a href="javascript:void(0);">Mar 09 2018</a></li>
                                            <li><a href="javascript:void(0);">Reply</a></li>

                             <?php  if($is_author){ ?>

                                <li><a href="/post/delete/{{$value['id']}}">Delete</a></li>
                                        
                         <?php     }else{

                         } ?>
                        
                                
                               
                                        </ul>
                                    </div>
                                </li>
                                
                               
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">

                        <div class="body">
                            <div class="comment-form">
                                @if ($errors->any())

                                    <div class="alert alert-danger">

                                        @foreach ($errors->all() as $key => $value)
                                            <p class="text-align-center">{{ $value }}</p>
                                        @endforeach

                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif


                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                        
                                    </div>

                                @endif
                                <form class="row clearfix" action="/comment" method="POST">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea rows="4" name='comment' class="form-control no-resize" placeholder="Leave A Comment..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                                    </div>
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                                    <input type="hidden" value="{{ $post_detail->id }}" name="post_id">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- <div class="card" style="width: 18rem;">
               
                 <img class="card-img-top" src="{{ url('images/'.$post_detail->detail->image) }}" alt="Card image cap">
                 <div class="card-body">
                    <h5 class="card-title">{{$post_detail->title}}</h5>
                    <p class="card-text">{{$post_detail->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div> --}}







    @include('blog/footer');
