<?php
/**
 * The template for displaying comments
 *
 * @package VortexEco
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area" style="
    background: var(--bg-white);
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-sm);
    padding: 3rem;
    margin-top: 3rem;
">
    
    <?php if (have_comments()) : ?>
        
        <!-- Comments Header -->
        <header class="comments-header" style="
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid var(--bg-light);
            text-align: center;
        ">
            <h3 class="comments-title" style="
                font-size: 2rem;
                color: var(--primary-color);
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1rem;
            ">
                <span style="font-size: 2.5rem;">💬</span>
                <?php
                $comments_number = get_comments_number();
                printf(
                    esc_html(_nx('%d Comment', '%d Comments', $comments_number, 'comments title', 'vortex-eco')),
                    number_format_i18n($comments_number)
                );
                ?>
            </h3>
            
            <p style="color: var(--text-medium); font-size: 1.1rem; margin: 0;">
                <?php esc_html_e('Join the conversation and share your thoughts on this article.', 'vortex-eco'); ?>
            </p>
        </header>

        <!-- Comments Navigation (if needed) -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comments-navigation" style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
                padding: 1rem;
                background: var(--bg-light);
                border-radius: var(--border-radius);
            ">
                <div class="nav-previous">
                    <?php previous_comments_link(esc_html__('← Older Comments', 'vortex-eco')); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(esc_html__('Newer Comments →', 'vortex-eco')); ?>
                </div>
            </nav>
        <?php endif; ?>

        <!-- Comments List -->
        <ol class="comment-list" style="
            list-style: none;
            padding: 0;
            margin: 0 0 3rem 0;
        ">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'vortexeco_comment_template',
            ));
            ?>
        </ol>

        <!-- Comments Navigation (bottom) -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comments-navigation" style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
                padding: 1rem;
                background: var(--bg-light);
                border-radius: var(--border-radius);
            ">
                <div class="nav-previous">
                    <?php previous_comments_link(esc_html__('← Older Comments', 'vortex-eco')); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link(esc_html__('Newer Comments →', 'vortex-eco')); ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <!-- Comment Form -->
    <?php if (comments_open()) : ?>
        
        <div class="comment-respond-wrapper" style="
            background: var(--bg-light);
            padding: 2.5rem;
            border-radius: var(--border-radius-lg);
            margin-top: <?php echo have_comments() ? '3rem' : '0'; ?>;
        ">
            
            <div class="comment-form-header" style="
                text-align: center;
                margin-bottom: 2rem;
            ">
                <h3 style="
                    font-size: 1.8rem;
                    color: var(--primary-color);
                    margin-bottom: 0.5rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 0.5rem;
                ">
                    ✍️ <?php esc_html_e('Leave a Comment', 'vortex-eco'); ?>
                </h3>
                <p style="color: var(--text-medium); margin: 0;">
                    <?php esc_html_e('Share your thoughts and join our wind energy community discussion.', 'vortex-eco'); ?>
                </p>
            </div>
            
            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $aria_req = $req ? ' aria-required="true" required' : '';
            
            $comment_form_args = array(
                'title_reply'         => '',
                'title_reply_to'      => esc_html__('Leave a Reply to %s', 'vortex-eco'),
                'title_reply_before'  => '',
                'title_reply_after'   => '',
                'cancel_reply_link'   => esc_html__('Cancel Reply', 'vortex-eco'),
                'cancel_reply_before' => '<small>',
                'cancel_reply_after'  => '</small>',
                'label_submit'        => esc_html__('Post Comment', 'vortex-eco'),
                'submit_button'       => '<button name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary btn-lg">%4$s</button>',
                'comment_field'       => sprintf(
                    '<div class="comment-form-comment" style="margin-bottom: 1.5rem;">
                        <label for="comment" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">%1$s %2$s</label>
                        <textarea id="comment" name="comment" cols="45" rows="6" placeholder="%3$s" style="
                            width: 100%%;
                            padding: 1rem;
                            border: 2px solid var(--bg-grey);
                            border-radius: var(--border-radius);
                            font-size: 1rem;
                            font-family: inherit;
                            transition: var(--transition);
                            resize: vertical;
                        " onfocus="this.style.borderColor=\'var(--accent-color)\'" onblur="this.style.borderColor=\'var(--bg-grey)\'" required>%4$s</textarea>
                    </div>',
                    esc_html__('Comment', 'vortex-eco'),
                    $req ? '<span style="color: var(--accent-color);">*</span>' : '',
                    esc_attr__('Share your thoughts about this article...', 'vortex-eco'),
                    esc_textarea(wp_unslash($commenter['comment_author_email'] ?? ''))
                ),
                'fields' => array(
                    'author' => sprintf(
                        '<div class="comment-form-author" style="margin-bottom: 1.5rem;">
                            <label for="author" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">%1$s %2$s</label>
                            <input id="author" name="author" type="text" value="%3$s" placeholder="%4$s" style="
                                width: 100%%;
                                padding: 1rem;
                                border: 2px solid var(--bg-grey);
                                border-radius: var(--border-radius);
                                font-size: 1rem;
                                transition: var(--transition);
                            " onfocus="this.style.borderColor=\'var(--accent-color)\'" onblur="this.style.borderColor=\'var(--bg-grey)\'" %5$s />
                        </div>',
                        esc_html__('Name', 'vortex-eco'),
                        $req ? '<span style="color: var(--accent-color);">*</span>' : '',
                        esc_attr($commenter['comment_author']),
                        esc_attr__('Your full name', 'vortex-eco'),
                        $aria_req
                    ),
                    'email' => sprintf(
                        '<div class="comment-form-email" style="margin-bottom: 1.5rem;">
                            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">%1$s %2$s</label>
                            <input id="email" name="email" type="email" value="%3$s" placeholder="%4$s" style="
                                width: 100%%;
                                padding: 1rem;
                                border: 2px solid var(--bg-grey);
                                border-radius: var(--border-radius);
                                font-size: 1rem;
                                transition: var(--transition);
                            " onfocus="this.style.borderColor=\'var(--accent-color)\'" onblur="this.style.borderColor=\'var(--bg-grey)\'" %5$s />
                            <small style="color: var(--text-light); font-size: 0.85rem; margin-top: 0.25rem; display: block;">%6$s</small>
                        </div>',
                        esc_html__('Email', 'vortex-eco'),
                        $req ? '<span style="color: var(--accent-color);">*</span>' : '',
                        esc_attr($commenter['comment_author_email']),
                        esc_attr__('your@email.com', 'vortex-eco'),
                        $aria_req,
                        esc_html__('Your email address will not be published.', 'vortex-eco')
                    ),
                    'url' => sprintf(
                        '<div class="comment-form-url" style="margin-bottom: 1.5rem;">
                            <label for="url" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: var(--text-dark);">%1$s</label>
                            <input id="url" name="url" type="url" value="%2$s" placeholder="%3$s" style="
                                width: 100%%;
                                padding: 1rem;
                                border: 2px solid var(--bg-grey);
                                border-radius: var(--border-radius);
                                font-size: 1rem;
                                transition: var(--transition);
                            " onfocus="this.style.borderColor=\'var(--accent-color)\'" onblur="this.style.borderColor=\'var(--bg-grey)\'" />
                        </div>',
                        esc_html__('Website (optional)', 'vortex-eco'),
                        esc_attr($commenter['comment_author_url']),
                        esc_attr__('https://your-website.com', 'vortex-eco')
                    ),
                ),
                'comment_notes_before' => '',
                'comment_notes_after'  => sprintf(
                    '<div class="comment-notes" style="
                        background: rgba(var(--primary-color-rgb, 18, 99, 160), 0.05);
                        padding: 1rem;
                        border-radius: var(--border-radius);
                        margin-top: 1rem;
                        font-size: 0.9rem;
                        color: var(--text-medium);
                    ">
                        <p style="margin: 0 0 0.5rem 0;"><strong>%1$s</strong></p>
                        <p style="margin: 0;">%2$s</p>
                    </div>',
                    esc_html__('Comment Guidelines:', 'vortex-eco'),
                    esc_html__('Please be respectful and constructive. Comments are moderated and may take some time to appear.', 'vortex-eco')
                ),
                'class_form'          => 'comment-form',
                'class_submit'        => 'submit',
            );
            
            comment_form($comment_form_args);
            ?>
        </div>

    <?php elseif (!comments_open() && have_comments()) : ?>
        
        <div class="comments-closed" style="
            text-align: center;
            padding: 2rem;
            background: var(--bg-light);
            border-radius: var(--border-radius-lg);
            margin-top: 3rem;
        ">
            <div style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.6;">🔒</div>
            <h3 style="color: var(--primary-color); margin-bottom: 1rem;">
                <?php esc_html_e('Comments are Closed', 'vortex-eco'); ?>
            </h3>
            <p style="color: var(--text-medium); margin: 0;">
                <?php esc_html_e('Comments are no longer being accepted for this article.', 'vortex-eco'); ?>
            </p>
        </div>

    <?php endif; ?>
</div>

<?php
/**
 * Custom comment template
 */
