<?php
/**
 * Template Name: Market Insights (FIXED)
 * 
 * @package VortexEco
 */

get_header(); ?>

<!-- Market Insights Page Header -->
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
        left: 20;
        right: 20;
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
            ">Market Insights</h1>
            
            <p style="
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 3rem;
                line-height: 1.6;
            ">Latest wind energy industry updates and market trend analysis</p>
            
            <!-- Search and Filter Bar -->
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
                <input type="text" id="insightsSearch" placeholder="Search articles..." style="
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
    margin-left: 10rem;
    margin-right: 10rem;
">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 2rem;">
        <?php
            // Get all articles
            $all_articles = get_insight_articles();

            // Get featured article
            $featured_article = null;
            $regular_articles = array();

            foreach ($all_articles as $article) {
                if ($article['featured']) {
                    $featured_article = $article;
                } else {
                    $regular_articles[] = $article;
                }
            }

            // If no featured article, use the first one
            if (!$featured_article && !empty($all_articles)) {
                $featured_article = $all_articles[0];
                $regular_articles = array_slice($all_articles, 1);
            }
        ?>
        
        <!-- Featured Article -->
        <?php if ($featured_article): ?>
            <div class="featured-article" data-article-id="<?php echo $featured_article['id']; ?>" style="background: #FFFFFF; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); margin-bottom: 3rem; border: 1px solid #E5E7EB; cursor: pointer;">
                <div style="height: 300px; background: linear-gradient(135deg, rgba(18, 99, 160, 0.8), rgba(0, 168, 230, 0.8)); background-size: cover; background-position: center; position: relative; display: flex; align-items: end;">
                    
                    <div style="position: absolute; top: 1rem; left: 1rem; background: rgba(255, 255, 255, 0.9); color: #1263A0; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">Featured Article</div>
                    
                    <div style="padding: 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.7)); width: 100%; color: white;">
                        <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; line-height: 1.3;">
                            <?php echo esc_html($featured_article['title']); ?>
                        </h2>
                        
                        <p style="font-size: 1.1rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 1rem; line-height: 1.6;">
                            <?php echo esc_html($featured_article['excerpt']); ?>
                        </p>
                        
                        <div style="display: flex; align-items: center; gap: 1rem; font-size: 0.9rem; color: rgba(255, 255, 255, 0.8);">
                            <span><?php echo $featured_article['date']; ?></span>
                            <span>•</span>
                            <span><?php echo $featured_article['read_time']; ?> min read</span>
                            <span>•</span>
                            <span><?php echo implode(', ', $featured_article['category_names']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Filter Categories -->
        <div style="
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
            justify-content: center;
        ">
            <button class="category-filter active" data-category="all" style="
                background: linear-gradient(135deg, #1263A0, #00A8E6);
                color: white;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            ">All Articles</button>
            
            <button class="category-filter" data-category="market-analysis" style="
                background: #F3F4F6;
                color: #4B5563;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            ">Market Analysis</button>
            
            <button class="category-filter" data-category="technology" style="
                background: #F3F4F6;
                color: #4B5563;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            ">Technology Innovation</button>
            
            <button class="category-filter" data-category="policy" style="
                background: #F3F4F6;
                color: #4B5563;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            ">Policy & Regulations</button>
            
            <button class="category-filter" data-category="industry-news" style="
                background: #F3F4F6;
                color: #4B5563;
                border: none;
                padding: 0.75rem 1.5rem;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                font-size: 0.9rem;
            ">Industry News</button>
        </div>
        
        <!-- Articles Grid -->
        <div class="articles-grid" style="
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 320px));
            gap: 2rem;
            margin-bottom: 3rem;
            justify-content: center;
        ">
            <?php 
            $category_colors = array(
                'market-analysis' => array('bg' => 'linear-gradient(135deg, rgba(5, 150, 105, 0.8), rgba(16, 185, 129, 0.8))', 'badge' => 'rgba(5, 150, 105, 0.9)'),
                'technology' => array('bg' => 'linear-gradient(135deg, rgba(124, 58, 237, 0.8), rgba(168, 85, 247, 0.8))', 'badge' => 'rgba(124, 58, 237, 0.9)'),
                'policy' => array('bg' => 'linear-gradient(135deg, rgba(220, 38, 38, 0.8), rgba(239, 68, 68, 0.8))', 'badge' => 'rgba(220, 38, 38, 0.9)'),
                'industry-news' => array('bg' => 'linear-gradient(135deg, rgba(245, 158, 11, 0.8), rgba(251, 191, 36, 0.8))', 'badge' => 'rgba(245, 158, 11, 0.9)'),
            );
            
            foreach ($regular_articles as $article): 
                $category = !empty($article['categories']) ? $article['categories'][0] : 'industry-news';
                $color = isset($category_colors[$category]) ? $category_colors[$category] : $category_colors['industry-news'];
            ?>
            
            <article class="article-card" 
                data-category="<?php echo esc_attr($category); ?>" 
                data-article-id="<?php echo $article['id']; ?>" 
                style="background: #FFFFFF; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); transition: all 0.4s ease; border: 1px solid #E5E7EB; cursor: pointer;">
                
                <div style="height: 200px; background: <?php echo $color['bg']; ?>; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem; font-weight: 700; position: relative;">
                    <?php echo substr($article['title'], 0, 10); ?>
                    <div style="position: absolute; top: 1rem; left: 1rem; background: <?php echo $color['badge']; ?>; color: white; padding: 0.25rem 0.75rem; border-radius: 12px; font-size: 0.75rem; font-weight: 600;">
                        <?php echo implode(', ', $article['category_names']); ?>
                    </div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.2rem; font-weight: 700; color: #1F2937; margin-bottom: 0.5rem; line-height: 1.4;">
                        <?php echo esc_html($article['title']); ?>
                    </h3>
                    
                    <p style="color: #6B7280; line-height: 1.6; margin-bottom: 1rem; font-size: 0.9rem;">
                        <?php echo esc_html($article['excerpt']); ?>
                    </p>
                    
                    <div style="display: flex; align-items: center; justify-content: space-between; font-size: 0.8rem; color: #9CA3AF;">
                        <span><?php echo $article['date']; ?></span>
                        <span><?php echo $article['read_time']; ?> min read</span>
                    </div>
                </div>
            </article>
            
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Newsletter Subscription -->
<section style="
    padding: 4rem 0;
    background: linear-gradient(135deg, #1263A0, #00A8E6);
    color: white;
">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 2rem; text-align: center;">
        <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem;">
            Subscribe to Market Insights
        </h2>
        
        <p style="font-size: 1.1rem; color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem; line-height: 1.6;">
            Get the latest wind energy industry updates and professional analysis first
        </p>
        
        <form style="display: flex; gap: 1rem; max-width: 400px; margin: 0 auto;">
            <input type="email" placeholder="Enter your email address" style="
                flex: 1;
                padding: 1rem;
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                outline: none;
            " />
            <button type="submit" style="
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: 1px solid rgba(255, 255, 255, 0.3);
                padding: 1rem 2rem;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                white-space: nowrap;
            ">Subscribe</button>
        </form>
    </div>
</section>

<style>
.category-filter:hover {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
    transform: translateY(-2px);
}

.category-filter.active {
    background: linear-gradient(135deg, #1263A0, #00A8E6) !important;
    color: white !important;
}

.article-card:hover, .featured-article:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.15);
}

