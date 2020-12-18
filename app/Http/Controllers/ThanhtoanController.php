<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\GioHang;
use App\Models\ChiTietHoaDon;
use App\Models\KhachHang;
class ThanhtoanController extends Controller
{
    function index(){
        $d=array('title'=>'Thanh toán');
        return view("services.checkout", $d);
    }
    public function thanhtoan(Request $request, $id){
        
        $hd = new hoadon([
            'Ngay_Dang' => $request->get('Ngay_Dang'),
            'Tong_Tien' => $request->get('Tong_Tien'),
            'DiaChi' => $request->get('DiaChi'),
            'DienThoai' => $request->get('DienThoai'),
            'Quan' => $request->get('Quan'),
            'Phuong' => $request->get('Phuong'),
            'Ten_KH' => $request->get('Ten_KH'),
            'AnHien' => $request->get('AnHien'),
            'PT_TT' => $request->get('PT_TT'),
            'ThuTu' => $request->get('ThuTu'),
            'Voucher' => $request->get('Voucher'),
            'TrangThai' => $request->get('TrangThai'),
            'Id_KH' => $request->get('Id_KH'),
            'TT_TB' => $request->get('TT_TB'),
        ]);
        $hd->save();
    
        $cartitem = \Cart::session($request->session()->get('khachhang')['Id_KH'])->getContent();
        
        foreach ($cartitem as $key => $c) { 
            $cthd = new chitiethoadon([
                'Id_SP' => $c->id,
                'Ten_SP' => $c->name,
                'So_Luong' => $c->quantity,
                'Id_HD' => $hd->Id_HD,
            ]);
            $cthd->save();
            $dcart = \Cart::session($request->session()->get('khachhang')['Id_KH'])->remove($c->id);
        }
        if ($request->get('TrangThai') == 2) {
            $khc = khachhang::select('Id_KH', 'Tich_diem')->where('Id_KH', '=', $request->session()->get('khachhang')['Id_KH'])->first();
            $ttd = $khc->Tich_diem + $request->get('Tong_Tien');
            $kh = khachhang::find($request->session()->get('khachhang')['Id_KH']);
            $kh->Tich_diem = $ttd;
            $kh->save();
        }

        $details = [
            'name' => $request->session()->get('khachhang')['Ten_KH'],
            'email' => $request->session()->get('khachhang')['email'],
        ];
        Mail::send('emails.reply', $details, function($message) use ($details) {
            $message->to($details['email'])
            ->subject('Đơn hàng của bạn đã được xác nhận');
        });
        
        return redirect('/');
    }
}
