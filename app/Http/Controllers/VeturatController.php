<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veturat;

class VeturatController extends Controller
{
	//
	public function getAllData()
	{
		$veturat = Veturat::orderBy('id', 'desc')->paginate(20);

		return response()->json(['data' => $veturat], 200);
	}

	public function store(Request $request)
	{
		$data = $request->all();

		$post = new Veturat();
		$post->title = $data['title'] ?? '';
		$post->post_author = $data['post_author'] ?? '';
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

	public function updateVeturat(Request $request, $id)
	{
		$post = Veturat::find($id);

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

	public function getVeturatId($id)
	{
		$post = Veturat::where('id', $id)->first();

		if (!$post) {
			return response()->json(['error' => 'Post not found'], 404);
		}

		return response()->json($post, 200);
	}

	public function deleteVeturat($id)
	{
		$post = Veturat::find($id);
		if (!$post) {
			return response()->json(['error' => 'Post not found'], 404);
		}

		$post->delete();

		return response()->json(['message' => 'Post deleted successfully']);
	}

	public function getDataByDateVeturat(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
		]);

		$sums = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])
			->selectRaw('SUM(resiver) as sum_resiver')
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

	public function getDataByDateAndUserVeturat(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
			'post_author' => 'required|string',
		]);

		$sums = Veturat::where('post_author', $request->post_author)
			->whereBetween('post_date', [$request->start_date, $request->end_date])
			->selectRaw('SUM(resiver) as sum_resiver')
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

	public function getAllSumVeturat()
	{
		$sums = Veturat::selectRaw('SUM(resiver) as sum_resiver')
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

	public function getAllSumDateVeturat(Request $request)
	{
		$request->validate([
			'start_date' => 'required|date',
			'end_date' => 'required|date',
		]);


		$sum_resiver = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('resiver');
		$sum_modem = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('modem');
		$sum_rg6 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('rg6');
		$sum_konektor_rg6 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('konektor_rg6');
		$sum_spliter = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('spliter');
		$sum_konektor_tv = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('konektor_tv');
		$sum_rg11 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('rg11');
		$sum_t32 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('t32');
		$sum_kupler_7402 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('kupler_7402');
		$sum_amp = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('amp');
		$sum_tap_26 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_26');
		$sum_tap_23 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_23');
		$sum_tap_20 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_20');
		$sum_tap_17 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_17');
		$sum_tap_14 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_14');
		$sum_tap_11 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_11');
		$sum_tap_10 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_10');
		$sum_tap_8 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_8');
		$sum_tap_4 = Veturat::whereBetween('post_date', [$request->start_date, $request->end_date])->sum('tap_4');

		return response()->json([
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
}
