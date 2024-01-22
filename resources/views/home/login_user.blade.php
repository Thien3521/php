@extends('home.home_layout')

@section('content')

<div class="center">
<form class="login-container" method="post" enctype="multipart/form-data" action="{{url('/form-login')}}">
  <h1 class="text-center">Đăng nhập</h1>
  @csrf
  <div class="mb-3">
    <label for="reg-email" class="form-label">Tài khoản *</label>
    <input class="form-control" name="user_email" type="text" id="reg-email" placeholder="Nhập tài khoản">
  </div>
  <div class="mb-3">
    <label for="reg-password" class="form-label">Mật khẩu *</label>
    <input class="form-control" name="user_password" type="password" id="reg-password" placeholder="Nhập mật khẩu">
  </div>
  <div class="text-center mb-3">
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    ?>
  </div>
  <div class="d-grid gap-2">
    <input type="submit" class="btn btn-primary" value="Đăng nhập">
  </div>
  <div class="d-grid gap-2 mt-3">
    <span>Bạn chưa có tài khoản?</span>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
      Đăng ký
    </button>
  </div>
</form>

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
      </div>
      <div class="modal-body">
        <form class="l-f-o__form" action="{{url('/register-user')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="reg-name">Tên *</label>
            <input class="form-control" name="user_name" type="text" id="reg-name" placeholder="Vui lòng nhập tên">
          </div>
          <div class="mb-3">
            <label class="form-label" for="reg-email">Tài khoản *</label>
            <input class="form-control" name="user_email" type="text" id="reg-email" placeholder="Nhập tài khoản">
          </div>
          <div class="mb-3">
            <label class="form-label" for="reg-password">Mật khẩu *</label>
            <input class="form-control" name="user_password" type="password" id="reg-password" placeholder="Nhập mật khẩu">
          </div>
          <div class="mb-3">
            <label class="form-label" for="reg-retype-password">Nhập lại Mật khẩu *</label>
            <input class="form-control" name="retype_user_password" type="password" id="reg-retype-password" placeholder="Nhập lại mật khẩu">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

<style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
  </style>

