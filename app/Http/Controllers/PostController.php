<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function getPosts()
    {
        $posts = Post::orderBy('post_id', 'desc')->paginate(20);

        return response()->json(['data' => $posts], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $post = new Post();
        $post->post_category_id = $data['post_category_id'] ?? '';
        $post->post_title = $data['post_title'] ?? '';
        $post->post_author = $data['post_author'] ?? '';
        $post->post_date = $data['post_date'] ?? '';
        $post->post_content = $data['post_content'] ?? '';
        $post->post_resiver = $data['post_resiver'] ?? '';
        $post->post_modem = $data['post_modem'] ?? '';
        $post->post_rg6 = $data['post_rg6'] ?? '';
        $post->post_konektor_rg6 = $data['post_konektor_rg6'] ?? '';
        $post->post_spliter = $data['post_spliter'] ?? '';
        $post->post_konektor_tv = $data['post_konektor_tv'] ?? '';
        $post->post_rg11 = $data['post_rg11'] ?? '';
        $post->post_t32 = $data['post_t32'] ?? '';
        $post->post_kupler_7402 = $data['post_kupler_7402'] ?? '';
        $post->post_amp = $data['post_amp'] ?? '';
        $post->tap_26 = $data['tap_26'] ?? '';
        $post->tap_23 = $data['tap_23'] ?? '';
        $post->tap_20 = $data['tap_20'] ?? '';
        $post->tap_17 = $data['tap_17'] ?? '';
        $post->tap_14 = $data['tap_14'] ?? '';
        $post->tap_11 = $data['tap_11'] ?? '';
        $post->tap_10 = $data['tap_10'] ?? '';
        $post->tap_8 = $data['tap_8'] ?? '';
        $post->tap_4 = $data['tap_4'] ?? '';
        $post->post_comment_count = $data['post_comment_count'] ?? '1';
        $post->post_date = now();

        $post->save();

        return response()->json(['message' => 'Post created successfully'], 201);
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $data = $request->all();

        $post->post_category_id = $data['post_category_id'] ?? '';
        $post->post_title = $data['post_title'] ?? '';
        $post->post_author = $data['post_author'] ?? '';
        $post->post_date = $data['post_date'] ?? '';
        $post->post_content = $data['post_content'] ?? '';
        $post->post_resiver = $data['post_resiver'] ?? '';
        $post->post_modem = $data['post_modem'] ?? '';
        $post->post_rg6 = $data['post_rg6'] ?? '';
        $post->post_konektor_rg6 = $data['post_konektor_rg6'] ?? '';
        $post->post_spliter = $data['post_spliter'] ?? '';
        $post->post_konektor_tv = $data['post_konektor_tv'] ?? '';
        $post->post_rg11 = $data['post_rg11'] ?? '';
        $post->post_t32 = $data['post_t32'] ?? '';
        $post->post_kupler_7402 = $data['post_kupler_7402'] ?? '';
        $post->post_amp = $data['post_amp'] ?? '';
        $post->tap_26 = $data['tap_26'] ?? '';
        $post->tap_23 = $data['tap_23'] ?? '';
        $post->tap_20 = $data['tap_20'] ?? '';
        $post->tap_17 = $data['tap_17'] ?? '';
        $post->tap_14 = $data['tap_14'] ?? '';
        $post->tap_11 = $data['tap_11'] ?? '';
        $post->tap_10 = $data['tap_10'] ?? '';
        $post->tap_8 = $data['tap_8'] ?? '';
        $post->tap_4 = $data['tap_4'] ?? '';
        $post->post_comment_count = $data['post_comment_count'] ?? '1';
        $post->post_date = now();

        $post->save();

        return response()->json(['message' => 'Post updated successfully'], 200);
    }

    public function deletePost($post_id)
    {
        $post = Post::find($post_id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getPostById($post_id)
    {
        $post = Post::where('post_id', $post_id)->first();

        if (!$post) {
            return $this->formatResponse(null, 404, 'Post not found');
        }

        return $this->formatResponse($post);
    }

    public function getPostsByAuthor($post_author)
    {
        $posts = Post::where('post_author', $post_author)->paginate(20);

        if ($posts->isEmpty()) {
            return $this->formatResponse(null, 404, 'No posts found for the specified author');
        }

        return $this->formatResponse($posts);
    }

    private function formatResponse($data, $statusCode = 200, $message = null)
    {
        if ($message) {
            return response()->json(['message' => $message, 'data' => $data], $statusCode);
        }

        return response()->json(['data' => $data], $statusCode);
    }
}
