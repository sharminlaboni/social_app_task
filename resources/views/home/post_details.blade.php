<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>A World</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      
   <base href="/public">
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">

       @include('home.header')  
      <!-- header section end -->
   <!-- banner section start -->

     
      </div>
      <!-- services section start -->
      
                  <div style ="text-align: center;"class="col-md-12">
                     <div><img style="padding:20px;height:550px;width:600px;margin:auto" height="300px" src="{{asset('storage/post/' .$post->image)}} "/> 
                     
                        <p>{{$post->content}}</p>
</div>
                        
                  </div>

                 
                 
               
      <!-- services section end -->
     
      <!-- about section end -->
      <!-- blog section start -->
      
      <!-- blog section end -->
      <!-- client section start -->
      
      
				<!-- Add Comment -->
				<div class="card my-5">
					<h5 class="card-header">Add Comment</h5>
					<div class="card-body">
						<form method="post" action="{{route('save_comment')}}">
						@csrf
						<textarea name="comment" class="form-control"></textarea>
						<input type="submit" class="btn btn-sucess mt-2" /> 
                        </from>

					</div>
				</div>
				
                <!-- Fetch Comments -->
			</div>
      <!-- choose section start -->
      
      <!-- choose section end -->
      <!-- footer section start -->
     @include('home.footer')
      <!-- copyright section end -->
      <!-- Javascript files-->
    @include('home.homejs')
</html>