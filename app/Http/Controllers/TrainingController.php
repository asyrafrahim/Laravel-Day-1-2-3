<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        // $trainings = Training::paginate(5);
        
        if($request->get('keyword') != null)
        {
            $keyword = $request->get('keyword');
            $trainings = Training::where('title','LIKE','%'.$keyword.'%')->paginate(5);
        }
        else
        {
            $trainings = Training::paginate(5);
        }

        
        return view('trainings.index')->with(compact('trainings'));
    }

    public function create()
    {
        return view('trainings.create');
    }

    public function store(Request $request)
    
    {
        // Method 1
        // $user = auth()->user();
        // $training = $user->trainings()->create($request->only('title','description','trainer'));
        
        // Method 2
        $training = new Training();
        $training->title = $request->get('title');
        $training->description = $request->get('description');
        $training->trainer = $request->get('trainer');
        $training->user_id = Auth::id();
        $training->save();

        if($request->hasFile('attachment'))
        {
        $filename = $training->id.'-'. date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();
        Storage::disk('public')->put($filename, File::get($request->attachment));
        $training->update(['attachment' => $filename]);
        }

        return redirect()
            ->route('training:index')
            ->with(['alert-type' => 'alert-primary','alert'=> 'Your training saved']);
    }

    public function show(Training $training)
    {
        return view('trainings.show')->with(compact('training'));
    }

    public function edit(Training $training)
    {
        return view('trainings.edit')->with(compact('training'));
    }

    public function update(Request $request, Training $training)
    {
        $training->update($request->only('title','description','trainer'));
        return redirect()
            ->route('training:index')
            ->with(['alert-type' => 'alert-success','alert'=> 'Your training updated']);
    }

    public function delete(Training $training)
    {
        $training->delete();
        if($training->attachment !=null){
            Storage::disk('public')->delete($training->attachment);
        }
        return redirect()
            ->route('training:index')
            ->with(['alert-type' => 'alert-danger','alert'=> 'Your training deleted']);
    }
}