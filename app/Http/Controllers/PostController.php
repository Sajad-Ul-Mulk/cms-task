<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'store']);

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index', ['posts' => Post::latest()->paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(PostValidateRequest $request)
    {

        $post= $request->validated();
//        dd($post);

//        $post_data = request()->validate([
//            'title' => 'required|min:10',
//            'slug' => 'required|min:5|unique:posts,slug',
//            'description' => 'required|min:10'
//        ]);

//        $post['category_id'] = request('category_id');
        $post['user_id'] = auth()->user()->id;
        $post['photo'] = request()->file('photo')?->store('PostCovers');


        if (!Post::create($post))
            return redirect()->back()->with('failed','Something went Wrong');
        return redirect('posts')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['SelectedPost' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        $post->update(array(
            'user_id' => $post->user->id,
            'category_id' => request('SelectedCategory'),
            'slug' => request('slug'), 'title' => request('title'),
            'description' => request('description'),
            'photo' => request()->file('photo') === null ? $post->photo : request()->file('photo')->store('PostCovers')
        ));


        return Redirect::to('/posts')->with('success', 'Post Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success','Post Deleted Successfully');
    }
}
