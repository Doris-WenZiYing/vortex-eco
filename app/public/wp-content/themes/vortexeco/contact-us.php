<?php
/**
 * Template Name: Contact Us
 * 
 * @package VortexEco
 */

get_header(); ?>

<!-- Contact Us Page Header -->
<section class="page-header" style="
    padding: 6rem 0 2rem;
    background: linear-gradient(135deg, #1263A0 0%, #0F5287 100%);
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
    
    <div class="container" style="position: relative; z-index: 2; max-width: 1200px; margin: 0 auto; padding: 0 3rem;">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <h1 style="
                font-size: clamp(2.5rem, 4vw, 3.5rem);
                font-weight: 800;
                margin-bottom: 1rem;
                line-height: 1.2;
            ">Contact Us</h1>
            
            <p style="
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 2rem;
                line-height: 1.6;
            ">Professional wind energy solutions consultation - we're here to serve you</p>
        </div>
    </div>
</section>

<!-- Main Contact Section -->
<section style="
    padding: 4rem 0;
    background: #ffffff;
    margin-left: 6rem;
    margin-right: 6rem;
">
    <div class="container">
        
        <!-- Contact Methods Grid -->
        <div style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        ">
            
            <!-- Phone Contact -->
            <div class="contact-card" style="
                background: #FFFFFF;
                border-radius: 16px;
                padding: 2rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                text-align: center;
                transition: all 0.3s ease;
                border: 1px solid #E5E7EB;
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    background: linear-gradient(135deg, #1263A0, #00A8E6);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 1.5rem;
                ">
                    <svg style="width: 24px; height: 24px; color: white;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.3rem;
                    font-weight: 700;
                    color: #1F2937;
                    margin-bottom: 0.5rem;
                ">Phone Contact</h3>
                <p style="
                    color: #6B7280;
                    margin-bottom: 1rem;
                    line-height: 1.6;
                ">Connect instantly with our expert team</p>
                <a href="tel:+65-3125-8302" style="
                    color: #1263A0;
                    font-weight: 600;
                    text-decoration: none;
                    font-size: 1.1rem;
                ">+65 (3) 1258302</a>
            </div>
            
            <!-- Email Contact -->
            <div class="contact-card" style="
                background: #FFFFFF;
                border-radius: 16px;
                padding: 2rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                text-align: center;
                transition: all 0.3s ease;
                border: 1px solid #E5E7EB;
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    background: linear-gradient(135deg, #059669, #10B981);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 1.5rem;
                ">
                    <svg style="width: 24px; height: 24px; color: white;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.3rem;
                    font-weight: 700;
                    color: #1F2937;
                    margin-bottom: 0.5rem;
                ">Email</h3>
                <p style="
                    color: #6B7280;
                    margin-bottom: 1rem;
                    line-height: 1.6;
                ">Send us detailed inquiries</p>
                <a href="mailto:info@vortexeco.com" style="
                    color: #059669;
                    font-weight: 600;
                    text-decoration: none;
                    font-size: 1.1rem;
                ">TSD@vortexeco.com</a>
            </div>
            
            <!-- Address Contact -->
            <div class="contact-card" style="
                background: #FFFFFF;
                border-radius: 16px;
                padding: 2rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                text-align: center;
                transition: all 0.3s ease;
                border: 1px solid #E5E7EB;
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    background: linear-gradient(135deg, #7C3AED, #A855F7);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 1.5rem;
                ">
                    <svg style="width: 24px; height: 24px; color: white;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </div>
                <h3 style="
                    font-size: 1.3rem;
                    font-weight: 700;
                    color: #1F2937;
                    margin-bottom: 0.5rem;
                ">Office Address</h3>
                <p style="
                    color: #6B7280;
                    margin-bottom: 1rem;
                    line-height: 1.6;
                ">Welcome to visit our office by appointment</p>
                <address style="
                    color: #7C3AED;
                    font-weight: 600;
                    font-style: normal;
                    font-size: 1rem;
                    line-height: 1.6;
                ">51 GOLDHILL PLAZA #20-07<br>SINGAPORE (308900)</address>
            </div>
        </div>
        
        <!-- Contact Form and Info Section -->
        <div style="
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 4rem;
            align-items: start;
        " class="contact-main-section">
            
            <!-- Contact Form -->
            <div style="
                background: #FFFFFF;
                border-radius: 16px;
                padding: 3rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                border: 1px solid #E5E7EB;
            ">
                <h2 style="
                    font-size: 2rem;
                    font-weight: 700;
                    color: #1F2937;
                    margin-bottom: 0.5rem;
                ">Send an Inquiry</h2>
                
                <p style="
                    color: #6B7280;
                    margin-bottom: 2rem;
                    line-height: 1.6;
                ">Please fill out the form below and we'll respond within 24 hours</p>
                
                <form class="contact-form" style="display: grid; gap: 1.5rem;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label style="
                                display: block;
                                font-weight: 600;
                                color: #374151;
                                margin-bottom: 0.5rem;
                            ">Name *</label>
                            <input type="text" name="name" required style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #D1D5DB;
                                border-radius: 8px;
                                font-size: 1rem;
                                transition: all 0.3s ease;
                                background: #F9FAFB;
                            " />
                        </div>
                        <div>
                            <label style="
                                display: block;
                                font-weight: 600;
                                color: #374151;
                                margin-bottom: 0.5rem;
                            ">Company</label>
                            <input type="text" name="company" style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #D1D5DB;
                                border-radius: 8px;
                                font-size: 1rem;
                                transition: all 0.3s ease;
                                background: #F9FAFB;
                            " />
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div>
                            <label style="
                                display: block;
                                font-weight: 600;
                                color: #374151;
                                margin-bottom: 0.5rem;
                            ">Email *</label>
                            <input type="email" name="email" required style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #D1D5DB;
                                border-radius: 8px;
                                font-size: 1rem;
                                transition: all 0.3s ease;
                                background: #F9FAFB;
                            " />
                        </div>
                        <div>
                            <label style="
                                display: block;
                                font-weight: 600;
                                color: #374151;
                                margin-bottom: 0.5rem;
                            ">Phone</label>
                            <input type="tel" name="phone" style="
                                width: 100%;
                                padding: 0.75rem;
                                border: 1px solid #D1D5DB;
                                border-radius: 8px;
                                font-size: 1rem;
                                transition: all 0.3s ease;
                                background: #F9FAFB;
                            " />
                        </div>
                    </div>
                    
                    <div>
                        <label style="
                            display: block;
                            font-weight: 600;
                            color: #374151;
                            margin-bottom: 0.5rem;
                        ">Inquiry Type</label>
                        <select name="inquiry_type" style="
                            width: 100%;
                            padding: 0.75rem;
                            border: 1px solid #D1D5DB;
                            border-radius: 8px;
                            font-size: 1rem;
                            transition: all 0.3s ease;
                            background: #F9FAFB;
                        ">
                            <option value="">Please select inquiry type</option>
                            <option value="products">Product Inquiry</option>
                            <option value="services">Service Consultation</option>
                            <option value="partnership">Partnership Proposal</option>
                            <option value="support">Technical Support</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div>
                        <label style="
                            display: block;
                            font-weight: 600;
                            color: #374151;
                            margin-bottom: 0.5rem;
                        ">Message *</label>
                        <textarea name="message" required rows="5" style="
                            width: 100%;
                            padding: 0.75rem;
                            border: 1px solid #D1D5DB;
                            border-radius: 8px;
                            font-size: 1rem;
                            transition: all 0.3s ease;
                            background: #F9FAFB;
                            resize: vertical;
                            font-family: inherit;
                        " placeholder="Please describe your requirements in detail..."></textarea>
                    </div>
                    
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <input type="checkbox" id="privacy" name="privacy" required style="
                            width: 16px;
                            height: 16px;
                            accent-color: #1263A0;
                        " />
                        <label for="privacy" style="
                            color: #6B7280;
                            font-size: 0.9rem;
                            line-height: 1.4;
                        ">I agree to the <a href="#" style="color: #1263A0; text-decoration: none;">Privacy Policy</a> and data processing terms</label>
                    </div>
                    
                    <button type="submit" style="
                        background: linear-gradient(135deg, #1263A0, #00A8E6);
                        color: white;
                        border: none;
                        padding: 1rem 2rem;
                        border-radius: 8px;
                        font-size: 1rem;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        justify-self: start;
                    ">Send Inquiry</button>
                </form>
            </div>
            
            <!-- Company Info Sidebar -->
            <div>    
                <!-- Quick Links -->
                <div style="
                    background: #FFFFFF;
                    border-radius: 16px;
                    padding: 2rem;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                    border: 1px solid #E5E7EB;
                ">
                    <h3 style="
                        font-size: 1.3rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 1rem;
                    ">Quick Links</h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        <a href="<?php echo home_url('/products-services/'); ?>" style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            color: #1263A0;
                            text-decoration: none;
                            font-weight: 500;
                            transition: all 0.3s ease;
                        ">
                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path>
                            </svg>
                            Products & Services
                        </a>
                        
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            color: #1263A0;
                            text-decoration: none;
                            font-weight: 500;
                            transition: all 0.3s ease;
                        ">
                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path>
                            </svg>
                            Market Insights
                        </a>
                        
                        <a href="#" style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            color: #1263A0;
                            text-decoration: none;
                            font-weight: 500;
                            transition: all 0.3s ease;
                        ">
                            <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path>
                            </svg>
                            Technical Resources
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Styles and Scripts -->
<style>
.contact-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(18, 99, 160, 0.15);
}

.contact-form input:focus,
.contact-form textarea:focus,
.contact-form select:focus {
    outline: none;
    border-color: #00A8E6;
    box-shadow: 0 0 0 3px rgba(0, 168, 230, 0.1);
    background: #FFFFFF;
}

.contact-form button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(18, 99, 160, 0.3);
}

@media (max-width: 768px) {
    .container {
        padding: 0 2rem !important;
    }
    
    .contact-main-section {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    .contact-form > div:first-child,
    .contact-form > div:nth-child(2) {
        grid-template-columns: 1fr !important;
    }
    
    .contact-form {
        padding: 2rem !important;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 1.5rem !important;
    }
    
    .contact-form {
        padding: 1.5rem !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('.contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const requiredFields = contactForm.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#EF4444';
                } else {
                    field.style.borderColor = '#D1D5DB';
                }
            });
            
            if (isValid) {
                const submitButton = contactForm.querySelector('button[type="submit"]');
                const originalText = submitButton.textContent;
                
                submitButton.textContent = 'Sending...';
                submitButton.style.background = '#0F5287';
                submitButton.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    alert('Thank you for your inquiry! We will respond within 24 hours.');
                    contactForm.reset();
                    submitButton.textContent = originalText;
                    submitButton.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
                    submitButton.disabled = false;
                }, 2000);
            } else {
                alert('Please fill in all required fields');
            }
        });
    }
});
</script>

<?php get_footer(); ?>