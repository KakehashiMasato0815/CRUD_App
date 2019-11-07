@extends('layouts.mypage')
@section('title', 'Tutrial for beginner')
@section('content')
    <form action="" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        
        <input type="hidden" name="name" value="{{ $student['name'] }}">
        <input type="hidden" name="email" value="{{ $student['email'] }}">
        <input type="hidden" name="tel" value="{{ $student['tel'] }}">

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
        <div class="row" style="margin-top: 30px;">
            <div class="col-sm-offset-4 col-sm-8">
                <input type="submit" class="btn btn-primary" name="button1" value="登録">
            </div>
        </div>
    </form>
@endsection