<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpticalDepo;

class OpticalDepoController extends Controller
{
    //

    public function getOpticalDepo()
    {

        $shops = OpticalDepo::orderBy('id', 'desc')->paginate(20);
        return response()->json($shops);
    }

    public function postOpticalDepo(Request $request)
    {
        // Assuming you are using authenticated users and you can retrieve the username from session
        $username = auth()->user()->username;


        $data = $request->all();
        // Create a new instance of OpticalKamenic model
        $opticalDepo = new OpticalDepo();

        // Assign values to model attributes
        $opticalDepo->username = $username;
        $opticalDepo->comment = $data['comment'];
        $opticalDepo->fo48_ads = $data['fo48_ads'];
        $opticalDepo->fo24_adss = $data['fo24_adss'];
        $opticalDepo->fo12_adss = $data['fo12_adss'];
        $opticalDepo->fo24 = $data['fo24'];
        $opticalDepo->fo12 = $data['fo12'];
        $opticalDepo->fo04 = $data['fo04'];
        $opticalDepo->fo2 = $data['fo2'];
        $opticalDepo->fosc = $data['fosc'];
        $opticalDepo->fdt = $data['fdt'];
        $opticalDepo->fdb_1_4 = $data['fdb_1_4'];
        $opticalDepo->fdb_1_8 = $data['fdb_1_8'];
        $opticalDepo->sp_1_16 = $data['sp_1_16'];
        $opticalDepo->pp48 = $data['pp48'];
        $opticalDepo->pp24 = $data['pp24'];
        $opticalDepo->pp12 = $data['pp12'];
        $opticalDepo->patch_cord = $data['patch_cord'];
        $opticalDepo->spirale = $data['spirale'];
        $opticalDepo->shtrenguse = $data['shtrenguse'];
        $opticalDepo->hallka = $data['hallka'];
        $opticalDepo->onu = $data['onu'];
        $opticalDepo->instalime = $data['instalime'];
        $opticalDepo->project_date = now();

        // Save the model to the database
        $opticalDepo->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    public function deleteOpticalDepo($id)
    {
        $post = OpticalDepo::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getDepoId($id)
    {
        $project = OpticalDepo::where('id', $id)->first();

        if (!$project) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($project, 200);
    }

    public function updateByIdDepo(Request $request, $id)
    {
        $post = OpticalDepo::find($id);

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
