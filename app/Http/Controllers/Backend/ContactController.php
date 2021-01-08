<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use App\Model\Communication;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function view_contact(){
        $data['countContact'] = Contact::count();
        $data['all_data'] = Contact::all();
        return view('backend.contact.view_contact', $data);
    }
    public function add_contact(){
        return view('backend.contact.add_contact');
    }
    public function store_contact(Request $request){
        $validatedData = $request->validate([
            'address'=>'required|unique:contacts',
            'mobile_no'=>'required|unique:contacts',
            'email'=>'required|unique:contacts',
            'facebook'=>'required|unique:contacts',
            'twitter'=>'required|unique:contacts',
            'youtube'=>'required|unique:contacts',
            'google_plus'=>'required|unique:contacts',
        ]);
        $Contact = new Contact();
        $Contact->address = $request->address;
        $Contact->mobile_no = $request->mobile_no;
        $Contact->email = $request->email;
        $Contact->facebook = $request->facebook;
        $Contact->twitter = $request->twitter;
        $Contact->youtube = $request->youtube;
        $Contact->google_plus = $request->google_plus;
        $Contact->created_by = Auth::user()->id;
        $Contact->save();
        $notification = array(
            'message' => 'Contact Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/contact/view')->with($notification);
    }
    public function edit_contact($id){
        $edit_contacts = Contact::find($id);
        return view('backend.contact.edit_contacts', compact('edit_contacts'));
    }
    public function update_contact(Request $request, $id){
        $Contact = Contact::find($id);
        $Contact->address = $request->address;
        $Contact->mobile_no = $request->mobile_no;
        $Contact->email = $request->email;
        $Contact->facebook = $request->facebook;
        $Contact->twitter = $request->twitter;
        $Contact->youtube = $request->youtube;
        $Contact->google_plus = $request->google_plus;
        $Contact->created_by = Auth::user()->id;
        $Contact->update();
        $notification = array(
            'message' => 'Contact Information Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/contact/view')->with($notification);
    }
    public function delete_contact($id){
        $delete_contact = Contact::find($id);
        $delete_contact->delete();
        $notification = array(
            'message' => 'Contact Information Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/contact/view')->with($notification);
    }
    public function communication_view(){
        $view_communication = Communication::all();
        return view('backend.contact.view-communicate', compact('view_communication'));
    }
    public function communication_delete($id){
        $delete = Communication::find($id);
        $delete->delete();
        $notification = array(
            'message' => 'Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect('contact/communication_view')->with($notification);
    }
}
