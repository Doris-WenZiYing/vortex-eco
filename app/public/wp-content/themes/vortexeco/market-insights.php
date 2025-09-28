<?php
/**
 * Template Name: Market Insights
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
    <div class="container">
        
        <!-- Featured Article -->
        <div style="
            background: #FFFFFF;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            margin-bottom: 3rem;
            border: 1px solid #E5E7EB;
        ">
            <div style="
                height: 300px;
                background: linear-gradient(135deg, rgba(18, 99, 160, 0.8), rgba(0, 168, 230, 0.8)), 
                           #E5E7EB;
                background-size: cover;
                background-position: center;
                position: relative;
                display: flex;
                align-items: end;
            ">
                <div style="
                    position: absolute;
                    top: 1rem;
                    left: 1rem;
                    background: rgba(255, 255, 255, 0.9);
                    color: #1263A0;
                    padding: 0.5rem 1rem;
                    border-radius: 20px;
                    font-size: 0.8rem;
                    font-weight: 600;
                ">Featured Article</div>
                
                <div style="
                    padding: 2rem;
                    background: linear-gradient(transparent, rgba(0,0,0,0.7));
                    width: 100%;
                    color: white;
                ">
                    <h2 style="
                        font-size: 2rem;
                        font-weight: 700;
                        margin-bottom: 0.5rem;
                        line-height: 1.3;
                    ">Global Wind Energy Market Development Trends 2024</h2>
                    
                    <p style="
                        font-size: 1.1rem;
                        color: rgba(255, 255, 255, 0.9);
                        margin-bottom: 1rem;
                        line-height: 1.6;
                    ">In-depth analysis of the latest developments in the global wind energy industry, including technological innovations, policy support and market opportunities...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        gap: 1rem;
                        font-size: 0.9rem;
                        color: rgba(255, 255, 255, 0.8);
                    ">
                        <span>September 11, 2024</span>
                        <span>•</span>
                        <span>5 min read</span>
                        <span>•</span>
                        <span>Market Analysis</span>
                    </div>
                </div>
            </div>
        </div>
        
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
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        ">
            
            <!-- Article 1 -->
            <article class="article-card" data-category="technology" style="
                background: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                transition: all 0.4s ease;
                border: 1px solid #E5E7EB;
                cursor: pointer;
            ">
                <div style="
                    height: 200px;
                    background: linear-gradient(135deg, rgba(124, 58, 237, 0.8), rgba(168, 85, 247, 0.8)), #F3E8FF;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2rem;
                    font-weight: 700;
                    position: relative;
                ">
                    Wind Tech
                    <div style="
                        position: absolute;
                        top: 1rem;
                        left: 1rem;
                        background: rgba(124, 58, 237, 0.9);
                        color: white;
                        padding: 0.25rem 0.75rem;
                        border-radius: 12px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    ">Technology Innovation</div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                        line-height: 1.4;
                    ">Breakthrough in Next-Generation Offshore Wind Blade Design</h3>
                    
                    <p style="
                        color: #6B7280;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                        font-size: 0.9rem;
                    ">Latest composite material technology increases wind blade efficiency by 15% while reducing maintenance costs...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        font-size: 0.8rem;
                        color: #9CA3AF;
                    ">
                        <span>September 8, 2024</span>
                        <span>3 min read</span>
                    </div>
                </div>
            </article>
            
            <!-- Article 2 -->
            <article class="article-card" data-category="market-analysis" style="
                background: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                transition: all 0.4s ease;
                border: 1px solid #E5E7EB;
                cursor: pointer;
            ">
                <div style="
                    height: 200px;
                    background: linear-gradient(135deg, rgba(5, 150, 105, 0.8), rgba(16, 185, 129, 0.8)), #ECFDF5;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2rem;
                    font-weight: 700;
                    position: relative;
                ">
                    Charts
                    <div style="
                        position: absolute;
                        top: 1rem;
                        left: 1rem;
                        background: rgba(5, 150, 105, 0.9);
                        color: white;
                        padding: 0.25rem 0.75rem;
                        border-radius: 12px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    ">Market Analysis</div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                        line-height: 1.4;
                    ">Asia-Pacific Wind Energy Investment Grows 30%</h3>
                    
                    <p style="
                        color: #6B7280;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                        font-size: 0.9rem;
                    ">Wind energy investment in the Asia-Pacific region reached new highs in H1 2024, with China and India leading market growth...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        font-size: 0.8rem;
                        color: #9CA3AF;
                    ">
                        <span>September 5, 2024</span>
                        <span>4 min read</span>
                    </div>
                </div>
            </article>
            
            <!-- Article 3 -->
            <article class="article-card" data-category="policy" style="
                background: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                transition: all 0.4s ease;
                border: 1px solid #E5E7EB;
                cursor: pointer;
            ">
                <div style="
                    height: 200px;
                    background: linear-gradient(135deg, rgba(220, 38, 38, 0.8), rgba(239, 68, 68, 0.8)), #FEF2F2;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2rem;
                    font-weight: 700;
                    position: relative;
                ">
                    Policy
                    <div style="
                        position: absolute;
                        top: 1rem;
                        left: 1rem;
                        background: rgba(220, 38, 38, 0.9);
                        color: white;
                        padding: 0.25rem 0.75rem;
                        border-radius: 12px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    ">Policy & Regulations</div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                        line-height: 1.4;
                    ">EU REPowerEU Plan Update</h3>
                    
                    <p style="
                        color: #6B7280;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                        font-size: 0.9rem;
                    ">The European Commission announces new renewable energy targets with wind energy to account for 42.5% by 2030...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        font-size: 0.8rem;
                        color: #9CA3AF;
                    ">
                        <span>September 3, 2024</span>
                        <span>6 min read</span>
                    </div>
                </div>
            </article>
            
            <!-- Article 4 -->
            <article class="article-card" data-category="industry-news" style="
                background: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                transition: all 0.4s ease;
                border: 1px solid #E5E7EB;
                cursor: pointer;
            ">
                <div style="
                    height: 200px;
                    background: linear-gradient(135deg, rgba(245, 158, 11, 0.8), rgba(251, 191, 36, 0.8)), #FFFBEB;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2rem;
                    font-weight: 700;
                    position: relative;
                ">
                    News
                    <div style="
                        position: absolute;
                        top: 1rem;
                        left: 1rem;
                        background: rgba(245, 158, 11, 0.9);
                        color: white;
                        padding: 0.25rem 0.75rem;
                        border-radius: 12px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    ">Industry News</div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                        line-height: 1.4;
                    ">Taiwan Offshore Wind Phase 3 Selection Results</h3>
                    
                    <p style="
                        color: #6B7280;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                        font-size: 0.9rem;
                    ">Ministry of Economic Affairs announces offshore wind block development Phase 1 selection results, expected to add 3.5GW capacity...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        font-size: 0.8rem;
                        color: #9CA3AF;
                    ">
                        <span>September 1, 2024</span>
                        <span>5 min read</span>
                    </div>
                </div>
            </article>
            
            <!-- Article 5 -->
            <article class="article-card" data-category="technology" style="
                background: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                transition: all 0.4s ease;
                border: 1px solid #E5E7EB;
                cursor: pointer;
            ">
                <div style="
                    height: 200px;
                    background: linear-gradient(135deg, rgba(18, 99, 160, 0.8), rgba(0, 168, 230, 0.8)), #EEF2FF;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2rem;
                    font-weight: 700;
                    position: relative;
                ">
                    AI Tech
                    <div style="
                        position: absolute;
                        top: 1rem;
                        left: 1rem;
                        background: rgba(18, 99, 160, 0.9);
                        color: white;
                        padding: 0.25rem 0.75rem;
                        border-radius: 12px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    ">Technology Innovation</div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                        line-height: 1.4;
                    ">AI-Driven Predictive Maintenance for Wind Turbines</h3>
                    
                    <p style="
                        color: #6B7280;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                        font-size: 0.9rem;
                    ">Machine learning technology improves turbine failure prediction accuracy to 95%, significantly reducing downtime...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        font-size: 0.8rem;
                        color: #9CA3AF;
                    ">
                        <span>August 28, 2024</span>
                        <span>7 min read</span>
                    </div>
                </div>
            </article>
            
            <!-- Article 6 -->
            <article class="article-card" data-category="market-analysis" style="
                background: #FFFFFF;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0,0,0,0.05);
                transition: all 0.4s ease;
                border: 1px solid #E5E7EB;
                cursor: pointer;
            ">
                <div style="
                    height: 200px;
                    background: linear-gradient(135deg, rgba(124, 58, 237, 0.8), rgba(168, 85, 247, 0.8)), #F3E8FF;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2rem;
                    font-weight: 700;
                    position: relative;
                ">
                    Cost
                    <div style="
                        position: absolute;
                        top: 1rem;
                        left: 1rem;
                        background: rgba(124, 58, 237, 0.9);
                        color: white;
                        padding: 0.25rem 0.75rem;
                        border-radius: 12px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    ">Market Analysis</div>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="
                        font-size: 1.2rem;
                        font-weight: 700;
                        color: #1F2937;
                        margin-bottom: 0.5rem;
                        line-height: 1.4;
                    ">Wind Power Cost Continues Declining Trend Analysis</h3>
                    
                    <p style="
                        color: #6B7280;
                        line-height: 1.6;
                        margin-bottom: 1rem;
                        font-size: 0.9rem;
                    ">Wind power average cost down 70% over the past decade, expected to decline further 25% by 2030...</p>
                    
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        font-size: 0.8rem;
                        color: #9CA3AF;
                    ">
                        <span>August 25, 2024</span>
                        <span>8 min read</span>
                    </div>
                </div>
            </article>
        </div>
        
        <!-- Load More Button -->
        <div style="text-align: center;">
            <button id="loadMore" style="
                background: linear-gradient(135deg, #1263A0, #00A8E6);
                color: white;
                border: none;
                padding: 1rem 3rem;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            ">Load More Articles</button>
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
        <h2 style="
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        ">Subscribe to Market Insights</h2>
        
        <p style="
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            line-height: 1.6;
        ">Get the latest wind energy industry updates and professional analysis first</p>
        
        <form style="
            display: flex;
            gap: 1rem;
            max-width: 400px;
            margin: 0 auto;
        ">
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

<!-- Add New Article Modal (Admin Only) -->
<?php if (current_user_can('edit_posts')): ?>
<div id="addArticleModal" style="
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 10000;
    justify-content: center;
    align-items: center;
">
    <div style="
        background: white;
        border-radius: 16px;
        padding: 2rem;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
    ">
        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">Add New Article</h3>
        
        <form id="addArticleForm" style="display: grid; gap: 1rem;">
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Title *</label>
                <input type="text" name="title" required style="
                    width: 100%;
                    padding: 0.75rem;
                    border: 1px solid #D1D5DB;
                    border-radius: 8px;
                " />
            </div>
            
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Category *</label>
                <select name="category" required style="
                    width: 100%;
                    padding: 0.75rem;
                    border: 1px solid #D1D5DB;
                    border-radius: 8px;
                ">
                    <option value="">Select Category</option>
                    <option value="market-analysis">Market Analysis</option>
                    <option value="technology">Technology Innovation</option>
                    <option value="policy">Policy & Regulations</option>
                    <option value="industry-news">Industry News</option>
                </select>
            </div>
            
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Summary *</label>
                <textarea name="summary" required rows="3" style="
                    width: 100%;
                    padding: 0.75rem;
                    border: 1px solid #D1D5DB;
                    border-radius: 8px;
                    font-family: inherit;
                "></textarea>
            </div>
            
            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Reading Time (minutes)</label>
                <input type="number" name="readTime" min="1" max="60" value="5" style="
                    width: 100%;
                    padding: 0.75rem;
                    border: 1px solid #D1D5DB;
                    border-radius: 8px;
                " />
            </div>
            
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <button type="button" onclick="closeAddArticleModal()" style="
                    background: #F3F4F6;
                    color: #4B5563;
                    border: none;
                    padding: 0.75rem 1.5rem;
                    border-radius: 8px;
                    cursor: pointer;
                ">Cancel</button>
                
                <button type="submit" style="
                    background: #1263A0;
                    color: white;
                    border: none;
                    padding: 0.75rem 1.5rem;
                    border-radius: 8px;
                    cursor: pointer;
                ">Add Article</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Article Button -->
<div style="
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    z-index: 1000;
">
    <button onclick="openAddArticleModal()" style="
        background: #1263A0;
        color: white;
        border: none;
        padding: 1rem;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        font-size: 1.5rem;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    ">+</button>
</div>
<?php endif; ?>

<!-- Styles and Scripts -->
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

.article-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(18, 99, 160, 0.15);
}

#loadMore:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

@media (max-width: 768px) {
    .category-filter {
        font-size: 0.8rem !important;
        padding: 0.5rem 1rem !important;
    }
}

.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 320px));
    gap: 2rem;
    margin-bottom: 3rem;
    justify-content: center;
}

@media (max-width: 768px) {
    .articles-grid {
        grid-template-columns: 1fr !important;
        justify-content: stretch;
    }
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
    const categoryFilters = document.querySelectorAll('.category-filter');
    const articleCards = document.querySelectorAll('.article-card');
    const searchInput = document.getElementById('insightsSearch');
    const loadMoreBtn = document.getElementById('loadMore');
    
    let activeCategory = 'all';
    let searchQuery = '';
    
    // Category filtering
    categoryFilters.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active button
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
            
            // Category filter
            if (activeCategory !== 'all' && category !== activeCategory) {
                showCard = false;
            }
            
            // Search filter
            if (searchQuery && !title.includes(searchQuery) && !content.includes(searchQuery)) {
                showCard = false;
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
        
        // Show/hide load more button
        if (visibleCount === 0) {
            loadMoreBtn.style.display = 'none';
        } else {
            loadMoreBtn.style.display = 'inline-block';
        }
    }
    
    // Highlight search terms
    function highlightSearchTerms(card, query) {
        if (!query) return;
        
        const title = card.querySelector('h3');
        const content = card.querySelector('p');
        
        // Store original text
        const originalTitle = title.textContent;
        const originalContent = content.textContent;
        
        // Remove existing highlights
        title.innerHTML = originalTitle;
        content.innerHTML = originalContent;
        
        if (query.length > 1) {
            const regex = new RegExp(`(${query})`, 'gi');
            title.innerHTML = title.innerHTML.replace(regex, '<span class="search-highlight">$1</span>');
            content.innerHTML = content.innerHTML.replace(regex, '<span class="search-highlight">$1</span>');
        }
    }
    
    // Article click handling - Navigate to article detail
    articleCards.forEach(card => {
        card.addEventListener('click', function() {
            const title = this.querySelector('h3').textContent;
            const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
            window.location.href = `<?php echo home_url('/article-detail/'); ?>?article=${slug}`;
        });
    });
    
    // Load more functionality
    loadMoreBtn.addEventListener('click', function() {
        this.textContent = 'Loading...';
        this.style.background = '#0F5287';
        
        setTimeout(() => {
            // In real implementation, this would load more articles via AJAX
            this.textContent = 'Load More Articles';
            this.style.background = 'linear-gradient(135deg, #1263A0, #00A8E6)';
            alert('More articles loaded successfully!');
        }, 2000);
    });
    
    // Newsletter subscription
    const newsletterForm = document.querySelector('section:last-of-type form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                alert('Thank you for subscribing! We will send you the latest market insights regularly.');
                this.reset();
            }
        });
    }
});

// Add Article Modal Functions (Admin Only)
<?php if (current_user_can('edit_posts')): ?>
function openAddArticleModal() {
    document.getElementById('addArticleModal').style.display = 'flex';
}

function closeAddArticleModal() {
    document.getElementById('addArticleModal').style.display = 'none';
    document.getElementById('addArticleForm').reset();
}

document.getElementById('addArticleForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const title = formData.get('title');
    const category = formData.get('category');
    const summary = formData.get('summary');
    const readTime = formData.get('readTime');
    
    // Create new article card
    const articleCard = createArticleCard(title, category, summary, readTime);
    document.querySelector('.articles-grid').insertBefore(articleCard, document.querySelector('.articles-grid').firstChild);
    
    closeAddArticleModal();
    alert('Article added successfully!');
});

function createArticleCard(title, category, summary, readTime) {
    const categoryColors = {
        'market-analysis': { bg: 'linear-gradient(135deg, rgba(5, 150, 105, 0.8), rgba(16, 185, 129, 0.8)), #ECFDF5', text: 'Market Analysis' },
        'technology': { bg: 'linear-gradient(135deg, rgba(124, 58, 237, 0.8), rgba(168, 85, 247, 0.8)), #F3E8FF', text: 'Technology Innovation' },
        'policy': { bg: 'linear-gradient(135deg, rgba(220, 38, 38, 0.8), rgba(239, 68, 68, 0.8)), #FEF2F2', text: 'Policy & Regulations' },
        'industry-news': { bg: 'linear-gradient(135deg, rgba(245, 158, 11, 0.8), rgba(251, 191, 36, 0.8)), #FFFBEB', text: 'Industry News' }
    };
    
    const categoryStyle = categoryColors[category];
    const today = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    
    const article = document.createElement('article');
    article.className = 'article-card';
    article.setAttribute('data-category', category);
    article.style.cssText = `
        background: #FFFFFF;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
        border: 1px solid #E5E7EB;
        cursor: pointer;
    `;
    
    article.innerHTML = `
        <div style="
            height: 200px;
            background: ${categoryStyle.bg};
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            position: relative;
        ">
            New
            <div style="
                position: absolute;
                top: 1rem;
                left: 1rem;
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 0.25rem 0.75rem;
                border-radius: 12px;
                font-size: 0.75rem;
                font-weight: 600;
            ">${categoryStyle.text}</div>
        </div>
        
        <div style="padding: 1.5rem;">
            <h3 style="
                font-size: 1.2rem;
                font-weight: 700;
                color: #1F2937;
                margin-bottom: 0.5rem;
                line-height: 1.4;
            ">${title}</h3>
            
            <p style="
                color: #6B7280;
                line-height: 1.6;
                margin-bottom: 1rem;
                font-size: 0.9rem;
            ">${summary}</p>
            
            <div style="
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-size: 0.8rem;
                color: #9CA3AF;
            ">
                <span>${today}</span>
                <span>${readTime} min read</span>
            </div>
        </div>
    `;
    
    // Add click handler
    article.addEventListener('click', function() {
        const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        window.location.href = `<?php echo home_url('/article-detail/'); ?>?article=${slug}`;
    });
    
    return article;
}
<?php endif; ?>
</script>

<?php get_footer(); ?>