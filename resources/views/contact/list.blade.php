@extends('layouts.main')

@section('title', 'お問い合わせ一覧')

@section('content')

<div class="container">
    <div class="contact_list">
        <h1>お問い合わせ一覧</h1>

        @if (!$contact_list->isEmpty())
    <h3 id="contact_count">お問い合わせ件数: {{ $contact_list->total() }}/{{$total_contacts}}件</h3>
        @endif

        <div class="filter-wrapper">
            
            <div class="items_per_page">
                <p>表示件数</p>
                <div class="radio-container">
                    <form action="{{ route('contact.list') }}" method="get">
                        <input type="radio" name="limit" id="limit1" value="5"
                            {{ $limit == 5 ? 'checked' : '' }}>
                        <label for="limit1">5件</label>
            
                        <input type="radio" name="limit" id="limit2" value="10"
                            {{ $limit == 10 ? 'checked' : '' }}>
                        <label for="limit2">10件</label>
            
                        <input type="radio" name="limit" id="limit3" value="15"
                            {{ $limit == 15 ? 'checked' : '' }}>
                        <label for="limit3">15件</label>
                        
                        
                        @if (!($sortField === 'id' && $sortDirection === 'desc'))
                        <input type="hidden" name="sort" value="{{ $sortField }}">
                        <input type="hidden" name="direction" value="{{ $sortDirection }}">
                        @endif
                        
                        @if (!empty($keyword))
                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                        @endif

                        <button type="submit" class="apply-button">適用</button>
                    </form>
                </div>
            </div>
        
            <div class="contact_search">
                <form action="{{ route('contact.list') }}" method="get">
                    <input type="text" name="keyword" placeholder="キーワードを入力" value="{{ $keyword }}">
                    
                    @if (!($sortField === 'id' && $sortDirection === 'desc'))
                    <input type="hidden" name="sort" value="{{ $sortField }}">
                    <input type="hidden" name="direction" value="{{ $sortDirection }}">
                    @endif
                    <input type="hidden" name="limit" value="{{ $limit }}">
                    <input type="submit" value="検索">
                </form>
            </div>
            
            <form action="{{ route('contact.list') }}" method="get" id="clearForm">
                <button type="submit" class="clear-button" id="clear">フィルタをクリア</button>
            </form>
        </div>
                
            <table class="contact-table">
                <tr>
                    <th>
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'direction' => ($sortField === 'created_at' && $sortDirection === 'asc') ? 'desc' : 'asc']) }}"
                            class="sorted">
                            日付
                            @if ($sortField === 'created_at')
                                @if ($sortDirection === 'asc')
                                    <i class="fas fa-caret-up"></i>
                                @else
                                    <i class="fas fa-caret-down"></i>
                                @endif
                            @else
                                <i class="fas fa-caret-up"></i>
                                <i class="fas fa-caret-down"></i>
                            @endif
                        </a>
                    </th>
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
        
            {{ $contact_list->appends(['keyword' => $keyword, 'limit' => $limit, 'sort' => $sortField, 'direction' => $sortDirection])->links('pagination::bootstrap-4') }}
            
            <div class="contact_link">
                <a href="/contact">お問い合わせフォームに戻る</a>
            </div>
    </div>
</div>
@endsection
