<?php

function rasa_blog_add_meta_boxes(){
    add_meta_box( 
        'rasa_blog_post_quote', 
        esc_html__( 'Queto Name:', 'rasa-blog' ),
        'rasa_blog_post_metabox_quote', 
        'post', 
        'side', 
        'default'
    );

}



add_action( 'add_meta_boxes', 'rasa_blog_add_meta_boxes' );


function rasa_blog_post_metabox_quote($post){
    $quote =get_post_meta( $post->ID, 'rasa_blog_post_quote', true );
    ?>
        <p>
        <label for="rasa_blog_post_quote"><?php esc_html_e( 'Who says this quote?', 'rasa-blog' ); ?></label><br>
        <input class="widefat"  name="rasa_blog_post_quote_field" id="rasa_blog_post_quote" value="<?php echo esc_attr( $quote ); ?>">
        
    </p>
    <?php
}

function rasa_blog_save_post_metabox($post_id, $post){
    if(array_key_exists('rasa_blog_post_quote_field', $_POST)){
        update_post_meta(
            $post_id, 
            'rasa_blog_post_quote', 
            $_POST['rasa_blog_post_quote_field'] 
        );
    }
}

add_action( 'save_post', 'rasa_blog_save_post_metabox' , 10, 2 );