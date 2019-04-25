<?php

namespace Broadcasting\Http\Controllers\Api;

use Broadcasting\Models\Photo;
use Illuminate\Http\Request;

class UploadPhotoController extends Controller
{
    public function upload(Request $request)
    {
        $photo = new Photo;
        $photo->name = $request->get('name');
        $photo->code = $request->get('code');
        $photo->image = $request->get('image');//$_FILES['file']['name'];

        /*$target_path = base_path().'/../site/public/photos';

        $target_path = $target_path.basename($_FILES['file']['name']);

        if(!move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
            $data = ['success' => false, 'message' => 'There was an error uploading the file, please try again!'];
            return response()->json($data, 500);
        }*/

        $photo->save();

        $data = ['success' => true, 'message' => 'Upload feito com sucesso'];
        return response()->json($data, 200);
    }
}
