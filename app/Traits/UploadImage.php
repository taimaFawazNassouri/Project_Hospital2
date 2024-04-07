<?php
namespace App\Traits;
use  App\Traits\UploadImagephp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;


trait UploadImage{
    public function verfiyAndStoreImage(Request $request,$inputname,$disk,$foldername,$imageable_id,$imageable_type){
        if ($request->hasFile($inputname)) {

            if(!$request->file($inputname)->isValid()){
                flash('Invalid Image')->error()->important();
                return redirect()->back()->withInput();
            }
            $photo = $request->file($inputname);
            $name = \Str::slug($request->input('name'));
            $filename = $name. '.' .$photo->getClientOriginalExtension();

            $image = new Image();
            $image->filename =$filename;
            $image->imageable_id =$imageable_id;
            $image->imageable_type =$imageable_type;
            $image->save();
            return $request->file($inputname)->storeAs($foldername,$filename,$disk);

        }
        return null;
    }

    public function deleteAttachment($disk,$path,$id,$filename)
    {
        Storage::disk($disk)->delete($path);
        Image::where('imageable_id',$id)->delete();
    }

  
    public function verifyAndStoreImageForeach($varforeach , $foldername , $disk, $imageable_id, $imageable_type) {

        // insert Image
        $Image = new Image();
        $Image->filename = $varforeach->getClientOriginalName();
        $Image->imageable_id = $imageable_id;
        $Image->imageable_type = $imageable_type;
        $Image->save();
        return $varforeach->storeAs($foldername, $varforeach->getClientOriginalName(), $disk);
    }

    

}