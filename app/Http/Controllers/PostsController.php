<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Products;
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
        $posts=Posts::paginate(6);


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

        $posts = new Posts;

        if ($request->file('image')) {
            $file = $request->image;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $posts['image'] = $filename;
        }
        $posts->title = $request->title;
        $posts->text = $request->text;


        $posts->save();
        return redirect()->route('posts.index');

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
    public function edit($id)
    {

        $posts = Posts::find($id);
dd($posts);
        return view('admin.posts.edit',[

            'posts'=> $posts,
        ]);
    }

    /** bi boshqo controller qu
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $posts=$request->validate(
            [

                'title'=>'required',
                'text'=>'required',
                'image'=>'required'
            ]
        );
        $posts=Posts::find($id);

        $request = Posts::created($posts);



        $posts=new Products();

        $posts->title=$request->title;
        $posts->text=$request->text;
        $posts->image=$request->image;// hato
        $posts->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);
        $posts->delete();
        return redirect()->route('posts.index')->with('success','category created successfully');
    }
}
