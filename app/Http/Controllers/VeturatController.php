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

    public function updateVeturat(Request $request, $id) {
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

    public function getVeturatId($id) {
		$post = Veturat::where('id', $id)->first();

		if (!$post) {
			return response()->json(['error' => 'Post not found'], 404);
		}

		return response()->json( $post , 200);
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

}
