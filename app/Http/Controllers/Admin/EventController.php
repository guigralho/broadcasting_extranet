<?php

namespace Broadcasting\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Broadcasting\Services\EventService;
use Broadcasting\Models\Event;
use Auth;

class EventController extends Controller
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

    public function index(Request $request, EventService $eventService)
    {
    	$search = [];

    	if ($request->has('search')) 
    		$search['searchString'] = $request->get('search');

    	if ($request->has('status')) 
    		$search['searchStatus'] = $request->get('status');    	

    	$listEvents = $eventService->list($search)->orderBy('name')->paginate(15);

        return view('Admin.event.index', compact('listEvents'));
    }


    public function add(Request $request, EventService $eventService)
    {
    	$event = '';

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$event = new Event;
    		$event->name = $request->get('name');
            $event->user_created_id = Auth::user()->id;

    		if ($eventService->create($event)) {
    			return redirect(route('admin.event'));
    		}
		}

    	return view('Admin.event.add', compact('event'));
    }


    public function edit($groupUserId, Request $request, EventService $eventService)
    {
    	$event = Event::findOrFail($groupUserId);

    	if ($request->isMethod('post')) {
    		$this->validator($request);

    		$event->name = $request->get('name');
            $event->user_updated_id = Auth::user()->id;

    		if ($eventService->update($event)) {
    			return redirect(route('admin.event'));
    		}
		}

    	return view('Admin.event.add', compact('event'));
    }

    public function delete($groupUserId, EventService $eventService)
    {
    	$event = Event::findOrFail($groupUserId);

    	if ($eventService->delete($event)) {
    		return redirect(route('admin.event'));
    	}
    }

}
