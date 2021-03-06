<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = auth('api')->user();
        $query = Wishlist::where('customer_id',$user->id)->with('ad');

        if($search = $request->input('search')){

                $query->where('customer_id', 'LIKE', "%$search%");
        }

       if($sort = $request->input('sort')){

            $query->orderBy('id',$sort);
        }

        $perPage = '';
        if($request->perPage){
            $perPage = $request->perPage;
        }else{
            $perPage = 9;
        }

        $page = $request->input('page',1);
        $total = $query->count();

        $result = $query->offset( ($page -1 ) * $perPage)->limit($perPage)->get();

        return response()->json([

            'success' => 'Data fetch success',
            'data' => $result,
            'total' => $total,
            'last_page' => ceil( $total / $perPage)

        ], 200);








        
        $posts = Post::query();

        if($search = $request->input('search')){

        }

        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required|string|min:2',
            'description' => 'required|min:6'
        ]);

        // if validate fails
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json(['success' => 'Post Created !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required|string|min:2',
            'description' => 'required|min:6'
        ]);

        // if validate fails
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }

        $post = Post::FindOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json(['success' => 'Post Updated !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::FindOrFail($id);
        $post->delete();

        return response()->json(['success' => 'Post Deleted !']);
    }
}
