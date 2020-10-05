<?php

namespace App\Http\Controllers;
use App\Customer;
use App\SanPham;
use Illuminate\Http\Request;
use App\Dathang;
use App\KhachHang;
class AdminController extends Controller
{
    //
    public function updatepostSanPham(Request $req,$id){
        $validateData =$req->validate(
            [   'name'=> 'required',
                'noidung'=> 'required',
                'giatien'=>'required|numeric',
                'soluong'=>'required|numeric',
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
        // $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
           
        // $regex1="/(03|07|08|09|01[2|6|8|9])+([0-9]{8})\b/";
        // $email =$req->email;
        // $sdt=$req->sdt;
        $sanpham=SanPham::find($id);
       
        $sanpham->name=$req->name;
     
        $sanpham->noidung=$req->noidung;
        $sanpham->giatien=$req->giatien;
        $sanpham->soluong=$req->soluong;
        $sanpham->image=$gethinhthe;
        $sanpham->save();
       // $alert='Sửa thành công';
        return redirect('list-sanpham');
    }
    
    public function updateSanPham($id)
    {
        $sanpham=SanPham::find($id);
        
        return view('admin.edit_sanpham',compact('sanpham'));
    }
    public function listUser()
    {
        $customer=Customer::all();
        
        return view('admin.listuser',compact('customer'));
    }
    public function listKH(){
        $kh=KhachHang::all();
        
        return view('admin.list_KH',compact('kh'));
    }
    public function deleteSanPham($id){
        
        $sanpham=SanPham::where('id',$id);
        $sanpham->delete();
    
        $alert='Xóa thành công';
        return redirect()->back()->with('alert',$alert);    
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
    public function listOrder()
    {
        // ->orderBy('date_oder','desc')
        $order=DatHang::all();
        // dd($order);
        return view('admin.list_order',compact('order'));
    }
    // public function confirmOrder($id)
    // {
      
    //     $order=DatHang::find($id);
    //     $item1=ChiTietDatHang::where('id_dathang',$id)->get();
    //     // dd($order);
    //     if($order->status == 0 || $order->status == 3){
    //         $order->status = 1;
    //         $order->id_employee = Auth::user()->id;
    //     }
    //     else if($order->status == 1){
    //         $order->status = 2;
    //         $order->id_shipper = Auth::user()->id;
    //     }
    //     $order->save();
    //     return redirect()->back();    
    // }
    // public function orderDetail($id){
    //     $product = DB::table('chitietdathang')->join('sanpham','chitietdathang.id_sanpham','=','sanpham.id','left outer')->where('id_dathang','=',$id)->get();
    //     // dd($product);
    //     $ma = $id ;
    //     return view('admin.order_detail',compact('product','ma'));
    // }

    // public function deleteOrder($id)
    // {
    //     $order=Bill::find($id);
    //     if($order->status == 0){
    //         foreach ($item as $key) {
    //            $pr=Product::find($key->id_product);
    //            $pr->amount = $pr->amount +  $key->quantity;
    //            $pr->save();
    //            $item1=BillDetail::where('id_order',$key->id);
    //            $item1->delete();
    //             }
    //             $order->delete();
    //     }
    //     else if($order->status == 1){
    //         $order->status = 3;
    //          $order->save();
    //     }
    //      return redirect()->back(); 
    // }
    public function getAddSanPham(){
        return view('admin.add_sanpham');
    }
    public function postAddSanPham(Request $req){
        $validateData =$req->validate(
            [   'name'=> 'required',
                'noidung'=> 'required',
                'giatien'=>'required|numeric',
                'soluong'=>'required|numeric',
                'image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
              
            ]);
            $hinhthe = $req->file('image');

            $gethinhthe = '';
            if($req->hasFile('image')){
                //$hinhthe = $request->file('image');
                $gethinhthe = time().'_'.$hinhthe->getClientOriginalName();
                $destinationPath = public_path('asset/images');
                $hinhthe->move($destinationPath, $gethinhthe);
            }
            $sanpham=new SanPham;
            $sanpham->name=$req->name;
            $sanpham->noidung=$req->noidung;
            $sanpham->giatien=$req->giatien;
            $sanpham->soluong=$req->soluong;
            $sanpham->image=$gethinhthe;
            $sanpham->save();
          
            return redirect()->back()->with('alert','oke thanh cong');

    }
    public function getListSanPham(){
        $sanpham=SanPham::all();
        
        return view('admin.list_sanpham',compact('sanpham'));
    }
    // public function postListSanPham(){
    //     $sanpham=SanPham::all();
        
    //     return view('admin.listuser',compact('sanpham'));
    // }
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
