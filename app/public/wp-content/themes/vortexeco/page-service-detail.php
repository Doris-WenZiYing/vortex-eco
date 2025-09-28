<?php
/**
 * Template Name: Service Detail
 * 
 * @package VortexEco
 */

// Get service from URL parameter
$service_slug = isset($_GET['service']) ? sanitize_text_field($_GET['service']) : 'technical-consulting';

// Define service data
$services = [
    'technical-consulting' => [
        'title' => 'Technical Consulting Services',
        'brand' => 'Technical',
        'category' => 'Consulting Services',
        'description' => 'Professional wind turbine technical problem analysis and solutions with expert-level technical support',
        'features' => ['Technical Analysis', 'Fault Diagnosis', 'Expert Solutions', '24/7 Support'],
        'color' => '#1263A0',
        'icon' => '🔬'
    ],
    'wind-farm-development' => [
        'title' => 'Wind Farm Development',
        'brand' => 'Development',
        'category' => 'Development Services',
        'description' => 'Comprehensive wind farm development consultation from initial assessment to construction completion',
        'features' => ['Site Assessment', 'Planning Design', 'Project Management', 'Full Support'],
        'color' => '#059669',
        'icon' => '🏗️'
    ],
    'maintenance-consulting' => [
        'title' => 'Maintenance Consulting',
        'brand' => 'Maintenance',
        'category' => 'Consulting Services',
        'description' => 'Professional wind turbine maintenance strategy planning to extend equipment life and reduce operating costs',
        'features' => ['Maintenance Planning', 'Preventive Care', 'Cost Optimization', 'Strategy Development'],
        'color' => '#7C3AED',
        'icon' => '🔧'
    ],
    'project-management' => [
        'title' => 'Project Management Services',
        'brand' => 'Management',
        'category' => 'Management Services',
        'description' => 'Professional wind energy project management ensuring projects are completed on time and to quality standards',
        'features' => ['Progress Control', 'Quality Control', 'Risk Management', 'Timeline Management'],
        'color' => '#DC2626',
        'icon' => '📊'
    ]
];

$current_data = isset($services[$service_slug]) ? $services[$service_slug] : $services['technical-consulting'];

get_header(); ?>

<!-- Service Detail Page Header -->
<section class="service-header" style="
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
    <div class="container">
        <nav style="margin-bottom: 2rem;">
            <ol style="
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.9rem;
                list-style: none;
                margin-left: 6rem;
                margin-right: 6rem;
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
            margin-left: 6rem;
            margin-right: 6rem;
        " class="service-hero">
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
                    ">Contact Expert</button>
                    
                    <button class="cta-button secondary" onclick="downloadBrochure()" style="
                        background: transparent;
                        color: white;
                        border: 2px solid rgba(255, 255, 255, 0.5);
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        font-size: 1rem;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">Download Brochure</button>
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
                    Service Overview<br>
                    <small>Professional Consulting</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Content -->
<section style="
    padding: 4rem 0;
    background: #ffffff;
    margin-left: 6rem;
    margin-right: 6rem;
">
    <div class="container">
        
        <!-- Service Overview -->
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
                        ">Service Features</h2>
                        
                        <p style="
                            color: #6B7280;
                            line-height: 1.8;
                            margin-bottom: 2rem;
                            font-size: 1.1rem;
                        ">Our professional consulting services provide comprehensive solutions tailored to your wind energy needs. With years of industry experience, we deliver expert guidance to optimize your operations and maximize efficiency.</p>
                        
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
                                        case 'Technical Analysis': echo 'In-depth technical assessments and evaluations'; break;
                                        case 'Fault Diagnosis': echo 'Advanced fault detection and analysis systems'; break;
                                        case 'Expert Solutions': echo 'Customized expert recommendations and solutions'; break;
                                        case 'Site Assessment': echo 'Comprehensive site evaluation and analysis'; break;
                                        case 'Planning Design': echo 'Strategic development planning and design'; break;
                                        case 'Project Management': echo 'End-to-end project coordination and management'; break;
                                        case 'Maintenance Planning': echo 'Strategic maintenance scheduling and optimization'; break;
                                        case 'Preventive Care': echo 'Proactive maintenance programs and procedures'; break;
                                        case 'Progress Control': echo 'Real-time project monitoring and control systems'; break;
                                        case 'Quality Control': echo 'Rigorous quality assurance and control processes'; break;
                                        case '24/7 Support': echo 'Round-the-clock technical support and assistance'; break;
                                        case 'Full Support': echo 'Comprehensive support throughout project lifecycle'; break;
                                        case 'Cost Optimization': echo 'Strategic cost reduction and optimization strategies'; break;
                                        case 'Strategy Development': echo 'Long-term strategic planning and development'; break;
                                        case 'Risk Management': echo 'Comprehensive risk assessment and mitigation'; break;
                                        case 'Timeline Management': echo 'Effective project timeline planning and control'; break;
                                        default: echo 'Professional service delivery and support'; break;
                                    }
                                    ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Service Info Sidebar -->
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
                        ">Service Information</h3>
                        
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Service Type</span>
                                <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($current_data['brand']); ?></span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Category</span>
                                <span style="color: #1F2937; font-weight: 600;"><?php echo esc_html($current_data['category']); ?></span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Response Time</span>
                                <span style="color: #1F2937; font-weight: 600;">24 hours</span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #E5E7EB;">
                                <span style="color: #6B7280; font-weight: 500;">Availability</span>
                                <span style="color: #1F2937; font-weight: 600;">24/7</span>
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; padding: 0.75rem 0;">
                                <span style="color: #6B7280; font-weight: 500;">Certification</span>
                                <span style="color: #1F2937; font-weight: 600;">ISO 9001</span>
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
                        ">Contact for Consultation</button>
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
            ">Ready to Get Started?</h2>
            
            <p style="
                font-size: 1.1rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 2rem;
                line-height: 1.6;
            ">Our expert consultants are ready to discuss your specific needs and provide tailored solutions</p>
            
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
                ">Schedule Consultation</button>
                
                <button onclick="downloadBrochure()" style="
                    background: transparent;
                    color: white;
                    border: 2px solid rgba(255, 255, 255, 0.5);
                    padding: 1rem 2rem;
                    border-radius: 8px;
                    font-size: 1rem;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                ">Download Information</button>
            </div>
        </div>
    </div>
</section>

<script>
function downloadBrochure() {
    alert('Downloading service brochure...');
}
</script>

<style>
.cta-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
    .service-hero {
        grid-template-columns: 1fr !important;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .service-hero > div:first-child > div:last-child {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .cta-button {
        width: 100%;
    }
}
</style>

<?php get_footer(); ?>