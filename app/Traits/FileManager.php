<?php
namespace App\Traits;

use App\Models\Files;
use Illuminate\Support\Facades\Storage;

trait FileManager{

    public function uploadFile($request, $fieldName, $destinationPath)
    {

        $fileName = $request->file($fieldName)->getClientOriginalName();
        $filePath = $request->file($fieldName)->store($destinationPath, 's3'); // Upload file to S3

        if ($filePath) {
            $url = Storage::disk('s3')->url($filePath); // Get S3 URL of the uploaded file

            // Save file details to database
            $file = new Files();
            $file->file_name = $fileName;
            $file->file_path = $url;
            $file->size = $request->file($fieldName)->getSize();
            $file->extension = $request->file($fieldName)->getClientOriginalExtension();
            $file->save();

            // Return response with file details
            return [
                'id' => $file->id,
                'path' => asset($url) // Assuming you want to return the URL to access the file
            ];
        } else {
            return [
                'id' => 0,
                'status' => false // Assuming you want to return the URL to access the file
            ]; // Or handle the error scenario as needed
        }

    }



}
