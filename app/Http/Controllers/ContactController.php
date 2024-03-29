<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repositories\ContactRepository;


class ContactController extends Controller
{
    protected $contact_repository;

    public function __construct(ContactRepository $contact_repository)
    {
        $this->contact_repository = $contact_repository;
    }
    
    public function index(){

        return view('contact.index');
    }

    public function confirm(Request $request){

        $validation_rules =[
            'name' =>'required|max:50',
            'mail' =>'required|email',
            'mail_confirmation' =>'required|email|same:mail',
            'title' =>'required|max:50',
            'content' =>'required',
        ];

        $request->validate($validation_rules);

        $data = $request->all();

        return view('contact.confirm',$data);
    }

    public function send(Request $request){

        $data =$request->only(['name']);
        //dd($data);

        $attributes = $request->only(['name','mail','content','title']);

        Contact::create($attributes);

        return view('contact.thank',$data);
    }

    public function list(){

        $contact_list = $this->contact_repository->getContactList(); 

        return view('contact.list',['contact_list' =>$contact_list]);
    }

    public function detail($id)
    {
        $contact_detail = $this->contact_repository->getContactDetail($id);

        return view('contact.detail', ['contact_detail' => $contact_detail]);
    }
    
    
    public function destroy($id)
    {
        $contact_destory = $this->contact_repository->ContactDestoy($id);

        if($contact_destory){
            $contact_destory->delete();
        }

        return redirect()->route('contact.list');
    }
}
