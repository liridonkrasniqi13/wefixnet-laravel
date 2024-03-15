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

        $image_name = $request->file('image_name');
        $currentDateTime = now()->format('Y-m-d_His');
        $fileName = $currentDateTime . '_' . time() . '_' . $image_name->getClientOriginalName();
        $image_name->move(public_path('uploads'), $fileName);

        $shop = new Shop;
        $shop->author = $request->input('author');
        $shop->comment = $request->input('comment');
        $shop->smart = $request->input('smart');
        $shop->cash = $request->input('cash');
        $shop->raporti = $request->input('raporti');
        $shop->anulime = $request->input('anulime');
        $shop->saldo = $request->input('saldo');
        $shop->date_now     = date('d-m-y');
        $shop->image_name = $fileName; 
        $shop->save();

        return response()->json(['status' => 'success', 'message' => 'The file is uploaded'], 200);
    }

    public function deleteShop($id)
    {
        $shop = Shop::find($id);
        if (!$shop) {
            return response()->json(['error' => 'shop not found'], 404);
        }

        $shop->delete();

        return response()->json(['message' => 'shop deleted successfully']);
    }

    public function getShopId($id)
    {
        $shop = Shop::where('id', $id)->first();

        if (!$shop) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($shop, 200);
    }


    public function updateShop(Request $request, $id)
    {
        $post = Shop::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $data = $request->all();

        $post->author = $data['author'] ?? '';
        $post->comment = $data['comment'] ?? '';
        $post->smart = $data['smart'] ?? '';
        $post->cash = $data['cash'] ?? '';
        $post->raporti = $data['raporti'] ?? '';
        $post->anulime = $data['anulime'] ?? '';
        $post->saldo = $data['saldo'] ?? '';
        $post->date_now = $data['date_now'] ?? '';
        $post->image_name = $data['image_name'] ?? '';

        $post->save();

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    public function updateShopImage(Request $request, $id)
    {
        $shop = Shop::find($id);

        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if (!$shop) {
            return response()->json(['message' => 'Shop not found'], 404);
        }

        $currentDateTime = now()->format('Y-m-d_His');
        $originalFileName = $request->file('image_name')->getClientOriginalName();
        $imageName = $currentDateTime . '_' . $originalFileName;
        $shop->image_name = $imageName;
        $shop->save();

        $request->file('image_name')->move(public_path('uploads'), $imageName);

        return response()->json(['message' => 'Image uploaded successfully', 'image' => $shop]);
    }

    public function getShopByAuthor($post_author) {
        $posts = Shop::where('author', $post_author)
                 ->orderBy('id', 'desc')
                 ->paginate(20);

    return response()->json($posts);
    }

}
