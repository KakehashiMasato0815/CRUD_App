@extends('layouts.mypage')
@section('title', 'Tutrial for beginner')
@section('content')

    <div class="row">
        <label class="col-sm-4 control-label">お名前</label>
        <div class="col-sm-8">{{ $student['name'] }}</div>
    </div>
    <div class="row">
        <label class="col-sm-4 control-label">メールアドレス</label>
        <div class="col-sm-8">{{ $student['email'] }}</div>
    </div>
    <div class="row">
        <label class="col-sm-4 control-label">電話番号</label>
        <div class="col-sm-8">{{ $student['tel'] }}</div>
    </div>

    <div style="padding: 50px;">
        <a href="{{ action('StudentController@get_index') }}" class="btn btn-primary" style="width: 150px;">戻る</a>
    </div>
    
@endsection