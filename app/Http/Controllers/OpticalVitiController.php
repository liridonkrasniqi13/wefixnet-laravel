<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpticalViti;

class OpticalVitiController extends Controller
{
    //

    public function getOpticalViti()
    {

        $shops = OpticalViti::orderBy('id', 'desc')->paginate(20);
        return response()->json($shops);
    }

    public function postOpticalViti(Request $request)
    {
        // Assuming you are using authenticated users and you can retrieve the username from session
        $username = auth()->user()->username;


        $data = $request->all();
        // Create a new instance of OpticalKamenic model
        $opticalViti = new OpticalViti();

        // Assign values to model attributes
        $opticalViti->username = $username;
        $opticalViti->comment = $data['comment'];
        $opticalViti->fo48_ads = $data['fo48_ads'];
        $opticalViti->fo24_adss = $data['fo24_adss'];
        $opticalViti->fo12_adss = $data['fo12_adss'];
        $opticalViti->fo24 = $data['fo24'];
        $opticalViti->fo12 = $data['fo12'];
        $opticalViti->fo04 = $data['fo04'];
        $opticalViti->fo2 = $data['fo2'];
        $opticalViti->fosc = $data['fosc'];
        $opticalViti->fdt = $data['fdt'];
        $opticalViti->fdb_1_4 = $data['fdb_1_4'];
        $opticalViti->fdb_1_8 = $data['fdb_1_8'];
        $opticalViti->sp_1_16 = $data['sp_1_16'];
        $opticalViti->pp48 = $data['pp48'];
        $opticalViti->pp24 = $data['pp24'];
        $opticalViti->pp12 = $data['pp12'];
        $opticalViti->patch_cord = $data['patch_cord'];
        $opticalViti->spirale = $data['spirale'];
        $opticalViti->shtrenguse = $data['shtrenguse'];
        $opticalViti->hallka = $data['hallka'];
        $opticalViti->onu = $data['onu'];
        $opticalViti->instalime = $data['instalime'];
        $opticalViti->project_date = now();

        // Save the model to the database
        $opticalViti->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    public function deleteOpticalViti($id)
    {
        $post = OpticalViti::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getVitiId($id)
    {
        $viti = OpticalViti::where('id', $id)->first();

        if (!$viti) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($viti, 200);
    }


    public function updateByIdViti(Request $request, $id)
    {
        $post = OpticalViti::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $data = $request->all();

        $post->username = $data['username'];
        $post->comment = $data['comment'];
        $post->fo48_ads = $data['fo48_ads'];
        $post->fo24_adss = $data['fo24_adss'];
        $post->fo12_adss = $data['fo12_adss'];
        $post->fo24 = $data['fo24'];
        $post->fo12 = $data['fo12'];
        $post->fo04 = $data['fo04'];
        $post->fo2 = $data['fo2'];
        $post->fosc = $data['fosc'];
        $post->fdt = $data['fdt'];
        $post->fdb_1_4 = $data['fdb_1_4'];
        $post->fdb_1_8 = $data['fdb_1_8'];
        $post->sp_1_16 = $data['sp_1_16'];
        $post->pp48 = $data['pp48'];
        $post->pp24 = $data['pp24'];
        $post->pp12 = $data['pp12'];
        $post->patch_cord = $data['patch_cord'];
        $post->spirale = $data['spirale'];
        $post->shtrenguse = $data['shtrenguse'];
        $post->hallka = $data['hallka'];
        $post->onu = $data['onu'];
        $post->instalime = $data['instalime'];
        $post->project_date = $data['project_date'];

        $post->save();

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }



}
