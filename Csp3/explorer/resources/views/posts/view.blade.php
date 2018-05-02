@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
            @endif            
            <div class="panel panel-default text-center">
                <div class="panel-heading" id="title3">Tourist Attraction</div>

                <div class="panel-body">
                   <div class="col-md-4">
                    
                    {{-- list of categories
                    view categories from database --}}
                    <ul class="list-group">
                        
                    <h1 class="list">Select Country To Visit</h1>
                        @if(count($categories) > 0)
                            @foreach($categories->all() as $category)
                                <li class="list-group-item"><a href='{{ url("category/{$category->id}")}}'>{{$category->category}}</a></li>
                            @endforeach

                        @else
                            <p>No Category Found!</p>
                        @endif
                        
                    </ul>
                    
                    </div>

                     {{-- to show post image and documentation --}}
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4 class="title2">{{$post->post_title}}</h4>
                                <img class="img-responsive" src="{{ $post->post_image }}" alt="">
                                
                                <hr class="hr">
                                <p id="post-body">{{ $post->post_body }}</p>
                                <hr class="hr">
                                <p id="post-body2">{{ $post->post_body2 }}</p>
                                <hr class="hr">
                                <p id="post-body2">{{ $post->post_body3 }}</p>

                                    <!-- like button -->
                                    <ul class="nav nav-pills" >
                                        <li role="presentation">
                                            <a href='{{ url("/like/{$post->id}") }}' id="like">
                                                <i class="fas fa-thumbs-up"></i> Like({{$likeCtr}})
                                            </a>
                                        </li>

                                        {{-- for dislike button --}}
                                       {{--  <li role="presentation">
                                            <a href='{{ url("/dislike/{$post->id}") }}'>
                                                <span class="fa fa-thumbs-down"> Dislike({{$dislikeCtr}})</span>
                                                <i class="fas fa-thumbs-down"></i> Dislike({{$likeCtr}})
                                            </a>
                                        </li> --}}

                                        <li role="presentation">
                                            <a href='{{ url("/comment/{$post->id}") }}' id="comment">
                                                <i class="fas fa-comment"></i> Comment
                                            </a>
                                        </li>
                                    </ul>    

                            @endforeach
                            
                            @else
                                <p>No Post Available!</p>
                            @endif

                        {{-- post a comment. . text area --}}
                        <form method="POST" action='{{ url("/comment/{$post->id}") }}'>
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea id="comment" rows="3" class="form-control" name="comment" required autofocus></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btnComment" class="btn3 btn-success btn-lg btn-block">POST COMMENT</button>
                            </div>
                            {{-- <h4>Comment</h2> --}}
                            </form> 
                            
                            <hr class="hr">
                            {{-- to post a comment per user --}}
                            @if(count($comments) > 0)
                                @foreach($comments->all() as $comment)
                                    <p class="comment">{{ $comment->comment }}</p>
                                    <p class="postedBy">Posted by: {{ $comment->name }}</p>
                                    
                                    {{-- delete a comment --}}
                                    <form action="/delete/{{ $comment->id }}/comment" method="post">
                                    {{ csrf_field() }}
                                        <input type="submit" value="Delete" class="btnDelete">
                                    </form>
                                    <hr class="hr2">
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
