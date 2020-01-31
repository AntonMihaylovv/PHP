<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->paginate(5);
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
        $posts = DB::select('select * from posts where id=?', [$id]);
        return view('show', ['posts'=>$posts]);
    }


    public function edit($id)
    {
        $posts = DB::select('select * from posts where id=?', [$id]);
        return view('edit', ['posts' => $posts]);
    }


    public function update(Request $request, $id)
    {
        $name = $request ->get('name');
        $coursework = $request->get('coursework');
        $supervisor = $request->get('supervisor');
        $posts = DB::update('update posts set name=?, coursework=?, supervisor=? where id=?', [$name, $coursework,$supervisor,$id]);

        if ($posts){
            $red = redirect('posts')->with('success','Student has been updated');
        }else{
            $red = redirect('posts/edit/', $id)->with('danger', 'Error updating, please try again');
        }
        return $red;
    }


    public function destroy($id)
    {
        $posts = DB::delete('delete from posts where id=?', [$id]);
        $red = redirect('posts');
        return $red;
    }
}
