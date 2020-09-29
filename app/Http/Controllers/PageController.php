<?php

namespace App\Http\Controllers;

use App\Http\MailController;
use Illuminate\Http\Request;
require '../vendor/autoload.php';
use Mailgun\Mailgun;
use App\Mail\GuiEmail;
use DB;
use Mail;
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
    public static function emailValid($string) 
    { 
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
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
        $email=$request->input('email');
     $data=[
         'title'=>'Hello',
        'body'=>'Thanks you send Information'
        ];
       Mail::to($email)->send(new GuiEmail($data));
      
        // $data = [
        //     'title' => 'Mail from ItSolutionStuff.com',
        //     'body' => 'This is for testing email using smtp'
        // ];
    
        // \Mail::to($email)->send(new \App\Mail\GuiEmail($data));
    
        
        // $mgClient = Mailgun::create('key-36f2c42b42a90f1c0400451803b236c2');
        // $domain = "sandboxbf81cf3af28b418a99ea9201b180960f.mailgun.org";
    //     // dump($request);
        // die;
        // $request->validate([
        //     'hoten'=> 'required',
        //     'sdt'=> 'required',
        // ]);
        // // dump(1);
        // // die;
           
    
        $hoten=$request->input('hoten');
        $sdt=$request->input('sdt');
      
        $content=$request->input('content');
        //$image=$request->input('image');
      
    
        // \Mail::to($email)->send(new \App\Mail\Mail($details));
       
        // dd("Email is Sent.");


        $validateData =$request->validate(
        [   'hoten'=> 'required',
            'sdt'=> 'required|numeric',
            'email'=>'required|email|unique:test,email',
            'content'=>'required',
           'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'g-recaptcha-response'=>'required'
        ]);

        $hinhthe = $request->file('fileToUpload');

        $gethinhthe = '';
        if($request->hasFile('fileToUpload')){
            //$hinhthe = $request->file('image');
            $gethinhthe = time().'_'.$hinhthe->getClientOriginalName();
            $destinationPath = public_path('asset/images');
            $hinhthe->move($destinationPath, $gethinhthe);
        }
       
        // $result = $mgClient->messages()->send($domain, array(
        //     'from'	=> 'ntdat.ptit@gmail.com',
        //     'to'	=> $email,
        //     'subject' => 'thanks you fro',
        //     'text'	=> 'Thanks you send infomation'
        // ));
      
            // dump($validateData);
            // die;
            $token=$request->input('g-recaptcha-response');

           
           
           $regex1="/(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/";
            // $destinationPath = public_path('asset/images');

            // $image->move($destinationPath);
            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
    
           if(!preg_match($regex, $email)){
            return redirect('thong-tin-kh')->with('insert1' ,'Email not Validation');
           }else if(!preg_match($regex1, $sdt)){
            return redirect('thong-tin-kh')->with('sodienthoai' ,'Phone not Validation');
           }else{
            
        $data=array('hoten'=>$hoten,'sdt'=>$sdt,'email'=>$email,'content'=>$content,'image'=>$gethinhthe);
        DB::table('test')->insert($data);
            if($token){
        return redirect('thong-tin-kh')->with('insert' ,'Record inserted  successfully.');  
            }
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
