@extends('layouts.app')

@section('content')

<main id="search">
    <div class="wrapper">
        <div class="logoWrapper">
            <div class="logo">
                <h1>Google</h1>
            </div>
        </div>
        <form method="GET" action="{{ route('search') }}">
            <div class="inputWrapper">
                <input class="input" type="text" name="keyword" placeholder="Googleで検索またはURLを入力">
            </div>
        </form>
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
