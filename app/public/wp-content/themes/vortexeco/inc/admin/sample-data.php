<?php
/**
 * Sample Data Generator
 * 範例數據生成器
 */

if (!defined('ABSPATH')) exit;

/**
 * 範例數據管理頁面
 */
function vortexeco_sample_data_page() {
    // 處理產品生成
    if (isset($_POST['create_sample_products']) && check_admin_referer('sample_data_action', 'sample_data_nonce')) {
        $result = vortexeco_create_sample_products();
        echo '<div class="notice notice-success"><p>✅ 已建立 ' . $result . ' 件範例產品！</p></div>';
    }
    
    // 處理文章生成
    if (isset($_POST['create_sample_insights']) && check_admin_referer('sample_data_action', 'sample_data_nonce')) {
        $result = vortexeco_create_sample_insights();
        echo '<div class="notice notice-success"><p>✅ 已建立 ' . $result . ' 篇範例文章！</p></div>';
    }
    
    // 處理清除數據
    if (isset($_POST['delete_all_products']) && check_admin_referer('sample_data_action', 'sample_data_nonce')) {
        $deleted = vortexeco_delete_all_products();
        echo '<div class="notice notice-warning"><p>🗑️ 已刪除 ' . $deleted . ' 件產品！</p></div>';
    }
    
    ?>
    <div class="wrap">
        <h1>範例資料管理</h1>
        <p>快速生成範例資料用於測試和展示，或清除所有測試資料。</p>
        
        <div class="sample-data-cards">
            <!-- 產品範例數據 -->
            <div class="card">
                <h2>🔧 產品範例數據</h2>
                <p>生成 4 件範例產品，包含不同分類和品牌。</p>
                
                <form method="post" style="display: inline;">
                    <?php wp_nonce_field('sample_data_action', 'sample_data_nonce'); ?>
                    <input type="submit" name="create_sample_products" value="生成範例產品" class="button button-primary" />
                </form>
                
                <form method="post" style="display: inline;" onsubmit="return confirm('確定要刪除所有產品嗎？此操作無法復原！');">
                    <?php wp_nonce_field('sample_data_action', 'sample_data_nonce'); ?>
                    <input type="submit" name="delete_all_products" value="刪除所有產品" class="button button-secondary" />
                </form>
                
                <h3>範例產品包含：</h3>
                <ul>
                    <li>Vestas 渦輪機組件</li>
                    <li>Siemens 渦輪機組件</li>
                    <li>個人防護裝備</li>
                    <li>葉片維修材料</li>
                </ul>
            </div>
            
            <!-- 文章範例數據 -->
            <div class="card">
                <h2>📝 市場洞察範例數據</h2>
                <p>生成 5 篇範例文章，涵蓋不同類別。</p>
                
                <form method="post">
                    <?php wp_nonce_field('sample_data_action', 'sample_data_nonce'); ?>
                    <input type="submit" name="create_sample_insights" value="生成範例文章" class="button button-primary" />
                </form>
                
                <h3>範例文章包含：</h3>
                <ul>
                    <li>市場分析</li>
                    <li>技術創新</li>
                    <li>政策法規</li>
                    <li>產業新聞</li>
                </ul>
            </div>
            
            <!-- 當前數據統計 -->
            <div class="card">
                <h2>📊 當前數據統計</h2>
                <?php
                $product_count = wp_count_posts('vortex_products')->publish;
                $insight_count = wp_count_posts('insight_articles')->publish;
                ?>
                <table class="widefat">
                    <tr>
                        <td><strong>產品數量：</strong></td>
                        <td><?php echo $product_count; ?> 件</td>
                    </tr>
                    <tr>
                        <td><strong>文章數量：</strong></td>
                        <td><?php echo $insight_count; ?> 篇</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <style>
        .sample-data-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 20px; margin-top: 20px; }
        .sample-data-cards .card { padding: 20px; }
        .sample-data-cards h2 { margin-top: 0; }
        .sample-data-cards ul { margin: 15px 0; padding-left: 20px; }
    </style>
    <?php
}

/**
 * 生成範例產品
 */
