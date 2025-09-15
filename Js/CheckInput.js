function ShowHidePassword() {
    $('.eye').click(function() {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
          $(this).parent().children('input').attr('type', 'text');
        } else {
          $(this).parent().children('input').attr('type', 'password');
        }
      });
}

function ConfirmPassword(password, ConfirmPassword) {
    $(ConfirmPassword).change(function () {
        if ($(this).val() === $(password).val()) {
            $(this).removeClass('is-invalid');
            $(this).next().next().text('');
        } else {
            $(this).addClass('is-invalid');
            $(this).next().next().text(Message['E002'].format($(this).next().text(), $(password).next().text()));
        }
    });
}

function CheckOnChage() {
    $('input').change(function () {
        if ($(this).hasClass('required')) {
            if ($(this).val()) {
                $(this).removeClass('is-invalid');
                $(this).next().next().text('');
            } else {
                $(this).addClass('is-invalid');
                $(this).next().next().text(Message['E001'].format($(this).next().text()));
            }
        }
    });
}

function ValidateSubmit() {
    $('form').submit(function () {
        var isErr = false;
        var inputs = document.getElementsByTagName('input');
        for (var index in inputs) {
            if ($(inputs[index]).hasClass('required')) {
                if ($(inputs[index]).val()) {
                    $(inputs[index]).removeClass('is-invalid');
                    $(inputs[index]).next().next().text('');
                } else {
                    $(inputs[index]).addClass('is-invalid');
                    $(inputs[index]).next().next().text(Message['E001'].format($(inputs[index]).next().text()));
                    isErr = true;
                }
            }
        }
        return !isErr;
    });
}