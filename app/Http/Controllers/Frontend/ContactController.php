<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function view_contact(){
        $view_contacts = Contact::all();
        return view('backend.contact.view_contact', compact('view_contacts'));
    }
    public function store_contact(Request $request){
        $data = new Contact();
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['mobile_no'] = $request['mobile_no'];
        $data['address'] = $request['address'];
        $data['msg'] = $request['msg'];
        $data->save();
        $contact = array(
            'name' => $request['name'],
            'email' => $request['email'],
            'mobile_no' => $request['mobile_no'],
            'address' => $request['address'],
            'msg' => $request['msg'],
        );
        Mail::send('backend.contact.contact_email',$contact, function($msg)use($contact){
            $msg->from('imranhossainppip@gmail.com', 'Imran Hossain');
            $msg->to($contact['email']);
            $msg->subject('Thanks for contact us');
        });
        return redirect('contact_us')->with('message', 'Your mail send successfully');
    }
}
