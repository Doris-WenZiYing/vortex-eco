<?php
/**
 * Template Name: Modern Products & Services
 * 
 * @package VortexEco
 */

get_header(); ?>

<!-- Modern Page Header -->
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
    
    <div class="container" style="position: relative; z-index: 2;">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <h1 style="
                font-size: clamp(2.5rem, 4vw, 3.5rem);
                font-weight: 800;
                margin-bottom: 1rem;
                line-height: 1.2;
            ">Products & Services</h1>
            
            <p style="
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 3rem;
                line-height: 1.6;
            ">Professional wind energy solutions - from components to consulting services</p>
            
            <!-- Quick Search -->
            <div style="
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 60px;
                padding: 1rem 2rem;
                display: flex;
                align-items: center;
                gap: 1rem;
                max-width: 500px;
                margin: 0 auto;
            ">
                <svg style="width: 20px; height: 20px; color: rgba(255,255,255,0.7);" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                </svg>
                <input type="text" id="productSearch" placeholder="Search products or services..." style="
                    background: none;
                    border: none;
                    color: white;
                    font-size: 1rem;
                    flex: 1;
                    outline: none;
                " />
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section style="
    padding: 4rem 0;
    background: #F8FAFB;
    min-height: 80vh;
">
    <div class="container">
        <!-- Main Category Toggle -->
        <div style="
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
        ">
            <div style="
                background: #FFFFFF;
                border-radius: 60px;
                padding: 0.5rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
                display: flex;
                gap: 0.5rem;
            ">
                <button class="main-category-btn active" data-main-category="products" style="
                    background: linear-gradient(135deg, #1263A0, #00A8E6);
                    color: white;
                    border: none;
                    padding: 1rem 2rem;
                    border-radius: 50px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    font-size: 1rem;
                ">Products</button>
                
                <button class="main-category-btn" data-main-category="services" style="
                    background: transparent;
                    color: #6B7280;
                    border: none;
                    padding: 1rem 2rem;
                    border-radius: 50px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    font-size: 1rem;
                ">Services</button>
            </div>
        </div>
        
        <div style="
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 3rem;
            max-width: 1400px;
            margin: 0 auto;
        ">
            
            <!-- Sidebar Filters -->
            <aside class="filters-sidebar" style="
                background: #FFFFFF;
                border-radius: 16px;
                padding: 2rem;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                height: fit-content;
                position: sticky;
                top: 120px;
            ">
                <!-- Products Filters -->
                <div class="products-filters" id="products-filters">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <span style="
                            width: 6px;
                            height: 6px;
                            background: #00A8E6;
                            border-radius: 50%;
                        "></span>
                        Product Categories
                    </h3>
                    
                    <!-- Product Category Filters -->
                    <div class="filter-section" style="margin-bottom: 2rem;">
                        <button class="filter-btn active" data-category="all" style="
                            width: 100%;
                            text-align: left;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            color: white;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">All Products</button>
                        
                        <button class="filter-btn" data-category="turbine-parts" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Turbine Components</button>
                        
                        <button class="filter-btn" data-category="ppe" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Safety Equipment</button>
                        
                        <button class="filter-btn" data-category="blade-materials" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Blade Materials</button>
                        
                        <button class="filter-btn" data-category="tp-section" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Coatings</button>
                        
                        <button class="filter-btn" data-category="turbine-trading" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Turbine Trading</button>
                    </div>
                    
                    <!-- Brand Filters -->
                    <div class="filter-section">
                        <h4 style="
                            font-size: 1rem;
                            font-weight: 600;
                            color: #6B7280;
                            margin-bottom: 1rem;
                            text-transform: uppercase;
                            letter-spacing: 1px;
                        ">Brand Filter</h4>
                        
                        <label style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            margin-bottom: 0.75rem;
                            cursor: pointer;
                            color: #4B5563;
                        ">
                            <input type="checkbox" class="brand-filter" value="vestas" style="
                                width: 16px;
                                height: 16px;
                                accent-color: #00A8E6;
                            " />
                            Vestas
                        </label>
                        
                        <label style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            margin-bottom: 0.75rem;
                            cursor: pointer;
                            color: #4B5563;
                        ">
                            <input type="checkbox" class="brand-filter" value="siemens" style="
                                width: 16px;
                                height: 16px;
                                accent-color: #00A8E6;
                            " />
                            Siemens
                        </label>
                        
                        <label style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            margin-bottom: 0.75rem;
                            cursor: pointer;
                            color: #4B5563;
                        ">
                            <input type="checkbox" class="brand-filter" value="ge" style="
                                width: 16px;
                                height: 16px;
                                accent-color: #00A8E6;
                            " />
                            GE
                        </label>
                        
                        <label style="
                            display: flex;
                            align-items: center;
                            gap: 0.5rem;
                            cursor: pointer;
                            color: #4B5563;
                        ">
                            <input type="checkbox" class="brand-filter" value="others" style="
                                width: 16px;
                                height: 16px;
                                accent-color: #00A8E6;
                            " />
                            Other Brands
                        </label>
                    </div>
                </div>
                
                <!-- Services Filters -->
                <div class="services-filters" id="services-filters" style="display: none;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 1.5rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    ">
                        <span style="
                            width: 6px;
                            height: 6px;
                            background: #00A8E6;
                            border-radius: 50%;
                        "></span>
                        Service Categories
                    </h3>
                    
                    <!-- Service Category Filters -->
                    <div class="filter-section" style="margin-bottom: 2rem;">
                        <button class="service-filter-btn active" data-service-category="all" style="
                            width: 100%;
                            text-align: left;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            color: white;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">All Services</button>
                        
                        <button class="service-filter-btn" data-service-category="technical-consulting" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Technical Consulting</button>
                        
                        <button class="service-filter-btn" data-service-category="wind-farm-development" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Wind Farm Development</button>
                        
                        <button class="service-filter-btn" data-service-category="maintenance-consulting" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Maintenance Consulting</button>
                        
                        <button class="service-filter-btn" data-service-category="project-management" style="
                            width: 100%;
                            text-align: left;
                            background: #F3F4F6;
                            color: #4B5563;
                            border: none;
                            padding: 0.75rem 1rem;
                            border-radius: 8px;
                            font-weight: 500;
                            margin-bottom: 0.5rem;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        ">Project Management</button>
                    </div>
                </div>
            </aside>
            
            <!-- Content Area -->
            <main class="content-container">
                <!-- Active Filters Display -->
                <div class="active-filters" style="
                    margin-bottom: 2rem;
                    display: none;
                ">
                    <h4 style="
                        font-size: 0.9rem;
                        color: #6B7280;
                        margin-bottom: 0.5rem;
                    ">Active Filters:</h4>
                    <div class="filter-tags" style="
                        display: flex;
                        gap: 0.5rem;
                        flex-wrap: wrap;
                    "></div>
                </div>
                
                <!-- Products Grid -->
                <div class="products-grid" style="
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                    gap: 2rem;
                ">
                    
                    <!-- Wind Turbine Parts - Vestas -->
                    <div class="product-card" data-category="turbine-parts" data-brand="vestas" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                                font-weight: 800;
                                text-shadow: 0 2px 10px rgba(0,0,0,0.3);
                            ">V</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Vestas</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Vestas Turbine Components</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Professional Vestas turbine repair and maintenance parts, ensuring optimal equipment performance</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Repair Parts</span>
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Maintenance</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="vestas-turbine-components" style="
                                width: 100%;
                                background: linear-gradient(135deg, #1263A0, #00A8E6);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                    <!-- Wind Turbine Parts - Siemens -->
                    <div class="product-card" data-category="turbine-parts" data-brand="siemens" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                                font-weight: 800;
                                text-shadow: 0 2px 10px rgba(0,0,0,0.3);
                            ">S</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Siemens</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Siemens Turbine Components</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">High-quality Siemens turbine system parts with comprehensive technical support services</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Repair Parts</span>
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Maintenance</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="siemens-turbine-components" style="
                                width: 100%;
                                background: linear-gradient(135deg, #1263A0, #00A8E6);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                    <!-- Wind Turbine Parts - GE -->
                    <div class="product-card" data-category="turbine-parts" data-brand="ge" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                                font-weight: 800;
                                text-shadow: 0 2px 10px rgba(0,0,0,0.3);
                            ">G</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">GE</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">GE Turbine Components</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Original GE turbine parts and repair services with guaranteed quality and compatibility</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Repair Parts</span>
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Maintenance</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="ge-turbine-components" style="
                                width: 100%;
                                background: linear-gradient(135deg, #1263A0, #00A8E6);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                    <!-- PPE -->
                    <div class="product-card" data-category="ppe" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #059669, #10B981);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">🦺</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Safety</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Personal Protective Equipment</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">High-quality safety equipment designed specifically for wind turbine operations</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #ECFDF5;
                                    color: #059669;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Hard Hats</span>
                                <span style="
                                    background: #ECFDF5;
                                    color: #059669;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Safety Gear</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="ppe" style="
                                width: 100%;
                                background: linear-gradient(135deg, #059669, #10B981);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                    <!-- Blade Materials -->
                    <div class="product-card" data-category="blade-materials" data-brand="vestas" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #7C3AED, #A855F7);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">🔧</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Materials</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Blade Materials</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Complete blade repair and maintenance materials including fiberglass, structural adhesives</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #F3E8FF;
                                    color: #7C3AED;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Fiberglass</span>
                                <span style="
                                    background: #F3E8FF;
                                    color: #7C3AED;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Epoxy Resin</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="blade-materials" style="
                                width: 100%;
                                background: linear-gradient(135deg, #7C3AED, #A855F7);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                    <!-- TP Section -->
                    <div class="product-card" data-category="tp-section" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #DC2626, #EF4444);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">🎨</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Coatings</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">TP Section Coatings</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Professional TP section coating systems including primers, topcoats and protective coatings</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #FEF2F2;
                                    color: #DC2626;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Primers</span>
                                <span style="
                                    background: #FEF2F2;
                                    color: #DC2626;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Topcoats</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="tp-coatings" style="
                                width: 100%;
                                background: linear-gradient(135deg, #DC2626, #EF4444);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                    <!-- Wind Turbine Trading -->
                    <div class="product-card" data-category="turbine-trading" data-type="product" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #F59E0B, #FBBF24);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">💼</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Trading</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Turbine Trading</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">New and used wind turbine trading services to help you find the most suitable equipment</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #FFFBEB;
                                    color: #F59E0B;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">New Turbines</span>
                                <span style="
                                    background: #FFFBEB;
                                    color: #F59E0B;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Used Turbines</span>
                            </div>
                            
                            <button class="view-details-btn" data-product="turbine-trading" style="
                                width: 100%;
                                background: linear-gradient(135deg, #F59E0B, #FBBF24);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">View Details</button>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Services Grid -->
                <div class="services-grid" style="
                    display: none;
                    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                    gap: 2rem;
                ">
                    
                    <!-- Technical Consulting -->
                    <div class="service-card" data-service-category="technical-consulting" data-type="service" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #1263A0, #00A8E6);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">🔬</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Technical</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Technical Consulting Services</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Professional wind turbine technical problem analysis and solutions with expert-level technical support</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Technical Analysis</span>
                                <span style="
                                    background: #EEF2FF;
                                    color: #1263A0;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Fault Diagnosis</span>
                            </div>
                            
                            <button class="view-details-btn" data-service="technical-consulting" style="
                                width: 100%;
                                background: linear-gradient(135deg, #1263A0, #00A8E6);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">Learn More</button>
                        </div>
                    </div>
                    
                    <!-- Wind Farm Development -->
                    <div class="service-card" data-service-category="wind-farm-development" data-type="service" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #059669, #10B981);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">🏗️</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Development</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Wind Farm Development</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Comprehensive wind farm development consultation from initial assessment to construction completion</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #ECFDF5;
                                    color: #059669;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Site Assessment</span>
                                <span style="
                                    background: #ECFDF5;
                                    color: #059669;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Planning Design</span>
                            </div>
                            
                            <button class="view-details-btn" data-service="wind-farm-development" style="
                                width: 100%;
                                background: linear-gradient(135deg, #059669, #10B981);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">Learn More</button>
                        </div>
                    </div>
                    
                    <!-- Maintenance Consulting -->
                    <div class="service-card" data-service-category="maintenance-consulting" data-type="service" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #7C3AED, #A855F7);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">🔧</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Maintenance</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Maintenance Consulting</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Professional wind turbine maintenance strategy planning to extend equipment life and reduce operating costs</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #F3E8FF;
                                    color: #7C3AED;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Maintenance Planning</span>
                                <span style="
                                    background: #F3E8FF;
                                    color: #7C3AED;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Preventive Care</span>
                            </div>
                            
                            <button class="view-details-btn" data-service="maintenance-consulting" style="
                                width: 100%;
                                background: linear-gradient(135deg, #7C3AED, #A855F7);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">Learn More</button>
                        </div>
                    </div>
                    
                    <!-- Project Management -->
                    <div class="service-card" data-service-category="project-management" data-type="service" style="
                        background: #FFFFFF;
                        border-radius: 16px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                        transition: all 0.4s ease;
                        border: 1px solid #E5E7EB;
                    ">
                        <div style="
                            height: 200px;
                            background: linear-gradient(135deg, #DC2626, #EF4444);
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <div style="
                                font-size: 3rem;
                                color: white;
                            ">📊</div>
                            
                            <div style="
                                position: absolute;
                                top: 1rem;
                                right: 1rem;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                padding: 0.5rem 1rem;
                                border-radius: 20px;
                                font-size: 0.8rem;
                                color: white;
                                font-weight: 600;
                            ">Management</div>
                        </div>
                        
                        <div style="padding: 2rem;">
                            <h3 style="
                                font-size: 1.3rem;
                                font-weight: 700;
                                color: #1F2937;
                                margin-bottom: 0.5rem;
                            ">Project Management Services</h3>
                            
                            <p style="
                                color: #6B7280;
                                line-height: 1.6;
                                margin-bottom: 1.5rem;
                                font-size: 0.95rem;
                            ">Professional wind energy project management ensuring projects are completed on time and to quality standards</p>
                            
                            <div style="
                                display: flex;
                                gap: 0.5rem;
                                margin-bottom: 1.5rem;
                                flex-wrap: wrap;
                            ">
                                <span style="
                                    background: #FEF2F2;
                                    color: #DC2626;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Progress Control</span>
                                <span style="
                                    background: #FEF2F2;
                                    color: #DC2626;
                                    padding: 0.25rem 0.75rem;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 500;
                                ">Quality Control</span>
                            </div>
                            
                            <button class="view-details-btn" data-service="project-management" style="
                                width: 100%;
                                background: linear-gradient(135deg, #DC2626, #EF4444);
                                color: white;
                                border: none;
                                padding: 0.75rem 1.5rem;
                                border-radius: 8px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            ">Learn More</button>
                        </div>
                    </div>
                    
                </div>
                
                <!-- No Results Message -->
                <div class="no-results" style="
                    display: none;
                    text-align: center;
                    padding: 4rem 2rem;
                    background: #FFFFFF;
                    border-radius: 16px;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                ">
                    <div style="
                        font-size: 3rem;
                        margin-bottom: 1rem;
                        opacity: 0.5;
                    ">🔍</div>
                    <h3 style="
                        font-size: 1.5rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                    ">No matching products or services found</h3>
                    <p style="
                        color: #6B7280;
                        margin-bottom: 2rem;
                    ">Please try adjusting your search terms or category filters</p>
                    <button onclick="clearFilters()" style="
                        background: #1263A0;
                        color: white;
                        border: none;
                        padding: 0.75rem 2rem;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                    ">Clear Filters</button>
                </div>
            </main>
        </div>
    </div>
</section>

<!-- Styles and Scripts -->
<style>
.main-category-btn:hover {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
    transform: translateY(-2px);
}

.main-category-btn.active {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
}

.filter-btn:hover, .service-filter-btn:hover {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
    transform: translateX(4px);
}

.filter-btn.active, .service-filter-btn.active {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
}

.product-card:hover, .service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.15);
}

.product-card button:hover, .service-card button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

@media (max-width: 1024px) {
    .container > div:last-child {
        grid-template-columns: 250px 1fr !important;
        gap: 2rem !important;
    }
}

@media (max-width: 768px) {
    .container > div:last-child {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    
    .filters-sidebar {
        position: static !important;
        order: 2;
        margin-top: 2rem;
    }
    
    .content-container {
        order: 1;
    }
    
    .products-grid, .services-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
}

.filter-tag {
    background: #1263A0;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.8rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.filter-tag:hover {
    background: #0F5287;
}

.search-highlight {
    background: linear-gradient(120deg, #fff59d 0%, #fff59d 100%);
    background-repeat: no-repeat;
    background-size: 100% 40%;
    background-position: 0 80%;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainCategoryBtns = document.querySelectorAll('.main-category-btn');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const serviceFilterBtns = document.querySelectorAll('.service-filter-btn');
    const brandFilters = document.querySelectorAll('.brand-filter');
    const productCards = document.querySelectorAll('.product-card');
    const serviceCards = document.querySelectorAll('.service-card');
    const searchInput = document.getElementById('productSearch');
    const activeFiltersContainer = document.querySelector('.active-filters');
    const filterTagsContainer = document.querySelector('.filter-tags');
    const noResults = document.querySelector('.no-results');
    const productsGrid = document.querySelector('.products-grid');
    const servicesGrid = document.querySelector('.services-grid');
    const productsFilters = document.getElementById('products-filters');
    const servicesFilters = document.getElementById('services-filters');
    
    let activeMainCategory = 'products';
    let activeCategory = 'all';
    let activeServiceCategory = 'all';
    let activeBrands = [];
    let searchQuery = '';
    
    // Initialize from URL parameters (for header search)
    const urlParams = new URLSearchParams(window.location.search);
    const searchParam = urlParams.get('s');
    if (searchParam) {
        searchQuery = normalizeSearchText(searchParam);
        searchInput.value = searchParam;
        // Auto-filter based on search
        autoFilterBySearch(searchParam);
    }
    
    // Main category switching
    mainCategoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            mainCategoryBtns.forEach(b => {
                b.style.background = 'transparent';
                b.style.color = '#6B7280';
                b.classList.remove('active');
            });
            
            this.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
            this.style.color = 'white';
            this.classList.add('active');
            
            activeMainCategory = this.dataset.mainCategory;
            
            // Show/hide appropriate filters and grids
            if (activeMainCategory === 'products') {
                productsFilters.style.display = 'block';
                servicesFilters.style.display = 'none';
                productsGrid.style.display = 'grid';
                servicesGrid.style.display = 'none';
            } else {
                productsFilters.style.display = 'none';
                servicesFilters.style.display = 'block';
                productsGrid.style.display = 'none';
                servicesGrid.style.display = 'grid';
            }
            
            filterContent();
        });
    });
    
    // Product category filter functionality
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            filterBtns.forEach(b => {
                b.style.background = '#F3F4F6';
                b.style.color = '#4B5563';
                b.classList.remove('active');
            });
            
            this.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
            this.style.color = 'white';
            this.classList.add('active');
            
            activeCategory = this.dataset.category;
            filterContent();
        });
    });
    
    // Service category filter functionality
    serviceFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
            serviceFilterBtns.forEach(b => {
                b.style.background = '#F3F4F6';
                b.style.color = '#4B5563';
                b.classList.remove('active');
            });
            
            this.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
            this.style.color = 'white';
            this.classList.add('active');
            
            activeServiceCategory = this.dataset.serviceCategory;
            filterContent();
        });
    });
    
    // Brand filter functionality
    brandFilters.forEach(filter => {
        filter.addEventListener('change', function() {
            if (this.checked) {
                activeBrands.push(this.value);
            } else {
                activeBrands = activeBrands.filter(brand => brand !== this.value);
            }
            filterContent();
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        searchQuery = normalizeSearchText(this.value);
        filterContent();
    });
    
    // Text normalization function for better search matching
    function normalizeSearchText(text) {
        return text.toLowerCase()
                  .trim()
                  .replace(/\s+/g, ' ')  // Replace multiple spaces with single space
                  .replace(/[（）]/g, match => match === '（' ? '(' : ')')  // Normalize parentheses
                  .replace(/＆/g, '&')   // Normalize ampersand
                  .replace(/－/g, '-')   // Normalize dash
                  .replace(/[\u3000]/g, ' '); // Replace full-width space
    }
    
    // Auto-filter based on search terms
    function autoFilterBySearch(query) {
        const normalizedQuery = normalizeSearchText(query);
        
        // Check if search term matches specific brands and auto-select filters
        const brandKeywords = {
            'ge': 'ge',
            'vestas': 'vestas', 
            'siemens': 'siemens'
        };
        
        // Check for brand matches and auto-select brand filter
        Object.keys(brandKeywords).forEach(keyword => {
            if (normalizedQuery.includes(keyword)) {
                const brandCheckbox = document.querySelector(`input[value="${brandKeywords[keyword]}"]`);
                if (brandCheckbox && !brandCheckbox.checked) {
                    brandCheckbox.checked = true;
                    if (!activeBrands.includes(brandKeywords[keyword])) {
                        activeBrands.push(brandKeywords[keyword]);
                    }
                }
            }
        });
        
        // Check for specific product categories
        const categoryKeywords = {
            'turbine': 'turbine-parts',
            'component': 'turbine-parts',
            'parts': 'turbine-parts',
            'ppe': 'ppe',
            'safety': 'ppe',
            'protective': 'ppe',
            'blade': 'blade-materials',
            'material': 'blade-materials',
            'tp': 'tp-section',
            'coating': 'tp-section',
            'trading': 'turbine-trading',
            'buy': 'turbine-trading',
            'sell': 'turbine-trading'
        };
        
        // Auto-select category if detected
        Object.keys(categoryKeywords).forEach(keyword => {
            if (normalizedQuery.includes(keyword)) {
                const categoryButton = document.querySelector(`[data-category="${categoryKeywords[keyword]}"]`);
                if (categoryButton) {
                    categoryButton.click();
                }
            }
        });
        
        // Check if search term matches service keywords
        const serviceKeywords = ['consulting', 'consultation', 'service', 'technical', 'wind farm', 'maintenance', 'project', 'management', 'development'];
        const isServiceSearch = serviceKeywords.some(keyword => normalizedQuery.includes(keyword.toLowerCase()));
        
        if (isServiceSearch) {
            // Switch to services
            document.querySelector('[data-main-category="services"]').click();
            
            // Auto-select service categories
            const serviceCategories = {
                'technical': 'technical-consulting',
                'wind farm': 'wind-farm-development', 
                'maintenance': 'maintenance-consulting',
                'project': 'project-management'
            };
            
            Object.keys(serviceCategories).forEach(keyword => {
                if (normalizedQuery.includes(keyword)) {
                    const serviceButton = document.querySelector(`[data-service-category="${serviceCategories[keyword]}"]`);
                    if (serviceButton) {
                        serviceButton.click();
                    }
                }
            });
        }
        
        // Filter immediately
        filterContent();
    }
    
    // Filter content function
    function filterContent() {
        let visibleCount = 0;
        
        if (activeMainCategory === 'products') {
            productCards.forEach(card => {
                const category = card.dataset.category;
                const brand = card.dataset.brand;
                const title = normalizeSearchText(card.querySelector('h3').textContent);
                const description = normalizeSearchText(card.querySelector('p').textContent);
                const tags = Array.from(card.querySelectorAll('span')).map(span => 
                    normalizeSearchText(span.textContent)
                ).join(' ');
                
                let showCard = true;
                
                // Category filter
                if (activeCategory !== 'all' && category !== activeCategory) {
                    showCard = false;
                }
                
                // Brand filter
                if (activeBrands.length > 0 && brand && !activeBrands.includes(brand)) {
                    showCard = false;
                }
                
                // Search filter with improved matching
                if (searchQuery) {
                    const searchTerms = searchQuery.split(' ').filter(term => term.length > 0);
                    const searchableContent = `${title} ${description} ${tags}`;
                    
                    // Check if all search terms are found (AND logic for multi-term search)
                    const allTermsFound = searchTerms.every(term => 
                        searchableContent.includes(term) ||
                        title.includes(term) ||
                        description.includes(term) ||
                        tags.includes(term)
                    );
                    
                    if (!allTermsFound) {
                        showCard = false;
                    }
                }
                
                if (showCard) {
                    card.style.display = 'block';
                    visibleCount++;
                    
                    // Highlight search terms
                    highlightSearchTerms(card, searchQuery);
                } else {
                    card.style.display = 'none';
                }
            });
        } else {
            serviceCards.forEach(card => {
                const category = card.dataset.serviceCategory;
                const title = normalizeSearchText(card.querySelector('h3').textContent);
                const description = normalizeSearchText(card.querySelector('p').textContent);
                const tags = Array.from(card.querySelectorAll('span')).map(span => 
                    normalizeSearchText(span.textContent)
                ).join(' ');
                
                let showCard = true;
                
                // Service category filter
                if (activeServiceCategory !== 'all' && category !== activeServiceCategory) {
                    showCard = false;
                }
                
                // Search filter with improved matching
                if (searchQuery) {
                    const searchTerms = searchQuery.split(' ').filter(term => term.length > 0);
                    const searchableContent = `${title} ${description} ${tags}`;
                    
                    // Check if all search terms are found (AND logic for multi-term search)
                    const allTermsFound = searchTerms.every(term => 
                        searchableContent.includes(term) ||
                        title.includes(term) ||
                        description.includes(term) ||
                        tags.includes(term)
                    );
                    
                    if (!allTermsFound) {
                        showCard = false;
                    }
                }
                
                if (showCard) {
                    card.style.display = 'block';
                    visibleCount++;
                    
                    // Highlight search terms
                    highlightSearchTerms(card, searchQuery);
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
        }
        
        // Update active filters display
        updateActiveFilters();
    }
    
    // Highlight search terms
    function highlightSearchTerms(card, query) {
        if (!query) return;
        
        const title = card.querySelector('h3');
        const description = card.querySelector('p');
        
        // Store original text
        const originalTitle = title.textContent;
        const originalDescription = description.textContent;
        
        // Remove existing highlights
        title.innerHTML = originalTitle;
        description.innerHTML = originalDescription;
        
        if (query.length > 0) {
            const searchTerms = query.split(' ').filter(term => term.length > 1);
            
            searchTerms.forEach(term => {
                // Create regex for case-insensitive, global match
                const regex = new RegExp(`(${escapeRegExp(term)})`, 'gi');
                
                // Highlight in title
                title.innerHTML = title.innerHTML.replace(regex, '<span class="search-highlight">$1</span>');
                
                // Highlight in description  
                description.innerHTML = description.innerHTML.replace(regex, '<span class="search-highlight">$1</span>');
            });
        }
    }
    
    // Escape special regex characters
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }
    
    // Update active filters display
    function updateActiveFilters() {
        const hasFilters = activeCategory !== 'all' || activeServiceCategory !== 'all' || activeBrands.length > 0 || searchQuery;
        
        if (hasFilters) {
            activeFiltersContainer.style.display = 'block';
            filterTagsContainer.innerHTML = '';
            
            // Add category filter tag
            if (activeMainCategory === 'products' && activeCategory !== 'all') {
                const categoryBtn = document.querySelector(`[data-category="${activeCategory}"]`);
                addFilterTag(categoryBtn.textContent, () => {
                    categoryBtn.click();
                });
            } else if (activeMainCategory === 'services' && activeServiceCategory !== 'all') {
                const serviceBtn = document.querySelector(`[data-service-category="${activeServiceCategory}"]`);
                addFilterTag(serviceBtn.textContent, () => {
                    serviceBtn.click();
                });
            }
            
            // Add brand filter tags
            activeBrands.forEach(brand => {
                const brandInput = document.querySelector(`[value="${brand}"]`);
                const brandLabel = brandInput.parentNode.textContent.trim();
                addFilterTag(brandLabel, () => {
                    brandInput.click();
                });
            });
            
            // Add search filter tag
            if (searchQuery) {
                addFilterTag(`Search: ${searchQuery}`, () => {
                    searchInput.value = '';
                    searchQuery = '';
                    filterContent();
                });
            }
        } else {
            activeFiltersContainer.style.display = 'none';
        }
    }
    
    // Add filter tag
    function addFilterTag(text, removeCallback) {
        const tag = document.createElement('span');
        tag.className = 'filter-tag';
        tag.innerHTML = `
            ${text}
            <span style="margin-left: 0.25rem; cursor: pointer;">&times;</span>
        `;
        tag.addEventListener('click', removeCallback);
        filterTagsContainer.appendChild(tag);
    }
    
    // Clear all filters
    window.clearFilters = function() {
        // Reset category
        if (activeMainCategory === 'products') {
            document.querySelector('[data-category="all"]').click();
        } else {
            document.querySelector('[data-service-category="all"]').click();
        }
        
        // Reset brand filters
        brandFilters.forEach(filter => {
            filter.checked = false;
        });
        activeBrands = [];
        
        // Reset search
        searchInput.value = '';
        searchQuery = '';
        
        filterContent();
    };
    
    // View Details button functionality
    document.querySelectorAll('.view-details-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const product = this.dataset.product;
            const service = this.dataset.service;
            
            if (product) {
                // Navigate to product detail page
                window.location.href = `<?php echo home_url('/product-detail/'); ?>?product=${product}`;
            } else if (service) {
                // Navigate to service detail page
                window.location.href = `<?php echo home_url('/service-detail/'); ?>?service=${service}`;
            }
        });
    });
    
    // Initial filter
    filterContent();
});
</script>

<?php get_footer(); ?>