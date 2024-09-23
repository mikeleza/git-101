<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admincontroller extends Controller
{

    function about(){
        $name = 'Pongsathorn';
        $date = '9/23/2024';
        return view('about' , compact('name' , 'date'));
    }

    function blog(){
        $blogs = DB::table('blogs')->paginate(5);
        return view('blog',compact('blogs'));
    }

    function create(){
        return view('form');
    }

    function insert(Request $request){
        $request->validate([
            'title'=>'required|max:50',
            'content'=>'required'
        ]);
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        DB::table('blogs')->insert($data);
        return redirect('/blog');
    }

    function delete($id){
        DB::table('blogs')->where('id',$id)->delete();
        return redirect('/blog');
    }

    function change($id){
       $blog = DB::table('blogs')->where('id',$id)->first();
       $data = [
        'status'=>!$blog->status
       ];
       DB::table('blogs')->where('id',$id)->update($data);
       return redirect('/blog');
    }

    function update($id){
        $blog = DB::table('blogs')->where('id',$id)->first();
        return view('update',compact('blog'));
    }

    function updates(Request $request,$id){
        $request->validate([
            'title'=>'required|max:50',
            'content'=>'required'
        ]);
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        DB::table('blogs')->where('id',$id)->update($data);
        return redirect('/blog');
    }
}
