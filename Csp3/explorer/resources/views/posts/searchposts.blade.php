@extends('layouts.app2')

<style type="text/css">
    .avatar{
        border-radius: 100%;
        max-width: 150px;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif

            @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
            @endif
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <form method="POST" action='{{ url("/search") }}'>
                            {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search for. . ">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">Go!</button>
                                    </span>
                                </div>
                            </form>                 
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                   <div class="col-md-4">
                    
                    <!-- post and getting image, name and designation from profile table -->
                    <!-- @if(!empty($profile))
                        <img src="{{ $profile->profile_pic }}" class="avatar" alt="">
                    @else
                        <img src="{{ url('images/avatar.png') }}" class="avatar" alt="">
                    @endif

                    @if(!empty($profile))
                        <p class="load">{{ $profile->name }}</p>
                    @else
                        <p></p>
                    @endif

                    @if(!empty($profile))
                        <p class="load">{{ $profile->designation }}</p>
                    @else
                        <p></p>
                    @endif
 -->
                    </div>
                    <div class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h4>{{$post->post_title}}</h4>
                                <img class="img-responsive" src="{{ $post->post_image }}" alt="">
                                <p>{{ substr($post->post_body, 0, 150) }}</p>
                                <!-- <p>{{ $post->post_body }}</p> -->
                                    
                                    <!-- view button -->
                                    <ul class="nav nav-pills">
                                        <li role="presentation">
                                            <a href='{{ url("/view/{$post->id}") }}'>
                                                <i class="fas fa-eye"></i> VIEW
                                            </a>
                                        </li>

                                        <!-- edit button -->
                                        <li role="presentation">
                                            <a href='{{ url("/edit/{$post->id}") }}'>
                                                <i class="fas fa-edit"></i> EDIT
                                            </a>
                                        </li>

                                        <!-- delete button -->
                                        <li role="presentation">
                                            <a href='{{ url("/delete/{$post->id}") }}'>
                                                <i class="fas fa-trash-alt"></i> DELETE
                                            </a>
                                        </li>
                                    </ul>

                                <!-- date and time posted -->
                                <cite style="float:left;">Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                                <hr/>
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
