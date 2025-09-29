<?php
/**
 * Archive Template for Services (ENHANCED - Peak Ocean Style)
 * 
 * @package VortexEco
 */

get_header(); 

// Get all services
$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC'
));
?>

<!-- Services Hero -->
<section style="
    padding: 10rem 0 6rem;
    background: linear-gradient(135deg, #0F5287 0%, #1263A0 100%);
    color: white;
    position: relative;
    overflow: hidden;
    margin-top: 80px;
">
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 80%, rgba(0, 168, 230, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        opacity: 0.6;
    "></div>
    
    <div class="container" style="position: relative; z-index: 2; max-width: 1200px; margin: 0 auto; padding: 0 2rem; text-align: center;">
        <h1 style="
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        ">Professional Wind Energy Services</h1>
        
        <p style="
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto 3rem;
        ">
            VORTEXECO provides comprehensive wind energy project management services, covering the complete lifecycle from development to operations.
        </p>
        
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
            <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                background: rgba(255, 255, 255, 0.95);
                color: #1263A0;
                border: none;
                padding: 1.2rem 2.5rem;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">Get Started</button>
            
            <button onclick="document.querySelector('#services-list').scrollIntoView({behavior: 'smooth'})" style="
                background: transparent;
                color: white;
                border: 2px solid rgba(255, 255, 255, 0.5);
                padding: 1.2rem 2.5rem;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">Explore Services</button>
        </div>
    </div>
</section>

<!-- Services List -->
<section id="services-list" style="padding: 6rem 0; background: #FFFFFF;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
        
        <?php if ($services_query->have_posts()): ?>
            <?php 
            $service_count = 0;
            while ($services_query->have_posts()): 
                $services_query->the_post(); 
                $service_count++;
                $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                $subtitle = get_post_meta(get_the_ID(), '_service_subtitle', true);
                $highlight = get_post_meta(get_the_ID(), '_service_highlight', true);
                $features = get_post_meta(get_the_ID(), '_service_features', true);
                $image_1 = get_post_meta(get_the_ID(), '_service_image_1', true);
                $image_2 = get_post_meta(get_the_ID(), '_service_image_2', true);
                $features_array = $features ? array_filter(explode("\n", $features)) : array();
                
                // Alternate layout direction
                $is_reverse = $service_count % 2 == 0;
            ?>
            
            <!-- Service Section -->
            <div style="
                margin-bottom: 8rem;
                padding-bottom: 6rem;
                <?php if ($service_count < $services_query->post_count): ?>
                border-bottom: 1px solid #E5E7EB;
                <?php endif; ?>
            ">
                <!-- Header -->
                <div style="text-align: center; margin-bottom: 4rem;">
                    <?php if ($icon): ?>
                    <div style="font-size: 3.5rem; margin-bottom: 1rem;">
                        <?php echo esc_html($icon); ?>
                    </div>
                    <?php endif; ?>
                    
                    <h2 style="
                        font-size: 2.5rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.75rem;
                        line-height: 1.2;
                    "><?php the_title(); ?></h2>
                    
                    <?php if ($subtitle): ?>
                    <p style="
                        font-size: 1.3rem;
                        color: #1263A0;
                        font-weight: 600;
                        margin-bottom: 1.5rem;
                    "><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>
                    
                    <?php if ($highlight): ?>
                    <p style="
                        font-size: 1.1rem;
                        color: #6B7280;
                        line-height: 1.8;
                        max-width: 800px;
                        margin: 0 auto;
                    "><?php echo esc_html($highlight); ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Content with Images -->
                <div style="
                    display: grid;
                    grid-template-columns: <?php echo $is_reverse ? '1fr 1fr' : '1fr 1fr'; ?>;
                    gap: 4rem;
                    align-items: center;
                    margin-bottom: 3rem;
                ">
                    <!-- Text Content -->
                    <div style="order: <?php echo $is_reverse ? '2' : '1'; ?>;">
                        <div style="
                            font-size: 1.1rem;
                            color: #4B5563;
                            line-height: 1.8;
                            margin-bottom: 2rem;
                        ">
                            <?php 
                            $content = get_the_content();
                            $paragraphs = explode("\n\n", $content);
                            echo wpautop(implode("\n\n", array_slice($paragraphs, 0, 2)));
                            ?>
                        </div>
                        
                        <?php if (!empty($features_array)): ?>
                        <div style="
                            background: #F9FAFB;
                            border-left: 4px solid #1263A0;
                            padding: 1.5rem;
                            border-radius: 0 8px 8px 0;
                        ">
                            <h4 style="
                                font-size: 1.1rem;
                                font-weight: 600;
                                color: #1F2937;
                                margin-bottom: 1rem;
                            ">Key Capabilities:</h4>
                            <ul style="
                                list-style: none;
                                padding: 0;
                                margin: 0;
                                display: grid;
                                gap: 0.75rem;
                            ">
                                <?php foreach (array_slice($features_array, 0, 4) as $feature): ?>
                                <li style="
                                    padding-left: 1.5rem;
                                    position: relative;
                                    color: #4B5563;
                                    font-size: 1rem;
                                ">
                                    <span style="
                                        position: absolute;
                                        left: 0;
                                        color: #1263A0;
                                        font-weight: 700;
                                    ">✓</span>
                                    <?php echo esc_html(trim($feature)); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Image -->
                    <div style="order: <?php echo $is_reverse ? '1' : '2'; ?>;">
                        <?php if ($image_1): ?>
                        <div style="
                            border-radius: 16px;
                            overflow: hidden;
                            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
                        ">
                            <img src="<?php echo esc_url($image_1); ?>" 
                                 alt="<?php the_title(); ?>" 
                                 style="width: 100%; height: auto; display: block;" />
                        </div>
                        <?php else: ?>
                        <div style="
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            border-radius: 16px;
                            padding: 4rem;
                            text-align: center;
                            color: white;
                            font-size: 4rem;
                        ">
                            <?php echo $icon ?: '⚙️'; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Additional Content -->
                <?php if (str_word_count(get_the_content()) > 150): ?>
                <div style="
                    background: #F9FAFB;
                    border-radius: 12px;
                    padding: 3rem;
                    margin-top: 3rem;
                ">
                    <div style="
                        display: grid;
                        grid-template-columns: <?php echo $image_2 ? '1fr 400px' : '1fr'; ?>;
                        gap: 3rem;
                        align-items: center;
                    ">
                        <div style="
                            font-size: 1.05rem;
                            color: #4B5563;
                            line-height: 1.8;
                        ">
                            <?php 
                            $remaining = array_slice($paragraphs, 2);
                            if (!empty($remaining)) {
                                echo wpautop(implode("\n\n", $remaining));
                            }
                            ?>
                        </div>
                        
                        <?php if ($image_2): ?>
                        <div style="border-radius: 12px; overflow: hidden;">
                            <img src="<?php echo esc_url($image_2); ?>" 
                                 alt="<?php the_title(); ?>" 
                                 style="width: 100%; height: auto; display: block;" />
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- All Features -->
                <?php if (count($features_array) > 4): ?>
                <div style="margin-top: 3rem;">
                    <h4 style="
                        font-size: 1.3rem;
                        font-weight: 600;
                        color: #1F2937;
                        margin-bottom: 1.5rem;
                        text-align: center;
                    ">Complete Service Scope</h4>
                    
                    <div style="
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                        gap: 1.5rem;
                    ">
                        <?php foreach ($features_array as $feature): ?>
                        <div style="
                            background: #FFFFFF;
                            border: 1px solid #E5E7EB;
                            border-radius: 8px;
                            padding: 1.25rem;
                            display: flex;
                            align-items: center;
                            gap: 1rem;
                        ">
                            <span style="
                                color: #1263A0;
                                font-size: 1.5rem;
                                font-weight: 700;
                            ">✓</span>
                            <span style="color: #4B5563; font-size: 0.95rem;">
                                <?php echo esc_html(trim($feature)); ?>
                            </span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <?php endwhile; wp_reset_postdata(); ?>
            
        <?php else: ?>
            <!-- Default Services if none exist -->
            <div style="text-align: center; padding: 4rem 0;">
                <h3 style="font-size: 2rem; color: #1F2937; margin-bottom: 1rem;">
                    Services Coming Soon
                </h3>
                <p style="font-size: 1.1rem; color: #6B7280;">
                    We're preparing detailed service information. Please contact us for more details.
                </p>
                <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                    margin-top: 2rem;
                    background: #1263A0;
                    color: white;
                    border: none;
                    padding: 1rem 2rem;
                    border-radius: 8px;
                    font-size: 1rem;
                    font-weight: 600;
                    cursor: pointer;
                ">Contact Us</button>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section style="
    padding: 6rem 0;
    background: linear-gradient(135deg, #1263A0, #00A8E6);
    color: white;
    text-align: center;
">
    <div class="container" style="max-width: 900px; margin: 0 auto; padding: 0 2rem;">
        <h2 style="
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.3;
        ">Ready to Discuss Your Project?</h2>
        
        <p style="
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 3rem;
            line-height: 1.8;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        ">
            Contact our team to learn how we can support your wind energy goals. We provide tailored solutions for projects of all scales.
        </p>
        
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
            <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                background: rgba(255, 255, 255, 0.95);
                color: #1263A0;
                border: none;
                padding: 1.2rem 3rem;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">Contact Us Now</button>
            
            <button onclick="window.location.href='<?php echo home_url('/products/'); ?>'" style="
                background: transparent;
                color: white;
                border: 2px solid rgba(255, 255, 255, 0.7);
                padding: 1.2rem 3rem;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">View Products</button>
        </div>
    </div>
</section>

<style>
@media (max-width: 1024px) {
    section > div > div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
    }
    
    section > div > div > div[style*="order"] {
        order: 1 !important;
    }
}

@media (max-width: 768px) {
    h1 {
        font-size: 2rem !important;
    }
    
    h2 {
        font-size: 1.75rem !important;
    }
    
    p {
        font-size: 1rem !important;
    }
}
</style>

<?php get_footer(); ?>