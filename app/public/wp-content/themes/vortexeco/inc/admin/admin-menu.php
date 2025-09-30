<?php
/**
 * Admin Menu
 * VortexEco 管理員面板
 */

if (!defined('ABSPATH')) exit;

/**
 * 註冊管理員選單
 */
function vortexeco_admin_menu() {
    // 主選單
    add_menu_page(
        'VortexEco 管理中心',
        'VortexEco',
        'manage_options',
        'vortexeco-manager',
        'vortexeco_admin_dashboard',
        'dashicons-admin-tools',
        3
    );
    
    // 快速新增產品
    add_submenu_page(
        'vortexeco-manager',
        '快速新增產品',
        '快速新增產品',
        'manage_options',
        'vortexeco-quick-add',
        'vortexeco_quick_add_product'
    );
    
    // 範例資料生成器
    add_submenu_page(
        'vortexeco-manager',
        '範例資料',
        '範例資料',
        'manage_options',
        'vortexeco-sample-data',
        'vortexeco_sample_data_page'
    );
}
add_action('admin_menu', 'vortexeco_admin_menu');

/**
 * 管理員儀表板
 */
function vortexeco_admin_dashboard() {
    ?>
    <div class="wrap">
        <h1>🌊 VortexEco 內容管理中心</h1>
        
        <div class="vortexeco-dashboard">
            <div class="dashboard-cards">
                <!-- 統計卡片 -->
                <div class="dashboard-card">
                    <h2>📊 內容統計</h2>
                    <table class="widefat">
                        <tbody>
                            <?php
                            $product_count = wp_count_posts('vortex_products')->publish;
                            $insight_count = wp_count_posts('insight_articles')->publish;
                            $service_count = wp_count_posts('services')->publish;
                            $project_count = wp_count_posts('projects')->publish;
                            ?>
                            <tr>
                                <td><strong>產品：</strong></td>
                                <td><?php echo $product_count; ?> 件</td>
                                <td><a href="<?php echo admin_url('edit.php?post_type=vortex_products'); ?>" class="button">管理</a></td>
                            </tr>
                            <tr>
                                <td><strong>市場洞察：</strong></td>
                                <td><?php echo $insight_count; ?> 篇</td>
                                <td><a href="<?php echo admin_url('edit.php?post_type=insight_articles'); ?>" class="button">管理</a></td>
                            </tr>
                            <tr>
                                <td><strong>服務：</strong></td>
                                <td><?php echo $service_count; ?> 項</td>
                                <td><a href="<?php echo admin_url('edit.php?post_type=services'); ?>" class="button">管理</a></td>
                            </tr>
                            <tr>
                                <td><strong>項目：</strong></td>
                                <td><?php echo $project_count; ?> 個</td>
                                <td><a href="<?php echo admin_url('edit.php?post_type=projects'); ?>" class="button">管理</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- 快速操作 -->
                <div class="dashboard-card">
                    <h2>⚡ 快速操作</h2>
                    <div class="quick-actions">
                        <a href="<?php echo admin_url('post-new.php?post_type=vortex_products'); ?>" 
                           class="button button-primary button-large">➕ 新增產品</a>
                        <a href="<?php echo admin_url('post-new.php?post_type=insight_articles'); ?>" 
                           class="button button-primary button-large">📝 新增文章</a>
                        <a href="<?php echo admin_url('post-new.php?post_type=services'); ?>" 
                           class="button button-primary button-large">🔧 新增服務</a>
                        <a href="<?php echo admin_url('customize.php'); ?>" 
                           class="button button-large">🎨 自訂主題</a>
                    </div>
                </div>
                
                <!-- 系統資訊 -->
                <div class="dashboard-card">
                    <h2>ℹ️ 系統資訊</h2>
                    <table class="widefat">
                        <tbody>
                            <tr>
                                <td><strong>主題版本：</strong></td>
                                <td>VortexEco 2.0</td>
                            </tr>
                            <tr>
                                <td><strong>WordPress 版本：</strong></td>
                                <td><?php echo get_bloginfo('version'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>PHP 版本：</strong></td>
                                <td><?php echo phpversion(); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .vortexeco-dashboard { padding: 20px 0; }
        .dashboard-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 20px; }
        .dashboard-card { background: white; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); }
        .dashboard-card h2 { margin-top: 0; font-size: 18px; border-bottom: 1px solid #e0e0e0; padding-bottom: 10px; }
        .dashboard-card table td { padding: 12px 10px; }
        .quick-actions { display: flex; flex-direction: column; gap: 10px; }
        .quick-actions .button { justify-content: center; text-align: center; }
    </style>
    <?php
}

