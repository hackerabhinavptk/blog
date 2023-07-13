@include('blog/header');
<div id="main-content" class="blog-page">

    <div class="container">


        <div class="row clearfix">

            <div class="col-lg-12 col-md-12">

                <form action="/post/filter" method="POST">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="email">Post Type</label>
                            <select class="form-control" name="type">
                                <option value="entertainment">Entertainment</option>
                            <option value="news">News</option>
                            <option value="sports">Sports</option>
                            <option value="tech">Tech</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="email">Post Status</label>
                            <select class="form-control" name="status">
                                <option value="0">Draft</option>
                                <option value="1">Publish</option>
                               
                            </select>
                        </div>


                    </div>


                    <button type="submit" class="btn btn-default">Filter</button>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </form>

            </div>






            <!-- Single Post Div -->

            @foreach ($posts_list as $key => $value)
                <div class="col-lg-4 mx-auto col-md-4">

                    <div class="card" style="width: 18rem;">

                        <div class="card-body">
                            <img class="card-img-top" src="{{ url('images/' . $value['post_image']) }}" width="80">
                            <h5 class="card-title">{{ $value['post_title'] }}</h5>
                            <p class="card-text">{{ $value['post_description'] }}</p>
                            <a href="/post/{{ $value['post_id'] }}" class="btn btn-primary">Detail</a>
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
