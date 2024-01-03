<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductPicTemp;
use Illuminate\Support\Facades\DB;
use Exception;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // ... (your existing code for validation and image upload)

        try {
            DB::beginTransaction();

            $productPicTemp = new ProductPicTemp([
                'foldername' => $imageName,
                'tempiid' => 1, // or another value as per your logic
            ]);
            $productPicTemp->save();

            DB::commit();

            return back()->with('success', 'Image uploaded successfully')->with('image', $imageName);

        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred while uploading the image.');
        }
    }
}