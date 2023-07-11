<?php 
  
// in this we use one to one relation and there is no match of post_id=3

?>

@include('blog/header');


<div id="main-content" class="blog-page">
   
    <div class="container">

    
        <div class="row clearfix">

        <!-- Single Post Div -->
        <div class="col-lg-4 mx-auto col-md-4">
            

            <div class="card" style="width: 18rem;">
                 <img class="card-img-top" src="{{ url('images/'.$post_detail->detail->image) }}" alt="Card image cap"> 
                <div class="card-body">
                    <h5 class="card-title">{{$post_detail->title}}</h5>
                    <p class="card-text">{{$post_detail->description}}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

            


        </div>

       
        <!-- Single Post Div End -->
            
        </div>

    </div>
</div>




@include('blog/footer');