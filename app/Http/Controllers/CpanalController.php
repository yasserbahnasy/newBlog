<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Setting;
use App\Articale;
use App\Image;

class CpanalController extends Controller
{
    public function index()
    {
        return view('cpanal');
    }

    public function AllUsers()
    {
    	$user = User::all();
    	$arr=array('user'=>$user);
        return view('cpanal/AllUsers',$arr);
    }

    protected function CreateUser(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$newUser = new User();
    		$newUser->name=$request->input('name');
    		$newUser->email=$request->input('email');
    		$newUser->password=bcrypt($request->input('password'));
    		$newUser->type=$request->input('type');
    		$newUser->save();
    		return redirect('AllUsers');
    	}
    	
        return view('cpanal/register');
    }

    public function EditUser(Request $request,$id)
    {
    	if ($request->isMethod('post')) {
    		$editUser = User::find($id);
    		if ($request->input('password')=='') {
    			$editUser->name=$request->input('name');
    			$editUser->email=$request->input('email');
    			$editUser->type=$request->input('type');
    		} else {
    			$editUser->name=$request->input('name');
	    		$editUser->email=$request->input('email');
	    		$editUser->password=bcrypt($request->input('password'));
	    		$editUser->type=$request->input('type');
    		}
    		$editUser->save();
    		return redirect('AllUsers');
    	}

    	$user=User::find($id);
    	$arr = array('user'=>$user);
        return view('cpanal.EditUser',$arr);
    }

	public function AllDepartments()
    {
    	$Department = Department::all();
    	$arr=array('Department'=>$Department);
        return view('cpanal/AllDepartments',$arr);
    }
    public function CreateDepartment(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$newUser = new Department();
    		$newUser->name=$request->input('name');
    		$newUser->save();
    		return redirect('AllDepartments');
    	}
    	
        return view('cpanal/newDepartment');
    }

    public function EditDepartment(Request $request,$id)
    {
    	if ($request->isMethod('post')) {
    		$editDepartment = Department::find($id);
    		$editDepartment->name=$request->input('name');
    		$editDepartment->save();
    		return redirect('AllDepartments');
    	}

    	$department=Department::find($id);
    	$arr = array('department'=>$department);
        return view('cpanal.EditDepartment',$arr);
    }


    public function Setting(Request $request)
    {	
    	$setting = Setting::find(1);

    	if ($request->isMethod('post')) {
			$setting->name=$request->input('name');
    		$setting->url=$request->input('url');
    		$setting->email=$request->input('email');
    		$setting->description=$request->input('description');
    		$setting->save();
    		return redirect('Setting');
    	}

    	$arr = array('setting'=>$setting);
        return view('cpanal.Settings',$arr);
    }


    public function newArticale(Request $request)
    {
    	if ($request->isMethod('post')) {

    		//upload Images
    		$this->validate($request,['image_id' =>'required|image|mimes:jpg,png,jpeg|max:2048']);
    		$imageName= time().'.'.$request->image_id->getClientOriginalExtension();
    		$request->image_id->move(public_path('images'),$imageName);

    		//Save URL In Database
    		$newImage = new Image();
    		$newImage->url=$imageName;
    		$newImage->save();

    		//Insert New Articale
    		$newArticale = new Articale();
    		$newArticale->title=$request->input('title');
    		$newArticale->details=$request->input('details');
    		$newArticale->tage=$request->input('tage');
    		$newArticale->department_id=$request->input('department_id');
    		$newArticale->user_id=Auth::user()->id;
    		$newArticale->image_id=$newImage->id;
    		$newArticale->save();
    		return redirect('AllArticales');
    	}
    	$Department = Department::all();
    	$arr=array('Department'=>$Department);
        return view('cpanal/newArticale',$arr);
    }

    public function AllArticales()
    {
    	$Articale = Articale::all();
    	$arr=array('Articale'=>$Articale);
        return view('cpanal/AllArticales',$arr);
    }

    public function EditArticale(Request $request,$id)
    {
    	$editArticale = Articale::find($id);
    	if ($request->isMethod('post')) {

    		if ($request->image_id != '') {
    			$this->validate($request,['image_id' =>'required|image|mimes:jpg,png,jpeg|max:2048']);
	    		$imageName= time().'.'.$request->image_id->getClientOriginalExtension();
	    		$request->image_id->move(public_path('images'),$imageName);

	    		//Save URL In Database
	    		$newImage = new Image();
	    		$newImage->url=$imageName;
	    		$newImage->save();

	    		$editArticale->image_id=$newImage->id;
    		}

    			$editArticale->title=$request->input('title');
	    		$editArticale->details=$request->input('details');
	    		$editArticale->tage=$request->input('tage');
	    		$editArticale->department_id=$request->input('department_id');
	    		$editArticale->user_id=Auth::user()->id;	
	    		$editArticale->save();
    			return redirect('AllArticales');
    	}

    	$arr = array('articale'=>$editArticale);
        return view('cpanal.EditArticale',$arr);
    }
}


