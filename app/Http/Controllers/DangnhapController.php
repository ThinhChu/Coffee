<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\KhachHang;

class DangnhapController extends Controller
{
    //
    function index(){
        $d=array('title'=>'Đăng nhập');
        return view('services.login', $d);
    }

    
    function login(Request $r)
    {
        $khachhang = khachhang::where(['email' => $r->email])->first();
        if (!$khachhang || !Hash::check($r->password, $khachhang->password)) {
            session()->put('msg', 'Vui Lòng Nhập Lại Email Hoặc Mật Khẩu');
            return redirect('/dang-nhap');
        }
        else{
            $r->session()->put('khachhang', $khachhang);
            return redirect()->back();
        }
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('home');
        // }
    }
    public function showquenmk()
    {
        return view('quenmk');
    }

    public function showlaymk($id)
    {
        return view('emails.laymk',['id' => $id]);
    }

    public function emailQmk(Request $request)
    {
        $khachhang = khachhang::where(['email' => $request->email])->first();
        $details = [
            'name' => $khachhang->Ten_KH,
            'email' => $request->get('email'),
            'idkh' => $khachhang->Id_KH,
        ];
        Mail::send('emails.qmk', $details, function($message) use ($details) {
            $message->to($details['email'])
            ->subject('Lấy lại mật khẩu');
        });
    }

    public function updateMK(Request $request)
    {
        $nv = khachhang::find($request->idkh);
        $nv->password = Hash::make($request->get('password'));
        $nv->save();
        return redirect('/dang-nhap');
    }

}
