<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\LikeDislike;
use Illuminate\Http\Request;
use App\Services\DeleteService;
// use App\Services\FileUploadService;
use App\Services\UpdateService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogPostRequest;

class PostController extends Controller
{

    public function __construct()
    {
        $this->updateService = new UpdateService();
        $this->deleteService = new DeleteService();
        // $this->fileUploadService = new FileUploadService();

    }

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $user = Auth::user();
        return View("post.index")->with([
            "user" => $user,
            "posts" => Post::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostRequest $request)
    {
        $createData = [
            'title' => $request->get("title"),
            'number' => $request->get("number"),
            'description' => $request->get("description"),
            'user_id' => auth()->id(),

        ];
        if ($request->hasFile("image")) {

            $file = $request->file("image");
            $imageName = uniqid() . "_" . $file->getClientOriginalName();
            $destinationPath = storage_path('app/public');
            $file->move($destinationPath, $imageName);
            $createData["image"] = $imageName;

        }

//   $file = $this->fileUploadService->getUploadFile($request);
        $isCreated = Post::create($createData);
        if ($isCreated) {
            return redirect('posts')->with("success", "Post created successfully.");
        } else {
            return redirect('posts')->with("error", "Unable to create post.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        $count = LikeDislike::where('post_id', $id)->count();
        $post = Post::whereId($id)->with('comments')->first();
        $user_like_count = LikeDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->count();
        return view('post.view')->with(['post' => $post, 'comments' => $post->comments, 'count'=>$count, 'user_like_count' => $user_like_count]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostRequest $request, $id)
    {

        $isUpdated = $this->updateService->getUpdate($request, $id);
        if ($isUpdated) {
            return redirect('posts')->with("success", "Post details updated successfully.");
        } else {
            return redirect('posts')->with("success", "Post details not updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = $this->deleteService->deletePost($id);
        return redirect('home');

    }
}
