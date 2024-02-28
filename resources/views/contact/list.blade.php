@extends('layouts.main')

@section('title', 'お問い合わせ一覧')

@section('content')

    <div class="container">
        <div class="contact_list">
            <h1>お問い合わせ一覧</h1>
                <div class="contact_search">
                    <form action="{{ route('contact.list') }}" method="get">
                        <div class="search-wrapper">
                            <select name="search_type">
                                <option value="name" @if($search_type == 'name') selected @endif>名前</option>
                                <option value="content" @if($search_type == 'content') selected @endif>お問い合わせ内容</option>
                            </select>
                            <span class="search-label">で検索</span>
                        </div>
                    <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
                    <input type="submit" value="検索">
                    </form>
                </div>
            
                <table class="contact-table">
                    <tr>
                    <th>日付</th>
                    <th>お名前</th>
                    <th>メールアドレス</th>
                    <th>タイトル</th>
                    <th>詳細</th>
                    <th>削除</th>
                    </tr>
            
                    @foreach($contact_list as $contact)
                    <tr>
                    <td>{{$contact->created_at->format('Y年m月d日H:i')}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->mail}}</td>
                    <td>{{$contact->title}}</td>

                    <td><a href="{{ route('contact.detail', ['id' => $contact->id]) }}">
                            <button type="submit" class="btn-detail">詳細</button>
                        </a>
                    </td>
                    
                    <td>
                        <form action="{{ route('contact.destroy', ['id'=>$contact->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger" onclick='return confirm("本当に削除しますか？")'>削除</button>
                        </form>
                    </td>
                    
                    </tr>
                    @endforeach
                </table>
                    {{ $contact_list->links('pagination::simple-bootstrap-4') }}

              <div class="contact_link">
                <a href="/contact">お問い合わせフォームに戻る</a>
              </div>
        </div>
    </div>

@endsection
