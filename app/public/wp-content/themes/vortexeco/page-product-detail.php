<?php
/**
 * Template Name: Product Detail
 * 
 * @package VortexEco
 */

// Get product from URL parameter
$product_slug = isset($_GET['product']) ? sanitize_text_field($_GET['product']) : 'vestas-turbine-components';

// Define product data
$products = [
    'vestas-turbine-components' => [
        'title' => 'Vestas Turbine Components',
        'brand' => 'Vestas',
        'category' => 'Turbine Components',
        'description' => 'Professional Vestas turbine repair and maintenance parts, ensuring optimal equipment performance and extending turbine service life',
        'features' => ['Repair Parts', 'Maintenance', 'Original Quality', 'Technical Support'],
        'color' => '#1263A0',
        'icon' => 'V'
    ],
    'siemens-turbine-components' => [
        'title' => 'Siemens Turbine Components',
        'brand' => 'Siemens',
        'category' => 'Turbine Components',
        'description' => 'High-quality Siemens turbine system parts with comprehensive technical support services',
        'features' => ['Repair Parts', 'Maintenance', 'OEM Quality', 'Expert Support'],
        'color' => '#1263A0',
        'icon' => 'S'
    ],
    'ge-turbine-components' => [
        'title' => 'GE Turbine Components',
        'brand' => 'GE',
        'category' => 'Turbine Components',
        'description' => 'Original GE turbine parts and repair services with guaranteed quality and compatibility',
        'features' => ['Repair Parts', 'Maintenance', 'Guaranteed Quality', 'Compatibility'],
        'color' => '#1263A0',
        'icon' => 'G'
    ],
    'ppe' => [
        'title' => 'Personal Protective Equipment',
        'brand' => 'Safety',
        'category' => 'Safety Equipment',
        'description' => 'High-quality safety equipment designed specifically for wind turbine operations',
        'features' => ['Hard Hats', 'Safety Gear', 'Wind Certified', 'Durable'],
        'color' => '#059669',
        'icon' => '🦺'
    ],
    'blade-materials' => [
        'title' => 'Blade Materials',
        'brand' => 'Materials',
        'category' => 'Maintenance Materials',
        'description' => 'Complete blade repair and maintenance materials including fiberglass, structural adhesives',
        'features' => ['Fiberglass', 'Epoxy Resin', 'Structural Adhesives', 'Repair Kits'],
        'color' => '#7C3AED',
        'icon' => '🔧'
    ],
    'tp-coatings' => [
        'title' => 'TP Section Coatings',
        'brand' => 'Coatings',
        'category' => 'Protective Coatings',
        'description' => 'Professional TP section coating systems including primers, topcoats and protective coatings',
        'features' => ['Primers', 'Topcoats', 'Weather Resistant', 'Long Lasting'],
        'color' => '#DC2626',
        'icon' => '🎨'
    ],
    'turbine-trading' => [
        'title' => 'Turbine Trading',
        'brand' => 'Trading',
        'category' => 'Wind Turbine Sales',
        'description' => 'New and used wind turbine trading services to help you find the most suitable equipment',
        'features' => ['New Turbines', 'Used Turbines', 'Full Service', 'Expert Advice'],
        'color' => '#F59E0B',
        'icon' => '💼'
    ]
];

$current_data = isset($products[$product_slug]) ? $products[$product_slug] : $products['vestas-turbine-components'];

get_header(); ?>

