@extends('layouts.app2')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="addPost panel-heading text-center"  id="title3">Create A Blog</div>

                <div class="panel-body">
                    <div class="row">
                        <form class="form-horizontal" method="POST" action="{{ url('/addPost') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <!-- post title -->
                        <div class="postTitle form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                            <label for="post_title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-7" id="col7">
                                <input id="post_title" type="text" class="form-control" name="post_title" value="{{ old('post_title') }}" required autofocus>

                                @if ($errors->has('post_title'))
                                    <span class="blogTitle help-block">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- post body text area-->
                        <div class="postBody form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                        <div class="postBody form-group{{ $errors->has('post_body2') ? ' has-error' : '' }}">
                        <div class="postBody form-group{{ $errors->has('post_body3') ? ' has-error' : '' }}">
                            <label for="post_body" class="col-md-4 control-label">Post Body</label>

                            <div class="col-md-7">                                
                                <textarea id="email" rows="7" class="form-control" name="post_body" value="{{ old('post_body') }}" required ></textarea>
                                
                                <hr class="hr">                                
                                <textarea id="email" rows="7" class="form-control" name="post_body2" value="{{ old('post_body') }}" required ></textarea>
                                
                                <hr class="hr">                                
                                <textarea id="email" rows="7" class="form-control" name="post_body3" value="{{ old('post_body') }}" required ></textarea>

                                @if ($errors->has('post_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- for category -->
                        <div class="postCategory form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-7">
                                <select id="category_id" type="category_id" class="form-control" name="category_id" required>
                                    <option value="">Select</option>
                                    
                                    @if(count($categories) > 0)
                                        @foreach($categories->all() as $category)
                                            <option value="{{ $category->id }}">{{$category->category}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    <!-- posting image -->
                        <div class="postFeatured form-group{{ $errors->has('post_image') ? ' has-error' : '' }}">
                            <label for="post_image" class="col-md-4 control-label">Featured Image</label>
    
                            <div class="col-md-7">
                                <input id="post_image" type="file" multiple="true" class="form-control" name="post_image" required>

                                @if ($errors->has('post_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                                <button type="submit" class="btnAdd btn-primary btn-large btn-block">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
