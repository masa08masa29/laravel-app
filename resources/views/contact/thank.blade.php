<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>送信完了</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="contact">
            <h1>お問い合わせフォーム</h1>
            <div class="step">
                <div class="step_nocurrent">お問い合わせ内容の確認</div>
                <div class="step_nocurrent">入力内容の確認</div>
                <div class="step_current">送信完了</div>
            </div>
            <div class="thank">
                <h2>お問い合わせを受け付けました</h2>
                <p>
                    受付が完了しました。<br>
                    {{$name}}さん、ありがとうございました。
                </p>
                <div class="contact_link">
                    <a href="/contact">お問い合わせフォームに戻る</a>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
