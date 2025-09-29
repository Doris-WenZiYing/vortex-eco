<?php
/**
 * Template Name: Products Only
 * 
 * @package VortexEco
 */

get_header(); ?>

<!-- Products Page Header -->
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
            ">Wind Energy Products</h1>
            
            <p style="
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 3rem;
                line-height: 1.6;
            ">High-quality wind energy components and equipment for optimal performance</p>
            
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
                <input type="text" id="productSearch" placeholder="Search products..." style="
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
                
                <!-- Quick Actions -->
                <div style="
                    margin-top: 2rem;
                    padding-top: 2rem;
                    border-top: 1px solid #E5E7EB;
                ">
                    <button onclick="window.location.href='<?php echo home_url('/services/'); ?>'" style="
                        width: 100%;
                        background: linear-gradient(135deg, #059669, #10B981);
                        color: white;
                        border: none;
                        padding: 0.75rem 1rem;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        margin-bottom: 0.5rem;
                    ">View Services</button>
                    
                    <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                        width: 100%;
                        background: transparent;
                        color: #1263A0;
                        border: 2px solid #1263A0;
                        padding: 0.75rem 1rem;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    ">Contact Us</button>
                </div>
            </aside>
            
            <!-- Content Area -->
            <main class="content-container">

            <?php 
                $products = get_vortexeco_products();
                foreach ($products as $product): 
                    $primary_color = $product['color_primary'] ?: '#1263A0';
                    $secondary_color = $product['color_secondary'] ?: '#00A8E6';
                    $category_slugs = implode(' ', $product['categories']);
                    $brand_slugs = implode(' ', $product['brands']);
                ?>
                <div class="product-card" 
                    data-category="<?php echo esc_attr($category_slugs); ?>" 
                    data-brand="<?php echo esc_attr($brand_slugs); ?>" 
                    style="background: #FFFFFF; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); transition: all 0.4s ease; border: 1px solid #E5E7EB;">
                    
                    <div style="height: 200px; background: linear-gradient(135deg, <?php echo $primary_color; ?>, <?php echo $secondary_color; ?>); position: relative; display: flex; align-items: center; justify-content: center;">
                        <div style="font-size: 3rem; color: white; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                            <?php echo $product['icon'] ?: '🔧'; ?>
                        </div>
                        
                        <?php if (!empty($product['brands'])): ?>
                        <div style="position: absolute; top: 1rem; right: 1rem; background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; color: white; font-weight: 600;">
                            <?php echo ucfirst($product['brands'][0]); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div style="padding: 2rem;">
                        <h3 style="font-size: 1.3rem; font-weight: 700; color: #1F2937; margin-bottom: 0.5rem;">
                            <?php echo esc_html($product['title']); ?>
                        </h3>
                        
                        <p style="color: #6B7280; line-height: 1.6; margin-bottom: 1.5rem; font-size: 0.95rem;">
                            <?php echo esc_html($product['description']); ?>
                        </p>
                        
                        <?php if (!empty($product['features'])): ?>
                        <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                            <?php foreach (array_slice($product['features'], 0, 2) as $feature): ?>
                            <span style="background: rgba(<?php echo hexdec(substr($primary_color, 1, 2)) . ',' . hexdec(substr($primary_color, 3, 2)) . ',' . hexdec(substr($primary_color, 5, 2)); ?>, 0.1); color: <?php echo $primary_color; ?>; padding: 0.25rem 0.75rem; border-radius: 12px; font-size: 0.8rem; font-weight: 500;">
                                <?php echo esc_html(trim($feature)); ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        
                        <button class="view-details-btn" data-product="<?php echo $product['id']; ?>" style="width: 100%; background: linear-gradient(135deg, <?php echo $primary_color; ?>, <?php echo $secondary_color; ?>); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                            View Details
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- Products Grid -->
                
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
                    ">No matching products found</h3>
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
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section style="
    padding: 4rem 0;
    background: linear-gradient(135deg, #1263A0 0%, #0F5287 100%);
    color: white;
">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 2rem; text-align: center;">
        <h2 style="
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        ">Need a Custom Solution?</h2>
        
        <p style="
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 3rem;
            line-height: 1.6;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        ">Can't find what you're looking for? Our team can source custom products and provide tailored solutions for your specific requirements.</p>
        
        <div style="
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        ">
            <button onclick="window.location.href='<?php echo home_url('/contact-us/'); ?>'" style="
                background: rgba(255, 255, 255, 0.9);
                color: #1263A0;
                border: none;
                padding: 1.2rem 3rem;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">Request Quote</button>
            
            <button onclick="window.location.href='<?php echo home_url('/services/'); ?>'" style="
                background: transparent;
                color: white;
                border: 2px solid rgba(255, 255, 255, 0.5);
                padding: 1.2rem 3rem;
                border-radius: 8px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">View Services</button>
        </div>
    </div>
</section>

<style>
.filter-btn:hover {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
    transform: translateX(4px);
}

.filter-btn.active {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.15);
}

.product-card button:hover {
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
    
    .products-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const brandFilters = document.querySelectorAll('.brand-filter');
    const productCards = document.querySelectorAll('.product-card');
    const searchInput = document.getElementById('productSearch');
    const noResults = document.querySelector('.no-results');
    
    let activeCategory = 'all';
    let activeBrands = [];
    let searchQuery = '';
    
    // Category filtering
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.style.background = '#F3F4F6';
                b.style.color = '#4B5563';
                b.classList.remove('active');
            });
            
            this.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
            this.style.color = 'white';
            this.classList.add('active');
            
            activeCategory = this.dataset.category;
            filterProducts();
        });
    });
    
    // Brand filtering
    brandFilters.forEach(filter => {
        filter.addEventListener('change', function() {
            if (this.checked) {
                activeBrands.push(this.value);
            } else {
                activeBrands = activeBrands.filter(brand => brand !== this.value);
            }
            filterProducts();
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        searchQuery = this.value.toLowerCase();
        filterProducts();
    });
    
    // Filter products function
    function filterProducts() {
        let visibleCount = 0;
        
        productCards.forEach(card => {
            const category = card.dataset.category;
            const brand = card.dataset.brand;
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();
            
            let showCard = true;
            
            // Category filter
            if (activeCategory !== 'all' && category !== activeCategory) {
                showCard = false;
            }
            
            // Brand filter
            if (activeBrands.length > 0 && brand && !activeBrands.includes(brand)) {
                showCard = false;
            }
            
            // Search filter
            if (searchQuery && !title.includes(searchQuery) && !description.includes(searchQuery)) {
                showCard = false;
            }
            
            if (showCard) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
        }
    }
    
    // Clear filters
    window.clearFilters = function() {
        document.querySelector('[data-category="all"]').click();
        brandFilters.forEach(filter => {
            filter.checked = false;
        });
        activeBrands = [];
        searchInput.value = '';
        searchQuery = '';
        filterProducts();
    };
    
    // View Details button functionality
    document.querySelectorAll('.view-details-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const product = this.dataset.product;
            window.location.href = `<?php echo home_url('/product-detail/'); ?>?product=${product}`;
        });
    });
});
</script>

<?php get_footer(); ?>