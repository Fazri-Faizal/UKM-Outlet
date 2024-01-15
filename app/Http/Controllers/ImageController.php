<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_product_pic; // Include the Image model at the top
use Illuminate\Support\Facades\DB;
use Exception;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get original file name
        $originalName = $request->image->getClientOriginalName();

        // Use original file name for $imageName
        $imageName = $originalName;

        // Move the file to the public/images directory with the original name
        $request->image->move(public_path('img'), $imageName);

        /* Optionally: Save $imageName in the database */
        $image = new tbl_product_pic;
        $image->foldername = $imageName;
        $image->save();
    

        return back()->with('success', 'Image uploaded successfully')->with('image', $imageName);
    }
}

?>