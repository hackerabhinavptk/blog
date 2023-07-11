

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('Error') }}
        </div>
    @endif


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())

        <div class="alert alert-danger">

            @foreach ($errors->all() as $key => $value)
                <p class="text-align-center">{{ $value }}</p>
            @endforeach
        </div>

    @endif
    <div class="jumbotron container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Add Posts</h3>
            </div>
            <div class="panel-body">

                <form action="/form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" name='title' value="{{ old('title') }}" class="form-control"
                            id="exampleInputPassword1" placeholder="title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <input type="text" class="form-control" value="{{ old('description') }}" name="description"
                            id="exampleInputPassword1" placeholder="description">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="status" id="cars">
                            <option value="0">Draft</option>
                            <option value="1">Publish</option>
                           
                          </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Tags</label>
                        <textarea type="text" class="form-control" value="{{ old('tag') }}" name="tag"
                            id="exampleInputPassword1" placeholder="tags"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Type</label>
                        <select name="type" id="cars">
                            <option value="entertainment">Entertainment</option>
                            <option value="news">News</option>
                            <option value="sports">Sports</option>
                            <option value="tech">Tech</option>
                           
                          </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" class="form-control" value="{{ old('image') }}" name="image"
                            id="exampleInputPassword1" placeholder="image">
                    </div>



                    <input type="hidden" value="{{ csrf_token() }}" name="_token">



                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>


            </div>
        </div>


    </div>


</body>

</html>
 

