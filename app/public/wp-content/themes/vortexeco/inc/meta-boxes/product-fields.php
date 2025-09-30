<?php
/**
 * Product Custom Fields
 * 產品自定義欄位
 */

if (!defined('ABSPATH')) exit;

/**
 * 添加產品詳細資料 Meta Box
 */
function vortexeco_product_meta_boxes() {
    add_meta_box(
        'product_details',
        '產品詳細資料',
        'vortexeco_product_details_callback',
        'vortex_products',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'vortexeco_product_meta_boxes');

/**
 * 渲染產品欄位
 */
function vortexeco_product_details_callback($post) {
    wp_nonce_field('vortexeco_save_product', 'product_nonce');
    
    // 取得現有值
    $price = get_post_meta($post->ID, '_product_price', true);
    $features = get_post_meta($post->ID, '_product_features', true);
    $specifications = get_post_meta($post->ID, '_product_specifications', true);
    $icon = get_post_meta($post->ID, '_product_icon', true);
    $color_primary = get_post_meta($post->ID, '_product_color_primary', true);
    $color_secondary = get_post_meta($post->ID, '_product_color_secondary', true);
    $warranty = get_post_meta($post->ID, '_product_warranty', true);
    $delivery_time = get_post_meta($post->ID, '_product_delivery_time', true);
    $certification = get_post_meta($post->ID, '_product_certification', true);
    
    ?>
    <style>
        .product-fields-table { width: 100%; border-collapse: collapse; }
        .product-fields-table th { 
            width: 200px; 
            padding: 15px 10px; 
            text-align: left; 
            font-weight: 600;
            background: #f0f0f1;
        }
        .product-fields-table td { padding: 15px 10px; }
        .product-fields-table tr { border-bottom: 1px solid #e0e0e0; }
        .product-fields-table input[type="text"],
        .product-fields-table textarea { width: 100%; }
        .product-fields-table textarea { min-height: 100px; }
        .field-description { color: #666; font-size: 12px; margin-top: 5px; }
    </style>
    
    <table class="product-fields-table">
        <tr>
            <th><label for="product_icon">產品圖標</label></th>
            <td>
                <input type="text" 
                       id="product_icon" 
                       name="product_icon" 
                       value="<?php echo esc_attr($icon); ?>" 
                       placeholder="🔧 或文字圖標" 
                       class="regular-text" />
                <p class="field-description">可使用 Emoji 或文字（例如：⚙️、🔩、🦺）</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_price">價格</label></th>
            <td>
                <input type="text" 
                       id="product_price" 
                       name="product_price" 
                       value="<?php echo esc_attr($price); ?>" 
                       placeholder="請洽詢報價 或 $1,200" 
                       class="regular-text" />
                <p class="field-description">可留空或填寫「請洽詢報價」</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_warranty">保固期限</label></th>
            <td>
                <input type="text" 
                       id="product_warranty" 
                       name="product_warranty" 
                       value="<?php echo esc_attr($warranty ?: '24 個月'); ?>" 
                       class="regular-text" />
                <p class="field-description">例如：24 個月、2 年、終身保固</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_delivery_time">交貨時間</label></th>
            <td>
                <input type="text" 
                       id="product_delivery_time" 
                       name="product_delivery_time" 
                       value="<?php echo esc_attr($delivery_time ?: '2-4 週'); ?>" 
                       class="regular-text" />
                <p class="field-description">例如：2-4 週、現貨供應</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_certification">認證資訊</label></th>
            <td>
                <input type="text" 
                       id="product_certification" 
                       name="product_certification" 
                       value="<?php echo esc_attr($certification ?: 'CE/ISO'); ?>" 
                       class="regular-text" />
                <p class="field-description">例如：CE/ISO、DNV-GL、IEC 認證</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_features">主要特色</label></th>
            <td>
                <textarea id="product_features" 
                          name="product_features" 
                          rows="6"><?php echo esc_textarea($features); ?></textarea>
                <p class="field-description">每行一個特色，例如：<br>
                ✓ 原廠品質保證<br>
                ✓ 24/7 技術支援<br>
                ✓ 快速交貨</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_specifications">技術規格</label></th>
            <td>
                <textarea id="product_specifications" 
                          name="product_specifications" 
                          rows="6"><?php echo esc_textarea($specifications); ?></textarea>
                <p class="field-description">詳細的技術規格說明</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_color_primary">主要顏色</label></th>
            <td>
                <input type="color" 
                       id="product_color_primary" 
                       name="product_color_primary" 
                       value="<?php echo esc_attr($color_primary ?: '#1263A0'); ?>" />
                <p class="field-description">用於產品卡片的主要色調</p>
            </td>
        </tr>
        
        <tr>
            <th><label for="product_color_secondary">次要顏色</label></th>
            <td>
                <input type="color" 
                       id="product_color_secondary" 
                       name="product_color_secondary" 
                       value="<?php echo esc_attr($color_secondary ?: '#00A8E6'); ?>" />
                <p class="field-description">用於漸層或強調效果</p>
            </td>
        </tr>
    </table>
    
    <p style="margin-top: 20px; padding: 15px; background: #f0f8ff; border-left: 4px solid #0073aa;">
        <strong>💡 提示：</strong>特色圖片會顯示為產品縮圖，建議尺寸 800x600px
    </p>
    <?php
}

/**
 * 儲存產品 Meta 資料
 */
function vortexeco_save_product_meta($post_id) {
    // 安全檢查
    if (!isset($_POST['product_nonce']) || 
        !wp_verify_nonce($_POST['product_nonce'], 'vortexeco_save_product')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // 要儲存的欄位
    $fields = array(
        'product_price'         => 'text',
        'product_features'      => 'textarea',
        'product_specifications'=> 'textarea',
        'product_icon'          => 'text',
        'product_color_primary' => 'color',
        'product_color_secondary' => 'color',
        'product_warranty'      => 'text',
        'product_delivery_time' => 'text',
        'product_certification' => 'text'
    );
    
    foreach ($fields as $field => $type) {
        if (isset($_POST[$field])) {
            $value = $_POST[$field];
            
            // 根據類型淨化資料
            switch ($type) {
                case 'color':
                    $value = sanitize_hex_color($value);
                    break;
                case 'textarea':
                    $value = sanitize_textarea_field($value);
                    break;
                default:
                    $value = sanitize_text_field($value);
            }
            
            update_post_meta($post_id, '_' . $field, $value);
        }
    }
}
add_action('save_post', 'vortexeco_save_product_meta');