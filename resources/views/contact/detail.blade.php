<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ詳細</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="contact_detail_container">
        <div class="contact_detail">
            <h1>お問い合わせ詳細</h1>
            
            <ul>
              <li>名前：<div class="detail-item">{{$contact_detail->name}}</div></li>
              <li>メールアドレス：<div class="detail-item">{{$contact_detail->mail}}</div></li>
              <li>タイトル：<div class="detail-item">{{$contact_detail->title}}</div></li>
              <li>お問い合わせ内容：<div class="detail-item">{{$contact_detail->content}}</div></li>
            </ul>
           
              <div class="contact_link">
                <a href="/contact/list">お問い合わせ一覧に戻る</a>
              </div>
        </div>
    </div>
</body>

</html>
