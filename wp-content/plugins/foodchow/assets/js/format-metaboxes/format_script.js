jQuery(function ($) {
    
    $('select#lifeline2_audio_type').select2();

     $('select.select2').select2();

    lifeline2_show_correct_format($('#post-formats-select input[name="post_format"]:checked').attr('value'));
    $('#post-formats-select input[name="post_format"]').change(function () {
        lifeline2_show_correct_format($(this).attr('value'));
    });
    if($('[name="tr[audio_type]').val() == 'soundcloud'){
       $('input[name="tr[soundcloud_track]"]').parent().parent().show();
       $('input[name="tr[own_audio]"]').parent().parent().hide();
   }
   else if($('[name="tr[audio_type]').val() == 'ownaudio'){
     $('input[name="tr[soundcloud_track]"]').parent().parent().hide();
     $('input[name="tr[own_audio]"]').parent().parent().show();

 }
 $('[name="tr[audio_type]"]').on('change',function(e){

    if($(this).val() == 'soundcloud'){
       $('input[name="tr[soundcloud_track]"]').parent().parent().show();
       $('input[name="tr[own_audio]"]').parent().parent().hide();
   }else if($(this).val() == 'ownaudio'){
     $('input[name="tr[soundcloud_track]"]').parent().parent().hide();
     $('input[name="tr[own_audio]"]').parent().parent().show();
 }
});
});

function lifeline2_show_correct_format(format) {
    if (format == 'image') {
        foodchow_featured_image_position();
    } else {
        foodchow_reset_featured_image_position();
    }
    jQuery('#foodchow_format_quote').hide();
    jQuery('#foodchow_format_link').hide();
    jQuery('#foodchow_format_audio').hide();
    jQuery('#foodchow_format_gallery').hide();
    jQuery('#foodchow_format_video').hide();
    jQuery('#foodchow_format_status').hide();
    jQuery('#foodchow_format_' + format).show();
}

function foodchow_featured_image_position() {
    jQuery('#postimagediv').insertAfter('#postdivrich').find('.inside').css('text-align', 'center');
    jQuery('#postimagediv').addClass('top');
}
function foodchow_reset_featured_image_position() {
    jQuery('#postimagediv').insertAfter('#tagsdiv-post_tag');
    jQuery('#postimagediv').removeClass('top');
}
