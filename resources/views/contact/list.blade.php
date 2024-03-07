@extends('layouts.main')

@section('title', 'お問い合わせ一覧')

@section('content')

<div class="container">
    <div class="contact_list">
        <h1>お問い合わせ一覧</h1>

        @if (!$contact_list->isEmpty())
            <h3 id="contact_count">お問い合わせ件数: {{ $contact_list->total() }}件</h3>
        @endif

        <div class="filter-wrapper">
            <!-- 表示件数の選択フォーム -->
            <div class="items_per_page">
                <p>表示件数</p>
                <div class="radio-container">
                    <form action="{{ route('contact.list') }}" method="get" id="limitForm">
                        <input type="radio" name="limit" id="limit1" value="5"
                            {{ $limitHidden == 5 ? 'checked' : '' }}>
                        <label for="limit1">5件</label>
            
                        <input type="radio" name="limit" id="limit2" value="10"
                            {{ $limitHidden == 10 ? 'checked' : '' }}>
                        <label for="limit2">10件</label>
            
                        <input type="radio" name="limit" id="limit3" value="15"
                            {{ $limitHidden == 15 ? 'checked' : '' }}>
                        <label for="limit3">15件</label>
            
                        <!-- 検索キーワードの hidden フィールド -->
                        <input type="hidden" name="keyword" value="{{ $keywordHidden }}">
                        <button type="submit" class="apply-button">適用</button>
                    </form>
                </div>
            </div>
        
            <div class="contact_search">
                <form action="{{ route('contact.list') }}" method="get">
                    <!-- 検索キーワードの入力フィールド -->
                    <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
                    <!-- 表示件数の hidden フィールド -->
                    <input type="hidden" name="limit" value="{{ $limitHidden }}">
                    <input type="submit" value="検索">
                </form>
            </div>
            
            <form action="{{ route('contact.list') }}" method="get" id="clearForm">
                <button type="submit" class="clear-button" id="clear">フィルタをクリア</button>
            </form>
        </div>
        
        
            <table class="contact-table">
                <tr>
                    <th>@sortablelink('created_at', '日付')</th>
                    <th>名前</th>
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

                    <td>
                        <a href="{{ route('contact.detail', ['id' => $contact->id]) }}">
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
        
            @if ($showPagination && $contact_list->total() > $limitHidden)
    {{ $contact_list->appends(['keyword' => $keyword, 'limit' => $limit])->links('pagination::bootstrap-4') }}
@endif

            <div class="contact_link">
                <a href="/contact">お問い合わせフォームに戻る</a>
            </div>
    </div>
</div>


@endsection
