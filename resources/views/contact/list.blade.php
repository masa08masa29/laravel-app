@extends('layouts.main')

@section('title', 'お問い合わせ一覧')

@section('content')

    <div class="container">
        <div class="contact">
            <h1>お問い合わせ一覧</h1>

            <div class="items_per_page">
                <p>表示件数</p>

                <div class="radio-container">
                  <input type="radio" name="limit" id="limit1" value="5" onchange="changeDisplayLimit()"
                      {{ (request()->query('limit') ?? 10) == 5 ? 'checked' : '' }}>
                  <label for="limit1">5件</label>

                  <input type="radio" name="limit" id="limit2" value="10" onchange="changeDisplayLimit()"
                      {{ (request()->query('limit') ?? 10) == 10 ? 'checked' : '' }}>
                  <label for="limit2">10件</label>

                  <input type="radio" name="limit" id="limit3" value="15" onchange="changeDisplayLimit()"
                      {{ (request()->query('limit') ?? 10) == 15 ? 'checked' : '' }}>
                  <label for="limit3">15件</label>
              </div>
                    
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
            
            {{ $contact_list->appends(['limit' => request()->query('limit')])->links('pagination::bootstrap-4') }}

              <div class="contact_link">
                <a href="/contact">お問い合わせフォームに戻る</a>
              </div>
        </div>
    </div>

    <script>
      function changeDisplayLimit() {
          var limit = document.querySelector('input[name="limit"]:checked').value;
          window.location.href = "{{ route('contact.list') }}?limit=" + limit;
      }
    </script>

@endsection
