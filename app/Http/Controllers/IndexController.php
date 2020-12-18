<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class IndexController extends Controller
{
    //
    function index(){
        return view("index");
     }
 
     function gioithieu(){
         $d=array('title'=>'Giới thiệu');
         return view('services.about',$d);
     }
 
     function lienhe(){
         $d=array('title'=>'Liên hệ');
         return view("services.contact", $d);
     }

     function postlienhe(Request $req){
        mail::send('emails.contact',[
            'name' => $req->name,
            'email' => $req->email,
            'tieude' =>$req->tieude,
            'content' => $req->content,
        ],function($mail) use($req){
            $mail->to('burncoffeeonline@gmail.com');
            $mail->from($req->email,$req->name);
            $mail->subject('Tư vấn');
        });
    }
     function menu(){
         $d=array('title'=>'Thực đơn');
         return view("services.thucdon", $d);
     }
 
     function services(){
         $d=array('title'=>'Dịch vụ');
         return view("services.serviceschild", $d);
     }
}
