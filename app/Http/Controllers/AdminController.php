<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function listUser()
    {
        $user=User::all();
        return view('admin.listuser',compact('user'));
    }
    public function deleteUser($id)
    {

        $user=User::where('id',$id);
        $user->delete();
    
        $alert='Xóa thành công';
        return redirect()->back()->with('alert',$alert);    
    }
    public function updateUser($id){
        $user=User::find($id);
       
   
        
        
        return view('admin.edituser',compact('user'));
    }
    public function updatepostUser(Request $req,$id){
        $user=User::find($id);
        $user->hoten=$req->hoten;
        $user->email=$req->email;
        $user->sdt=$req->sdt;
        $user->content=$req->content;
        $user->image=$req->image;
        $user->save();
       // $alert='Sửa thành công';
        return redirect('list-user');
    }
}
