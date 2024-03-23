<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpticalKamenic;

class OpticalKamenicController extends Controller
{
    //

    public function getOpticalKamenic()
    {

        $shops = OpticalKamenic::orderBy('id', 'desc')->paginate(20);
        return response()->json($shops);
    }


    public function postOpticalKamenic(Request $request)
    {
        // Assuming you are using authenticated users and you can retrieve the username from session
        $username = auth()->user()->username;


        $data = $request->all();
        // Create a new instance of OpticalKamenic model
        $opticalKamenic = new OpticalKamenic();

        // Assign values to model attributes
        $opticalKamenic->username = $username;
        $opticalKamenic->comment = $data['comment'];
        $opticalKamenic->fo48_ads = $data['fo48_ads'];
        $opticalKamenic->fo24_adss = $data['fo24_adss'];
        $opticalKamenic->fo12_adss = $data['fo12_adss'];
        $opticalKamenic->fo24 = $data['fo24'];
        $opticalKamenic->fo12 = $data['fo12'];
        $opticalKamenic->fo04 = $data['fo04'];
        $opticalKamenic->fo2 = $data['fo2'];
        $opticalKamenic->fosc = $data['fosc'];
        $opticalKamenic->fdt = $data['fdt'];
        $opticalKamenic->fdb_1_4 = $data['fdb_1_4'];
        $opticalKamenic->fdb_1_8 = $data['fdb_1_8'];
        $opticalKamenic->sp_1_16 = $data['sp_1_16'];
        $opticalKamenic->pp48 = $data['pp48'];
        $opticalKamenic->pp24 = $data['pp24'];
        $opticalKamenic->pp12 = $data['pp12'];
        $opticalKamenic->patch_cord = $data['patch_cord'];
        $opticalKamenic->spirale = $data['spirale'];
        $opticalKamenic->shtrenguse = $data['shtrenguse'];
        $opticalKamenic->hallka = $data['hallka'];
        $opticalKamenic->onu = $data['onu'];
        $opticalKamenic->instalime = $data['instalime'];
        $opticalKamenic->project_date = now();

        // Save the model to the database
        $opticalKamenic->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    public function deleteOpticalKamenic($id)
    {
        $post = OpticalKamenic::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getKamenicId($id)
    {
        $shop = OpticalKamenic::where('id', $id)->first();

        if (!$shop) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($shop, 200);
    }

    public function updateByIdKamenci(Request $request, $id)
    {
        $post = OpticalKamenic::find($id);

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
