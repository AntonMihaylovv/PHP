<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::select('select * from posts');
        return view ('index', ['posts' => $posts]);
    }


    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $name = $request->get('name');
        $coursework = $request->get('coursework');
        $supervisor = $request->get('supervisor');
        $posts = DB::insert('insert into posts(name, coursework, supervisor)value(?,?,?)', [$name, $coursework, $supervisor]);
        if ($posts) {
            $red = redirect('posts')->with('success', 'Student has been added');
        }
        else{
            $red = redirect('posts/create')->with('danger', 'Input data failed, please try again');
        }
        return $red;
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
