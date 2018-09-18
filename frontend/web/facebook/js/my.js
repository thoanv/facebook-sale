function ExchageFanPage() {
    // var post = { oldToken: '' };
    // showSpinLoading();
    $.ajax({
        type: 'GET',
        url: 'https://graph.facebook.com/v2.0/me?fields=id,name&access_token=EAAJLVOQSGxIBAAhoIh85q8OHbs2yBcoEZCTTTB6TuScVC9tuLxqnlopiTjNDogDWbET4vOZAJTbmIiC12eFsjcFAiIYhD9ZC554fvb5NLXky1MMeOKyLTTNEZAXmaurNry2xHAaV0QflznjSCfg0BuMH2zXRW390in9PjAa1ElOZCRs91PXvCk7r0TLicRblgVbEE8TENJwZDZD',
        // data: post,
        success: function (data) {
            if(data){
                $('#page-id').text(data['id']);
                $('#page-name').text(data['name']);
            }
    }});
}