function vortexeco_comment_template($comment, $args, $depth) {
    $tag = ($args['style'] === 'div') ? 'div' : 'li';
    ?>
    
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-item'); ?> style="
        background: var(--bg-white);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-sm);
        padding: 2rem;
        margin-bottom: 2rem;
        border-left: 4px solid var(--bg-light);
        transition: var(--transition);
    " onmouseover="this.style.borderLeftColor='var(--accent-color)'" onmouseout="this.style.borderLeftColor='var(--bg-light)'">
        
        <article class="comment-body">
            
            <!-- Comment Header -->
            <header class="comment-meta" style="
                display: flex;
                align-items: flex-start;
                gap: 1rem;
                margin-bottom: 1.5rem;
            ">
                
                <!-- Avatar -->
                <div class="comment-avatar" style="flex-shrink: 0;">
                    <?php echo get_avatar($comment, $args['avatar_size'], '', '', array(
                        'style' => 'border-radius: 50%; border: 3px solid var(--bg-light);'
                    )); ?>
                </div>
                
                <!-- Comment Info -->
                <div class="comment-info" style="flex: 1; min-width: 0;">
                    
                    <!-- Author Name -->
                    <div class="comment-author-name" style="
                        font-size: 1.1rem;
                        font-weight: 600;
                        color: var(--primary-color);
                        margin-bottom: 0.25rem;
                    ">
                        <?php
                        $author_url = get_comment_author_url($comment);
                        if ($author_url) {
                            echo '<a href="' . esc_url($author_url) . '" target="_blank" rel="noopener" style="color: var(--primary-color); text-decoration: none;">';
                            comment_author($comment);
                            echo ' <span style="font-size: 0.8rem; opacity: 0.7;">↗</span></a>';
                        } else {
                            comment_author($comment);
                        }
                        
                        // Author badge for post author
                        if ($comment->user_id === get_the_author_meta('ID')) {
                            echo ' <span style="
                                background: var(--accent-color);
                                color: white;
                                padding: 0.15rem 0.5rem;
                                border-radius: var(--border-radius);
                                font-size: 0.7rem;
                                font-weight: 500;
                                text-transform: uppercase;
                                margin-left: 0.5rem;
                            ">' . esc_html__('Author', 'vortex-eco') . '</span>';
                        }
                        ?>
                    </div>
                    
                    <!-- Comment Date & Actions -->
                    <div class="comment-metadata" style="
                        display: flex;
                        align-items: center;
                        gap: 1rem;
                        font-size: 0.85rem;
                        color: var(--text-light);
                        flex-wrap: wrap;
                    ">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php comment_date(); ?> <?php esc_html_e('at', 'vortex-eco'); ?> <?php comment_time(); ?>
                        </time>
                        
                        <?php if ($comment->comment_approved === '0') : ?>
                            <span style="
                                background: #FFF3CD;
                                color: #856404;
                                padding: 0.25rem 0.5rem;
                                border-radius: var(--border-radius);
                                font-size: 0.75rem;
                            ">
                                <?php esc_html_e('Your comment is awaiting moderation.', 'vortex-eco'); ?>
                            </span>
                        <?php endif; ?>
                        
                        <?php
                        comment_reply_link(array_merge($args, array(
                            'add_below' => 'comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<span class="reply-link">',
                            'after'     => '</span>',
                        )));
                        ?>
                        
                        <?php edit_comment_link(
                            esc_html__('Edit', 'vortex-eco'),
                            '<span class="edit-link">',
                            '</span>'
                        ); ?>
                    </div>
                </div>
            </header>
            
            <!-- Comment Content -->
            <div class="comment-content" style="
                color: var(--text-medium);
                line-height: 1.7;
                font-size: 1rem;
                word-wrap: break-word;
            ">
                <?php comment_text(); ?>
            </div>
        </article>
    </<?php echo $tag; ?>>
    
    <?php
}
?>

