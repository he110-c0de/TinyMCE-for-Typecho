<?php
/**
 * 为 Typecho 启用 TinyMCE 编辑器
 *
 * @package TinyMCE for Typecho
 * @author hello-code
 * @version 1.0
 * @link https://github.com/he110-c0de
 * Date: 2024-06-23
 */
class TinyMCE_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
        Typecho_Plugin::factory('admin/write-post.php')->richEditor = array('TinyMCE_Plugin', 'render');
        Typecho_Plugin::factory('admin/write-page.php')->richEditor = array('TinyMCE_Plugin', 'render');
    }
    
    public static function deactivate()
    {
    }
    
    public static function config(Typecho_Widget_Helper_Form $form)
    {
	}
    
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
	}
    
    public static function render($post)
    {
		$js = Typecho_Common::url('TinyMCE/tinymce/tinymce.min.js', Helper::options()->pluginUrl);
		echo '<script src="'. $js .'"></script>';
		echo <<<'EOF'
<script>
document.addEventListener("DOMContentLoaded", () => {
	tinymce.init({
	  selector: '#text',
	  language: 'zh_CN',
	  license_key: 'gpl',
	  plugins: 'accordion advlist anchor autolink autoresize autosave charmap code codesample directionality emoticons fullscreen help image importcss insertdatetime link lists media nonbreaking pagebreak preview quickbars save searchreplace table visualblocks visualchars wordcount',
	  toolbar: 'blocks | bullist numlist | image link media codesample table accordion | charmap emoticons hr | pagebreak nonbreaking anchor | insertdatetime | bold italic underline strikethrough superscript subscript codeformat | fontfamily fontsize align lineheight forecolor backcolor | removeformat | ltr rtl | undo redo | selectall searchreplace | code | visualaid visualchars visualblocks | preview fullscreen | help',
	  min_height: 600,
	  resize: true,
	  toolbar_mode: 'sliding',
	  image_advtab: true,
	  importcss_append: true
	}); 
});
</script>
EOF;
    }
}
