<?php
/**
 * Plugin Name: Quick Chat Button
 * Description: Hiển thị nút chat nhanh với Messenger và Zalo trên website WordPress.
 * Version: 1.0
 * Author: Your Name
 */

// Thêm mục cài đặt vào menu Admin
function qcb_add_admin_menu() {
    add_options_page('Quick Chat Button', 'Quick Chat Button', 'manage_options', 'quick-chat-button', 'qcb_settings_page');
}
add_action('admin_menu', 'qcb_add_admin_menu');

// Đăng ký cài đặt
function qcb_register_settings() {
    register_setting('qcb_settings_group', 'qcb_enable_messenger');
    register_setting('qcb_settings_group', 'qcb_messenger_link');
    register_setting('qcb_settings_group', 'qcb_enable_zalo');
    register_setting('qcb_settings_group', 'qcb_zalo_number');
    register_setting('qcb_settings_group', 'qcb_button_text_messenger');
    register_setting('qcb_settings_group', 'qcb_button_text_zalo');
    register_setting('qcb_settings_group', 'qcb_messenger_color');
    register_setting('qcb_settings_group', 'qcb_zalo_color');
}
add_action('admin_init', 'qcb_register_settings');

// Tạo trang cài đặt
function qcb_settings_page() {
    ?>
    <div class="wrap">
        <h1>Quick Chat Button Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('qcb_settings_group');
            do_settings_sections('qcb_settings_group');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Bật Messenger</th>
                    <td><input type="checkbox" name="qcb_enable_messenger" value="1" <?php checked(get_option('qcb_enable_messenger'), 1); ?>></td>
                </tr>
                <tr>
                    <th scope="row">Link Messenger</th>
                    <td><input type="text" name="qcb_messenger_link" value="<?php echo esc_attr(get_option('qcb_messenger_link')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Nội dung nút Messenger</th>
                    <td><input type="text" name="qcb_button_text_messenger" value="<?php echo esc_attr(get_option('qcb_button_text_messenger', 'Chat với Messenger')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Bật Zalo</th>
                    <td><input type="checkbox" name="qcb_enable_zalo" value="1" <?php checked(get_option('qcb_enable_zalo'), 1); ?>></td>
                </tr>
                <tr>
                    <th scope="row">Số điện thoại Zalo</th>
                    <td><input type="text" name="qcb_zalo_number" value="<?php echo esc_attr(get_option('qcb_zalo_number')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Nội dung nút Zalo</th>
                    <td><input type="text" name="qcb_button_text_zalo" value="<?php echo esc_attr(get_option('qcb_button_text_zalo', 'Chat với Zalo')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Màu Messenger</th>
                    <td><input type="color" name="qcb_messenger_color" value="<?php echo esc_attr(get_option('qcb_messenger_color', '#0078FF')); ?>"></td>
                </tr>
                <tr>
                    <th scope="row">Màu Zalo</th>
                    <td><input type="color" name="qcb_zalo_color" value="<?php echo esc_attr(get_option('qcb_zalo_color', '#0088CC')); ?>"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Hiển thị nút chat trên frontend
function qcb_display_chat_button() {
    $enable_messenger = get_option('qcb_enable_messenger');
    $messenger_link = esc_url(get_option('qcb_messenger_link'));
    $messenger_color = esc_attr(get_option('qcb_messenger_color', '#0078FF'));
    $button_text_messenger = esc_html(get_option('qcb_button_text_messenger', 'Chat với Messenger'));
    
    $enable_zalo = get_option('qcb_enable_zalo');
    $zalo_number = esc_attr(get_option('qcb_zalo_number'));
    $zalo_color = esc_attr(get_option('qcb_zalo_color', '#0088CC'));
    $button_text_zalo = esc_html(get_option('qcb_button_text_zalo', 'Chat với Zalo'));
    ?>
    <style>
        .qcb-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 9999;
        }
        .qcb-chat-button a {
            display: flex;
            align-items: center;
            padding: 10px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            width: 160px;
            justify-content: center;
        }
    </style>
    <div class="qcb-chat-button">
        <?php if ($enable_messenger && !empty($messenger_link)) : ?>
            <a href="<?php echo $messenger_link; ?>" target="_blank" style="background-color: <?php echo $messenger_color; ?>;">
                <i class="fa fa-facebook-messenger"></i> <?php echo $button_text_messenger; ?>
            </a>
        <?php endif; ?>
        <?php if ($enable_zalo && !empty($zalo_number)) : ?>
            <a href="https://zalo.me/<?php echo $zalo_number; ?>" target="_blank" style="background-color: <?php echo $zalo_color; ?>;">
                <i class="fa fa-zalo"></i> <?php echo $button_text_zalo; ?>
            </a>
        <?php endif; ?>
    </div>
    <?php
}
add_action('wp_footer', 'qcb_display_chat_button');
