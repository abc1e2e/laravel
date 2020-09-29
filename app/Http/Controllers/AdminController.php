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
    public function updatepostUser(Request $req,$id ){
        
        $validateData =$req->validate(
            [   'hoten'=> 'required',
                'sdt'=> 'required|numeric',
                'email'=>'required|email|unique:users,email',
                'content'=>'required',
                'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
              
            ]);
            // [
            //     'email.required'=>'Vui lòng nhập email',
            //     'email.email'=>'Không đúng định dạng email',
            //     'email.unique'=>'Email đã có người sử dụng',
            //     'sdt.required'=>'SDT is not Validate',
            //     'hoten.required'=>'Vui long nhap ho ten',
            //     'content.required'=>'Vui long nhap Noi Dung',
            //     'image.mimes'=>"Image is not "
            // ]);
       
        $gethinhthe = '';
        if($req->hasFile('image')){
            $hinhthe = $req->file('image');
            $gethinhthe = time().'_'.$hinhthe->getClientOriginalName();
            $destinationPath = public_path('asset/images');
            $hinhthe->move($destinationPath, $gethinhthe);
        }
               // $image->move($destinationPath);
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
           
        $regex1="/(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/";
        $email =$req->email;
        $sdt=$req->sdt;
        $customer=Customer::find($id);
       
        $customer->hoten=$req->hoten;
        if(!preg_match($regex, $email)){
            return redirect('update-user/'.$id)->with('edit',"Email is not Validation");}
        $customer->email=$email;
        if(!preg_match($regex1, $sdt)){
            return redirect('update-user/'.$id)->with('phone',"Phone is not Validation");}
        $customer->sdt=$sdt;
        $customer->content=$req->content;
        $customer->image=$gethinhthe;
        $customer->save();
       // $alert='Sửa thành công';
        return redirect('list-user');
    }
   
}
