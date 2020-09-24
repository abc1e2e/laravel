<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require '../vendor/autoload.php';
use Mailgun\Mailgun;
use DB;
use Validator;
use Auth;   
use Session;
use App\User;

class PageController extends Controller
{   
   
    //
    public function insertform()
    {
        return view('test');
    }
    public function getLogIn(){
        return view('admin.form_login');
    }
    public function postLogIn(Request $req){
        
       

        $credentials = array('email'=>$req->email,'password'=>$req->password);
        // dump(Auth::user());die;
        // // dump(Auth::attempt($credentials));die;
        // dump(Auth::attempt($credentials));die;
        if(Auth::attempt($credentials)){
            return redirect('list-user');   
        }    else{
        //     // Session::flash('error', 'Email hoặc mật khẩu không đúng!');
        //     // return redirect('lo');
             return redirect()->back()->with(['flag'=>'danger','message'=>'Email hoặc mật khẩu không đúng']);
        }
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('log-in');
    }
    public function insert(Request $request){   
        $mgClient = Mailgun::create('key-36f2c42b42a90f1c0400451803b236c2');
    $domain = "sandboxbf81cf3af28b418a99ea9201b180960f.mailgun.org";
        // dump($request);
        // die;
        // $request->validate([
        //     'hoten'=> 'required',
        //     'sdt'=> 'required',
        // ]);
        // // dump(1);
        // // die;
        $hoten=$request->input('hoten');
        $sdt=$request->input('sdt');
        $email=$request->input('email');
        $content=$request->input('content');
        $image=$request->input('image');
        $validateData =$request->validate(
        [   'hoten'=> 'required',
            'sdt'=> 'required|min:11|numeric',
            'email'=>'required|email|unique:users,email',
            'content'=>'required',
            'image'=>'required',
            'g-recaptcha-response'=>'required'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã có người sử dụng',
            'sdt.required'=>'Vui lòng nhập sdt',
            'hoten.required'=>'Vui long nhap ho ten',
            'content.required'=>'Vui long nhap Noi Dung',
            'image.required'=>'Vui long chon hinh anh',
           
        ]);
        $result = $mgClient->messages()->send($domain, array(
            'from'	=> 'ntdat.ptit@gmail.com',
            'to'	=> $email,
            'subject' => 'Hello',
            'text'	=> 'Testing some Mailgun awesomness!'
        ));
      
            // dump($validateData);
            // die;
            $token=$request->input('g-recaptcha-response');
           
    
    
        $data=array('hoten'=>$hoten,'sdt'=>$sdt,'email'=>$email,'content'=>$content,'image'=>$image);
        DB::table('test')->insert($data);
            if($token){
        return redirect('thong-tin-kh')->with('insert' ,'Record inserted  successfully.');  
            }
        // $first_name = $request->input('first_name');
        // $last_name = $request->input('last_name');
        // $city_name = $request->input('city_name');
        // $email = $request->input('email');

        // $data=array('first_name'=>$first_name,"last_name"=>
        // $last_name,"city_name"=>$city_name,"email"=>$email);
        // DB::table('tbl_insert')->insert($data);

        // return redirect('insert')->with('insert' ,'Record inserted  successfully.');  
    }
   
    
    // public function index()
    // {
    //     $users = DB::select('SELECT * FROM tbl_insert');
    //     return view('stud_edit_view',['users'=>$users]);
    // }
    // public function show($id) 
    // {
    //     $users = DB::select('SELECT * FROM tbl_insert WHERE id = ?',[$id]);
    //     return view('stud_update',['users'=>$users]);
    // }
    // public function edit(Request $request,$id)
    // {
    //     $first_name = $request->input('first_name');
    //     $last_name = $request->input('last_name');
    //     $city_name = $request->input('city_name');
    //     $email = $request->input('email');
    //     DB::update('UPDATE tbl_insert SET first_name = ?,last_name=?,city_name=?,email=? WHERE id = ?',[$first_name,$last_name,$city_name,$email,$id]);
    //     return redirect('edit-records')->with('message' ,'Record updated successfully.');
       
    // }

    
    // public function getInsert(){
    //     return view('test');  
    // }
    // public function postIndex(){
    //     $this->validate($req,
    //     [   'hoten'=>'required',
    //         'email'=>'required|email|unique:users,email',
    //         'sdt'=>'required|min:6|max:20',
    //         'content'=>'required',
    //         'image'=>'required|same:password'
    //     ],
    //     [
    //         'email.required'=>'Vui lòng nhập email',
    //         'email.email'=>'Không đúng định dạng email',
    //         'email.unique'=>'Email đã có người sử dụng',
    //         'password.required'=>'Vui lòng nhập mật khẩu',
    //         're_password.same'=>'Mật khẩu không giống nhau',
    //         'password.min'=>'Mật khẩu ít nhất 6 kí tự'
    //     ]);
    // $user = new User();
    // $user->full_name = $req->fullname;
    // $user->email = $req->email;
    // $user->password = Hash::make($req->password);
    // $user->phone = $req->phone;
    // $user->position='0';
    // $user->address = $req->address;
    // $user->save();
    // return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    // }

}
