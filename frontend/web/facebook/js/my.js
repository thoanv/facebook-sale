

function ExchageFanPage() {
    // var post = { oldToken: '' };
    // showSpinLoading();
    $('#loading').css('display','block');
    var url = 'https://graph.facebook.com/v3.1/me/accounts?fields=id,name&access_token=EAAJLVOQSGxIBABZCaLZA2otl3qd8ZBJVyeNVvzc9aupq9GZCIqtq1MQMGA3NV8PjTnjv1fQsG03NjxKTiwlZAvZAflGWB9o3QajKnL6PSs4luOjSNvG2Qa3DAJu2G6LEn7ZCTJNqc0kRHRbkWRUw0sPOuNjU8sZC2hoEmZCG0GygJvwyT0yQV0okr7A4AfZBOjffEZD';
    $.ajax({
        type: 'GET',
        url: url,
        // data: post,
        success: function (response) {
            if(response){

                // $.each(data, function(id, name){
                    var data = response['data'];
                    var id = '';
                    var name = '';
                    var status = '';
                    
                    for (var i = 0; data.length;i++) 
                    {
                        id = data[i]['id'];
                        name = data[i]['name'];
                        status = 0;
                        $.ajax({
                            type: 'POST',
                            url: base + 'ajax/save-page',
                            data:{
                                id : id,
                                name  : name,
                                status : status, 
                            },
                            success: function(e){
                                console.log(e);
                                window.location.reload();
                            }
                        });
                    }
                    
                }
            }

    });
    $('#loading').css('display','none');
    $.notify("Đồng bộ facebook thành công.",{position: "right top", className: "success"});
}

// nút on-off
let myCheckbox = $("[name='switch-checkbox']"); //gọi nút on-off bên view
    myCheckbox.bootstrapSwitch();
    console.log(myCheckbox);
    myCheckbox.on('switchChange.bootstrapSwitch', function () {

        $.ajax({
            url: base + $(this).data('api'),
            type: 'post',
            data: {
                id: $(this).data('id'),
                table: $(this).data('table'),
                api: $(this).data('api'),
                column: $(this).data('column')
            },
            success: function (response) {
                $('#loader').css('display', 'none');
                if (response) {
                    $.notify('Cập nhật thành công', {position: "right top", className: "success"});
                    window.location.reload();
                }
                else {
                    $.notify('Đã có lỗi xảy ra', 'error');
                }
            }
        });

    });


// Xóa page
let delete_page = function(event){
    let id = $(event.target).attr('data-id');
    let name =  $(event.target).closest('.odd').find('.title_page').text();
    console.log(name);

    let r = confirm('Bạn có chắc chắn muốn xóa ' + name.trim() + ' không ?');
    if(r===true){
        console.log(1);
        $.ajax({
            type: 'post',
            url : base + 'ajax/delete-page',
            data: {
                id: id,
            },
            success: function (response){
                $('#loader').css('display', 'none');
                 if (response) {
                    $.notify('Xóa thành công', {position: "right top", className: "success"});
                    window.location.reload();
                }
                else {
                    $.notify('Đã có lỗi xảy ra', 'error');
                }
                // loader.css('display', 'none');
            }
        });
    }

};

// Lấy bài viết

function SysPostOfPage(id,page_id){
    var url ='https://graph.facebook.com/v3.1/'+page_id+'?fields=id,name,posts&access_token=EAAJLVOQSGxIBABZCaLZA2otl3qd8ZBJVyeNVvzc9aupq9GZCIqtq1MQMGA3NV8PjTnjv1fQsG03NjxKTiwlZAvZAflGWB9o3QajKnL6PSs4luOjSNvG2Qa3DAJu2G6LEn7ZCTJNqc0kRHRbkWRUw0sPOuNjU8sZC2hoEmZCG0GygJvwyT0yQV0okr7A4AfZBOjffEZD';
    $('#loading').css('display','block');

    $.ajax({
        type: 'GET',
        url: url,
        success: function (response){
            if(response){
                // console.log(response['posts']['data'][1]['created_time']);
                var data = response['posts']['data'];
                var message = '';
                var story = '';
                var post_id = '';
                var created_time = '';

                data.forEach(function(element){
                    post_id =  'id' in element ? element['id'] : '';
                    message =  'message' in element ? element['message'] : '';
                    story =  'story' in element ? element['story'] : '';
                    created_time =  'created_time' in element ? element['created_time'] : '';

                    console.log(created_time); 
                    var date = created_time.substr(0,18);
                    console.log(date);
                   
                    $.ajax({
                        type: 'POST',
                        url: base + 'ajax/save-post',
                        data: {
                            id      : id,
                            message : message,
                            story   : story,
                            post_id : post_id,
                            created_time : created_time,
                            date      : date,
                        },
                        success: function(e){
                            window.location.reload();
                        }
                    });
                
                });
            }
            
        }
    });
    $('#loading').css('display','none');
    $.notify("Đồng bộ Post thành công.",{position: "right top", className: "success"});
}

// Xóa từng bài post

let remove_post = function (event)
{
     let id = $(event.target).attr('data-id');
     console.log(id);
     let name = $(event.target).closest('.odd').find('.id-post').text();

     let r = confirm("Bạn có muốn xóa bài viết có id :"+ name.trim()+' không ?');
     if(r === true){
        $.ajax({
            type: 'post',
            url: base + 'ajax/delete-post',
            data: {id: id},
            success: function (response){
                $('#loader').css('display', 'none');
                 if (response) {
                    $.notify('Xóa thành công', {position: "right top", className: "success"});
                    window.location.reload();
                }
                else {
                    $.notify('Đã có lỗi xảy ra', 'error');
                }
                // loader.css('display', 'none');
            }
        });

        
     }

}

let remove_all_post = function(){
    let r = confirm("Bạn có chắc muốn xóa tất cả bài viết không ?");
    if(r===true){
        $.ajax({
        type: 'post',
        url: base + 'ajax/delete-all-post',
        success: function(response){

             $('#loader').css('display', 'none');
                 if (response) {
                    $.notify('Xóa thành công', {position: "right top", className: "success"});
                    window.location.reload();
                }
                else {
                    $.notify('Đã có lỗi xảy ra', 'error');
                }
        }
    });
    }
    
}

