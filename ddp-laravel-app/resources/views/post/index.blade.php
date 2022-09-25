@extends('layouts.layout')

@extends('layouts.header')

@section('content')

<h1>詐欺掲示板</h1>

@if($posts == null)
    <p>まだ投稿はありません。</p>
@endif

@foreach($posts as $post)
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <p class="nickname">ニックネーム：{{$post->nickname}}</p>
            <h5 class="name">題名：{{$post->title}}</h5>
            <h5 class="name">詐欺師名：{{$post->name}}</h5>
            @if($post->type == 1)
                <p style="color:blue;">マッチングアプリ</p>
            @elseif($post->type == 2)
                <p style="color:red;">友人</p>
            @elseif($post->type == 3)
                <p style="color:pink;">会社</p>
            @elseif($post->type == 4)
                <p style="color:green;">その他</p>
            @endif
            <h5>内容</h5>
            <p class="content">{{$post->content}}</p>
            </div>
        </div>
        </div>
    </div>
@endforeach
{{ $posts->links() }}

<div class="row">
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nickname" class="form-label">ニックネーム</label>
            <input type="text" name="nickname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">題名</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">詐欺師との関係性</label>
            <select class="form-select" aria-label="Default select example" name="type">
                <option selected>詐欺師との関係を選択してください</option>
                <option value="1">マッチングアプリ</option>
                <option value="2">友人</option>
                <option value="3">会社</option>
                <option value="4">その他</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="accuracy" class="form-label">情報の正確さ</label>
            <select class="form-select" aria-label="Default select example" name="accuracy">
                <option selected>情報の正確さを選択してください</option>
                <option value="1">不正確(調査中)</option>
                <option value="2">不正確(調査していない)</option>
                <option value="3">正確(調査済み)</option>
                <option value="4">正確(調査はしていない)</option>
                <option value="5">不明(しかし騙された)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">詐欺師氏名</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">詐欺師イメージ</label>
            <input type="file" class="form-control" name="img">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">内容</label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control"> </textarea>
        </div>
        <div class="d-grid gap-2">
            <input type="submit" value="投稿" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
