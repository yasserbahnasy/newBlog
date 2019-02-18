<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Setting;
use App\Articale;
use App\Image;
use App\Comment;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articale = Articale::all();
        $arr=array('Articale'=>$Articale);
        return view('home',$arr);
    }

    public function articale($id)
    {
        $Articale = Articale::find($id);
        $Department = Department::all();
        $arr=array('Articale'=>$Articale,'Department'=>$Department);
        return view('Main.articale',$arr);
    }

    public function Department($id)
    {
        $Department = Department::find($id);
        $arr=array('Department'=>$Department);
        return view('Main.department',$arr);
    }

    public function CreateComment(Request $request,$id)
    {
            $newComment = new Comment();
            $newComment->name=$request->input('name');
            $newComment->details=$request->input('details');
            $newComment->articale_id=$id;
            $newComment->save();
            return redirect('articale/'.$id);
    }

    // Search
    public function SearchQuery(Request $request)
    {
       $name = Input::get('word');
       return redirect('search/'.$name);
    }
    public function search($word)
    {
       $Articale = Articale::where('title', 'like', '%'.$word.'%' )->get();
        $arr=array('Articale'=>$Articale ,
            'word'=>$word);
        return view('Main.search',$arr);
    }
    
}
