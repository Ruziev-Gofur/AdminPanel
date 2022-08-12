<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Posts::orderByDesc('created_at')->paginate(10);
        return  view('admin.posts.index',[
            'posts'=>$posts
        ]);
    }

    /** Rasim qo'shish qoldimi shundo? o'zim xarakat atib go'raman.
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return   view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = $request-> validate([
            'title' =>'bail|required|min:3',
            'text' =>'required',
            'image' => 'required'
        ]);


//        $posts = Posts::create($data);
            //MySQL INSERT INTO;
//        dd($data);
        $posts = new Posts;

        if ($posts->file('image')) {
            $posts = $request->file('img');
            $posts = time() . '.' . $file->getClientOriginalExtension();
            $posts->move(public_path('images/'), $filename);
            $posts['img'] = $filename;
        }
        $posts -> title = $posts['title'];
        $posts -> text = $posts['text'];

        $posts -> save();
        dd($posts);

//        Posts::create($posts->paginate());
        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
//        $data = Posts::find();
        $posts = Posts::all();
//        dd($posts);
        return view('admin.posts.edit',[
//            'posts'=>$data,
            'post'=> $posts,
        ]);
    }

    /** bi boshqo controller qu
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
//        $data = Posts::find();
//        $data->delete();
//        return redirect()->route('admin.posts.index');
    }
}
