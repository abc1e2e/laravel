<?php

namespace App\Http\Controllers;

use App\Http\MailController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Mail\GuiEmail;
use DB;
use Mail;
use Validator;
use Auth;   
use Session;
use Hash;
use App\User;
use App\Cart;
use App\SanPham;
use App\KhachHang;
use App\DatHang;
use App\ChiTietDatHang;

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
    public function getCheckout(){
        // if(Auth::check()){
        //     $id=Auth::user()->id;
        //     $userr=User::where('id',$id)->first();
            return view('dat_hang');
    // }
    // else
    // {
    //     return view('page.dangnhap');
    // }
    }
  
        
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
         
          foreach ($cart->items as $key => $value){

            $product = SanPham :: find($key);
             // dd($product->amount);
            if($value['qty'] > $product->soluong){
                return redirect()->back()->with('thongbao','Số lượng bánh vượt quá số lượng trong kho');
            }
          }
         
        //   if(Auth::check()){
            $customer= KhachHang::where('email',$req->email);
            //dump($customer);die;
            // if($cus!=null)
            // {
            // $cus->name = $req->name;
            // $cus->gender = $req->gender;
            // $cus->address = $req->address;
            // $cus->phone_number = $req->phone;
            // $cus->note = $req->notes;
            // $cus->save();
            // }
            // else
            // {
            $customer = new KhachHang;
            // $customer->id_user=Auth::user()->id;
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone = $req->phone;
            $customer->note = $req->notes;
           
            $customer->save();
            // }
            
            $bill = new DatHang;

            $bill->id_khachhang = $customer->id;
            $bill->date = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->note = $req->notes;
            // $bill->status = 0;
            // $bill->id_employee  = 0; 
            // $bill->id_shipper = 0;
            $bill->save();
           
            foreach ($cart->items as $key => $value) {

                $product=SanPham::find($key);
                $product->soluong=$product->soluong - $value['qty'];
                $product->save();
                $bill_detail = new ChiTietDatHang;
                $bill_detail->id_dathang = $bill->id;
                $bill_detail->id_sanpham = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->price = ($value['price']);
                $bill_detail->save();
            }
           
            Session::forget('cart');
            return redirect()->back()->with('thongbao','Đặt hàng thành công');
        //}
        // else
        // {
        //    return view('page.dangnhap');
        //}
}
    

    public function getRegister(){
        return view('admin.form_register');
    }
    public function postRegister(Request $req){
        
        $validateData =$req->validate(
            [  'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:255'
            ]);
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
          
            $user->save();
            return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public static function emailValid($string) 
    { 
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
    } 
    public function show()
    { 
        return view('admin.show_user');
    }
    public function getTrangChu()
    { 
        $sanpham=SanPham::all();
        
        return view('trang_chu',compact('sanpham'));
    }
    public function postLogIn(Request $req){
        
    //    $user=Auth::user();
    //    dump($user);die;

        $credentials = array('email'=>$req->email,'password'=>$req->password);
        
        // // dump(Auth::attempt($credentials));die;
        // dump(Auth::attempt($credentials));die;
        if(Auth::attempt($credentials)){
            return redirect('show-user');   
        }    else{
        //     // Session::flash('error', 'Email hoặc mật khẩu không đúng!');
        //     // return redirect('lo');
             return redirect()->back()->with(['flag'=>'danger','message'=>'Email hoặc mật khẩu không đúng']);
        }
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getAddtoCart(Request $req,$id){
        $product = SanPham :: find($id);
        // $promotion = Promotion_Detail :: where ('id_product','=',$id)->first();
        $oldCart = Session('cart')?Session::get('cart'):null;
        
        $soluong = 1;
        $cart = new Cart($oldCart);
        
        $cart->add($product, $id,$soluong); 
        //dd($cart);
        $req->session()->put('cart',$cart);
        //dd($req->session()->put('cart',$cart));
        return redirect()->back();
    }
    public function addQty(Request $req)
    {
        //dd($req->id);
        $id = $req->id;
        $product = SanPham :: find($id);
       // $promotion = Promotion_Detail :: where ('id_product','=',$id)->first();
       
        $oldCart = Session('cart')?Session::get('cart'):null;
        // dd($id);

        $oldCart->totalQty =$req->qty + $oldCart->totalQty - $oldCart->items[$id]['qty'];
        $oldCart->items[$id]['qty'] = $req->qty;
        // if( $promotion == null){
            $oldCart->items[$id]['price'] = $req->qty * $product->giatien;
     //   } 
        // else{
        //     $oldCart->items[$id]['price'] = $req->qty * ($product->unit_price - ($product->unit_price * $promotion->percent)/100);
        // }
        $price = 0;
        foreach ($oldCart->items as $key => $value){
              $price += $value['price'];
          }
        $oldCart->totalPrice = $price;
        // dd($oldCart);
        // dd($oldCart);
        // dd($oldCart->items[64]['qty']);
        // $soluong = $req->qty;
        // $cart = new Cart($oldCart);
        // $cart->add($product, $id, $promotion,$soluong);
        // $req->session()->put('cart',$cart);
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
