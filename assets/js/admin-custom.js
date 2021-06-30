jQuery(document).ready(function() {

    jQuery('#modals').click(function() {
        alert(jQuery(this).attr("data-id"));
    });
});