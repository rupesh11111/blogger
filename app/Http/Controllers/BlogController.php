<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['action'] = route('blog.store');
        $data['redirect'] = route('dashboard');
        return view('blogCreate',$data); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCreateRequest $request)
    {
        try{
            $data = $request->only('title','description');
            $data['user_id'] = Auth::id();
            $blog = Blog::create($data);
            if($request->hasFile('image')){
                $fileName = time().'_'.$request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('uploads/blogs', $fileName, 'public');
                $blog->image = $fileName ;
                $blog->save();
            }
            return response()->json(['message' => 'Blog created successfully']);
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()],419);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
