<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\PostResource;

class PostController extends Controller
{
    // get plural posts data (data post jamak)
    public function index()
    {
        $posts = Post::paginate(10);

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data Posts',
            'data' => $posts
        ]);
    }

    // get singular post data by slug param (data post tunggal)
    public function show(string $slug)
    {
        // Fetch the post by slug
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            return (new PostResource(
                404,
                false,
                'Post not found',
                null
            ))->response()->setStatusCode(404);
        }

        // Return the post as a JSON response
        return new PostResource(
            200,
            true,
            'Post fetched successfully',
            $post
        );
    }

    public function store(Request $request)
    {
        // Validator the incoming request data
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'title' => 'required|string|unique:posts,title',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return (new PostResource(422, false, 'Validation Error', $validator->errors()))->response()->setStatusCode(422);
        }

        // store the image in the public storage
        $image = $request->file('image');
        $imagePath = $image ? 'posts/' . $image->hashName() : null;

        // Create a new post instance
        $post = Post::create([
            'image' => $imagePath,
            'title' => $request->title,
            'slug'  => Str::slug($request->title, '-'),
            'content' => $request->content,
        ]);

        if ($image) {
            $image->storeAs($imagePath);
        }

        // Return a success response
        return new PostResource(
            201,
            true,
            'Post created successfully',
            $post
        );
    }

    public function destroy(string $slug)
    {
        // Fetch the post by slug
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            return (new PostResource(
                404,
                false,
                'Data post tidak ditemukan',
                null
            ))->response()->setStatusCode(404);
        }

        if ($post->image) {
            // Delete the old image if a new one is uploaded
            Storage::delete($post->getRawOriginal('image'));
        }

        // Delete the post
        $post->delete();

        // Return a success response
        return new PostResource(
            200,
            true,
            'Post deleted successfully',
            null
        );
    }
}
