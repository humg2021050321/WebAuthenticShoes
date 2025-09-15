<title>Đăng nhập</title>
<div id="wrapper" class="card card-body w-50 d-flex align-self-center shadow mt-5">
  <form action="./?act=post-dang-nhap" id="form-login" method="POST" enctype="multipart/form-data">
    <h1 class="form-heading text-center">Đăng nhập</h1>
    <div class="form-floating my-4">
      <input type="text" id="email" name="id" class="form-control form-input" placeholder="Nhập email">
      <label><i class="fa fa-user-circle-o mx-1"></i>Số Điện Thoại</label>
      <div class="invalid-feedback">
        Vui lòng nhập số điện thoại để đăng nhập
      </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" id="password" name="pass" class="form-control form-input" placeholder="Mật khẩu">
      <label><i class="fa fa-key mx-1"></i>Mật khẩu</label>
      <div id="eye" class="position-absolute top-0 end-0 mx-2"><i class="fa fa-eye"></i></div>
      <div class="invalid-feedback">
        Vui lòng nhập mật khẩu
      </div>
    </div>
    <div class="row text-center">
      <a href="./?act=form-dang-ky" class="btn btn-link">Đăng Ký</a>
    </div>
    <div class="text-center">
      <button id="submit" type="submit" class="btn btn-primary submit-form">Đăng nhập</button>
    </div>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('#eye').click(function() {
      $(this).toggleClass('open');
      $(this).children('i').toggleClass('fa-eye-slash fa-eye');
      if ($(this).hasClass('open')) {
        $(this).prev().prev().attr('type', 'text');
      } else {
        $(this).prev().prev().attr('type', 'password');
      }
    });
    $('input').change(function() {
      if ($(this).val()) {
        $(this).removeClass('is-invalid');
      } else {
        $(this).addClass('is-invalid');
      }
    });
    $('form').submit(function() {
      var isErr = false;
      if (!$('#email').val()) {
        $('#email').addClass('is-invalid');
        isErr = true;
      }
      if (!$('#password').val()) {
        $('#password').addClass('is-invalid');
        isErr = true;
      }
      return !isErr;
    });
  });
</script>