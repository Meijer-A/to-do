<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use App\Collection;
use App\Task;
use Session;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }

    public function create($collection_id)
    {
        return view('task.create',compact('collection_id'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'description'       => 'required',
            'duration'       => 'required',
            'status'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('task/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $task = new Task;
            $task->collection_id = $request->collection_id;
            $task->description = Input::get('description');
            $task->duration = Input::get('duration');
            $task->status = Input::get('status');
            $task->save();

            Session::flash('message', $task->description .' is aangemaakt :)');
            return redirect(Route('showCollection', array($request->collection_id)));
        }
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('task.show',compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit',compact('task'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'description'       => 'required',
            'duration'       => 'required',
            'status'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('task/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $task = Task::find($id);
            $task->description = Input::get('description');
            $task->duration = Input::get('duration');
            $task->status = Input::get('status');
            $collection_id = $task->collection_id;
            $task->save();

            Session::flash('message', $task->description .' is up to date :)');
            return redirect(Route('showCollection', array($collection_id)));
        }
    }


    public function destroy($id)
    {
        $task = task::find($id);
        $collection_id = $task->collection_id;
        $task->delete();

        Session::flash('message', $task->description .' is verwijderd :)');
        return redirect(Route('showCollection', array($collection_id)));
    }
}
