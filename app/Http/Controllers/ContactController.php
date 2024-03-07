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

    public function send(Request $request){

        $data =$request->only(['name']);

        $attributes = $request->only(['name','mail','content','title']);

        Contact::create($attributes);

        return view('contact.thank',$data);
    }

    public function list(Request $request)
{
    // リクエストからキーワード、ソート、表示件数を取得
    $keyword = $request->input('keyword');
    $sortField = $request->input('sort', 'id');
    $sortDirection = $request->input('direction', 'desc');
    $limit = $request->input('limit', 10);  // リクエストから取得、デフォルトは10件

    // クエリビルダーを使ってデータを取得
    $query = Contact::query();

    // キーワードがあれば検索条件を追加
    if (!empty($keyword)) {
        $query->where(function($q) use ($keyword) {
            $q->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%');
        });
    }

    // ソート条件を追加
    $query->orderBy($sortField, $sortDirection);

    // データを取得
    $contact_list = $query->paginate($limit);

    // ページネーションの表示を制御
    $showPagination = !empty($keyword) && in_array($limit, [5, 10, 15]);

    return view('contact.list', compact('contact_list', 'keyword', 'limit', 'showPagination', 'sortField', 'sortDirection'));
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
