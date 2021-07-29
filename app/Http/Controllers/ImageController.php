<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Intervention\Image\Facades\Image;
class ImageController extends Controller
{
    public function store(Request $request)
    {
        

        // Handle File Upload
        if($request->file('cover_image')){
           
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
	   
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Image;
        $post->title = "hello";
        $post->body = "hello1";
        $post->cover_image = $fileNameToStore;
        $post->save();

        return response()->json('success');
    }
    public function store1(Request $request){
        if($request->file('cover_image')){
            error_log($request->cover_image);
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
	   
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
    
        $book = new Image();
        $book->title = "Hammad";
        $book->body = "Habsha";
        $book->cover_image = $fileNameToStore;
        $book->save();
        return response()->json("Success");
    }
    
}
