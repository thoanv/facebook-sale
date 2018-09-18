let step = 1;

let check_account = function (uid) {
    let parent = $('.' + uid);

    parent.find('.check').toggleClass('hidden');
    parent.find('.active').addClass('hidden');
    parent.find('.not-active').addClass('hidden');

    $.ajax({
        type: 'POST',
        url: client + '/facebook-tool/check-uid-from-client',
        data: {
            uid: uid,
            username: $('#username-send').val()
        },
        error: function () {
        },
        success: function (response) {

            parent.find('.check').toggleClass('hidden');

            if (response) {
                parent.find('.active').removeClass('hidden');
            }
            else {
                parent.find('.not-active').removeClass('hidden');
            }
        }
    });
};

let delete_account = function (uid) {

    let c = confirm("Bạn có chắc chắn muốn xóa tài khoản facebook này");

    if (c) {
        $.ajax({
            type: 'POST',
            url: server + '/facebook-tool/delete-account',
            data: {
                uid: uid,
                username: $('#username-send').val()
            },
            error: function () {
            },
            success: function (response) {

                if (response) {
                    location.reload();
                }
            }
        });
    }
};

let verify_account = function () {
    let loading = $('#loading');
    loading.css('display', 'block');

    if (step === 2) {
        $.ajax({
            type: 'POST',
            url: client + 'facebook-tool/add-account',
            data: {
                result: $('#result').val(),
                username: $('#username-send').val()
            },
            error: function () {
            },
            success: function (response) {

                if (response) {
                    $('.result-success').css('display', 'block');
                    $('.result-error').css('display', 'none');
                    loading.css('display', 'none');

                    window.location.href = base + 'site/index';
                }
                else {
                    $('.result-error').css('display', 'block');
                    $('.result-success').css('display', 'none');
                    loading.css('display', 'none');
                }
            }
        });
    }
    else {
        $.ajax({
            type: 'POST',
            url: client + 'facebook-tool/verify-account',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            error: function () {
            },
            success: function (response) {

                let result_verify = $('#result-verify');

                result_verify.find('iframe').attr('src', response);

                loading.css('display', 'none');

                result_verify.css('display', 'block');
            }
        });
    }
};

let go_step_two = function () {
    $('#step-1').css('display', 'none');
    $('#step-2').css('display', 'block');

    step = 2;
};