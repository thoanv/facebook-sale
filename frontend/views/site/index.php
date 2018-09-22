<?php
/* @var $this yii\web\View */

// use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<link rel="stylesheet" type="text/css" href="/facebook/css/facebook.css">
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tài khoản đồng bộ</h3>
        </div>
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/uploads/core/images/avatar-default.png" alt="User profile picture">

          <h3 class="profile-username text-center"><a href="http://facebook.com/732451877098821" target="_blank"><i class="fa fa-facebook-official"></i> Mưa Sa Mạc</a> </h3>

          <a class="btn btn-block btn-social bg-pink-custom" onclick="RemoveFBAccount();">
                    <i class="fa fa-facebook"></i>Remove Account
          </a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Thông tin tài khoản</h3>
          <span class="btn bg-blue btn-xs pull-right" onclick="showEditCustomerModal()"><i class="fa fa-pencil-square-o"></i></span>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Tên: </b> <a class="pull-right">Nguyễn Văn Thỏa</a>
            </li>
            <li class="list-group-item">
                <b>Email: </b> <a class="pull-right">vanthoa225@gmail.com</a>
            </li>
            <li class="list-group-item">
                <b>Số điện thoại: </b> <a class="pull-right">01656240993</a>
            </li>
            <li class="list-group-item">
                <b>Gói </b> <a class="pull-right">TRIAL</a>
            </li>
            <li class="list-group-item">
                <b>Ngày hết hạn </b> <a class="pull-right">21/09/2018</a>
            </li>
            <li class="list-group-item">
                <b>Số Fanpage</b> <a class="pull-right"> 1/5</a>
            </li>
            <li class="list-group-item">
                <b>Số User</b> <a class="pull-right">5</a>
            </li>
            <li class="list-group-item">
                <b>Số Showroom</b> <a class="pull-right">1</a>
            </li>
        </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">FanPage</a></li>
          <li><a href="#timeline" data-toggle="tab">Tùy chọn</a></li>
          <li><a href="#settings" data-toggle="tab">Danh sách đen</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <div class="col-md-12">
              <div class="panel panel-category list-panel" id="list-panel">
                  <div class="panel-heading list-panel-heading">
                      <div class="col-md-7 search-top">
                        <div class="input-group input-group-sm pull-right">
                            <input type="text" class="form-control" id="Info" name="Info" placeholder="Tìm PageID, Tên Fanpage">
                            <span class="input-group-btn">
                                <button type="button" class="btn bg-green-custom btn-flat" onclick="SearchListPage()">
                                    <i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm
                                </button>
                            </span>
                        </div>

                      </div>
                      <div class="col-md-3 pull-right search-top">
                          <a class="btn btn-social btn-facebook pull-right" onclick="ExchageFanPage()">
                              <i class="fa fa-facebook"></i> Đồng bộ Page Facebook
                          </a>
                      </div>

                  </div>
                  <div class="panel-body">
                    <div id="tbPage_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                      <div class="top"></div>
                      <div id="tbPage_processing" class="dataTables_processing" style="display: none;">Đang xử lý...</div>
                      <div class="dataTables_scroll">
                        <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%; margin-bottom: -20px;">
                          <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 787px; padding-right: 0px;">
                            <table class="table table-striped dataTable no-footer" cellspacing="0" role="grid" style="margin-left: 0px; width: 787px;">
                              <thead>

                                <tr role="row">

                                  <th class="sorting_asc" rowspan="1" colspan="1" style="width: 50px;" aria-label="">
                                    <i class="fa fa-sort-amount-asc" style="opacity: .4" aria-hidden="true"></i>
                                  </th>

                                  <th class="sorting" tabindex="0" aria-controls="tbPage" rowspan="1" colspan="1" aria-label="PageID: activate to sort column ascending" style="width: 100px;">PageID <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                                  <th class="sorting" tabindex="0" aria-controls="tbPage" rowspan="1" colspan="1" aria-label="Tên Fanpage: activate to sort column ascending" style="width: 100px;">Tên Fanpage <i class="fa fa-long-arrow-down" style="opacity: .4" aria-hidden="true"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                                  <th class="text-center sorting" tabindex="0" aria-controls="tbPage" rowspan="1" colspan="1" aria-label="Đăng Ký: activate to sort column ascending" style="width: 100px;">Đăng Ký <i class="fa fa-long-arrow-down" style="opacity: .4" aria-hidden="true"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                                  <th class="text-left sorting_disabled" rowspan="1" colspan="1" style="width: 100px;" aria-label=""></th>
                                </tr>

                              </thead>
                            </table>
                          </div>
                        </div>

                        <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
                        

                          <table id="tbPage" class="table table-striped dataTable no-footer" cellspacing="0" role="grid">

                            <thead>
                              <tr role="row" style="height: 0px;">
                                <th class="sorting_asc" rowspan="1" colspan="1" style="width: 20px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="">

                                  <div class="dataTables_sizing" style="height:0;overflow:hidden;"></div>

                                </th>

                                <th class="sorting" aria-controls="tbPage" rowspan="1" colspan="1" aria-label="PageID: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 150px;">


                                  <div class="dataTables_sizing" style="height:0;overflow:hidden;">PageID</div>

                                </th>

                                <th class="sorting" aria-controls="tbPage" rowspan="1" colspan="1" aria-label="Tên Fanpage: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 140px;">

                                  <div class="dataTables_sizing" style="height:0;overflow:hidden;">Tên Fanpage</div>

                                </th>

                                <th class="text-center sorting" aria-controls="tbPage" rowspan="1" colspan="1" aria-label="Đăng Ký: activate to sort column ascending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 90px;">

                                  <div class="dataTables_sizing" style="height:0;overflow:hidden;">Đăng Ký</div>
                                </th>

                                <th class="text-left sorting_disabled" rowspan="1" colspan="1" style="width: 90px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="">

                                  <div class="dataTables_sizing" style="height:0;overflow:hidden;"></div>

                                </th>
                              </tr>
                            </thead>
                            
                            <tbody>

                              <?php foreach ($page as $key => $value): ?>
                              <tr role="row" class="odd">
                                <td class="sorting_1">
                                  <img class="avatar_image_small" src="https://graph.facebook.com/<?= $value['page_id']?>/picture">
                                </td>
                                <td><?= $value['page_id']?></td>
                                <td class="title_page"><?= $value['title']?></td>
                                <td>
                                  <div class="post-com-count-wrapper">
                                        <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-mini">
                                            <input data-id="<?= $value['id'] ?>" data-api="ajax/enable-column"
                                                   data-table="page" data-column="status"
                                                   type="checkbox" <?= $value['status'] ? 'checked="checked"' : '' ?>
                                                   title="" name="switch-checkbox">
                                        </div>
                                    </div>

                                </td>

                                <td class=" text-left">

                                  <button type="button" style="margin-right: 10px;" class="btn  bg-grey-custom btn-xs" title="Xóa Page" onclick="delete_page(event)" data-id="<?= $value['id']?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                                  <a href="<?= Url::to(['site/post','id'=>$value['id'],'page_id'=>$value['page_id']], true) ?>" target="_blank" style="margin-right: 10px;" class="btn bg-yellow-custom btn-xs" title="Danh sách Post">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                  </a>
                                  
                                  <button type="button" onclick="SysPostOfPage(<?=$value['id']?>,<?= $value['page_id'] ?>)"  style="<?php if($value['status']==0) {echo "display: none";} else{ echo "margin-right: 10px"; }   ?>      " class="btn bg-blue-custom btn-xs" title="Đồng Bộ Post">
                                    <i class="fa fa-refresh"></i>
                                  </button>


                                </td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>   
                      </div>
                      <div class="bottom row">
                        <div class="col-md-9">
                          <div class="pullright" style="float: right;">
                            <div class="dataTables_paginate paging_simple_numbers" id="tbPage_paginate">
                              <ul class="pagination">

                                <li class="paginate_button previous disabled" id="tbPage_previous">
                                  <a href="#" aria-controls="tbPage" data-dt-idx="0" tabindex="0">Previous</a>
                                </li>

                                <li class="paginate_button active">
                                  <a href="#" aria-controls="tbPage" data-dt-idx="1" tabindex="0">1</a>
                                </li>

                                <li class="paginate_button next disabled" id="tbPage_next">
                                  <a href="#" aria-controls="tbPage" data-dt-idx="2" tabindex="0">Next</a>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="clear"></div></div>
                  </div>
                </div>
            </div>
            <div class="post clearfix"></div>
              <!-- /.post -->
          </div>
              <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <form action="/FacebookConfig/UpdateConfig" data-ajax="true" data-ajax-begin="return OnBeginUpdateConfig();" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-success="OnSuccessUpdateConfig" id="TagChatForm" method="post" data-toggle="validator" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-3">Phone Seeding <br> <span style="color: #e2a2a2; font-weight: normal;">(Định đạng:012345678,09336798,...)</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="SeedingNumber" style=" resize: vertical;" rows="5" placeholder="012345678,09336798 ..."></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">Ẩn Khi có Số Điện Thoại</label>
                    <div class="col-sm-9">

                        <label class="switchchk"><input name="IsHidePhone" type="checkbox" value="false"><div class="slider round"></div></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">Ẩn Khi Không có Số Điện Thoại</label>
                    <div class="col-sm-9">
                        <label class="switchchk"><input name="IsHideNoPhone" type="checkbox" value="false"><div class="slider round"></div></label>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">Hình thức chia đơn hàng</label>
                    <div class="col-sm-5">

                      <select id="AssignType" name="AssignType" style="width:100%; height: 34px;" tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                        <option value="1">Không chia đơn</option>
                        <option value="2">Admin chia đơn</option>
                        <option value="3">Hệ thống tự chia đều</option>
                        <option value="4">Hệ thống tự chia (Kh cũ cho sale Cũ care)</option>
                        <option value="5">Chia đơn theo Page</option>
                      </select>
                      <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;">
                        
                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                      </span>

                    </div>
                    <div class="col-sm-4" id="ConfigAssign" style="display:none">
                        <div class="btn bg-pink-custom pull-right" onclick="ConfigAssignSalesPage()"> <i class="glyphicon  glyphicon-floppy-disk"></i> Cấu Hình Chia Số Theo Page</div>
                    </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn bg-pink-custom pull-right"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
                  </div>
              </div>
            </form>
           <div class="post clearfix"></div>
          </div>
              <!-- /.tab-pane -->
           <div class="tab-pane" id="settings">
            <div class="col-md-12">
                <div class="panel panel-category list-panel" id="list-panel">
                  <div class="panel-heading list-panel-heading">
                    <div class="col-md-6 search-top">
                      <div class="input-group input-group-sm pull-right">
                          <input type="text" class="form-control" id="Info2" name="Info2" placeholder="Tìm Số điện thoại">
                          <span class="input-group-btn">
                            <button type="button" class="btn bg-green-custom btn-flat" onclick="LoadBlackListPhone()">
                              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Tìm kiếm
                            </button>
                          </span>
                      </div>
                    </div>
                    <div class="col-md-6 pull-right search-top">
                        <button type="button" data-toggle="modal" data-target="#modelBlackListPhone" class="btn bg-pink-custom btn-sm pull-right" title="Thêm mới BlackList Phone"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
                    </div>
                  </div>

                    <div class="panel-body">
                        <div id="tbBlacklist_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                          <div class="top"></div>
                          <div id="tbBlacklist_processing" class="dataTables_processing" style="display: none;">Đang xử lý...
                          </div>
                          <div class="dataTables_scroll">
                            <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                              <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 100px; padding-right: 0px;">
                                <table class="table table-striped dataTable no-footer" cellspacing="0" role="grid" style="margin-left: 0px; width: 100px;">
                                  <thead>
                                    <tr role="row">

                                      <th class="sorting_asc" tabindex="0" aria-controls="tbBlacklist" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Số điện thoại: activate to sort column descending" style="width: 0px;">
                                      Số điện thoại
                                      </th>

                                      <th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 10%;" aria-label="">
                                        
                                      </th></tr>
                                  </thead>
                                </table>
                              </div>
                            </div>

                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
                              <table id="tbBlacklist" class="table table-striped dataTable no-footer width-table" cellspacing="0" role="grid" >
                                <thead>
                                  <tr role="row" style="height: 0px;">
                                    <th class="sorting_asc" aria-controls="tbBlacklist" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Số điện thoại: activate to sort column descending" style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 0px;">
                                      <div class="dataTables_sizing" style="height:0;overflow:hidden; ">Số điện thoại</div>
                                    </th>
                                    <th class="text-center sorting_disabled" rowspan="1" colspan="1" style="width: 10%; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="">
                                      <div class="dataTables_sizing" style="height:0;overflow:hidden;">
                                      </div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>

                                  <tr role="row" class="odd">

                                    <td class="sorting_1">01227703823</td>

                                    <td class=" text-center">

                                      <button type="button" class="btn  bg-grey-custom btn-xs" title="Xóa" onclick="DeletePhone(this,4)">
                                        <i class="glyphicon glyphicon-trash"></i>
                                      </button>

                                    </td>

                                  </tr>

                                  <tr role="row" class="even">
                                    <td class="sorting_1">01626443357</td>
                                    <td class=" text-center">
                                      <button type="button" class="btn  bg-grey-custom btn-xs" title="Xóa" onclick="DeletePhone(this,18)">
                                        <i class="glyphicon glyphicon-trash"></i>
                                      </button> 
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-9">
                          <div class="pullright">
                            <div class="dataTables_paginate paging_simple_numbers" id="tbBlacklist_paginate">
                              <ul class="pagination">

                                <li class="paginate_button previous disabled" id="tbBlacklist_previous">
                                  <a href="#" aria-controls="tbBlacklist" data-dt-idx="0" tabindex="0">Previous</a>
                                </li>

                                <li class="paginate_button active">
                                  <a href="#" aria-controls="tbBlacklist" data-dt-idx="1" tabindex="0">1</a>
                                </li>

                                <li class="paginate_button ">
                                  <a href="#" aria-controls="tbBlacklist" data-dt-idx="2" tabindex="0">2</a>
                                </li>

                                <li class="paginate_button ">
                                  <a href="#" aria-controls="tbBlacklist" data-dt-idx="3" tabindex="0">3</a>
                                </li>
                                <li class="paginate_button next" id="tbBlacklist_next">
                                  <a href="#" aria-controls="tbBlacklist" data-dt-idx="4" tabindex="0">Next</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
           <div class="post clearfix"></div>
          </div>
        
          <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
 <div id="loading" style="display: none" class="loading">Loading…</div>

 <link rel="stylesheet" type="text/css" href="/css/loader.css">
 <script src="/js/notify.js" type="text/javascript" charset="utf-8" async defer>
   
 </script>


