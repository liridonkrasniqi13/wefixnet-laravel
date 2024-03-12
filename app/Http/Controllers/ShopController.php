<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    //
    public function getAllShop()
    {

        $shops = Shop::orderBy('id', 'desc')->paginate(20);

        // return response()->json(['data' => $posts], 200);
        // $shops = Shop::all();
        return response()->json($shops);
    }


    public function postShop(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'author' => 'required',
            'comment' => 'required',
            'smart' => 'required',
            'cash' => 'required',
            'raporti' => 'required',
            'anulime' => 'required',
            'saldo' => 'required',
            'image_name' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // Adjusted validation rule for image file
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()], 422);
        }

        // Process the form submission
        // ...

        // Example of moving the uploaded file to the desired location
        $image_name = $request->file('image_name');
        $fileName = time() . '_' . $image_name->getClientOriginalName();
        $image_name->move(public_path('uploads'), $fileName);

        // Example of saving form data to database
        $shop = new Shop;
        $shop->author = $request->input('author');
        $shop->comment = $request->input('comment');    
        $shop->smart = $request->input('smart');
        $shop->cash = $request->input('cash');
        $shop->raporti = $request->input('raporti');
        $shop->anulime = $request->input('anulime');
        $shop->saldo = $request->input('saldo');
        $shop->date_now 	= date('d-m-y');
        $shop->image_name = $fileName; // Save the file name to the database
        $shop->save();

        return response()->json(['status' => 'success', 'message' => 'The file is uploaded'], 200);
    }
}
