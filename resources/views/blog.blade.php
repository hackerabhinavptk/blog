@include('blog/header');
<div id="main-content" class="blog-page">

    <div class="container">


        <div class="row clearfix">

            <!-- Single Post Div -->

            @foreach ($posts_list as $key => $value)
                <div class="col-lg-4 mx-auto col-md-4">


                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                            <img class="card-img-top" src="{{ url('images/' . $value['post_image']) }}" width="80">
                            <h5 class="card-title">{{ $value['post_title']}}</h5>
                            <p class="card-text">{{ $value['post_description']}}</p>
                            <a href="/post/{{$value['post_id']}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>




                </div>
            @endforeach
            <!-- Single Post Div -->

            <!-- Single Post Div End -->

        </div>

    </div>
</div>
@include('blog/footer');
