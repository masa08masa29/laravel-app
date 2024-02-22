<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ一覧</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="contact">
            <h1>お問い合わせ一覧</h1>
            
            <table class="contact-table">
                <tr>
                  <th>日付</th>
                  <th>お名前</th>
                  <th>メールアドレス</th>
                  <th>お問い合わせ内容</th>
                  <th>詳細</th>
                  <th>削除</th>
                </tr>
          
                @foreach($contact_list as $contact)
                <tr>
                  <td>{{$contact->created_at->format('Y年m月d日H:i')}}</td>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->mail}}</td>
                  <td>{{$contact->content}}</td>
                  {{-- <td><a href="{{ route('contact.detail'['id' => $contact->id])}}" class="btn btn-detail">詳細</a></td>
                  <td><a href="{{ route('contact.delete'['id' => $contact->id])}}" class="btn btn-delete">削除</a></td> --}}
                </tr>
                @endforeach
              </table>
              {{-- {{ $contact_list->links() }} --}}

              <div class="contact_link">
                <a href="/contact">お問い合わせフォームに戻る</a>
              </div>
        </div>
    </div>
</body>

</html>
