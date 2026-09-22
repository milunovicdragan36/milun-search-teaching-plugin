function hideTitleFunction(element, title) {

    jQuery.ajax({
        type: "POST",
        url: ajax_object.ajax_url,

        data: {
            action: "select_visibility_title",
            visibility_title: title,
            post_id: ajax_object.post_id,
            nonce: ajax_object.nonce
        },

        success: function(msg) {
            console.log('Saved:', title);

                window.location.reload();

        },

        error: function(xhr, status, error) {
            console.log('AJAX error:', error);
        }
    });
}