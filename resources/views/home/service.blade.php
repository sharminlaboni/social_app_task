<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Posts </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">
                  @foreach($post as $post)
                  <div class="col-md-4">
                     <div><img style="margin-bottom:20px;height:300px" width=" 300px" height="300px" src="{{asset('storage/post/' .$post->image)}} "/>
                     </div>
                        <p>{{$post->content}}</p>
                        
                     <div class="btn_main"><a href="{{route('postdetail',$post->id)}}">Read more</a></div>
                  </div>
                  @endforeach
                 
                  <!-- <div class="col-md-4">
                     <div><img src="images/img-3.png" class="services_img"></div>
                     <div class="btn_main"><a href="#">Camping</a></div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>