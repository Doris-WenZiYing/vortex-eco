<?php
/**
 * Template Name: Product Detail (FIXED)
 * 
 * @package VortexEco
 */

get_header(); 

// Get product ID from URL - FIXED VERSION
$product_id = isset($_GET['product']) ? intval($_GET['product']) : get_query_var('product', 0);

if (!$product_id) {
    echo '<div style="padding: 4rem 2rem; text-align: center; margin-top: 80px;">';
    echo '<h1>Product Not Found</h1>';
    echo '<p>Sorry, the product you are looking for does not exist.</p>';
    echo '<a href="' . home_url('/products/') . '" style="color: #1263A0;">← Back to Products</a>';
    echo '</div>';
    get_footer();
    exit;
}

// Get product from database
$product = get_post($product_id);

if (!$product || $product->post_type !== 'vortex_products') {
    echo '<div style="padding: 4rem 2rem; text-align: center; margin-top: 80px;">';
    echo '<h1>Product Not Found</h1>';
    echo '<p>Sorry, the product you are looking for does not exist.</p>';
    echo '<a href="' . home_url('/products/') . '" style="color: #1263A0;">← Back to Products</a>';
    echo '</div>';
    get_footer();
    exit;
}

// Get product data
$categories = get_the_terms($product->ID, 'product_category');
$brands = get_the_terms($product->ID, 'product_brand');
$features = get_post_meta($product->ID, '_product_features', true);
$price = get_post_meta($product->ID, '_product_price', true);
$icon = get_post_meta($product->ID, '_product_icon', true);
$primary_color = get_post_meta($product->ID, '_product_color_primary', true) ?: '#1263A0';
$secondary_color = get_post_meta($product->ID, '_product_color_secondary', true) ?: '#00A8E6';
$warranty = get_post_meta($product->ID, '_product_warranty', true) ?: '24 months';
$delivery_time = get_post_meta($product->ID, '_product_delivery_time', true) ?: '2-4 weeks';
$certification = get_post_meta($product->ID, '_product_certification', true) ?: 'CE/ISO';

$brand_name = !empty($brands) ? $brands[0]->name : 'VortexEco';
$category_name = !empty($categories) ? $categories[0]->name : 'Products';
$features_array = $features ? array_filter(explode("\n", $features)) : array();
?>

<!-- Product Header -->
<section style="padding: 6rem 0 2rem; background: linear-gradient(135deg, <?php echo $primary_color; ?>, <?php echo $secondary_color; ?>); color: white; position: relative; overflow: hidden; margin-top: 80px;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 25% 75%, rgba(0, 168, 230, 0.3) 0%, transparent 50%); opacity: 0.6;"></div>
    
    <div class="container" style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
        <nav style="margin-bottom: 2rem;">
            <ol style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255, 255, 255, 0.8); font-size: 0.9rem; list-style: none; margin: 0; padding: 0;">
                <li><a href="<?php echo home_url('/'); ?>" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">Home</a></li>
                <li>/</li>
                <li><a href="<?php echo home_url('/products/'); ?>" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">Products</a></li>
                <li>/</li>
                <li><span style="color: white; font-weight: 500;"><?php echo esc_html($product->post_title); ?></span></li>
            </ol>
        </nav>
        
        <div style="display: grid; grid-template-columns: 1fr 400px; gap: 3rem; align-items: center;">
            <div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <span style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;"><?php echo esc_html($brand_name); ?></span>
                    <span style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;"><?php echo esc_html($category_name); ?></span>
                </div>
                
                <h1 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; margin-bottom: 1rem; line-height: 1.2;">
                    <?php echo esc_html($product->post_title); ?>
                </h1>
                
                <p style="font-size: 1.2rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem; line-height: 1.6;">
                    <?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words($product->post_content, 30); ?>
                </p>
                
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="background: rgba(255, 255, 255, 0.9); color: <?php echo $primary_color; ?>; border: none; padding: 1rem 2rem; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer;">
                        Request Quote
                    </button>
                    <button onclick="window.history.back()" style="background: transparent; color: white; border: 2px solid rgba(255, 255, 255, 0.5); padding: 1rem 2rem; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer;">
                        Back to List
                    </button>
                </div>
            </div>
            
            <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); border-radius: 16px; padding: 2rem; border: 1px solid rgba(255, 255, 255, 0.2);">
                <div style="font-size: 4rem; text-align: center; margin-bottom: 1rem; color: rgba(255, 255, 255, 0.8);">
                    <?php echo $icon ?: '🔧'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Content -->
<section style="padding: 4rem 0; background: #F8FAFB;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
        <div style="background: #FFFFFF; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 3rem; border: 1px solid #E5E7EB;">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem;">
                <div>
                    <h2 style="font-size: 2rem; font-weight: 700; color: #1F2937; margin-bottom: 1rem;">Product Description</h2>
                    <div style="color: #6B7280; line-height: 1.8; font-size: 1.05rem;">
                        <?php echo wpautop($product->post_content); ?>
                    </div>
                    
                    <?php if (!empty($features_array)): ?>
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #1F2937; margin: 2rem 0 1rem;">Key Features</h3>
                    <ul style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; list-style: none; padding: 0;">
                        <?php foreach ($features_array as $feature): ?>
                        <li style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; background: #F8FAFB; border-radius: 8px;">
                            <span style="color: <?php echo $primary_color; ?>; font-weight: 700; font-size: 1.2rem;">✓</span>
                            <span style="color: #4B5563;"><?php echo esc_html(trim($feature)); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                
                <div style="background: #F9FAFB; border-radius: 12px; padding: 2rem; border: 1px solid #E5E7EB; height: fit-content; position: sticky; top: 120px;">
                    <h3 style="font-size: 1.3rem; font-weight: 700; color: #1F2937; margin-bottom: 1.5rem;">Product Information</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                            <span style="color: #6B7280; font-weight: 500;">Brand</span>
                            <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($brand_name); ?></span>
                        </div>
                        
                        <?php if ($price): ?>
                        <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                            <span style="color: #6B7280; font-weight: 500;">Price</span>
                            <span style="color: <?php echo $primary_color; ?>; font-weight: 700;"><?php echo esc_html($price); ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                            <span style="color: #6B7280; font-weight: 500;">Warranty</span>
                            <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($warranty); ?></span>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                            <span style="color: #6B7280; font-weight: 500;">Delivery Time</span>
                            <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($delivery_time); ?></span>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; padding: 0.75rem 0;">
                            <span style="color: #6B7280; font-weight: 500;">Certification</span>
                            <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($certification); ?></span>
                        </div>
                    </div>
                    
                    <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="width: 100%; background: linear-gradient(135deg, <?php echo $primary_color; ?>, <?php echo $secondary_color; ?>); color: white; border: none; padding: 1rem; border-radius: 8px; font-weight: 600; cursor: pointer; margin-top: 1.5rem;">
                        Inquire Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>