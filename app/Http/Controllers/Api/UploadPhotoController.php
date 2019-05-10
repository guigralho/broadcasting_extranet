<?php

namespace Broadcasting\Http\Controllers\Api;

use Broadcasting\Models\Event;
use Broadcasting\Models\Photo;
use Broadcasting\Services\PhotoService;
use Illuminate\Http\Request;

class UploadPhotoController extends Controller
{
    public function upload(Request $request, PhotoService $photoService)
    {
        $event = Event::query()->where('name', $request->get('event'))->first();

        $photo = new Photo;
        $photo->name = $request->get('name');
        $photo->code = $request->get('code');
        $photo->event_id = $event->id;
        $photo->photographer = $request->get('photographer');
        $photo->congregation = $request->get('congregation');
        $photo->phone = $request->get('phone');
        $photo->image = $request->file('file');
        $photo->photo_date = date('Y-m-d', strtotime($request->get('timestamp')));

        if ($photoService->create($photo)) {
            $data = ['success' => true, 'message' => 'Uploaded successfully'];
            return response()->json($data, 200);
        }

        $data = ['success' => false, 'message' => 'There was an error uploading the file, please try again!'];
        return response()->json($data, 500);
    }
}
