<?php
/**
 * Archive Template for Services - Updated Version
 * 
 * @package VortexEco
 */

get_header(); 

// Get services
$services_query = new WP_Query(array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

// Get hero image from customizer
$hero_image = get_theme_mod('services_hero_image', '');
?>

<!-- Hero Section -->
<div class="hero-section" style="
    width: 100%;
    height: 400px;
    background: url('<?php echo esc_url($hero_image); ?>') center/cover;
    margin-top: 80px;
    position: relative;
">
</div>

<!-- Main Services Section -->
<section class="section section-pd section-service" id="section_services">
    <div class="section-content relative">
        
        <?php if ($services_query->have_posts()): 
            while ($services_query->have_posts()): 
                $services_query->the_post();
                
                // Get custom fields
                $service_description = get_post_meta(get_the_ID(), '_service_description', true);
                $service_bullets = get_post_meta(get_the_ID(), '_service_bullets', true);
                $service_image = get_post_meta(get_the_ID(), '_service_image', true);
                
                // Convert bullets to array
                $bullets_array = $service_bullets ? array_filter(explode("\n", $service_bullets)) : array();
                
                // Use slider-1.jpg as default if no custom image
                if (!$service_image && !has_post_thumbnail()) {
                    $service_image = get_template_directory_uri() . '/assets/images/slider-1.jpg';
                }
                
                // Get featured image if available
                if (!$service_image && has_post_thumbnail()) {
                    $service_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                }
        ?>
        
        <!-- Service Block -->
        <div class="row row-large align-items-center">
            
            <!-- Left Column: Content -->
            <div class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    
                    <!-- Title -->
                    <div class="service-title-wrapper">
                        <h3 class="service-title">
                            <?php the_title(); ?>
                        </h3>
                    </div>
                    
                    <!-- Description -->
                    <div class="service-description">
                        <?php if ($service_description): ?>
                            <p><strong>VORTEXECO</strong> <?php echo esc_html($service_description); ?></p>
                        <?php else: ?>
                            <p><strong>VORTEXECO</strong> <?php echo wp_trim_words(get_the_content(), 30); ?></p>
                        <?php endif; ?>
                        
                        <!-- Bullets -->
                        <?php if (!empty($bullets_array)): ?>
                        <ul class="service-bullets">
                            <?php foreach ($bullets_array as $bullet): ?>
                            <li><?php echo esc_html(trim($bullet)); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
            
            <!-- Right Column: Image -->
            <div class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="service-image-wrapper">
                        <div class="img has-hover">
                            <div class="img-inner image-cover">
                                <img src="<?php echo esc_url($service_image); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Divider -->
        <div class="row row-collapse row-div">
            <div class="col small-12 large-12">
                <div class="col-inner">
                    <div class="is-divider divider clearfix" style="max-width:100%; height:1px; background-color:rgb(218, 221, 228);"></div>
                </div>
            </div>
        </div>
        
        <?php 
            endwhile;
            wp_reset_postdata();
        else: 
            // Default services content if no services exist
            $default_services = array(
                array(
                    'title' => 'Project Management',
                    'description' => 'is a specialist in managing projects in the wind energy sector. Our one stop service covers full cycle of a project from project financing, feasibility studies, technical specifications, contract negotiation, detailed engineering, construction supervision, installation, commissioning and operation.',
                    'bullets' => array(
                        'Offshore Wind Farms',
                        'Onshore Wind Projects', 
                        'Wind Turbine Installation',
                        'Project Financing',
                        'Feasibility Studies'
                    )
                ),
                array(
                    'title' => 'Construction Management',
                    'description' => 'team works closely with clients and contractors to understand requirements and provide integrated solutions. We identify the right expertise for each project and execute in a cost-effective, timely and safe manner.',
                    'bullets' => array(
                        'Site Supervision',
                        'Quality Control',
                        'Safety Management',
                        'Schedule Management',
                        'Cost Control'
                    )
                ),
                array(
                    'title' => 'EPCC',
                    'description' => 'has the capability to provide EPCC service for new builds and upgrades. We assist clients in project financing, contractor selection, and full project management from Engineering to Commissioning.',
                    'bullets' => array(
                        'Engineering Design',
                        'Procurement',
                        'Construction',
                        'Commissioning',
                        'Hook-up Services'
                    )
                ),
                array(
                    'title' => 'Asset Management',
                    'description' => 'solution ensures that clients\' assets are well preserved, maintained and operated. The value of assets depends on quality management.',
                    'bullets' => array(
                        'Asset Valuation',
                        'Performance Monitoring',
                        'Maintenance Planning',
                        'Life Extension Studies',
                        'Condition Assessments'
                    )
                ),
                array(
                    'title' => 'Consultancy',
                    'description' => 'qualified assessors provide independent third-party assessments. We review compliance with technical specifications, standards, regulations and industry best practices.',
                    'bullets' => array(
                        'Technical Due Diligence',
                        'Site Audits',
                        'Risk Assessment',
                        'Expert Witness Services',
                        'Technical Reviews'
                    )
                )
            );
            
            foreach ($default_services as $service):
        ?>
        
        <div class="row row-large align-items-center">
            <div class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="service-title-wrapper">
                        <h3 class="service-title">
                            <?php echo esc_html($service['title']); ?>
                        </h3>
                    </div>
                    <div class="service-description">
                        <p><strong>VORTEXECO</strong> <?php echo esc_html($service['description']); ?></p>
                        <?php if (!empty($service['bullets'])): ?>
                        <ul class="service-bullets">
                            <?php foreach ($service['bullets'] as $bullet): ?>
                            <li><?php echo esc_html($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col medium-6 small-12 large-6">
                <div class="col-inner">
                    <div class="service-image-wrapper">
                        <div class="img has-hover">
                            <div class="img-inner image-cover">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-1.jpg" 
                                     alt="<?php echo esc_attr($service['title']); ?>" loading="lazy" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row row-collapse row-div">
            <div class="col small-12 large-12">
                <div class="col-inner">
                    <div class="is-divider divider clearfix" style="max-width:100%; height:1px; background-color:rgb(218, 221, 228);"></div>
                </div>
            </div>
        </div>
        
        <?php 
            endforeach;
        endif; ?>
        
        <!-- Accreditation Section -->
        <div class="container section-title-container" style="margin-bottom: 30px; margin-top: 40px; max-width: 1530px; margin-left: auto; margin-right: auto;">
            <h2 class="section-title section-title-normal" style="text-align: left;">
                <span class="section-title-main" style="font-size:70%; color:rgb(29, 46, 91);">
                    Accreditation and Memberships
                </span>
            </h2>
        </div>
        
        <!-- Certification Logos -->
        <div class="row align-middle certifications-row" style="max-width: 1530px; margin-left: auto; margin-right: auto;">
            <div class="col small-12">
                <div class="certifications-container">
                    <?php 
                    for ($i = 1; $i <= 5; $i++): 
                        $cert_image = get_theme_mod("cert_image_$i");
                        if (!$cert_image) {
                            $cert_image = get_template_directory_uri() . "/assets/images/slider-1.jpg";
                        }
                    ?>
                    <div class="cert-item">
                        <div class="cert-image">
                            <img src="<?php echo esc_url($cert_image); ?>" 
                                 alt="Certification <?php echo $i; ?>" 
                                 loading="lazy">
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- Styling -->
<style>
/* Hero Section */
.hero-section {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}

/* Section Styling */
#section_services {
    padding-top: 30px;
    padding-bottom: 30px;
    background: #FFFFFF;
}

/* Row Styling */
.row.row-large {
    max-width: 1530px;
    margin: 0 auto 60px;
}

.row.row-large.align-items-center {
    display: flex;
    align-items: center;
}

/* Title Styling */
.service-title-wrapper {
    margin-bottom: 20px;
}

.service-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: rgb(29, 46, 91);
    line-height: 1.3;
    margin: 0;
    padding: 0;
}

