<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{


    private $path_imagen = "storage/imagen/";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $niceNames = ['linkimagen' => "La imagen del artículo"];
        

        $file = $request->linkimagen;
        if($file != null){
            $nombreImagen = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/imagen/' . $nombreImagen, File::get($file));
        }else{
            $nombreImagen=null;
        }
        $post = new Post();
        $post->name = $request->name;
        $post->post = $request->post;
        if($nombreImagen!=null)
            $post->img = $path_imagen . $nombreImagen;
        else
            $post->img = $nombreImagen;
        $post->save();
        return response()->json($post, 200);   

        //return new PostResource(Post::create($request->all()));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_post)
    {
        return new PostResource(Post::findOrFail($id_post));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
