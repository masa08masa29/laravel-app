@extends('layouts.main')

@section('title', 'お問い合わせフォーム')

@section('content')

    <div class="container">
        <div class="contact">
            <h1>お問い合わせフォーム</h1>

            <div class="step">
                <div class="step_current">お問い合わせ内容の入力</div>
                <div class="step_nocurrent">入力内容の確認</div>
                <div class="step_nocurrent">送信完了</div>
            </div>

            <form action="{{ route('contact.confirm') }}" method="post">
                @csrf
                <div class="table_container">
                    <table>
                        <tbody>
                            <tr class="form_line">
                                <th class="form_item">お名前<br>
                                    <span class="required">必須</span>
                                </th>
                                <td class="form_input">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力してください">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('name')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form_item">メールアドレス<br>
                                    <span class="required">必須</span>
                                </th>
                                <td class="form_input">
                                    <input type="email" name="mail" value="{{ old('mail') }}" placeholder="メールアドレスを入力してください">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('mail')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form_item">メールアドレス(確認用)<br>
                                    <span class="required">必須</span>
                                </th>
                                <td class="form_input">
                                    <input type="email" name="mail_confirmation" value="{{ old('mail_confirmation') }}" placeholder="もう一度メールアドレスを入力してください">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('mail_confirmation')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form_item">タイトル<br>
                                    <span class="required">必須</span>
                                </th>
                                <td class="form_input">
                                    <input type="text" name="title" value="{{ old('title') }}" placeholder="タイトルを入力してください">
                                </td>
                            </tr>
                            <div class="error-message">
                                @error('title')
                                <li>{{$message}}</li>
                                @enderror
                            </div>

                            <tr class="form_line">
                                <th class="form_item">お問い合わせ内容<br>
                                    <span class="required">必須</span>
                                </th>
                                <td class="form_input">
                                    <textarea name="content" value="{{ old('content') }}" placeholder="お問い合わせ内容を入力してください"></textarea>
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
                        <a href="{{ Auth::check() ? route('contact.list') : 'http://localhost' }}">管理画面</a>                                  
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
