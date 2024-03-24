<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpticalProject;

class OpticalProjectController extends Controller
{
    //

    public function getOpticalProject()
    {

        $shops = OpticalProject::orderBy('id', 'desc')->paginate(20);
        return response()->json($shops);
    }

    public function postOpticalProject(Request $request)
    {
        // Assuming you are using authenticated users and you can retrieve the username from session
        $username = auth()->user()->username;


        $data = $request->all();
        // Create a new instance of OpticalKamenic model
        $opticalProject = new OpticalProject();

        // Assign values to model attributes
        $opticalProject->username = $username;
        $opticalProject->comment = $data['comment'];
        $opticalProject->fo48_ads = $data['fo48_ads'];
        $opticalProject->fo24_adss = $data['fo24_adss'];
        $opticalProject->fo12_adss = $data['fo12_adss'];
        $opticalProject->fo24 = $data['fo24'];
        $opticalProject->fo12 = $data['fo12'];
        $opticalProject->fo04 = $data['fo04'];
        $opticalProject->fo2 = $data['fo2'];
        $opticalProject->fosc = $data['fosc'];
        $opticalProject->fdt = $data['fdt'];
        $opticalProject->fdb_1_4 = $data['fdb_1_4'];
        $opticalProject->fdb_1_8 = $data['fdb_1_8'];
        $opticalProject->sp_1_16 = $data['sp_1_16'];
        $opticalProject->pp48 = $data['pp48'];
        $opticalProject->pp24 = $data['pp24'];
        $opticalProject->pp12 = $data['pp12'];
        $opticalProject->patch_cord = $data['patch_cord'];
        $opticalProject->spirale = $data['spirale'];
        $opticalProject->shtrenguse = $data['shtrenguse'];
        $opticalProject->hallka = $data['hallka'];
        $opticalProject->onu = $data['onu'];
        $opticalProject->instalime = $data['instalime'];
        $opticalProject->project_date = now();

        // Save the model to the database
        $opticalProject->save();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    public function deleteOpticalProject($id)
    {
        $post = OpticalProject::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function getProjectId($id)
    {
        $project = OpticalProject::where('id', $id)->first();

        if (!$project) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($project, 200);
    }


    public function updateByIdProject(Request $request, $id)
    {
        $post = OpticalProject::find($id);

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
