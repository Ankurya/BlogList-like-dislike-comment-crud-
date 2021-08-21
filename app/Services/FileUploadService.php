<?php

namespace App\Services;

use Illuminate\Http\Request;

class FileUploadService
{
    public function getUploadFile(Request $request)
    {

        if ($request->hasFile("image")) {

            $file = $request->file("image");
            $imageName = uniqid() . "_" . $file->getClientOriginalName();
            $destinationPath = storage_path('app/public');
            $file->move($destinationPath, $imageName);
            $createData["image"] = $imageName;

            }
    }
}
