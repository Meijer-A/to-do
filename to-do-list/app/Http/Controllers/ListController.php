<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use App\Lists;
use Session;

class ListController extends Controller
{
    public function index()
    {
        $lists = Lists::all();
        return view('list.index',compact('lists'));
    }

    public function create()
    {
        return view('list.create');
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
            return redirect('list/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $lists = new Lists;
            $lists->name       = Input::get('name');
            $lists->save();

            Session::flash('message', $lists->title .' is aangemaakt :)');
            return redirect('list');
        }
    }

    public function show($id)
    {
        $list = Lists::find($id);
        return view('list.show',compact('list'));
    }

    public function edit($id)
    {
        $list = Lists::find($id);
        return view('list.edit',compact('list'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('list/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $lists = Lists::find($id);
            $lists->name = Input::get('name');
            $lists->save();

            Session::flash('message', $lists->name .' is up to date :)');
            return redirect('list');
        }
    }

    public function destroy($id)
    {
        $lists = Lists::find($id);
        $lists->delete();

        // redirect
        Session::flash('message', $lists->name .' is verwijderd :)');
        return redirect('list');
    }
}
