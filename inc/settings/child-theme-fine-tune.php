<?php

function customize_comment_form_text_area( $args ) {
    $args['comment_field'] = '<p class="comment-form-comment"><label for="comment" class="comment-form__label">' . __( 'Comment', 'wps-prime' ) . '</label><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . __( 'Your Feedback Is Appreciated', 'wps-prime' ) . '"cols="45" rows="5" aria-required="true"></textarea></p>';
    return $args;
}

// Add CSS Class to the WordPress Search Button
function wps_search_widget_button_class( $form ) {
  $form = str_replace(
        'search-submit',
        'search-submit c-button',
        $form
    );
return $form;
}
add_filter( 'get_search_form', 'wps_search_widget_button_class' );