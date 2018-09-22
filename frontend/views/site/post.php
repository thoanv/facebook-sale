<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($id); die;
?>
<link rel="stylesheet" type="text/css" href="/facebook/css/facebook.css">
<!-- <link rel="stylesheet" type="text/css" href="/facebook/css/category.css"> -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-category list-panel" id="list-panel">
            <div class="panel-heading list-panel-heading">

                <div class="col-md-3 search-top">
                    <select class="form-control form-control-od select2 select2-hidden-accessible" id="lstPageID" name="lstPageID" style="width:100%" tabindex="-1" aria-hidden="true">
                        <?php $id; foreach ($page as $key => $value):?>
                    	<option value="<?= $value['page_id']?>" <?php if($page_id=== $value['page_id']){ echo "selected"; } ?> disabled><?= $value['title']?></option>
                    <?php endforeach; ?>
					</select>
                </div>

                <div class="col-md-5 search-top">
                    <div class="input-group input-group-sm pull-right">
                        <input type="text" class="form-control" id="Info" name="Info" placeholder="Tìm theo PageID, PostID, Mô tả, sản phẩm, danh mục">
                        <span class="input-group-btn">
                            <button type="button" class="btn bg-green-custom btn-flat" onclick="SearchList()">
                                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;Tìm kiếm
                            </button>
                        </span>
                    </div>
                </div>
                
                <div class="col-md-2 pull-right search-top">
                    <button type="button" data-toggle="modal" title="Thêm mới bài viết" data-target="#modelPost" class="btn bg-pink-custom   btn-sm refresh-button" id="refresh-button" onclick="Update();">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Thêm mới
                    </button>
                </div>

                <div class="col-md-2 pull-right search-top">
                    <button type="button" onclick="SysPostOfPage(<?= $id ?>,<?= $page_id ?>)" title="Đồng bộ bài viết" class="btn bg-blue-custom btn-sm refresh-button" id="refresh-button">
                        <i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Đồng Bộ
                    </button>
                    <button type="button" onclick="remove_all_post()" title="Xóa tất cả bài viết" data-id="" style="<?php if(count($post) == 0){ echo "display: none"; } ?>" class="btn bg-red btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                    </button>
                </div>
    
            </div>
            <div class="panel-body" style="padding: 10px 1px 0 10px;">

                <div id="tbPostFB_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                	<div class="top"></div>
                	<div class="dataTables_scroll">
                		<div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                			<div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1237px; padding-right: 0px;">
                				<table >
                					<thead>
                        				<tr role="row">
                        					<th style="width: 118px" >FanPage <i class="fa fa-sort-amount-asc" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 148px">Mã Bài Viết <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 233px" >Mô Tả <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 86px">Sản Phẩm <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 87px">Danh Mục <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 62px">Ẩn không SĐT <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 92px">Ẩn Có SĐT <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i>
                                            </th>

                        					<th style="width: 80px" >Bỏ Qua <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th style="width: 0px" >Ngày Đăng <i class="fa fa-long-arrow-down" aria-hidden="true" style="opacity: .4"></i><i class="fa fa-long-arrow-up" style="opacity: .4" aria-hidden="true"></i></th>

                        					<th ></th>
                        				</tr>
                    				</thead>
                    			</table>
                    		</div>
                    	</div>

                    	<div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
                    		<table id="tbPostFB" class="table table-striped no-footer dataTable" cellspacing="0" role="grid">
                    			<thead>
                        			<tr role="row" style="height: 0px;">
                        				<th>
                                            
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">FanPage </div>

                        				</th>

                        				<th >
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Mã Bài Viết</div>
                        				</th>

                        				<th >
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Mô Tả</div>
                        				</th>

                        				<th >
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Sản Phẩm</div>
                        				</th>

                        				<th>
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Danh Mục</div>
                        				</th>

                        				<th >
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Ẩn không SĐT</div>
                        				</th>

                        				<th>
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Ẩn Có SĐT</div>
                        				</th>

                        				<th ">
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Bỏ Qua</div>
                        				</th>

                        				<th>
                        					<div class="dataTables_sizing" style="height:0;overflow:hidden;">Ngày Đăng</div>
                        				</th>

                        				<th ></div>
                        				</th>
                        			</tr>
                    			</thead>
                    
                				<tbody>

                                    <?php if(count($post) == 0): ?>
                                        <div class="btn bg-pink-custom" style="text-align: center;">
                                            <strong>Hiện tại!</strong> Bạn chưa có bài viết nào.Hãy chọn <b>đồng bộ</b> hoặc <b>thêm mới</b> để thêm bài viết
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($post as $key => $value): ?>
                                            
                        					<tr role="row" class="odd">
                        						<td class=" table_longtext">
                        							<a href="https://facebook.com/<?= $value['page']['page_id'] ?>" target="_blank"> 
                        								<i class="fa fa-facebook"></i> <?= $value['page']['title'] ?>
                        							</a>
                        						</td>

                        						<td class=" table_longtext id-post">
                        							<a href="https://facebook.com/<?=$value['post_id'] ?>" target="_blank"> <i class="fa fa-facebook"> </i> 
                                                        <?php
                                                            {
                                                                $domain = strstr($value['post_id'],'_');
                                                                echo $domain; 
                                                            }  
                                                        ?>
                        							</a>
                        						</td>

                        						<td class=" table_longtext"><?= $value['describe'] ?></td>

                        						<td class=" table_longtext"></td>

                        						<td></td>

                        						<td style="text-align: center">
                        							<span style="color:#3c8dbc" class="glyphicon glyphicon-ok"></span>
                        						</td>

                        						<td style="text-align: center">
                        							<span style="color:#3c8dbc" class="glyphicon glyphicon-ok"></span>
                        						</td>

                        						<td style="text-align: center">
                        							<span style="color:#f35369" class="glyphicon glyphicon-remove"></span>
                        						</td>

                        						<td>
                                                    <?=

                                                         $value['created_at'];
                                                    ?>
                                                     
                                                 </td>

                        						<td class=" text-center">
                        							<button type="button" data-toggle="modal" data-target="#modelPost" style="margin-right: 0px;" class="btn bg-yellow-custom btn-xs" title="Cập Nhật" onclick="Update()">
                        								<i class="fa fa-edit"></i>
                        							</button>

                        							<button type="button" class="btn  bg-grey-custom btn-xs" title="Xóa" onclick="remove_post(event)" data-id="<?= $value['id'] ?>">
                        								<i class="fa fa-trash"></i>
                        							</button>
                        						</td>
                        					</tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                				</tbody>
                			</table>
                		</div>
                	</div>
                	<div class="bottom row">
                		<div class="col-md-2">
                			<div class="dataTables_length" id="tbPostFB_length">
                				<label>Hiển thị 
                					<select name="tbPostFB_length" aria-controls="tbPostFB" class="form-control input-sm">
                						<option value="10">10</option>
                						<option value="25">25</option>
                						<option value="50">50</option>
                						<option value="100">100</option>
                					</select> dòng
                				</label>
                			</div>
                		</div>
                		<div class="col-md-3">
                			
                		</div>
                		<div class="col-md-7">
                			<div class="pullright">
                				<div class="dataTables_paginate paging_simple_numbers" id="tbPostFB_paginate">
                					<ul class="pagination">

                						<li class="paginate_button previous disabled" id="tbPostFB_previous">
                							<a href="https://trustsales.vn/PostFacebookConfig?PageID=1984591934937591#" aria-controls="tbPostFB" data-dt-idx="0" tabindex="0">Previous
                							</a>
                						</li>

                						<li class="paginate_button active">
                							<a href="https://trustsales.vn/PostFacebookConfig?PageID=1984591934937591#" aria-controls="tbPostFB" data-dt-idx="1" tabindex="0">1</a>
                						</li>

                						<li class="paginate_button next disabled" id="tbPostFB_next">
                							<a href="https://trustsales.vn/PostFacebookConfig?PageID=1984591934937591#" aria-controls="tbPostFB" data-dt-idx="2" tabindex="0">Next</a>
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
</div>
 
 <link rel="stylesheet" type="text/css" href="/css/loader.css">
 <script src="/js/notify.js" type="text/javascript" charset="utf-8" async defer>
   
 </script>