/**
 * 快速新增產品頁面
 */
function vortexeco_quick_add_product() {
    // 處理表單提交
    if (isset($_POST['submit_product']) && check_admin_referer('quick_add_product', 'quick_add_nonce')) {
        $product_data = array(
            'post_title'   => sanitize_text_field($_POST['product_title']),
            'post_content' => wp_kses_post($_POST['product_description']),
            'post_excerpt' => sanitize_text_field($_POST['product_excerpt']),
            'post_status'  => 'publish',
            'post_type'    => 'vortex_products'
        );
        
        $product_id = wp_insert_post($product_data);
        
        if ($product_id && !is_wp_error($product_id)) {
            // 儲存分類
            if (!empty($_POST['product_category'])) {
                wp_set_object_terms($product_id, intval($_POST['product_category']), 'product_category');
            }
            
            // 儲存品牌
            if (!empty($_POST['product_brand'])) {
                wp_set_object_terms($product_id, intval($_POST['product_brand']), 'product_brand');
            }
            
            // 儲存自定義欄位
            update_post_meta($product_id, '_product_price', sanitize_text_field($_POST['product_price']));
            update_post_meta($product_id, '_product_features', sanitize_textarea_field($_POST['product_features']));
            update_post_meta($product_id, '_product_icon', sanitize_text_field($_POST['product_icon']));
            update_post_meta($product_id, '_product_color_primary', sanitize_hex_color($_POST['product_color_primary']));
            
            echo '<div class="notice notice-success"><p>✅ 產品已成功建立！<a href="' . get_edit_post_link($product_id) . '">編輯產品</a> | <a href="' . get_permalink($product_id) . '" target="_blank">查看產品</a></p></div>';
        } else {
            echo '<div class="notice notice-error"><p>❌ 建立產品時發生錯誤</p></div>';
        }
    }
    
    // 取得分類和品牌
    $categories = get_terms(array('taxonomy' => 'product_category', 'hide_empty' => false));
    $brands = get_terms(array('taxonomy' => 'product_brand', 'hide_empty' => false));
    ?>
    
    <div class="wrap">
        <h1>快速新增產品</h1>
        <p>快速建立新產品，稍後可在產品編輯頁面完善更多細節。</p>
        
        <form method="post" class="vortexeco-quick-form">
            <?php wp_nonce_field('quick_add_product', 'quick_add_nonce'); ?>
            
            <table class="form-table">
                <tr>
                    <th><label for="product_title">產品名稱 *</label></th>
                    <td><input type="text" id="product_title" name="product_title" required class="regular-text" /></td>
                </tr>
                <tr>
                    <th><label for="product_excerpt">簡短描述</label></th>
                    <td><input type="text" id="product_excerpt" name="product_excerpt" class="large-text" /></td>
                </tr>
                <tr>
                    <th><label for="product_description">完整描述</label></th>
                    <td><textarea id="product_description" name="product_description" rows="5" class="large-text"></textarea></td>
                </tr>
                <tr>
                    <th><label for="product_category">分類</label></th>
                    <td>
                        <select id="product_category" name="product_category">
                            <option value="">選擇分類</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="product_brand">品牌</label></th>
                    <td>
                        <select id="product_brand" name="product_brand">
                            <option value="">選擇品牌</option>
                            <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand->term_id; ?>"><?php echo $brand->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="product_icon">產品圖標</label></th>
                    <td><input type="text" id="product_icon" name="product_icon" placeholder="🔧" /></td>
                </tr>
                <tr>
                    <th><label for="product_color_primary">主要顏色</label></th>
                    <td><input type="color" id="product_color_primary" name="product_color_primary" value="#1263A0" /></td>
                </tr>
                <tr>
                    <th><label for="product_price">價格</label></th>
                    <td><input type="text" id="product_price" name="product_price" placeholder="請洽詢報價" /></td>
                </tr>
                <tr>
                    <th><label for="product_features">主要特色</label></th>
                    <td>
                        <textarea id="product_features" name="product_features" rows="4" class="large-text"></textarea>
                        <p class="description">每行一個特色</p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('建立產品', 'primary', 'submit_product'); ?>
        </form>
    </div>
    <?php
}