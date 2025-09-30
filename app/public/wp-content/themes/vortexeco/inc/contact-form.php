<?php
/**
 * Contact Form Processing
 * 联络表单处理
 */

if (!defined('ABSPATH')) exit;

/**
 * 处理联络表单提交
 */
function vortexeco_process_contact_form() {
    // 检查表单是否提交
    if (!isset($_POST['contact_form_submit'])) {
        return;
    }
    
    // Nonce 验证
    if (!isset($_POST['contact_nonce']) || 
        !wp_verify_nonce($_POST['contact_nonce'], 'vortexeco_contact_form')) {
        wp_die('安全验证失败');
    }
    
    // 收集和清理表单数据
    $first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
    $service = isset($_POST['service_interest']) ? sanitize_text_field($_POST['service_interest']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    
    // 验证必填栏位
    $errors = array();
    
    if (empty($first_name)) {
        $errors[] = '请填写名字';
    }
    if (empty($last_name)) {
        $errors[] = '请填写姓氏';
    }
    if (empty($email) || !is_email($email)) {
        $errors[] = '请填写有效的电子邮件';
    }
    if (empty($message)) {
        $errors[] = '请填写讯息内容';
    }
    
    // 如果有错误，重导回表单页面
    if (!empty($errors)) {
        $error_message = implode(', ', $errors);
        wp_redirect(add_query_arg(array(
            'contact' => 'error',
            'error_msg' => urlencode($error_message)
        ), wp_get_referer()));
        exit;
    }
    
    // 组合完整姓名
    $full_name = $first_name . ' ' . $last_name;
    
    // 准备邮件内容
    $to = get_theme_mod('company_email', 'TSD@vortexeco.com');
    $subject = sprintf('[VortexEco] 来自 %s 的询问', $full_name);
    
    $body = "您收到来自网站的新询问：\n\n";
    $body .= "姓名: {$full_name}\n";
    $body .= "电子邮件: {$email}\n";
    $body .= "公司: {$company}\n";
    $body .= "感兴趣的服务: {$service}\n\n";
    $body .= "讯息内容:\n{$message}\n\n";
    $body .= "---\n";
    $body .= "发送时间: " . current_time('mysql') . "\n";
    $body .= "来源IP: " . $_SERVER['REMOTE_ADDR'];
    
    // 设定邮件标头
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $full_name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );
    
    // 发送邮件
    $mail_sent = wp_mail($to, $subject, $body, $headers);
    
    // 根据发送结果重导向
    if ($mail_sent) {
        // 成功 - 可以在这里添加到 CRM 或数据库
        do_action('vortexeco_contact_form_success', array(
            'name' => $full_name,
            'email' => $email,
            'company' => $company,
            'service' => $service,
            'message' => $message
        ));
        
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        // 失败
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
    }
    exit;
}
add_action('init', 'vortexeco_process_contact_form');

/**
 * 在联络表单中显示回馈讯息
 * 使用方法: 在表单页面模板中调用 vortexeco_contact_form_message()
 */
function vortexeco_contact_form_message() {
    if (!isset($_GET['contact'])) {
        return;
    }
    
    $status = $_GET['contact'];
    
    if ($status === 'success') {
        echo '<div class="contact-message success">';
        echo '<p>✓ 感谢您的询问！我们会尽快回复您。</p>';
        echo '</div>';
    } elseif ($status === 'error') {
        $error_msg = isset($_GET['error_msg']) ? urldecode($_GET['error_msg']) : '发送失败，请稍后再试。';
        echo '<div class="contact-message error">';
        echo '<p>✗ ' . esc_html($error_msg) . '</p>';
        echo '</div>';
    }
}

/**
 * 联络表单 HTML（可在模板中使用）
 */
function vortexeco_contact_form_html() {
    ob_start();
    ?>
    <form method="post" class="vortexeco-contact-form">
        <?php wp_nonce_field('vortexeco_contact_form', 'contact_nonce'); ?>
        
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">名字 *</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            
            <div class="form-group">
                <label for="last_name">姓氏 *</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">电子邮件 *</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="company">公司名称</label>
            <input type="text" id="company" name="company">
        </div>
        
        <div class="form-group">
            <label for="service_interest">感兴趣的服务</label>
            <select id="service_interest" name="service_interest">
                <option value="">请选择...</option>
                <option value="offshore-wind">离岸风电</option>
                <option value="project-management">项目管理</option>
                <option value="consulting">咨询服务</option>
                <option value="maintenance">维护服务</option>
                <option value="other">其他</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="message">讯息内容 *</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        
        <button type="submit" name="contact_form_submit" class="btn-submit">
            发送讯息
        </button>
    </form>
    <?php
    return ob_get_clean();
}