<?php

namespace App\Http\Controllers\cms;

use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends CmsController
{

    public function index(){
         $this->data('title',$this->makeTitle('users'));
         $this->data('usersData',Admin::orderBy('id','desc')->get());
        return view($this->pagePath.'users.show_users',$this->data);
    }

    public function addUser(Request $request){
        if($request->isMethod('get')){
            $this->data('title',$this->makeTitle('add_users'));

            return view($this->pagePath.'users.add_user',$this->data);
        }
        if ($request->isMethod('post')){
            //$users = Admin::class;
            $this->validate($request,[
                'name' =>'required|min:3',
                'user_name' =>'required|min:3|unique:admins,user_name',
                'email' =>'required|email|unique:admins,email',
                'password' =>'required|min:5',
                'confirm_password' =>'required|min:5',
                'privilege' =>'required',
                'status' =>'required',
                'upload' =>'required|mimes:jpg,jpeg,png,gif|max:2000',
            ]);
            $data['name'] = $request->name;
            $data['user_name'] = $request->user_name;
            $data['email'] = $request->email;
            $data['privilege'] = $request->privilege;
            $data['status'] = $request->status;
            $data['password'] = bcrypt($request->password);
            $data['confirm_password'] = bcrypt($request->confirm_password);
            if($request->hasFile('upload')){
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random().'.'.$ext;
                $uploadPath = public_path('uploads/images/users');
                $makeImage = Image::make($image);
                $saveImage =  $makeImage->resize(500,null,function ($asp){
                    $asp->aspectRatio();
                })->crop(300,200)->save($uploadPath. '/' .$imageName);

                if($saveImage){
                    $data['image'] = $imageName;
                }

            }
            if(Admin::create($data)){
                return redirect()->route('users')->with('success','information was successfully inserted');
            }
            else{
                return redirect()->back();
            }



        }

    }

    public function editUser(Request $request){
        $this->data('title',$this->makeTitle('edit_user'));
        $criteria = $request->user_id;
        $userData =Admin::findorFail($criteria);
        return view($this->pagePath.'users.edit_user',compact('userData'),$this->data);
        }

     public function deleteWithImage($id){
         $criteria = $id;
         $findData= Admin::findorFail($criteria);
         $image = $findData->image;
         $deletePath = public_path('uploads/images/users/'.$image);
         if (file_exists($deletePath) && is_file($deletePath)){
             return unlink($deletePath);
         }
         return true;

     }
     public function deleteUser(Request $request){
        $criteria = $request->user_id;
        if ($this->deleteWithImage($criteria) && $findData = Admin::where('id',$criteria)->delete() ){
            return redirect()->route('users')->with('success','information was successfully deleted');
        }
        return false;

     }

   public function editUserAction(Request $request)
   {
       if ($request->isMethod('get')) {
           return redirect()->back();
       }
       if ($request->isMethod('post')) {
           $criteria = $request->user_id;
           $users = Admin::find($criteria);
           $this->validate($request, [
               'name' => 'required|min:3',
               'email' => 'required|email|',[
                 Rule::unique('users','email')->ignore($criteria)
               ],
               'privilege' => 'required',
               'status' => 'required',
               'upload' => 'mimes:jpeg,jpg,png,gif|max:1000',
           ]);
           $users->name = $request->name;
           $users->email = $request->email;
           $users->privilege = $request->privilege;
           $users->status = $request->status;
           if ($request->hasFile('upload')) {
               $image = $request->file('upload');
               $ext = $image->getClientOriginalExtension();
               $imageName = str_random() . '.' . $ext;
               $uploadPath = public_path('uploads/images/users');
               $makeImage = Image::make($image);
               $saveImage = $makeImage->resize(500, null, function ($asp) {
                   $asp->aspectRatio();
               })->crop(300, 200)->save($uploadPath . '/' . $imageName);

               if ($this->deleteWithImage($criteria) && $saveImage) {
                   $users->image = $imageName;
               }

           }
           if($users->save()) {
               return redirect()->route('users')->with('success','information was updated successfully');
           }

       }
   }

   public  function login(Request $request){
        if($request->isMethod('get')){
            $this->data('title',$this->makeTitle('Login Page'));
            return view($this->cmsPath.'auth.login',$this->data);
        }
        if($request->isMethod('post')){
            $userName = $request->user_name;
            $password = $request->password;
            $remember = isset($request->remember_me) ? true : false;
            if(Auth::attempt(['user_name' =>$userName,'password' =>$password],$remember)){
                return redirect()->intended(route('admin'));
            }
            else{
                return redirect()->route('login')->with('error','invalid username or password');
            }

        }

    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }

    public function updateActiveStatus(Request $request){
            $criteria = $request->user_id;
            $users = Admin::findOrFail($criteria);
            $status = $users->status;
            if(isset($status)){
                $users->status = 1;
            }
            if($users->save()){

                return redirect()->route('users')->with('success','status was changed');

            }
        }

    public function updateInActiveStatus(Request $request){
        $criteria = $request->user_id;
        $users = Admin::findOrFail($criteria);
        $status = $users->status;
        if(isset($status)){
            $users->status = 0;
        }
        if($users->save()){

            return redirect()->route('users')->with('success','status was changed');

        }
    }


    public function updateStatus(Request $request){
        if($request->isMethod('get')){
            return redirect()->back();
        }
        if($request->isMethod('post')){
            $criteria = $request->criteria;
            $users = Admin::findOrFail($criteria);
            if(isset($_POST['active'])){
                $users->status = 0;
            }
            if(isset($_POST['inactive'])){
                $users->status = 1;
            }
            if($users->save()){

                return redirect()->route('users')->with('success','status was changed');

            }
        }

    }
    public function register(Request $request){
        if($request->isMethod('get')){
            $this->data('title',$this->makeTitle('Sign Up Page'));
            return view($this->cmsPath.'auth.register',$this->data);

        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'name' =>'required|min:3',
                'user_name' =>'required|min:3|unique:admins,user_name',
                'email' =>'required|email|unique:admins,email',
                'password' =>'required|min:5',
                'confirm_password' =>'required|min:5',
                'privilege' =>'required',
                'status' =>'required',
                'upload' =>'required|mimes:jpg,jpeg,png,gif|max:2000',
            ]);
            $data['name'] = $request->name;
            $data['user_name'] = $request->user_name;
            $data['email'] = $request->email;
            $data['privilege'] = $request->privilege;
            $data['status'] = $request->status;
            $data['password'] = bcrypt($request->password);
            $data['confirm_password'] = bcrypt($request->confirm_password);
            if($request->hasFile('upload')){
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random().'.'.$ext;
                $uploadPath = public_path('uploads/images/users');
                $makeImage = Image::make($image);
                $saveImage =  $makeImage->resize(500,null,function ($asp){
                    $asp->aspectRatio();
                })->crop(300,200)->save($uploadPath. '/' .$imageName);

                if($saveImage){
                    $data['image'] = $imageName;
                }

            }
            if(Admin::create($data)){
                return redirect()->route('login')->with('success','user registered successfully! Please log in.');
            }
            }
    }
}
