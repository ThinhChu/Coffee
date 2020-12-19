<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //
    function index(){
        $d=array('title'=>'Đăng ký');
        return view("services.register", $d);
    }
    function create(Request $r)
    {
        $created = new khachhang([ 
            'Ten_KH' => $r->get('Ten_KH'),
            'email' => $r->get('email'),
            'DienThoai' => $r->get('DienThoai'),
            'password' => bcrypt($r->get('password')),
            'DiaChi' => $r->get('DiaChi'),
            'Gioi_Tinh' => $r->get('Gioi_Tinh'),
            'Quan'=> $r->get('Quan'),
            'Phuong' => $r->get('Phuong'),
        ]);
        
        $details = [
            'name' => $r->get('Ten_KH'),
            'email' => $r->get('email'),
        ];
        Mail::send('emails.reply', $details, function($message) use ($details) {
            $message->to($details['email'])
            ->subject('Đăng Ký Thành Công');
        });
        
        $created->save();
        return redirect('/dang-nhap');
        
    }
}
