<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depo;

class DepoController extends Controller
{
	//
	public function index()
	{
		$posts = Depo::orderBy('id', 'desc')->paginate(20);

		return response()->json(['data' => $posts], 200);
	}

	public function store(Request $request)
	{
		$data = $request->all();

		$post = new Depo();
		$post->title = $data['title'] ?? '';
		$post->content = $data['content'] ?? '';
		$post->resiver = $data['resiver'] ?? '';
		$post->modem = $data['modem'] ?? '';
		$post->rg6 = $data['rg6'] ?? '';
		$post->konektor_rg6 = $data['konektor_rg6'] ?? '';
		$post->spliter = $data['spliter'] ?? '';
		$post->konektor_tv = $data['konektor_tv'] ?? '';
		$post->rg11 = $data['rg11'] ?? '';
		$post->t32 = $data['t32'] ?? '';
		$post->kupler_7402 = $data['kupler_7402'] ?? '';
		$post->amp = $data['amp'] ?? '';
		$post->tap_26 = $data['tap_26'] ?? '';
		$post->tap_23 = $data['tap_23'] ?? '';
		$post->tap_20 = $data['tap_20'] ?? '';
		$post->tap_17 = $data['tap_17'] ?? '';
		$post->tap_14 = $data['tap_14'] ?? '';
		$post->tap_11 = $data['tap_11'] ?? '';
		$post->tap_10 = $data['tap_10'] ?? '';
		$post->tap_8 = $data['tap_8'] ?? '';
		$post->tap_4 = $data['tap_4'] ?? '';
		$post->post_date = now();

		$post->save();

		return response()->json(['message' => 'Data inserted successfully'], 201);
	}

	public function deleteDepo($id)
	{
		$post = Depo::find($id);
		if (!$post) {
			return response()->json(['error' => 'Post not found'], 404);
		}

		$post->delete();

		return response()->json(['message' => 'Post deleted successfully']);
	}

	public function getDepoId($id)
	{
		$post = Depo::where('id', $id)->first();

		if (!$post) {
			return response()->json(['error' => 'Post not found'], 404);
		}

		return response()->json($post, 200);
	}

	public function updateDepo(Request $request, $id)
	{
		$post = Depo::find($id);

		if (!$post) {
			return response()->json(['message' => 'Post not found'], 404);
		}

		$data = $request->all();

		$post->title = $data['title'] ?? '';
		$post->content = $data['content'] ?? '';
		$post->resiver = $data['resiver'] ?? '';
		$post->modem = $data['modem'] ?? '';
		$post->rg6 = $data['rg6'] ?? '';
		$post->konektor_rg6 = $data['konektor_rg6'] ?? '';
		$post->spliter = $data['spliter'] ?? '';
		$post->konektor_tv = $data['konektor_tv'] ?? '';
		$post->rg11 = $data['rg11'] ?? '';
		$post->t32 = $data['t32'] ?? '';
		$post->kupler_7402 = $data['kupler_7402'] ?? '';
		$post->amp = $data['amp'] ?? '';
		$post->tap_26 = $data['tap_26'] ?? '';
		$post->tap_23 = $data['tap_23'] ?? '';
		$post->tap_20 = $data['tap_20'] ?? '';
		$post->tap_17 = $data['tap_17'] ?? '';
		$post->tap_14 = $data['tap_14'] ?? '';
		$post->tap_11 = $data['tap_11'] ?? '';
		$post->tap_10 = $data['tap_10'] ?? '';
		$post->tap_8 = $data['tap_8'] ?? '';
		$post->tap_4 = $data['tap_4'] ?? '';
		$post->post_date = $data['post_date'] ?? '';

		$post->save();

		return response()->json(['message' => 'Data inserted successfully'], 201);
	}

	public function getAllSumDepo()
	{
		$sums = Depo::selectRaw('SUM(resiver) as sum_resiver')
			->selectRaw('SUM(modem) as sum_modem')
			->selectRaw('SUM(rg6) as sum_rg6')
			->selectRaw('SUM(konektor_rg6) as sum_konektor_rg6')
			->selectRaw('SUM(spliter) as sum_spliter')
			->selectRaw('SUM(konektor_tv) as sum_konektor_tv')
			->selectRaw('SUM(rg11) as sum_rg11')
			->selectRaw('SUM(t32) as sum_t32')
			->selectRaw('SUM(kupler_7402) as sum_kupler_7402')
			->selectRaw('SUM(amp) as sum_amp')
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
}
