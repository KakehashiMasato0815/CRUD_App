@extends('layouts.mypage')
@section('title', 'Tutrial for beginner')
@section('content')
 <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
 <div class="row" style="margin-bottom: 30px;">
   <div class="col-sm-10" style="margin-bottom: 10px;">
     <form action="" class="form-inline" method="get">
     <div class="form-group">
      <input type="text" name="keyword" class="form-control" value="{{ $keyword }}" placeholder="検索キーワード">
      </div>
      <input type="submit" value="検索" class="btn btn-info">
     </form>
   </div>
 </div>
 <div>
  <h1>
  <small>受講生一覧</small>
  <a href="{{ action('StudentController@new_index') }}" class="btn btn-warning" style="float: right;"><i class="glyphicon glyphicon-plus"></i>新規登録</a>
  </h1>
  </div>
  </div>
  <table class="table table-striped table-hover">
  <thead>
  <tr>
  <th>No</th>
  <th>name</th>
  <th>email</th>
  <th>tel</th>
  <th>opration</th>
  </tr>
  </thead>
  <tbody>
  @foreach($students as $student)
  <tr>
  <td>{{ $student->id }}</td><td>{{ $student->name }}</td><td>{{ $student->email }}</td><td>{{ $student->tel }}</td>
  <td>
  <a href="/student/show/{{ $student->id }}" class="btn btn-primary btn-sm">詳細</a>
  <a href="/student/edit/{{ $student->id }}" class="btn btn-primary btn-sm">編集</a>
  <form action="/student/delete/{{ $student->id }}" method="post">
  {{ csrf_field() }}
  <input type="submit" class="btn btn-danger btn-sm btn-dell" value="削除">
  </form>
  </td>
  </tr>
  @endforeach
  </tbody>
  </table>

  <!-- page control -->
  <div class="d-flex justify-content-center mb-5">
    {{-- {!! $students->render() !!} --}}
    {!! $students->appends(['keyword' => $keyword])->render() !!}
</div>
@endsection

@section('script')
  <script>
    $(function() {
      $(".btn-dell").click(function() {
        if (confirm("本当に削除しますか？")) {
          return true;
        } else {
          return false;
        }
      });
    });
  </script>
@endsection

@if(Session::has('flashmessage'))
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
  $(window).load(function() {
  $('#modal_box').modal('show');
  });
</script>
 
<!-- モーダルウィンドウの中身 -->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">受講生 APP</h4>
  </div>
  <div class="modal-body">
  {{ session('flashmessage') }}
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
  </div>
  </div>
  </div>
</div>
@endif