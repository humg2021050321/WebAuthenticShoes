<title>Đăng nhập</title>
<div id="wrapper" class="card card-body w-50 d-flex align-self-center shadow mt-5">
  <form action="./?act=post-dang-nhap" id="form-login" method="POST" enctype="multipart/form-data">
    <h1 class="form-heading text-center">Đăng nhập</h1>
    <div class="form-floating my-4">
      <input type="text" id="email" name="id" class="required form-control form-input" placeholder="Nhập email">
      <label><i class="fa fa-user-circle-o mx-1"></i>Email</label>
      <div class="invalid-feedback"></div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" id="password" name="pass" class="required form-control form-input" placeholder="Mật khẩu">
      <label><i class="fa fa-key mx-1"></i>Mật khẩu</label>
      <div class="invalid-feedback"></div>
      <div id="eye" class="eye position-absolute top-0 end-0 mx-2"><i class="fa fa-eye"></i></div>
    </div>
    <div class="text-center">
      <button id="submit" type="submit" class="btn btn-primary submit-form">Đăng nhập</button>
    </div>
  </form>
</div>
<script>
  $(document).ready(function() {
    ShowHidePassword();
    CheckOnChage();
    ValidateSubmit();
  });
</script>