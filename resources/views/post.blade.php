@extends('layouts.blog-post')

@section('content')


<!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>
            <span class="glyphicon glyphicon-time"></span> 
            {{$post->created_at->format('d M Y')}} {{($post->created_at->diffForHumans())}}
        </p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/300x300'}}" alt="" width="400">

        <hr>

        <!-- Post Content -->
        <p class="lead">{!! $post->body !!}</p>

        <hr>

       <!-- Comments Form -->
       @if (!Auth::guest())
       <div class="well">
           <h4>Leave a Comment:</h4>

           <form action="{{route('admin.comments.store')}}" method="POST">

               {{ csrf_field() }}

               {{-- hidden untuk menangkap post id --}}
               <input type="hidden" name="post_id" value="{{$post->id}}">

               <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                   <textarea class="form-control" rows="3" name="body"></textarea>

                   @if ($errors->has('body'))
                       <span class="help-block">
                           <strong>{{ $errors->first('body') }}</strong>
                       </span>
                   @endif
               </div>
               
               <div class="form-group">
                   <button type="submit" class="btn btn-primary">Submit</button>
               </div>

           </form>

       </div> 
       @endif
   

   <hr>

   <div id="disqus_thread"></div>
   <script>

   /**
   *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
   *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
   /*
   var disqus_config = function () {
   this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
   this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
   };
   */
   (function() { // DON'T EDIT BELOW THIS LINE
   var d = document, s = d.createElement('script');
   s.src = 'https://lara-project1.disqus.com/embed.js';
   s.setAttribute('data-timestamp', +new Date());
   (d.head || d.body).appendChild(s);
   })();
   </script>
   <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

   <script id="dsq-count-scr" src="//lara-project1.disqus.com/count.js" async></script>
  
       

            
      
        
       

    </div>
    {{-- end col-md-8 --}}

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li>
                                {{$category->name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
        

@endsection

@section('scripts')

    <script>
        
    </script>
   
@endsection

@section('footer')
    
@endsection