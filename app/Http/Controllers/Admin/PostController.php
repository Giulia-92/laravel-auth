<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Str; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
       return view ('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view ('admin.posts.create',compact('$categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request
        $data = $request->all();
        //dd($data);

        $newPost = new Post();
        $newPost->title = $data['title'];
        $slug = Str::of($data['title'])->slug("-");
        $newPost->content = $data['content'];
        $newPost->published = isset($data['published']);
        $newPost->category_id = $data['category_id'];
        $count = 1;
        While(Post::where('slug',$slug)->first()){
            $slug = Str::of($data['title'])->slug("-") . "-{$count}";
        $count++;      
     }
            $newPost->slug = $slug;
            $newPost->save();

            return redirect()->route('admin.posts.show',$newPost->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
       
         return view( 'admin.posts.show', compact( 'post' ) );
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view( 'admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post )
    {
       $data = $request->all();
       if ($post->title != $data ['title']){
        $post->title = $data['title'];
        $slug = Str::of($data['title'])->slug("-");
        if ($slug != $post->slug){
            $post->$slug = $this->getSlug ($post->title);
        }
       }
       $post->content = $data['content'];
       $post->category_id = $data['category_id'];
       $post->published = isset($data["published"]);
       $post->update();
       return redirect()->route('admin.post.show', $post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post->delete();
       return redirect()->route('admin.posts.index')->with("message","post with id:{$post->id} successfully deleted !");

    }

    /** 
     * Generate an unique slug
     * 
     * @param  string $title
     * @return string
     */
    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1; 

        While(Post::where('slug',$slug)->first()){
            $slug = Str::of($data['title'])->slug("-") . "-{$count}";
        $count++;      
     }

     return $slug;

      }
}
