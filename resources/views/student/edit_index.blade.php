@extends('layouts.mypage')
@section('title', 'Tutrial for beginner')
@section('content')
    <form action="" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="col-md-3 control-label">お名前</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="{{ $errors->has('name') ? '' : $student->name }}">
                @if($errors->has('name'))
                <span class="text-danger">
                    {{ $errors->first('name') }}
                </span>
                @endif
            </div>
        </div>
     
        <div class="form-group {{ $errors->has('email') ? 'has-error': '' }}">
            <label for="email" class="col-md-3 control-label">メールアドレス</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="email" name="email" value="{{ $errors->has('email') ? '' : $student->email }}">
                    @if($errors->has('email'))
                <span class="text-danger">
                    {{ $errors->first('email') }}
                </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('tel') ? 'has-error': '' }}">
            <label for="tel" class="col-md-3 control-label">電話番号</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="tel" name="tel" value="{{ $errors->has('tel') ? '' : $student->tel }}">
                @if($errors->has('tel'))
                <span class="text-danger">
                    {{ $errors->first('tel') }}
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-offset-3 text-center">
            <button class="btn btn-primary">確認</button>
        </div>
    </form>
@endsection