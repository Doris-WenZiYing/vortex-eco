<?php
if (!defined('ABSPATH')) exit;

define('VORTEXECO_THEME_DIR', get_template_directory());
define('VORTEXECO_INC_DIR', VORTEXECO_THEME_DIR . '/inc');

// 核心功能
require_once VORTEXECO_INC_DIR . '/theme-setup.php';
require_once VORTEXECO_INC_DIR . '/enqueue-scripts.php';
require_once VORTEXECO_INC_DIR . '/customizer.php';
require_once VORTEXECO_INC_DIR . '/widgets.php';

// 自定义文章类型
require_once VORTEXECO_INC_DIR . '/post-types/products.php';
require_once VORTEXECO_INC_DIR . '/post-types/insights.php';
require_once VORTEXECO_INC_DIR . '/post-types/services.php';

// Meta Boxes
require_once VORTEXECO_INC_DIR . '/meta-boxes/product-fields.php';
require_once VORTEXECO_INC_DIR . '/meta-boxes/insight-fields.php';

// 管理员功能
require_once VORTEXECO_INC_DIR . '/admin/admin-menu.php';
require_once VORTEXECO_INC_DIR . '/admin/sample-data.php';

// 辅助函数
require_once VORTEXECO_INC_DIR . '/helpers/product-functions.php';
require_once VORTEXECO_INC_DIR . '/helpers/insight-functions.php';

// 其他功能
require_once VORTEXECO_INC_DIR . '/contact-form.php';
require_once VORTEXECO_INC_DIR . '/rewrite-rules.php';