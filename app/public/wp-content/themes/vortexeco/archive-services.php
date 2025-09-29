<?php
/**
 * Archive Template for Services
 * 
 * @package VortexEco
 */

get_header(); 

// 獲取所有服務
$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC'
));
?>

<!-- Services Header -->
<section style="padding: 8rem 0 4rem; background: #FFFFFF; margin-top: 80px;">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 2rem;">
        <div style="text-align: center;">
            <h1 style="font-size: 3rem; font-weight: 700; color: #1F2937; margin-bottom: 1.5rem; line-height: 1.2;">
                專業服務
            </h1>
            <p style="font-size: 1.2rem; color: #6B7280; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                VORTEXECO 提供全面的風能項目管理服務，涵蓋從開發到運營的完整生命週期。
            </p>
        </div>
    </div>
</section>

<!-- Services List -->
<section style="padding: 4rem 0; background: #F9FAFB;">
    <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 2rem;">
        
        <?php if ($services_query->have_posts()): ?>
            <?php 
            $service_count = 0;
            while ($services_query->have_posts()): 
                $services_query->the_post(); 
                $service_count++;
                $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                $features = get_post_meta(get_the_ID(), '_service_features', true);
                $features_array = $features ? array_filter(explode("\n", $features)) : array();
            ?>
            
            <!-- Service Card -->
            <div style="background: #FFFFFF; border-radius: 8px; padding: 4rem 3rem; margin-bottom: 2rem; border: 1px solid #E5E7EB;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <?php if ($icon): ?>
                    <span style="font-size: 2.5rem;"><?php echo esc_html($icon); ?></span>
                    <?php endif; ?>
                    <h2 style="font-size: 2rem; font-weight: 600; color: #1F2937; margin: 0;">
                        <?php the_title(); ?>
                    </h2>
                </div>
                
                <p style="font-size: 1.1rem; color: #4B5563; line-height: 1.8; margin-bottom: 2rem;">
                    <?php 
                    if (has_excerpt()) {
                        the_excerpt();
                    } else {
                        echo wp_trim_words(get_the_content(), 50);
                    }
                    ?>
                </p>
                
                <?php if (!empty($features_array)): ?>
                <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 1rem;">
                    <?php foreach ($features_array as $feature): ?>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        <?php echo esc_html(trim($feature)); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            
            <?php endwhile; wp_reset_postdata(); ?>
        
        <?php else: ?>
            <!-- 如果沒有服務，顯示預設內容 -->
            <div style="background: #FFFFFF; border-radius: 8px; padding: 4rem 3rem; margin-bottom: 2rem; border: 1px solid #E5E7EB;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <span style="font-size: 2.5rem;">⚙</span>
                    <h2 style="font-size: 2rem; font-weight: 600; color: #1F2937; margin: 0;">
                        專案開發
                    </h2>
                </div>
                <p style="font-size: 1.1rem; color: #4B5563; line-height: 1.8; margin-bottom: 2rem;">
                    從初步場址評估到最終項目可行性研究，我們引導您的風能項目順利完成每個開發階段。
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 1rem;">
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        場址評估和風資源評估
                    </li>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        可行性研究和財務建模
                    </li>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        許可證申請和法規合規
                    </li>
                </ul>
            </div>

            <div style="background: #FFFFFF; border-radius: 8px; padding: 4rem 3rem; margin-bottom: 2rem; border: 1px solid #E5E7EB;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <span style="font-size: 2.5rem;">🔧</span>
                    <h2 style="font-size: 2rem; font-weight: 600; color: #1F2937; margin: 0;">
                        工程與建設
                    </h2>
                </div>
                <p style="font-size: 1.1rem; color: #4B5563; line-height: 1.8; margin-bottom: 2rem;">
                    我們經驗豐富的工程團隊提供全面的 EPCC 服務，確保整個建設過程的技術卓越和法規合規。
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 1rem;">
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        詳細工程設計
                    </li>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        採購和供應鏈管理
                    </li>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        施工監督和質量保證
                    </li>
                </ul>
            </div>

            <div style="background: #FFFFFF; border-radius: 8px; padding: 4rem 3rem; border: 1px solid #E5E7EB;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <span style="font-size: 2.5rem;">⚡</span>
                    <h2 style="font-size: 2rem; font-weight: 600; color: #1F2937; margin: 0;">
                        營運與維護
                    </h2>
                </div>
                <p style="font-size: 1.1rem; color: #4B5563; line-height: 1.8; margin-bottom: 2rem;">
                    通過我們全面的 O&M 解決方案，最大化資產性能和運行時間。
                </p>
                <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 1rem;">
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        預防性和糾正性維護
                    </li>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        狀態監測和診斷
                    </li>
                    <li style="padding-left: 1.5rem; position: relative; color: #4B5563; font-size: 1.05rem;">
                        <span style="position: absolute; left: 0; color: #1263A0;">•</span>
                        性能優化和升級
                    </li>
                </ul>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- CTA Section -->
<section style="padding: 6rem 0; background: #FFFFFF; text-align: center;">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 2rem;">
        <h2 style="font-size: 2.5rem; font-weight: 600; color: #1F2937; margin-bottom: 1.5rem;">
            準備好討論您的項目了嗎？
        </h2>
        <p style="font-size: 1.2rem; color: #6B7280; margin-bottom: 3rem; line-height: 1.8;">
            聯繫我們的團隊，了解我們如何支持您的風能目標。
        </p>
        <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
            background: #1263A0;
            color: white;
            border: none;
            padding: 1.2rem 3rem;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
        ">立即聯繫</button>
    </div>
</section>

<?php get_footer(); ?>