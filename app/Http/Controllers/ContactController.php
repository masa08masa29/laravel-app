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
            'name' =>'required',
            'mail' =>'required|email',
            'mail_confirmation' =>'required|email|same:mail',
            'title' =>'required',
            'content' =>'required',
        ];

        $request->validate($validation_rules);

        $data = $request->all();

        return view('contact.confirm',$data);
    }

    public function send(){

        return view('contact.thank');
    }

    public function list(Request $request){

    $keyword = $request->input('keyword');
    $search_type = $request->input('search_type');
  
    $limit = $request->query('limit', 10);
    $query = Contact::query();

    if (!empty($keyword)) {
        if ($search_type === 'name') {
            $query->where('name', 'like', '%' . $keyword . '%');
        } elseif ($search_type === 'content') {
            $query->where('content', 'like', '%' . $keyword . '%');
        }
    }

    $contact_list = $query->orderBy('id', 'desc')->paginate($limit);

    return view('contact.list', [
        'contact_list' => $contact_list,
        'keyword' => $keyword,
        'search_type' => $search_type,
    ]);
}

    public function detail($id)
    {
        $contact_detail = $this->contact_repository->getContactDetail($id);

        if (!$contact_detail) {
            abort(404); 
        }

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
