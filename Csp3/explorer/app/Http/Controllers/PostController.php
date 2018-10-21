<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Suppport\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Category;
use App\Post;
use App\Like;
use App\Dislike;
use App\Profile;
use Auth;
use App\Comment;

class PostController extends Controller
{
    public function post(){
    	$categories = Category::all();   	
    	return view('posts.post', ['categories' => $categories]);
    }

    public function addPost(Request $request){
    	$this->validate($request, [
    		'post_title' => 'required',
    		'post_body' => 'required',
            'post_body2' => 'required',
            'post_body3' => 'required',
    		'category_id' => 'required',
    		'post_image' => 'required', 
    	]);
    		$posts = new Post;
   			$posts->post_title = $request->input('post_title');
   			$posts->user_id = Auth::user ()->id;
   			$posts->post_body = $request->input('post_body');
            $posts->post_body2 = $request->input('post_body2');
            $posts->post_body3 = $request->input('post_body3');
   			$posts->category_id = $request->input('category_id');

   			if(Input::hasFile('post_image')){
   			$file = Input::file('post_image');
			$file->move(public_path(). '/posts/', $file->getClientOriginalName());
			$url = URL::to("/") . '/posts/'. $file->getClientOriginalName();
   			}
   			$posts->post_image = $url;
   			$posts->save();
   			return redirect('/home')->
   			
   			// displaying message
   			with('response', 'Profile Added Successfully');
    }

    // for view page, like and dislike a post
    public function view($post_id){
        $posts = Post::where('id', '=', $post_id)->orderBy('created_at', 'desc')->get();
        $likePost = Post::find($post_id);
        $likeCtr = Like::where(['post_id' => $likePost->id])->count();
        $dislikeCtr = Dislike::where(['post_id' => $likePost->id])->count();
        $categories = Category::all();
        $comments = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->select('users.name', 'comments.*')
            ->where(['posts.id' => $post_id])
            ->get();
        return view('posts.view', ['posts' => $posts, 'categories' => $categories, 'likeCtr' =>
            $likeCtr, 'dislikeCtr' => $dislikeCtr, 'comments' => $comments]);
    }

    // to view edit
    public function edit($post_id){
        $categories = Category::all();
        $posts = Post::find($post_id);
        $category = Category::find($posts->category_id);
        return view('posts.edit', ['categories' => $categories, 'posts' => $posts, 'category' => $category]);

    }

    // to edit post, change image, caption and title
    // change data/information from database 
    public function editPost(Request $request, $post_id){
        $this->validate($request, [
        'post_title' => 'required',
        'post_body' => 'required',
        'post_body2' => 'required',
        'post_body3' => 'required',
        'category_id' => 'required',
        'post_image' => 'required', 
      ]);
        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->user_id = Auth::user ()->id;
        $posts->post_body = $request->input('post_body');
        $posts->post_body2 = $request->input('post_body2');
        $posts->post_body3 = $request->input('post_body3');
        $posts->category_id = $request->input('category_id');

        if(Input::hasFile('post_image')){
          $file = Input::file('post_image');
        $file->move(public_path(). '/posts/', $file->getClientOriginalName());
        $url = URL::to("/") . '/posts/'. $file->getClientOriginalName();
        }
        $posts->post_image = $url;
        $data = array(
            'post_title' => $posts->post_title,
            'user_id' => $posts->user_id,
            'post_body' => $posts->post_body,
            'post_body2' => $posts->post_body2,
            'post_body3' => $posts->post_body3,
            'category_id' => $posts->category_id,
            'post_image' => $posts->post_image
        );
        Post::where('id', $post_id)
        ->update($data);
        $posts->update();
        return redirect('/home')->with('response', 'Post Updated Successfully');
    }

    // delete post
    public function deletePost($post_id){
        Post::where('id', $post_id)
        -> delete();
        return redirect('/home')->with('response', 'Post Deleted Successfully');
    }

    // filter categories and join table
    public function category($cat_id){
          $categories = Category::all();
          $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.*')
            ->where(['categories.id' => $cat_id])
            ->get();
          return view('categories.categoriesposts', ['categories' => $categories, 'posts' => $posts]);
    }

    // like post
    public function like($id){
        $loggedin_user = Auth::user()->id;
        $like_user = Like::where(['user_id' => $loggedin_user, 'post_id' => $id])->first();
        if(empty($like_user->user_id)){
            $user_id = Auth::user()->id;
            $email = Auth::user()->email;
            $post_id = $id;
            $like = new Like;
            $like->user_id = $user_id;
            $like->email = $email;
            $like->post_id = $post_id;
            $like->save();
            return redirect("/view/{$id}");
        }
        else{
            return redirect("/view/{$id}"); 
        }
    }

        // dislike post
        public function dislike($id){
        $loggedin_user = Auth::user()->id;
        $like_user = Dislike::where(['user_id' => $loggedin_user, 'post_id' => $id])->first();
        if(empty($like_user->user_id)){
            $user_id = Auth::user()->id;
            $email = Auth::user()->email;
            $post_id = $id;
            $like = new Dislike;
            $like->user_id = $user_id;
            $like->email = $email;
            $like->post_id = $post_id;
            $like->save();
            return redirect("/view/{$id}");
        }
        else{
            return redirect("/view/{$id}"); 
        }
    }


      // post comment
      public function comment(Request $request, $post_id){
          $this->validate($request, [
            'comment' => 'required'
        ]);
        $comment = new comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect("/view/{$post_id}")->with('response', 'Comment Added Successfully');
    }

    // to search categories
    public function search(Request $request){
        $user_id = Auth::user()->id;
        $profile = Profile::find($user_id);
        $keyword = $request->input('search');
        $posts = Post::where('post_title', 'LIKE', '%'.$keyword.'%')->get();
        return view('posts.searchposts', ['profile' => $profile, 'posts' => $posts]);


      // $keyword = $request->input('search');
      // $posts = Post::where('post_title', 'LIKE', '%'.$keyword.'%')->get();
      // $current_user = Auth::user();
      // dd($current_user->profile->profile_pic);

    }
}