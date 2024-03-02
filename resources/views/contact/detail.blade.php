@extends('layouts.main')

@section('title', 'お問い合わせ詳細')

@section('content')

    <div class="detail_container">
      <div class="detail">
        <h2>お問い合わせ詳細</h2>  
          <table class="detail-table">
            <tr>
                <td>お名前</td>
            </tr>
            <tr>
                <td>{{$contact_detail->name}}</td>
            </tr>
            <tr>
                <td>メールアドレス</td>
            </tr>
            <tr>
                <td>{{$contact_detail->mail}}</td>
            </tr>
            <tr>
                <td>タイトル</td>
            </tr>
            <tr>
                <td>{{$contact_detail->title}}</td>
            </tr>
            <tr>
                <td>お問い合わせ内容</td>
            </tr>
            <tr>
                <td>{{$contact_detail->content}}</td>
            </tr>
          </table>

          <div class="contact_link">
            <a href="/contact/list">お問い合わせ一覧に戻る</a>
          </div>
          
      </div>
    </div>

@endsection
