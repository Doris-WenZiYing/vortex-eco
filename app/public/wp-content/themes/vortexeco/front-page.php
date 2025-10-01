<?php
/**
 * The front page template file - Modern VORTEXECO Design
 *
 * @package VortexEco
 */

get_header(); ?>

<!-- Hero Section with Search -->
<section id="hero" class="hero-section" style="
    min-height: 60vh;
    background: linear-gradient(135deg, rgba(18, 99, 160, 0.85) 0%, rgba(15, 82, 135, 0.9) 10%),
                url('<?php echo get_theme_mod('hero_background_image', get_template_directory_uri() . '/assets/images/LINE_ALBUM_2025.8.27_250827_8.jpg'); ?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    margin-top: 80px;
    padding: 0;
">
    <!-- Animated Background Pattern -->
    <div class="hero-overlay" style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 25% 75%, rgba(0, 168, 230, 0.4) 0%, transparent 0%),
            radial-gradient(circle at 75% 25%, rgba(18, 99, 160, 0.3) 0%, transparent 0%);
        opacity: 0.1;
        animation: pulse 6s ease-in-out infinite alternate;
    "></div>
    
    <div class="container" style="position: relative; z-index: 3;">
        <!-- Main Hero Content -->
        <div class="hero-content" style="
            max-width: 900px;
            color: white;
            margin-bottom: 0rem;
        ">
            <!-- Main Title -->
            <h1 style="
                font-size: clamp(2.5rem, 5vw, 4rem);
                font-weight: 800;
                line-height: 1.1;
                margin-bottom: 2rem;
                color: white;
                text-shadow: 0 4px 30px rgba(0,0,0,0.3);
                letter-spacing: -0.02em;
            ">
                Professional Wind Energy
                <br>
                <span style="
                    background: linear-gradient(90deg, #FFFFFF);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    background-size: 200% 100%;
                    animation: shimmer 3s ease-in-out infinite;
                ">
                    Consulting Solutions
                </span>
            </h1>
            
            <!-- Subtitle -->
            <p style="
                font-size: clamp(1.2rem, 2.5vw, 1.5rem);
                line-height: 1.6;
                margin-bottom: 3rem;
                color: rgba(255, 255, 255, 0.95);
                font-weight: 400;
                max-width: 750px;
            ">
                VORTEXECO SOLUTIONS brings together wind industry experts across materials, engineering, operations and maintenance. We provide comprehensive consulting services to reduce risks, improve efficiency, and advance sustainable offshore wind energy development.
            </p>
    </div>
</section>

<!-- Company Overview Section -->
<section id="about" class="section" style="
    padding: 8rem 0;
    background: linear-gradient(180deg, #F8FAFB 0%, #FFFFFF 100%);
    position: relative;
">
    <div class="container">
        <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        ">
            <!-- Left Content -->
            <div>
                <div style="
                    display: inline-block;
                    background: linear-gradient(135deg, #1263A0, #00A8E6);
                    color: white;
                    padding: 0.5rem 1.5rem;
                    border-radius: 30px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    margin-bottom: 2rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                ">About VORTEXECO</div>
                
                <h2 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    color: #1263A0;
                    margin-bottom: 1.5rem;
                    line-height: 1.2;
                ">
                    Comprehensive Wind Energy Team
                    <span style="
                        display: block;
                        font-weight: 400;
                        color: #6B7280;
                        font-size: 0.7em;
                        margin-top: 0.5rem;
                    ">Focused on Every Detail</span>
                </h2>
                
                <p style="
                    font-size: 1.2rem;
                    color: #6B7280;
                    line-height: 1.7;
                    margin-bottom: 2rem;
                ">
                    Want to make your project faster, more stable, and more sustainably competitive? Let the VORTEXECO consulting team provide you with the most suitable solutions.
                </p>
                
                <!-- Stats Grid -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 2rem;
                    margin-bottom: 2rem;
                ">
                    <div style="text-align: center;">
                        <div style="
                            font-size: 2.5rem;
                            font-weight: 800;
                            color: #1263A0;
                            margin-bottom: 0.5rem;
                        ">50+</div>
                        <div style="
                            font-size: 0.9rem;
                            color: #6B7280;
                            font-weight: 600;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        ">Projects</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="
                            font-size: 2.5rem;
                            font-weight: 800;
                            color: #1263A0;
                            margin-bottom: 0.5rem;
                        ">2GW+</div>
                        <div style="
                            font-size: 0.9rem;
                            color: #6B7280;
                            font-weight: 600;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        ">Capacity</div>
                    </div>
                    <div style="text-align: center;">
                        <div style="
                            font-size: 2.5rem;
                            font-weight: 800;
                            color: #1263A0;
                            margin-bottom: 0.5rem;
                        ">8</div>
                        <div style="
                            font-size: 0.9rem;
                            color: #6B7280;
                            font-weight: 600;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        ">Countries</div>
                    </div>
                </div>
            </div>
            
            <!-- Right Image -->
            <div style="
                background: url('<?php echo esc_url( get_theme_mod('mytheme_other_logo') ); ?>') center/cover;
                border-radius: 20px;
                height: 500px;
                position: relative;
                box-shadow: 0 20px 60px rgba(18, 99, 160, 0.2);
            ">
                <div style="
                    position: absolute;
                    bottom: 2rem;
                    left: 2rem;
                    right: 2rem;
                    background: rgba(255, 255, 255, 0.95);
                    backdrop-filter: blur(10px);
                    padding: 1.5rem;
                    border-radius: 15px;
                    border: 1px solid rgba(255, 255, 255, 0.5);
                ">
                    <h4 style="color: #1263A0; margin-bottom: 0.5rem; font-weight: 700;">Asia-Pacific Hub</h4>
                    <p style="color: #6B7280; margin: 0; font-size: 0.9rem;">Strategic location for offshore wind and green energy development across the region.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section" style="
    padding: 8rem 0;
    background: #FFFFFF;
    position: relative;
">
    <div class="container">
        <!-- Section Header -->
        <div style="
            text-align: center;
            margin-bottom: 5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        ">
            <div style="
                display: inline-block;
                background: linear-gradient(135deg, #1263A0, #00A8E6);
                color: white;
                padding: 0.5rem 1.5rem;
                border-radius: 30px;
                font-size: 0.9rem;
                font-weight: 600;
                margin-bottom: 2rem;
                text-transform: uppercase;
                letter-spacing: 1px;
            ">Our Expertise</div>
            
            <h2 style="
                font-size: clamp(2.5rem, 4vw, 3.5rem);
                font-weight: 800;
                color: #1263A0;
                margin-bottom: 1.5rem;
                line-height: 1.2;
            ">
                8 Major Consulting Specializations
            </h2>
            <p style="
                font-size: 1.2rem;
                color: #6B7280;
                max-width: 600px;
                margin: 0 auto;
                line-height: 1.6;
            ">
                Comprehensive expertise across every aspect of wind energy development and operations
            </p>
        </div>
        
        <!-- Services Grid -->
        <div style="
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
        ">
            
            <!-- Service Cards -->
            <?php 
            $services = [
                [
                    'icon' => '🔧',
                    'title' => 'Wind Energy Materials',
                    'description' => 'Expert knowledge in structural materials, protective coatings, and weather-resistant components for optimal turbine performance.',
                    'features' => ['Material selection per international standards', 'Supply chain optimization', 'Quality assurance protocols']
                ],
                [
                    'icon' => '⚡',
                    'title' => 'Turbine Performance & Structure',
                    'description' => 'Comprehensive analysis of turbine operational efficiency and structural reliability assessment.',
                    'features' => ['Structural safety & durability evaluation', 'Performance optimization', 'Turbine selection consulting']
                ],
                [
                    'icon' => '🏗️',
                    'title' => 'Pre-assembly & Installation',
                    'description' => 'Strategic planning for turbine pre-assembly processes and optimized installation solutions.',
                    'features' => ['Installation methodology', 'Safety compliance', 'Timeline optimization']
                ],
                [
                    'icon' => '🌊',
                    'title' => 'Wind Farm Development',
                    'description' => 'Complete wind farm site selection, environmental assessment, and feasibility analysis services.',
                    'features' => ['Site assessment & planning', 'Environmental compliance', 'Stakeholder coordination']
                ],
                [
                    'icon' => '⚡',
                    'title' => 'Electrical Systems',
                    'description' => 'Advanced electrical system design, wiring solutions, and grid integration recommendations.',
                    'features' => ['Power transmission optimization', 'Grid integration', 'Smart systems design']
                ],
                [
                    'icon' => '🔄',
                    'title' => 'Operations & Maintenance',
                    'description' => 'Comprehensive O&M strategies designed to maximize efficiency and extend equipment lifespan.',
                    'features' => ['Maintenance optimization', 'Cost reduction strategies', 'Performance monitoring']
                ],
                [
                    'icon' => '📋',
                    'title' => 'Regulatory & Certification',
                    'description' => 'Expert assistance in obtaining international and local certifications for full compliance.',
                    'features' => ['Certification guidance', 'Regulatory compliance', 'Documentation support']
                ],
                [
                    'icon' => '🌱',
                    'title' => 'Sustainability & ESG',
                    'description' => 'Carbon footprint management and comprehensive sustainability assessment for ESG compliance.',
                    'features' => ['ESG integration', 'Sustainability reporting', 'Carbon footprint reduction']
                ]
            ];
            
            foreach ($services as $service): ?>
            <div class="service-card" style="
                background: #FFFFFF;
                border: 1px solid #E5E7EB;
                border-radius: 20px;
                padding: 2.5rem;
                transition: all 0.4s ease;
                position: relative;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            ">
                <div style="
                    width: 70px;
                    height: 70px;
                    background: linear-gradient(135deg, #1263A0, #00A8E6);
                    border-radius: 16px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 1.5rem;
                    font-size: 1.8rem;
                    box-shadow: 0 8px 25px rgba(18, 99, 160, 0.3);
                "><?php echo $service['icon']; ?></div>
                
                <h3 style="
                    font-size: 1.4rem;
                    font-weight: 700;
                    color: #1F2937;
                    margin-bottom: 1rem;
                    line-height: 1.3;
                "><?php echo $service['title']; ?></h3>
                
                <p style="
                    color: #6B7280;
                    line-height: 1.6;
                    margin-bottom: 1.5rem;
                    font-size: 1rem;
                "><?php echo $service['description']; ?></p>
                
                <ul style="
                    list-style: none;
                    padding: 0;
                    margin: 0;
                ">
                    <?php foreach ($service['features'] as $feature): ?>
                    <li style="
                        color: #4B5563;
                        font-size: 0.9rem;
                        margin-bottom: 0.75rem;
                        position: relative;
                        padding-left: 1.5rem;
                        line-height: 1.5;
                    ">
                        <span style="
                            position: absolute;
                            left: 0;
                            top: 0.1rem;
                            color: #00A8E6;
                            font-weight: 700;
                            font-size: 1rem;
                        ">•</span>
                        <?php echo $feature; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact" class="section" style="
    padding: 8rem 0;
    background: linear-gradient(135deg, #1263A0 0%, #0F5287 100%);
    color: white;
    position: relative;
    overflow: hidden;
">
    <!-- Background Pattern -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 30% 20%, rgba(0, 168, 230, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        opacity: 0.6;
    "></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
            max-width: 1200px;
            margin: 0 auto;
        ">
            <!-- Left Content -->
            <div>
                <div style="
                    display: inline-block;
                    background: rgba(255, 255, 255, 0.1);
                    color: white;
                    padding: 0.5rem 1.5rem;
                    border-radius: 30px;
                    font-size: 0.9rem;
                    font-weight: 600;
                    margin-bottom: 2rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    border: 1px solid rgba(255, 255, 255, 0.2);
                ">Get In Touch</div>
                
                <h2 style="
                    font-size: clamp(2.5rem, 4vw, 3.5rem);
                    font-weight: 800;
                    color: white;
                    margin-bottom: 1.5rem;
                    line-height: 1.2;
                ">
                    Ready to Power Your Wind Energy Project?
                </h2>
                
                <p style="
                    font-size: 1.2rem;
                    color: rgba(255, 255, 255, 0.9);
                    margin-bottom: 3rem;
                    line-height: 1.6;
                ">
                    Let our expert team guide you through every phase of your offshore wind development journey.
                </p>
                
                <!-- Contact Info -->
                <div style="space-y: 1.5rem;">
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 1rem;
                        margin-bottom: 1.5rem;
                    ">
                        <div style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255, 255, 255, 0.1);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            backdrop-filter: blur(10px);
                        ">📧</div>
                        <div>
                            <div style="font-weight: 600; margin-bottom: 0.25rem;">Email</div>
                            <a href="mailto:TSD@vortexeco.com" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">TSD@vortexeco.com</a>
                        </div>
                    </div>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 1rem;
                        margin-bottom: 1.5rem;
                    ">
                        <div style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255, 255, 255, 0.1);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            backdrop-filter: blur(10px);
                        ">📞</div>
                        <div>
                            <div style="font-weight: 600; margin-bottom: 0.25rem;">Phone</div>
                            <a href="tel:+6531258302" style="color: rgba(255, 255, 255, 0.8); text-decoration: none;">+65 (3) 1258302</a>
                        </div>
                    </div>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 1rem;
                        margin-bottom: 1.5rem;
                    ">
                        <div style="
                            width: 50px;
                            height: 50px;
                            background: rgba(255, 255, 255, 0.1);
                            border-radius: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            backdrop-filter: blur(10px);
                        ">📍</div>
                        <div>
                            <div style="font-weight: 600; margin-bottom: 0.25rem;">Address</div>
                            <div style="color: rgba(255, 255, 255, 0.8);">
                                51 GOLDHILL PLAZA #20-07<br>
                                SINGAPORE (308900)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div style="
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 20px;
                padding: 3rem;
            ">
                <form method="POST" action="#" style="space-y: 1.5rem;">
                    <div style="
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 1rem;
                        margin-bottom: 1.5rem;
                    ">
                        <input type="text" name="first_name" placeholder="First Name" required style="
                            background: rgba(255, 255, 255, 0.1);
                            border: 1px solid rgba(255, 255, 255, 0.3);
                            border-radius: 12px;
                            padding: 1rem;
                            color: white;
                            font-size: 1rem;
                            backdrop-filter: blur(10px);
                        " />
                        <input type="text" name="last_name" placeholder="Last Name" required style="
                            background: rgba(255, 255, 255, 0.1);
                            border: 1px solid rgba(255, 255, 255, 0.3);
                            border-radius: 12px;
                            padding: 1rem;
                            color: white;
                            font-size: 1rem;
                            backdrop-filter: blur(10px);
                        " />
                    </div>
                    
                    <input type="email" name="email" placeholder="Email Address" required style="
                        width: 100%;
                        background: rgba(255, 255, 255, 0.1);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        border-radius: 12px;
                        padding: 1rem;
                        color: white;
                        font-size: 1rem;
                        backdrop-filter: blur(10px);
                        margin-bottom: 1.5rem;
                    " />
                    
                    <input type="text" name="company" placeholder="Company Name" style="
                        width: 100%;
                        background: rgba(255, 255, 255, 0.1);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        border-radius: 12px;
                        padding: 1rem;
                        color: white;
                        font-size: 1rem;
                        backdrop-filter: blur(10px);
                        margin-bottom: 1.5rem;
                    " />
                    
                    <select name="service_interest" required style="
                        width: 100%;
                        background: rgba(255, 255, 255, 0.1);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        border-radius: 12px;
                        padding: 1rem;
                        color: white;
                        font-size: 1rem;
                        backdrop-filter: blur(10px);
                        margin-bottom: 1.5rem;
                    ">
                        <option value="">Select Service Interest</option>
                        <option value="wind-materials">Wind Energy Materials</option>
                        <option value="turbine-performance">Turbine Performance & Structure</option>
                        <option value="installation">Pre-assembly & Installation</option>
                        <option value="farm-development">Wind Farm Development</option>
                        <option value="electrical-systems">Electrical Systems</option>
                        <option value="operations">Operations & Maintenance</option>
                        <option value="regulatory">Regulatory & Certification</option>
                        <option value="sustainability">Sustainability & ESG</option>
                        <option value="turbine-parts">Wind Turbine Parts & Trading</option>
                        <option value="blade-materials">Blade Materials & Components</option>
                        <option value="ppe">Personal Protective Equipment</option>
                        <option value="other">Other</option>
                    </select>
                    
                    <textarea name="message" placeholder="Project Details & Requirements" rows="4" style="
                        width: 100%;
                        background: rgba(255, 255, 255, 0.1);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        border-radius: 12px;
                        padding: 1rem;
                        color: white;
                        font-size: 1rem;
                        backdrop-filter: blur(10px);
                        margin-bottom: 2rem;
                        resize: vertical;
                    "></textarea>
                    
                    <button type="submit" style="
                        width: 100%;
                        background: linear-gradient(135deg, #00A8E6 0%, #0088CC 100%);
                        color: white;
                        padding: 1.2rem 2rem;
                        border-radius: 12px;
                        border: none;
                        font-weight: 700;
                        font-size: 1.1rem;
                        cursor: pointer;
                        transition: all 0.4s ease;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                    ">
                        Send Inquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
    
</section>

<!-- CSS Animations and Responsive Styles -->
<style>
@keyframes pulse {
    0%, 100% { opacity: 0.8; }
    50% { opacity: 1; }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

.cta-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 40px rgba(0, 168, 230, 0.5);
}

.cta-primary:hover span {
    transform: translateX(5px);
}

.cta-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-3px);
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.15);
    border-color: #00A8E6;
}

.value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.1);
    border-color: #00A8E6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content {
        text-align: center !important;
        padding: 2rem 0 !important;
    }
    
    .hero-content h1 {
        font-size: 2.5rem !important;
        line-height: 1.2 !important;
    }
    
    section[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    section[style*="grid-template-columns: repeat(4, 1fr)"] {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 1rem !important;
    }
    
    section[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 1rem !important;
    }
    
    .container {
        padding: 0 1rem;
    }
}

@media (max-width: 480px) {
    section[style*="grid-template-columns: repeat(4, 1fr)"] {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    section[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .service-card, .value-card {
        padding: 2rem !important;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Form styling improvements */
input::placeholder, textarea::placeholder, select option {
    color: rgba(255, 255, 255, 0.7);
}

input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: #00A8E6;
    box-shadow: 0 0 0 2px rgba(0, 168, 230, 0.3);
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 168, 230, 0.4);
}
</style>

<!-- JavaScript for Enhanced Interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Search functionality
    const searchInput = document.querySelector('input[placeholder*="Search"]');
    const searchButton = document.querySelector('button');
    
    if (searchInput && searchButton) {
        searchButton.addEventListener('click', function() {
            const query = searchInput.value.trim();
            if (query) {
                // Redirect to search results page or implement search logic
                window.location.href = `/search?q=${encodeURIComponent(query)}`;
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
    }
    
    // Form validation and submission
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const requiredFields = contactForm.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#EF4444';
                } else {
                    field.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                }
            });
            
            if (isValid) {
                // Submit form data (implement your submission logic here)
                alert('Thank you for your inquiry! We will contact you soon.');
                contactForm.reset();
            } else {
                alert('Please fill in all required fields.');
            }
        });
    }
    
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe service cards and value cards for animation
    document.querySelectorAll('.service-card, .value-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        observer.observe(card);
    });
});
</script>

<?php get_footer(); ?>