function vortexeco_create_sample_products() {
    $sample_products = array(
        array(
            'title' => 'Vestas 渦輪機組件',
            'content' => '專業的 Vestas 風力發電機維修零件，確保設備最佳性能並延長渦輪機使用壽命。高品質組件，專為最大可靠性而設計。',
            'excerpt' => '專業 Vestas 渦輪機維修和保養零件',
            'category' => 'turbine-parts',
            'brand' => 'vestas',
            'icon' => '⚙️',
            'color_primary' => '#1263A0',
            'features' => "維修零件\n維護支援\n原廠品質\n24/7 技術支援",
            'price' => '請洽詢報價',
        ),
        array(
            'title' => 'Siemens 渦輪機組件',
            'content' => '高品質 Siemens 渦輪機系統零件，提供全面的技術支援服務。原廠 OEM 零件，確保最佳性能。',
            'excerpt' => '高品質 Siemens 渦輪機系統零件',
            'category' => 'turbine-parts',
            'brand' => 'siemens',
            'icon' => '🔩',
            'color_primary' => '#00A8E6',
            'features' => "OEM 零件\n技術支援\n品質保證\n快速交貨",
            'price' => '請洽詢報價',
        ),
        array(
            'title' => '個人防護裝備',
            'content' => '專為風力發電機作業設計的完整安全裝備。通過產業認證，經測試確保最大保護。',
            'excerpt' => '專業風力發電機安全裝備',
            'category' => 'ppe',
            'brand' => 'others',
            'icon' => '🦺',
            'color_primary' => '#059669',
            'features' => "安全帽\n安全背帶\n防護手套\n安全靴",
            'price' => '從 $50 起',
        ),
        array(
            'title' => '葉片維修材料',
            'content' => '專業葉片維修材料，包括玻璃纖維、樹脂和結構粘合劑。完整葉片維護所需的一切。',
            'excerpt' => '完整的葉片維修和保養材料',
            'category' => 'blade-materials',
            'brand' => 'others',
            'icon' => '🔧',
            'color_primary' => '#7C3AED',
            'features' => "玻璃纖維布\n環氧樹脂\n結構粘合劑\n維修套件",
            'price' => '請洽詢報價',
        )
    );
    
    $created_count = 0;
    foreach ($sample_products as $product) {
        $existing = get_page_by_title($product['title'], OBJECT, 'vortex_products');
        if ($existing) continue;
        
        $product_id = wp_insert_post(array(
            'post_title' => $product['title'],
            'post_content' => $product['content'],
            'post_excerpt' => $product['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'vortex_products'
        ));
        
        if ($product_id && !is_wp_error($product_id)) {
            // 設定分類和品牌
            $category_term = get_term_by('slug', $product['category'], 'product_category');
            if ($category_term) wp_set_object_terms($product_id, $category_term->term_id, 'product_category');
            
            $brand_term = get_term_by('slug', $product['brand'], 'product_brand');
            if ($brand_term) wp_set_object_terms($product_id, $brand_term->term_id, 'product_brand');
            
            // 設定自定義欄位
            update_post_meta($product_id, '_product_icon', $product['icon']);
            update_post_meta($product_id, '_product_color_primary', $product['color_primary']);
            update_post_meta($product_id, '_product_features', $product['features']);
            update_post_meta($product_id, '_product_price', $product['price']);
            update_post_meta($product_id, '_product_warranty', '24 個月');
            update_post_meta($product_id, '_product_delivery_time', '2-4 週');
            update_post_meta($product_id, '_product_certification', 'CE/ISO');
            
            $created_count++;
        }
    }
    
    return $created_count;
}

/**
 * 生成範例文章
 */
function vortexeco_create_sample_insights() {
    $sample_articles = array(
        array(
            'title' => '2024全球風能市場發展趨勢',
            'content' => '2024年全球風能市場持續展現強勁增長，陸上和海上風電領域都取得了重大發展...',
            'excerpt' => '深入分析全球風能產業最新發展動態',
            'category' => 'market-analysis',
            'featured' => true,
            'read_time' => 8,
        ),
        array(
            'title' => '新一代海上風電葉片設計突破',
            'content' => '革命性的複合材料正在改變風力發電機葉片製造...',
            'excerpt' => '最新複合材料技術使風電葉片效率提高15%',
            'category' => 'technology',
            'featured' => false,
            'read_time' => 6,
        ),
        // 更多文章...
    );
    
    $created_count = 0;
    foreach ($sample_articles as $article) {
        $existing = get_page_by_title($article['title'], OBJECT, 'insight_articles');
        if ($existing) continue;
        
        $article_id = wp_insert_post(array(
            'post_title' => $article['title'],
            'post_content' => $article['content'],
            'post_excerpt' => $article['excerpt'],
            'post_status' => 'publish',
            'post_type' => 'insight_articles',
        ));
        
        if ($article_id && !is_wp_error($article_id)) {
            $category_term = get_term_by('slug', $article['category'], 'insight_category');
            if ($category_term) wp_set_object_terms($article_id, $category_term->term_id, 'insight_category');
            
            update_post_meta($article_id, '_read_time', $article['read_time']);
            update_post_meta($article_id, '_author_name', 'VortexEco 團隊');
            if ($article['featured']) update_post_meta($article_id, '_featured_article', '1');
            
            $created_count++;
        }
    }
    
    return $created_count;
}

/**
 * 刪除所有產品
 */
function vortexeco_delete_all_products() {
    $products = get_posts(array(
        'post_type' => 'vortex_products',
        'posts_per_page' => -1,
        'post_status' => 'any'
    ));
    
    $deleted_count = 0;
    foreach ($products as $product) {
        wp_delete_post($product->ID, true);
        $deleted_count++;
    }
    
    return $deleted_count;
}