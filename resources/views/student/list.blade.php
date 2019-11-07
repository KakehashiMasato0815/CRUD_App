@extends('layouts.mypage')
@section('title', 'Tutrial for beginner')
@section('content')
 <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
 <div>
  <h1>
  <small>受講生一覧</small>
  <a href="{{ action('StudentController@new_index') }}" class="btn btn-warning" style="float: right;">新規登録</a>
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
    {{ $students->links() }}
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