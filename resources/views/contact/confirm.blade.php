@extends('layouts.main')

@section('title', '入力内容の確認')

@section('content')

    <div class="container">
        <div class="contact">
            <h1>お問い合わせフォーム</h1>
            <div class="step">
                <div class="step_nocurrent">お問い合わせ内容の入力</div>
                <div class="step_current">入力内容の確認</div>
                <div class="step_nocurrent">送信完了</div>
            </div>
        
            <form action="{{ route('contact.send') }}" method="post">
            @csrf    
                <div class="confirm_container">
                    <table class="confirm">
                        <tr>
                            <th>お名前</th>
                            <td class="name">
                                <input type="hidden" name="name" value="{{$name}}">
                                {{$name}}
                            </td>
                        </tr>
                        <tr>
                        <th>メールアドレス</th>
                            <td class="mail">
                                <input type="hidden" name="mail" value="{{$mail}}">
                                {{$mail}}
                            </td>
                        </tr>
                        <tr>
                        <th>タイトル</th>
                            <td class="title">
                                <input type="hidden" name="title" value="{{$title}}">
                                {{$title}}
                            </td>
                        </tr>
                        <tr>
                        <th>お問い合わせ内容</th>
                            <td class="content">
                                <input type="hidden" name="content" value="{{$content}}">
                                {{$content}}
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div class="button">
                    <input class="submit-btn" type="submit" value="入力内容を送信する">
                </div>
            </form>           
        </div>
    </div> 
@endsection
