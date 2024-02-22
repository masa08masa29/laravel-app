<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repositories\ContactRepository;


class ContactController extends Controller
{

    public function index(){

        return view('contact.index');
    }

    public function confirm(Request $request){

        $validation_rules =[
            'name' =>'required',
            'mail' =>'required|email',
            'mail_confirmation' =>'required|email|same:mail',
            'content' =>'required',
        ];

        $custom_messages =[
            'name.required' =>'名前を入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '正しいメールアドレスの形式で入力してください',
            'mail_confirmation.required' => '確認用メールアドレスを入力してください',
            'mail_confirmation.email' => '正しいメールアドレスの形式で入力してください',
            'mail_confirmation.same' => 'メールアドレスと確認用メールアドレスが一致しません',
            'content.required' => 'お問い合わせ内容を入力してください',
        ];

        $request->validate($validation_rules,$custom_messages);

        $data = $request->all();
        //dd($data);

        return view('contact.confirm',$data);
    }

    public function send(Request $request){

        $data =$request->only(['name']);
        //dd($data);
        $attributes = $request->only(['name','mail','content']);
        Contact::create($attributes);

        return view('contact.thank',$data);
    }

    protected $contact_repository;

    public function __construct(ContactRepository $contact_repository)
    {
        $this->contact_repository = $contact_repository;
    }
    
    public function list(){

        $contact_list = $this->contact_repository->getContactList();

        return view('contact.list',['contact_list' =>$contact_list]);
    }

    public function detail($id)
    {
        $contact_detail = Contact::find($id);

        if (!$contact_detail) {
            // 連絡先が見つからない場合のエラー処理
            abort(404);
        }

    return view('contact.detail', ['contact_detail' => $contact_detail]);
    }
    
    
    public function destroy($id)
    {
        // Contactテーブルから指定のIDのレコード1件を取得
        $contact = Contact::find($id);
        // レコードを削除
        $contact->delete();
        // 削除したらお問い合わせ一覧画面にリダイレクト
        return redirect()->route('contact.list');
    }
}
