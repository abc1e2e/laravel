<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function listUser()
    {
        $customer=Customer::all();
        
        return view('admin.listuser',compact('customer'));
    }
    public function deleteUser($id)
    {

        $customer=Customer::where('id',$id);
        $customer->delete();
    
        $alert='Xóa thành công';
        return redirect()->back()->with('alert',$alert);    
    }
    public function updateUser($id){
        $customer=Customer::find($id);
       
      
        
        
        return view('admin.edituser',compact('customer'));
    }
    public function updatepostUser(Request $req,$id){
        $customer=Customer::find($id);
        $customer->hoten=$req->hoten;
        $customer->email=$req->email;
        $customer->sdt=$req->sdt;
        $customer->content=$req->content;
        $customer->image=$req->image;
        $customer->save();
       // $alert='Sửa thành công';
        return redirect('list-user');
    }
   
}
