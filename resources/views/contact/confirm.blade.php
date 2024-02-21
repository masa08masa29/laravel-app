<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>入力内容の確認</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="contact">
            <h1>お問い合わせフォーム</h1>
            <div class="step">
                <div class="step_nocurrent">お問い合わせ内容の確認</div>
                <div class="step_current">入力内容の確認</div>
                <div class="step_nocurrent">送信完了</div>
            </div>

            <div class="table_container">
                <table>
                    <tbody>
                        <tr class="form_line">
                            <th class="form_item">名前<br></th>
                            <td class="name_form">{{ session('name') }}
                            </td>
                        </tr>

                        <tr class="form_line">
                            <th class="form_item">メールアドレス</th>
                            <td class="mail_form">{{ session('mail') }}
                            </td>
                        </tr>

                        <tr class="form_line">
                            <th class="form_item">メールアドレス<br>（確認用）</th>
                            <td class="mail_confirmation_form">{{ session('mail_confirmation') }}
                            </td>
                        </tr>

                        <tr class="form_line">
                            <th class="form_item">タイトル</th>
                            <td class="form_titile">{{ session('titile') }}
                            </td>
                        </tr>

                        <tr class="form_line">
                            <th class="form">お問い合わせ内容</th>
                            <td class="form_content">{{ session('content') }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <form action="{{ route('contact.send') }}" method="post">
                @csrf
                <div class="button">
                    <input class="submit-btn" type="submit" value="入力内容を送信する">
                </div>
            </form>
            

        </div>
    </div>
</body>

</html>
