<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- bootstrap css -->
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">

       @include('home.header') 
</div> 
      <!-- header section end -->
   <!-- banner section start -->
@foreach($data as $data)

<div>image:<img style="padding:20px;height:550px;width:600px;margin:auto" height="300px" src="{{asset('storage/post/' .$data->image)}} "/> 
<lable>Content</lable>
    <h4>{{$data->content}}</h4>
</div>

@endforeach
    
      <!-- </div> -->

     
      @include('home.footer') 
      <!-- copyright section end -->
      <!-- Javascript files-->
    @include('home.homejs')
</html>