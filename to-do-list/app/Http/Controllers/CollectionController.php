<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use App\Collection;
use App\Task;
use Session;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::all();
        return view('collection.index',compact('collections'));
    }

    public function create()
    {
        return view('collection.create');
    }

    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('collection/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $collections = new Collection;
            $collections->name = Input::get('name');
            $collections->save();

            Session::flash('message', $collections->name .' is aangemaakt :)');
            return redirect('collection');
        }
    }

    public function show($id)
    {
        $collection = Collection::find($id);
        return view('collection.show',compact('collection'));
    }

    public function edit($id)
    {
        $collection = Collection::find($id);
        return view('collection.edit',compact('collection'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('collection/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $collections = Collection::find($id);
            $collections->name = Input::get('name');
            $collections->save();

            Session::flash('message', $collections->name .' is up to date :)');
            return redirect('collection');
        }
    }

    public function destroy($id)
    {
        $collection = Collection::find($id);
        $collection->delete();

        // redirect
        Session::flash('message', $collection->name .' is verwijderd :)');
        return redirect('collection');
    }
}
