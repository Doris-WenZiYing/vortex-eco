<?php
/**
 * Service Custom Fields
 * 服務文章的自定義欄位
 */

if (!defined('ABSPATH')) exit;

/**
 * 添加自訂欄位到服務文章
 */
function add_service_custom_fields() {
    add_meta_box(
        'service_details',
        '服務詳細資料',
        'render_service_fields',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_service_custom_fields');

/**
 * 渲染服務欄位
 */
function render_service_fields($post) {
    wp_nonce_field('save_service_fields', 'service_fields_nonce');
    
    $description = get_post_meta($post->ID, '_service_description', true);
    $bullets = get_post_meta($post->ID, '_service_bullets', true);
    $image = get_post_meta($post->ID, '_service_image', true);
    ?>
    
    <p>
        <label style="font-weight:bold;">服務描述（簡短介紹）</label><br>
        <textarea name="service_description" rows="4" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    
    <p>
        <label style="font-weight:bold;">重點項目（每行一個）</label><br>
        <textarea name="service_bullets" rows="8" style="width:100%;"><?php echo esc_textarea($bullets); ?></textarea>
        <small>每行一個項目，例如：<br>
        Offshore Wind Farms<br>
        Project Financing<br>
        Feasibility Studies</small>
    </p>
    
    <p>
        <label style="font-weight:bold;">服務圖片</label><br>
        <input type="hidden" name="service_image" id="service_image" value="<?php echo esc_attr($image); ?>">
        <button type="button" class="button upload-image-button">上傳圖片</button>
        <button type="button" class="button remove-image-button" style="display:<?php echo $image ? 'inline-block' : 'none'; ?>;">移除圖片</button>
        <div class="image-preview" style="margin-top:10px;">
            <?php if ($image): ?>
                <img src="<?php echo esc_url($image); ?>" style="max-width:300px; height:auto;">
            <?php endif; ?>
        </div>
    </p>
    
    <script>
    jQuery(document).ready(function($) {
        var frame;
        
        $('.upload-image-button').on('click', function(e) {
            e.preventDefault();
            
            if (frame) {
                frame.open();
                return;
            }
            
            frame = wp.media({
                title: '選擇圖片',
                button: { text: '使用此圖片' },
                multiple: false
            });
            
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#service_image').val(attachment.url);
                $('.image-preview').html('<img src="' + attachment.url + '" style="max-width:300px; height:auto;">');
                $('.remove-image-button').show();
            });
            
            frame.open();
        });
        
        $('.remove-image-button').on('click', function(e) {
            e.preventDefault();
            $('#service_image').val('');
            $('.image-preview').html('');
            $(this).hide();
        });
    });
    </script>
    <?php
}

/**
 * 儲存服務自定義欄位
 */
function save_service_custom_fields($post_id) {
    // 安全檢查
    if (!isset($_POST['service_fields_nonce']) || 
        !wp_verify_nonce($_POST['service_fields_nonce'], 'save_service_fields')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // 儲存欄位
    if (isset($_POST['service_description'])) {
        update_post_meta($post_id, '_service_description', sanitize_textarea_field($_POST['service_description']));
    }
    
    if (isset($_POST['service_bullets'])) {
        update_post_meta($post_id, '_service_bullets', sanitize_textarea_field($_POST['service_bullets']));
    }
    
    if (isset($_POST['service_image'])) {
        update_post_meta($post_id, '_service_image', esc_url_raw($_POST['service_image']));
    }
}
add_action('save_post', 'save_service_custom_fields');