<!-- Comments Specific Styles -->
<style>
.comment-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.comment-form-comment,
.comment-notes {
    grid-column: 1 / -1;
}

.comment-form .submit {
    grid-column: 1 / -1;
    justify-self: center;
}

.comment-reply-link,
.comment-edit-link {
    color: var(--accent-color);
    text-decoration: none;
    font-size: 0.85rem;
    transition: var(--transition);
}

.comment-reply-link:hover,
.comment-edit-link:hover {
    color: var(--primary-color);
}

.bypostauthor > .comment-body {
    border-left-color: var(--primary-color) !important;
    background: rgba(var(--primary-color-rgb, 18, 99, 160), 0.02);
}

.comment-list .children {
    margin-left: 2rem;
    margin-top: 1rem;
    border-left: 2px solid var(--bg-light);
    padding-left: 2rem;
}

@media (max-width: 768px) {
    .comments-area {
        padding: 2rem !important;
    }
    
    .comment-form {
        grid-template-columns: 1fr !important;
    }
    
    .comment-item {
        padding: 1.5rem !important;
    }
    
    .comment-list .children {
        margin-left: 1rem !important;
        padding-left: 1rem !important;
    }
    
    .comment-meta {
        flex-direction: column !important;
        align-items: center !important;
        text-align: center;
    }
    
    .comment-info {
        text-align: center;
    }
    
    .comment-metadata {
        justify-content: center !important;
    }
}

/* Comment loading animation */
.comment-item {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Form validation styles */
.comment-form input:invalid,
.comment-form textarea:invalid {
    border-color: #E74C3C;
}

.comment-form input:valid,
.comment-form textarea:valid {
    border-color: #27AE60;
}
</style>