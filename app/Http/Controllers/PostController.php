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
		$posts = Post::where('post_author', $post_author)->orderBy('post_id', 'desc')->paginate(20);

		if ($posts->isEmpty()) {
			return $this->formatResponse(null, 404, 'No posts found for the specified author');
		}

		return $this->formatResponse($posts);
	}

	public function getDataByDate(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
		]);

		$posts = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->orderBy('post_id', 'desc')->paginate(50);

		$sum_resiver = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_resiver');
		$sum_modem = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_modem');
		$sum_rg6 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_rg6');
		$sum_konektor_rg6 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_konektor_rg6');
		$sum_spliter = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_spliter');
		$sum_konektor_tv = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_konektor_tv');
		$sum_rg11 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_rg11');
		$sum_t32 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_t32');
		$sum_kupler_7402 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_kupler_7402');
		$sum_amp = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('post_amp');
		$sum_tap_26 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_26');
		$sum_tap_23 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_23');
		$sum_tap_20 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_20');
		$sum_tap_17 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_17');
		$sum_tap_14 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_14');
		$sum_tap_11 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_11');
		$sum_tap_10 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_10');
		$sum_tap_8 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_8');
		$sum_tap_4 = Post::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_4');

		return response()->json([
			'posts' => $posts,
			'sum_resiver' => $sum_resiver,
			'sum_modem' => $sum_modem,
			'sum_rg6' => $sum_rg6,
			'sum_konektor_rg6' => $sum_konektor_rg6,
			'sum_spliter' => $sum_spliter,
			'sum_konektor_tv' => $sum_konektor_tv,
			'sum_rg11' => $sum_rg11,
			'sum_t32' => $sum_t32,
			'sum_kupler_7402' => $sum_kupler_7402,
			'sum_amp' => $sum_amp,
			'sum_tap_26' => $sum_tap_26,
			'sum_tap_23' => $sum_tap_23,
			'sum_tap_20' => $sum_tap_20,
			'sum_tap_17' => $sum_tap_17,
			'sum_tap_14' => $sum_tap_14,
			'sum_tap_11' => $sum_tap_11,
			'sum_tap_10' => $sum_tap_10,
			'sum_tap_8' => $sum_tap_8,
			'sum_tap_4' => $sum_tap_4,
		]);
	}


	public function getDataByDateAndUser(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
			'post_author' => 'required|string',
		]);

		$posts = Post::where('post_author', $request->post_author)
			->whereBetween('post_date', [$request->start_date, $request->end_date])->orderBy('post_id', 'desc')
			->paginate(50);

		$sums = Post::where('post_author', $request->post_author)
			->whereBetween('post_date', [$request->start_date, $request->end_date])
			->selectRaw('SUM(post_resiver) as sum_resiver')
			->selectRaw('SUM(post_modem) as sum_modem')
			->selectRaw('SUM(post_rg6) as sum_rg6')
			->selectRaw('SUM(post_konektor_rg6) as sum_konektor_rg6')
			->selectRaw('SUM(post_spliter) as sum_spliter')
			->selectRaw('SUM(post_konektor_tv) as sum_konektor_tv')
			->selectRaw('SUM(post_rg11) as sum_rg11')
			->selectRaw('SUM(post_t32) as sum_t32')
			->selectRaw('SUM(post_kupler_7402) as sum_kupler_7402')
			->selectRaw('SUM(post_amp) as sum_amp')
			->selectRaw('SUM(tap_26) as sum_tap_26')
			->selectRaw('SUM(tap_23) as sum_tap_23')
			->selectRaw('SUM(tap_20) as sum_tap_20')
			->selectRaw('SUM(tap_17) as sum_tap_17')
			->selectRaw('SUM(tap_14) as sum_tap_14')
			->selectRaw('SUM(tap_11) as sum_tap_11')
			->selectRaw('SUM(tap_10) as sum_tap_10')
			->selectRaw('SUM(tap_8) as sum_tap_8')
			->selectRaw('SUM(tap_4) as sum_tap_4')
			->first();

		return response()->json([
			'posts' => $posts,
			'sums' => $sums,
		]);
	}

	public function getDataByDateAndTicked(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
			'post_category_id' => 'required|string'
		]);

		// Retrieve posts based on criteria
		$posts = Post::where('post_category_id', $request->post_category_id)
			->whereBetween('post_date', [$request->start_date, $request->end_date])->orderBy('post_id', 'desc')
			->paginate(50);

		$sums = Post::where('post_category_id', $request->post_category_id)
			->whereBetween('post_date', [$request->start_date, $request->end_date])
			->selectRaw('SUM(post_resiver) as sum_resiver')
			->selectRaw('SUM(post_modem) as sum_modem')
			->selectRaw('SUM(post_rg6) as sum_rg6')
			->selectRaw('SUM(post_konektor_rg6) as sum_konektor_rg6')
			->selectRaw('SUM(post_spliter) as sum_spliter')
			->selectRaw('SUM(post_konektor_tv) as sum_konektor_tv')
			->selectRaw('SUM(post_rg11) as sum_rg11')
			->selectRaw('SUM(post_t32) as sum_t32')
			->selectRaw('SUM(post_kupler_7402) as sum_kupler_7402')
			->selectRaw('SUM(post_amp) as sum_amp')
			->selectRaw('SUM(tap_26) as sum_tap_26')
			->selectRaw('SUM(tap_23) as sum_tap_23')
			->selectRaw('SUM(tap_20) as sum_tap_20')
			->selectRaw('SUM(tap_17) as sum_tap_17')
			->selectRaw('SUM(tap_14) as sum_tap_14')
			->selectRaw('SUM(tap_11) as sum_tap_11')
			->selectRaw('SUM(tap_10) as sum_tap_10')
			->selectRaw('SUM(tap_8) as sum_tap_8')
			->selectRaw('SUM(tap_4) as sum_tap_4')
			->first();

		return response()->json([
			'posts' => $posts,
			'sums' => $sums,
		]);
	}

	public function getDataByDateAndUserAndTicked(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
			'post_author' => 'required|string',
			'post_category_id' => 'required|string'
		]);

		// Retrieve posts based on criteria
		$posts = Post::where('post_author', $request->post_author)
			->whereBetween('post_date', [$request->start_date, $request->end_date])
			->where('post_category_id', $request->post_category_id)->orderBy('post_id', 'desc')
			->paginate(50);

		$sums = Post::where('post_author', $request->post_author)
			->whereBetween('post_date', [$request->start_date, $request->end_date])
			->where('post_category_id', $request->post_category_id)
			->selectRaw('SUM(post_resiver) as sum_resiver')
			->selectRaw('SUM(post_modem) as sum_modem')
			->selectRaw('SUM(post_rg6) as sum_rg6')
			->selectRaw('SUM(post_konektor_rg6) as sum_konektor_rg6')
			->selectRaw('SUM(post_spliter) as sum_spliter')
			->selectRaw('SUM(post_konektor_tv) as sum_konektor_tv')
			->selectRaw('SUM(post_rg11) as sum_rg11')
			->selectRaw('SUM(post_t32) as sum_t32')
			->selectRaw('SUM(post_kupler_7402) as sum_kupler_7402')
			->selectRaw('SUM(post_amp) as sum_amp')
			->selectRaw('SUM(tap_26) as sum_tap_26')
			->selectRaw('SUM(tap_23) as sum_tap_23')
			->selectRaw('SUM(tap_20) as sum_tap_20')
			->selectRaw('SUM(tap_17) as sum_tap_17')
			->selectRaw('SUM(tap_14) as sum_tap_14')
			->selectRaw('SUM(tap_11) as sum_tap_11')
			->selectRaw('SUM(tap_10) as sum_tap_10')
			->selectRaw('SUM(tap_8) as sum_tap_8')
			->selectRaw('SUM(tap_4) as sum_tap_4')
			->first();

		return response()->json([
			'posts' => $posts,
			'sums' => $sums,
		]);
	}

	public function getAllSumTicked()
	{
		$sums = Post::selectRaw('SUM(post_resiver) as sum_resiver')
		->selectRaw('SUM(post_modem) as sum_modem')
		->selectRaw('SUM(post_rg6) as sum_rg6')
		->selectRaw('SUM(post_konektor_rg6) as sum_konektor_rg6')
		->selectRaw('SUM(post_spliter) as sum_spliter')
		->selectRaw('SUM(post_konektor_tv) as sum_konektor_tv')
		->selectRaw('SUM(post_rg11) as sum_rg11')
		->selectRaw('SUM(post_t32) as sum_t32')
		->selectRaw('SUM(post_kupler_7402) as sum_kupler_7402')
		->selectRaw('SUM(post_amp) as sum_amp')
		->selectRaw('SUM(tap_26) as sum_tap_26')
		->selectRaw('SUM(tap_23) as sum_tap_23')
		->selectRaw('SUM(tap_20) as sum_tap_20')
		->selectRaw('SUM(tap_17) as sum_tap_17')
		->selectRaw('SUM(tap_14) as sum_tap_14')
		->selectRaw('SUM(tap_11) as sum_tap_11')
		->selectRaw('SUM(tap_10) as sum_tap_10')
		->selectRaw('SUM(tap_8) as sum_tap_8')
		->selectRaw('SUM(tap_4) as sum_tap_4')
		->first();


		return response()->json([
			'sums' => $sums,
		]);
	}

	private function formatResponse($data, $statusCode = 200, $message = null)
	{
		if ($message) {
			return response()->json(['message' => $message, 'data' => $data], $statusCode);
		}

		return response()->json(['data' => $data], $statusCode);
	}
}
