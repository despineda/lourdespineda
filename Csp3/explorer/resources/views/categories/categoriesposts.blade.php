@extends('layouts.app2')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="panel panel-default text-center">
                
                <div class="panel-heading" id="title3" >Tourist Attraction</div>
                

                <div class="panel-body">
                   <div class="col-md-4">
                    
                    <!-- list of categories -->
                    <!-- view categories from database -->
                    <h1 class="list">Select Country To Visit</h1>
                    <ul class="list-group">
                        @if(count($categories) > 0)
                            @foreach($categories->all() as $category)
                                <li class="list-group-item"><a href='{{ url("category/{$category->id}")}}'>{{$category->category}}</a></li>
                            @endforeach

                        @else
                            <p>No Category Found!</p>
                        @endif
                        
                    </ul>
                    </div>
                    <br>
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4 class="title2">{{$post->post_title}}</h4>
                                <img class="img-responsive" src="{{ $post->post_image }}" alt="">
                                <p id="post-body">{{ $post->post_body }}</p>
                                
                                <hr class="hr">
                                <p id="post-body2">{{ $post->post_body2 }}</p>
                                
                                <hr class="hr">
                                <p id="post-body3">{{ $post->post_body3 }}</p>
                                <!-- <p>{{ $post->post_body }}</p> -->
                                
                                <hr class="hr">
                                <hr class="hr">
                                <hr class="hr">
                                <hr class="hr">
                            @endforeach
                            
                            @else
                                <p>No Post Available!</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