@media (max-width: 849px) {
    .service-title {
        font-size: 1.8rem;
    }
}

@media (max-width: 549px) {
    .service-title {
        font-size: 1.5rem;
    }
}

/* Content Styling */
.service-description {
    color: rgb(61, 77, 120);
    line-height: 1.8;
}

.service-description p {
    margin-bottom: 15px;
    font-size: 1rem;
}

.service-description strong {
    color: rgb(29, 46, 91);
}

/* Bullet Points */
.service-bullets {
    list-style-type: disc;
    padding-left: 20px;
    margin-top: 15px;
}

.service-bullets li {
    margin-bottom: 10px;
    color: rgb(61, 77, 120);
    line-height: 1.6;
}

/* Image Styling */
.service-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 0;
}

.service-image-wrapper .img {
    display: block !important;
    width: 100% !important;
    visibility: visible !important;
    opacity: 1 !important;
}

.service-image-wrapper .img-inner {
    position: relative !important;
    overflow: hidden;
    border-radius: 8px;
    padding-top: 65% !important;
    background: #f0f0f0;
}

.service-image-wrapper .img-inner img {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block !important;
}

.img-inner.image-cover {
    position: relative !important;
    overflow: hidden;
    border-radius: 8px;
    padding-top: 65% !important;
    background: #f0f0f0;
}

.img-inner.image-cover img {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    display: block !important;
}

/* Divider */
.row-div {
    margin: 40px 0;
}

.is-divider {
    height: 1px;
    background-color: rgb(218, 221, 228);
}

/* Certifications */
.certifications-row {
    max-width: 1530px;
    margin: 0 auto;
}

.certifications-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    flex-wrap: wrap;
    padding: 20px 0;
}

.cert-item {
    flex: 0 0 auto;
    max-width: 180px;
}

.cert-image {
    display: flex;
    align-items: center;
    justify-content: center;
}

.cert-image img {
    max-width: 100%;
    height: auto;
    max-height: 80px;
    width: auto;
    object-fit: contain;
}

/* Responsive Layout */
@media (max-width: 849px) {
    .row.row-large {
        margin-bottom: 40px;
    }
    
    .row.row-large.align-items-center {
        flex-direction: column;
    }
    
    .row.row-large .col {
        width: 100%;
    }
    
    .service-image-wrapper {
        margin-top: 30px;
    }
    
    .certifications-container {
        gap: 30px;
    }
    
    .cert-item {
        max-width: 140px;
    }
    
    .cert-image img {
        max-height: 60px;
    }
}

@media (max-width: 549px) {
    .certifications-container {
        gap: 20px;
        justify-content: space-around;
    }
    
    .cert-item {
        max-width: 100px;
        flex: 0 0 calc(50% - 10px);
    }
    
    .cert-image img {
        max-height: 50px;
    }
}
</style>

<?php get_footer(); ?>