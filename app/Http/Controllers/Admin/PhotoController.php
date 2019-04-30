<?php

namespace Broadcasting\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Broadcasting\Services\PhotoService;
use Broadcasting\Models\Photo;

class PhotoController extends Controller
{
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'max:255'
        ]);
    }

    public function index(Request $request, PhotoService $photoService)
    {
    	$search = [];

    	if ($request->has('search')) 
    		$search['searchString'] = $request->get('search');

    	if ($request->has('status')) 
    		$search['searchStatus'] = $request->get('status');    	

    	$listPhotos = $photoService->list($search)->paginate(15);

        return view('Admin.photo.index', compact('listPhotos'));
    }


    public function add(Request $request, PhotoService $photoService)
    {
    	$photo = '';

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$photo = new Photo;
    		$photo->name = $request->get('name');
    		$photo->code = $request->get('code');
    		$photo->image = $request->file('image');

    		if ($photoService->create($photo)) {
    			return redirect(route('admin.photo'));
    		}
		}

    	return view('Admin.photo.add', compact('photo'));
    }


    public function edit($groupUserId, Request $request, PhotoService $photoService)
    {
    	$photo = Photo::findOrFail($groupUserId);

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$photo->name = $request->get('name');
            $photo->code = $request->get('code');
            $photo->image = $request->file('image');

    		if ($photoService->update($photo)) {
    			return redirect(route('admin.photo'));
    		}
		}

    	return view('Admin.photo.add', compact('photo'));
    }

    public function delete($groupUserId, PhotoService $photoService)
    {
    	$photo = Photo::findOrFail($groupUserId);

    	if ($photoService->delete($photo)) {
    		return redirect(route('admin.photo'));
    	}
    }

}
