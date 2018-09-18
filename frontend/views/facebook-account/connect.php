<?php
/**
 * Created by PhpStorm.
 * User: vietv
 * Date: 9/18/2018
 * Time: 5:37 PM
 */

/* @var $this yii\web\View */

$this->registerJsFile('@web/js/facebook-account/facebook-account.js');

?>

<section class="content">

    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>

    <div class="example-modal">
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kết nối tài khoản Facebook</h4>
                    </div>
                    <div class="modal-body">
                        <a class="btn btn-block btn-social btn-facebook" data-toggle="modal" href="#crud-facebook">
                            <i class="fa fa-facebook"></i>Connect with Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade col-xs-12 in" id="crud-facebook" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog animated fadeInDown">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Thêm tài khoản facebook</h4>
            </div>
            <div class="modal-body">
                <img id="loading" src="/uploads/core/images/loading.gif" style="display: none;">
                <div id="step-1" style="display: block;">
                    <div id="result-verify" style="display: none;">
                        <iframe width="100%" height="100%" src=""></iframe>
                        <div class="alert alert-success alert-dismissible" style="font-weight: 500;">
                            Vui lòng copy đoạn mã bên dưới và nhấn thêm tài khoản để thêm . <br>
                            <button onclick="go_step_two()" class="btn btn-info btn-rounded">Nhấn thêm mã tại đây
                            </button>
                        </div>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Chú ý:</strong>
                        Vui lòng điền thông tin tài khoản Facebook của bạn. Nên dùng trình duyệt bạn
                        hay đăng nhập Facebook để đăng nhập dịch vụ. <br>Có thể bị checkpoint lần đầu tiên. Hãy vô
                        facebook xác nhận đó là tôi
                    </div>
                    <label class="form-label" for="field-1">
                        Email hoặc số điện thoại Facebook
                    </label>
                    <div class="form-group has-feedback">
                        <input title="" type="text" id="username" class="form-control"
                               placeholder="Email hoặc số điện thoại Facebook">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <label class="form-label" for="field-1">Mật khẩu Facebook</label>
                    <div class="form-group has-feedback">
                        <input title="" type="password" id="password" class="form-control"
                               placeholder="Mật khẩu Facebook">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                </div>
                <div id="step-2" style="display: none;">
                    <div class="result-error" style="display: none;">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Cookie lỗi</strong>
                        </div>
                    </div>
                    <div class="result-success" style="display: none;">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Thêm tài khoản thành công. Hệ thống sẽ tải lại trang.
                        </div>
                    </div>
                    <label style="font-weight: 600;">Nhập mã</label>
                    <textarea title="" name="" id="result" class="form-control" cols="30" rows="4"
                              placeholder="Mã facebook"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input title="" type="hidden" id="username-send" value="<?= $user['username'] ?>">
                <button data-dismiss="modal" class="btn btn-default" type="button">Đóng</button>
                <button class="btn btn-success" type="button" onclick="verify_account()">
                    <span class="fa fa-check"></span>
                    Thêm tài khoản
                </button>
            </div>
        </div>
    </div>
</div>