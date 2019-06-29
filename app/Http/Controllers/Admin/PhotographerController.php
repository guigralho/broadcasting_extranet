<?php

namespace Broadcasting\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Broadcasting\Services\PhotographerService;
use Broadcasting\Models\Photographer;
use Auth;

class PhotographerController extends Controller
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
        ]);
    }

    public function index(Request $request, PhotographerService $photographerService)
    {
    	$search = [];

    	if ($request->has('search')) 
    		$search['searchString'] = $request->get('search');

    	if ($request->has('status')) 
    		$search['searchStatus'] = $request->get('status');    	

    	$listPhotographers = $photographerService->list($search)->paginate(15);

        return view('Admin.photographer.index', compact('listPhotographers'));
    }


    public function add(Request $request, PhotographerService $photographerService)
    {
    	$photographer = '';

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$photographer = new Photographer;
    		$photographer->name = $request->get('name');
            $photographer->user_created_id = Auth::user()->id;

    		if ($photographerService->create($photographer)) {
    			return redirect(route('admin.photographer'));
    		}
		}

    	return view('Admin.photographer.add', compact('photographer'));
    }


    public function edit($groupUserId, Request $request, PhotographerService $photographerService)
    {
    	$photographer = Photographer::findOrFail($groupUserId);

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$photographer->name = $request->get('name');
            $photographer->user_updated_id = Auth::user()->id;

    		if ($photographerService->update($photographer)) {
    			return redirect(route('admin.photographer'));
    		}
		}

    	return view('Admin.photographer.add', compact('photographer'));
    }

    public function delete($groupUserId, PhotographerService $photographerService)
    {
    	$photographer = Photographer::findOrFail($groupUserId);

    	if ($photographerService->delete($photographer)) {
    		return redirect(route('admin.photographer'));
    	}
    }

}
