@extends('layouts.app')

@section('content')

<main id="result">
    <div class="window">
        <form method="GET" action="{{ route('search') }}">
            <div class="inputWrapper">
                <input class="input" type="text" name="keyword" placeholder="Googleで検索またはURLを入力">
            </div>
        </form>
    </div>
    <div class="wrapper">
        @foreach ($result['items'] as $item)
            <div class="candidate">
                <a href="{{ $item['link'] }}">
                    <div class="candidate_url">{{ $item['htmlFormattedUrl'] }}</div>
                    <h3 class="candidate_title">{{ $item['title'] }}</h3>
                </a>
                <span class="candidate_text">{{ $item['snippet'] }}</span>
            </div>
        @endforeach
    </div>
</main>

<script type="text/javascript">
    $(function () {
        $('form').submit(function () {
            if($('.input').val() === '') {
                return false;
            }
        })
    })
</script>

@endsection