<!-- Product Detail Page Header -->
<section class="product-header" style="
    padding: 6rem 0 2rem;
    background: linear-gradient(135deg, <?php echo $current_data['color']; ?> 0%, <?php echo $current_data['color']; ?>CC 100%);
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
            radial-gradient(circle at 25% 75%, rgba(0, 168, 230, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 75% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        opacity: 0.6;
    "></div>
    
    <!-- Breadcrumb -->
    <div class="container" style="position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
        <nav style="margin-bottom: 2rem;">
            <ol style="
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.9rem;
                list-style: none;
                margin: 0;
                padding: 0;
            ">
                <li><a href="<?php echo home_url('/'); ?>" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">Home</a></li>
                <li>/</li>
                <li><a href="<?php echo home_url('/products-services/'); ?>" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">Products & Services</a></li>
                <li>/</li>
                <li><span style="color: white; font-weight: 500;"><?php echo esc_html($current_data['title']); ?></span></li>
            </ol>
        </nav>
        
        <div style="
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 3rem;
            align-items: center;
        " class="product-hero">
            <div>
                <div style="
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                    margin-bottom: 1rem;
                ">
                    <span style="
                        background: rgba(255, 255, 255, 0.2);
                        backdrop-filter: blur(10px);
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-size: 0.8rem;
                        font-weight: 600;
                    "><?php echo esc_html($current_data['brand']); ?></span>
                    <span style="
                        background: rgba(255, 255, 255, 0.1);
                        backdrop-filter: blur(10px);
                        padding: 0.5rem 1rem;
                        border-radius: 20px;
                        font-size: 0.8rem;
                        font-weight: 600;
                    "><?php echo esc_html($current_data['category']); ?></span>
                </div>
                
                <h1 style="
                    font-size: clamp(2rem, 4vw, 3rem);
                    font-weight: 800;
                    margin-bottom: 1rem;
                    line-height: 1.2;
                "><?php echo esc_html($current_data['title']); ?></h1>
                
                <p style="
                    font-size: 1.2rem;
                    color: rgba(255, 255, 255, 0.9);
                    margin-bottom: 2rem;
                    line-height: 1.6;
                "><?php echo esc_html($current_data['description']); ?></p>
                
                <div style="
                    display: flex;
                    gap: 1rem;
                    flex-wrap: wrap;
                ">
                    <button class="cta-button primary" onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                        background: rgba(255, 255, 255, 0.9);
                        color: <?php echo $current_data['color']; ?>;
                        border: none;
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        font-size: 1rem;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">Request Quote</button>
                    
                    <button class="cta-button secondary" onclick="downloadTechnicalData()" style="
                        background: transparent;
                        color: white;
                        border: 2px solid rgba(255, 255, 255, 0.5);
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        font-size: 1rem;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">Download Tech Data</button>
                </div>
            </div>
            
            <div style="
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border-radius: 16px;
                padding: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.2);
            ">
                <div style="
                    font-size: 4rem;
                    text-align: center;
                    margin-bottom: 1rem;
                    color: rgba(255, 255, 255, 0.8);
                "><?php echo $current_data['icon']; ?></div>
                <div style="text-align: center; color: rgba(255, 255, 255, 0.7);">
                    Product Preview<br>
                    <small>Click to learn more</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Content -->
<section style="
    padding: 4rem 0;
    background: #F8FAFB;
">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
        
        <!-- Product Overview -->
        <div style="
            background: #FFFFFF;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #E5E7EB;
            margin-bottom: 3rem;
        ">            
            <div style="padding: 3rem;">
                <div style="
                    display: grid;
                    grid-template-columns: 2fr 1fr;
                    gap: 3rem;
                    align-items: start;
                ">
                    <div>
                        <h2 style="
                            font-size: 2rem;
                            font-weight: 700;
                            color: #1F2937;
                            margin-bottom: 1rem;
                        ">Key Features</h2>
                        
                        <p style="
                            color: #6B7280;
                            line-height: 1.8;
                            margin-bottom: 2rem;
                            font-size: 1.1rem;
                        ">We provide a comprehensive range of <?php echo strtolower($current_data['category']); ?> including all necessary components for optimal wind turbine operation. All parts meet original equipment specifications ensuring perfect compatibility with existing equipment.</p>
                        
                        <div style="
                            display: grid;
                            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                            gap: 1.5rem;
                            margin-bottom: 2rem;
                        ">
                            <?php foreach ($current_data['features'] as $index => $feature): ?>
                            <div style="
                                display: flex;
                                align-items: start;
                                gap: 1rem;
                                padding: 1.5rem;
                                background: #F8FAFB;
                                border-radius: 12px;
                                border-left: 4px solid <?php echo $current_data['color']; ?>;
                            ">
                                <div style="
                                    width: 40px;
                                    height: 40px;
                                    background: <?php echo $current_data['color']; ?>;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    flex-shrink: 0;
                                ">
                                    <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 style="
                                        font-weight: 600;
                                        color: #1F2937;
                                        margin-bottom: 0.5rem;
                                    "><?php echo esc_html($feature); ?></h4>
                                    <p style="
                                        color: #6B7280;
                                        font-size: 0.9rem;
                                        line-height: 1.5;
                                    "><?php 
                                    // Generate feature descriptions
                                    switch($feature) {
                                        case 'Repair Parts': echo 'High-quality replacement components and parts'; break;
                                        case 'Maintenance': echo 'Comprehensive maintenance solutions and support'; break;
                                        case 'Original Quality': echo 'OEM-grade quality assurance and standards'; break;
                                        case 'Technical Support': echo 'Expert technical assistance and guidance'; break;
                                        case 'OEM Quality': echo 'Original equipment manufacturer quality standards'; break;
                                        case 'Expert Support': echo 'Professional expert support and consultation'; break;
                                        case 'Guaranteed Quality': echo 'Quality guarantee and assurance programs'; break;
                                        case 'Compatibility': echo 'Perfect compatibility with existing systems'; break;
                                        case 'Hard Hats': echo 'Industry-standard protective headwear'; break;
                                        case 'Safety Gear': echo 'Comprehensive safety equipment and gear'; break;
                                        case 'Wind Certified': echo 'Wind industry certified and approved'; break;
                                        case 'Durable': echo 'Long-lasting durability and reliability'; break;
                                        case 'Fiberglass': echo 'High-grade fiberglass materials and components'; break;
                                        case 'Epoxy Resin': echo 'Professional-grade epoxy resin systems'; break;
                                        case 'Structural Adhesives': echo 'Industrial structural adhesive solutions'; break;
                                        case 'Repair Kits': echo 'Complete repair kits and tool sets'; break;
                                        case 'Primers': echo 'High-performance primer coating systems'; break;
                                        case 'Topcoats': echo 'Durable topcoat finishing solutions'; break;
                                        case 'Weather Resistant': echo 'Weather-resistant protective coatings'; break;
                                        case 'Long Lasting': echo 'Long-lasting durability and performance'; break;
                                        case 'New Turbines': echo 'Brand new wind turbine systems'; break;
                                        case 'Used Turbines': echo 'Quality pre-owned wind turbine equipment'; break;
                                        case 'Full Service': echo 'Complete service and support packages'; break;
                                        case 'Expert Advice': echo 'Professional consultation and advice'; break;
                                        default: echo 'Professional quality and reliable performance'; break;
                                    }
                                    ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Product Info Sidebar -->
                    <div style="
                        background: #F9FAFB;
                        border-radius: 12px;
                        padding: 2rem;
                        border: 1px solid #E5E7EB;
                    ">
                        <h3 style="
                            font-size: 1.3rem;
                            font-weight: 700;
                            color: #1F2937;
                            margin-bottom: 1.5rem;
                        ">Product Information</h3>
                        
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Brand</span>
                                <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($current_data['brand']); ?></span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Category</span>
                                <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($current_data['category']); ?></span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Warranty</span>
                                <span style="color: #1F2937; font-weight: 600;">24 months</span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Delivery</span>
                                <span style="color: #1F2937; font-weight: 600;">2-4 weeks</span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0;">
                                <span style="color: #6B7280; font-weight: 500;">Certification</span>
                                <span style="color: #1F2937; font-weight: 600;">CE/ISO</span>
                            </div>
                        </div>
                        
                        <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                            width: 100%;
                            background: linear-gradient(135deg, <?php echo $current_data['color']; ?>, <?php echo $current_data['color']; ?>88);
                            color: white;
                            border: none;
                            padding: 1rem;
                            border-radius: 8px;
                            font-weight: 600;
                            cursor: pointer;
                            transition: all 0.3s ease;
                            margin-top: 1.5rem;
                        ">Contact for Quote</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Section -->
        <div style="
            background: linear-gradient(135deg, <?php echo $current_data['color']; ?>, <?php echo $current_data['color']; ?>CC);
            border-radius: 16px;
            padding: 3rem;
            text-align: center;
            color: white;
        ">
            <h2 style="
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 1rem;
            ">Need More Information?</h2>
            
            <p style="
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 2rem;
                line-height: 1.6;
            ">Our professional team is ready to provide technical consultation and customized solutions</p>
            
            <div style="
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            ">
                <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                    background: rgba(255, 255, 255, 0.9);
                    color: <?php echo $current_data['color']; ?>;
                    border: none;
                    padding: 1rem 2rem;
                    border-radius: 8px;
                    font-size: 1rem;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Contact Expert</button>
                
                <button onclick="downloadTechnicalData()" style="
                    background: transparent;
                    color: white;
                    border: 2px solid rgba(255, 255, 255, 0.5);
                    padding: 1rem 2rem;
                    border-radius: 8px;
                    font-size: 1rem;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Request Quote</button>
            </div>
        </div>
    </div>
</section>

<script>
function downloadTechnicalData() {
    alert('Downloading technical data...');
}
</script>

<style>
.cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
    .product-hero {
        grid-template-columns: 1fr !important;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .product-hero > div:first-child > div:last-child {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .cta-button {
        width: 100%;
    }
}
</style>

<?php get_footer(); ?>