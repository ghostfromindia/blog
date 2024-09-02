//jquery enabled

$('.select2-init').each(function (){
    $(this).select2({
        ajax: {
            url: $(this).data('url'),
            data: function (params) {
                return {
                    keyword: params.term, // Search term
                };
            },
            cache: false
        }
    })
})

$('.editor').each(function (){
    ClassicEditor
        .create(this)
        .catch( error => {
            console.error( error );
        });
});

$('.upload-file').each(function() {
    $(this).on('click', function() {
        $(this).val('');  // Reset the input value
    }).change(function (e) {
        var formData = new FormData();
        formData.append('image', this.files[0]);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        var self = this;
        let holderId = '#' + $(self).data('ihid');
        let InputId = '#' + $(self).data('iid');
        let removeMe = '#' + $(self).data('rid');
        $(holderId).attr('src',base_path+'/assets/backend/icon/loading.svg');
        $.ajax({
            url: file_upload_path + "?folder=" + $(self).data('folder'), // Replace 'upload.php' with your backend endpoint
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if(response?.id === 0){
                    console.log(response?.id )
                    $(holderId).after("<p>Error occurred, file not uploaded</p>" );
                }else{
                    $(holderId).attr('src',response.path);
                    $(InputId).attr('value',response.id);
                    $(removeMe).fadeOut;
                }

            },
            error: function (xhr, status, error) {
                $('#message').html("Error occurred: " + error); // Display error
            }
        });
    })
});
const removeImage = (InputId,holderId,removeMe) =>{
    $("#"+removeMe).fadeOut;
    $("#"+InputId).attr('value',null);
    $("#"+holderId).attr('src','data:image/png;base64,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');

}
