<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Communication;
use App\Model\Product;
use App\Model\Brand;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data['sliders'] = Slider::all();
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id', 'DESC')->paginate(12);
        return view('frontend.layouts.home', $data);
    }
    public function about_us(){
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        return view('frontend.single_pages.about_us', $data);
    }
    public function contact_us(){
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        return view('frontend.single_pages.contact_us', $data);
    }
    public function shopping_cart(){
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        return view('frontend.single_pages.shopping_cart', $data);
    }
    public function contact_store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
            'msg' => 'required',
        ]);


        $communicate = new Communication();
        $communicate->name = $request->name;
        $communicate->email = $request->email;
        $communicate->mobile_no = $request->mobile_no;
        $communicate->address = $request->address;
        $communicate->msg = $request->msg;
        $communicate->save();

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'msg' => $request->msg,
        );

        Mail::send('frontend.emails.contact', $data, function ($message) use($data) {
            $message->from('imranhossainppip@gmail.com', 'Imran Hossain');
            $message->to($data['email'],'Imran');
            $message->subject('Thanks for contacts');
        });
        return redirect('/contact_us')->with('message', 'Your mail has been Sent');
    }
    
}
