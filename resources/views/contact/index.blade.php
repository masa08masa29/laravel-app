<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="contact">
            <h1>お問い合わせフォーム</h1>
            <div class="step">
                <div class="step_current">お問い合わせ内容の確認</div>
                <div class="step_nocurrent">入力内容の確認</div>
                <div class="step_nocurrent">送信完了</div>
            </div>

            <form action="{{ route('contact.confirm') }}" method="post">
                @csrf
                <div class="table_container">
                    <table>
                        <tbody>
                            <tr class="form_line">
                                <th class="form_item">名前<br></th>
                                <td class="name_form">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力して下さい">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('name')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form_item">メールアドレス</th>
                                <td class="mail_form">
                                    <input type="email" name="mail" value="{{ old('mail') }}" placeholder="メールアドレスを入力して下さい">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('mail')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form_item">メールアドレス<br>（確認用）</th>
                                <td class="mail_confirmation_form">
                                    <input type="email" name="mail_confirmation" value="{{ old('mail_confirmation') }}" placeholder="確認のため、もう一度メールアドレスを入力して下さい">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('mail_confirmation')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form">お問い合わせ内容</th>
                                <td class="">
                                    <textarea name="content" value="{{ old('content') }}" placeholder="お問い合わせ内容を入力して下さい"></textarea>
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('content')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                        </tbody>
                    </table>
                    <div class="button">
                        <input class="submit-btn" type="submit" value="送信する">
                    </div>

                    <div class="management_link">
                        <a href="/contact/list">管理画面</a>
                      </div>
                </div>
            </form>

        </div>
    </div>
</body>

</html>