@media (max-width: 768px) {
    .articles-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const articleCards = document.querySelectorAll('.article-card');
    const searchInput = document.getElementById('insightsSearch');
    
    let activeCategory = 'all';
    let searchQuery = '';
    
    // Category filtering
    categoryFilters.forEach(btn => {
        btn.addEventListener('click', function() {
            categoryFilters.forEach(b => {
                b.style.background = '#F3F4F6';
                b.style.color = '#4B5563';
                b.classList.remove('active');
            });
            
            this.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
            this.style.color = 'white';
            this.classList.add('active');
            
            activeCategory = this.dataset.category;
            filterArticles();
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        searchQuery = this.value.toLowerCase();
        filterArticles();
    });
    
    // Filter articles function
    function filterArticles() {
        let visibleCount = 0;
        
        articleCards.forEach(card => {
            const category = card.dataset.category;
            const title = card.querySelector('h3').textContent.toLowerCase();
            const content = card.querySelector('p').textContent.toLowerCase();
            
            let showCard = true;
            
            if (activeCategory !== 'all' && category !== activeCategory) {
                showCard = false;
            }
            
            if (searchQuery && !title.includes(searchQuery) && !content.includes(searchQuery)) {
                showCard = false;
            }
            
            card.style.display = showCard ? 'block' : 'none';
            if (showCard) visibleCount++;
        });
    }
    
    // FIXED: Article click handling - Navigate to article detail
    articleCards.forEach(card => {
        card.addEventListener('click', function() {
            const articleId = this.getAttribute('data-article-id');
            if (articleId) {
                window.location.href = `<?php echo home_url('/article-detail/'); ?>?article=${articleId}`;
            }
        });
    });
    
    // Featured article click
    const featuredArticle = document.querySelector('.featured-article');
    if (featuredArticle) {
        featuredArticle.addEventListener('click', function() {
            const articleId = this.getAttribute('data-article-id');
            if (articleId) {
                window.location.href = `<?php echo home_url('/article-detail/'); ?>?article=${articleId}`;
            }
        });
    }
});
</script>

<?php get_footer(); ?>