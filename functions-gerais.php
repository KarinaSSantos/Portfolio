<?php 

//como add novo css para temas filhos 

add_action('wp_enqueue_scripts', 'construction_lite_child_enqueue_styles');
function construction_lite_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}



//Mudar texto do footer do painel adm
function change_footer_admin()
{
    echo 'seu texto aqui';
}
add_filter('admin_footer_text', 'change_footer_admin');


//Adiciona ao tema uma caixa de contato
function b3m_add_dashboard_widgets()
{
    wp_add_dashboard_widget('wp_dashboard_widget', 'Sobre o site', 'b3m_theme_info');
}
add_action('wp_dashboard_setup', 'b3m_add_dashboard_widgets');
 
function b3m_theme_info()
{
    echo "<ul>
  <li>seus itens</li>
  </ul>";
}


//Modifica o logotipo de login Wordpress para o próprio
add_action('login_head', 'b3m_custom_login_logo');
function b3m_custom_login_logo()
{
    echo '<style type="text/css">
  h1 a { background-image:url('.get_stylesheet_directory_uri().'/login.png) !important; background-size:contain !important; height:72px !important; width:320px !important; margin-bottom:0 !important; padding-bottom:0 !important; }
  .login form { margin-top: 10px !important; }
  </style>';
}


//Personaliza o Background
function custom_login_css()
{
    echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/style.css"/>';
}
add_action('login_head', 'custom_login_css');

//Muda a logo de login
function b3m_url_login_logo()
{
    return get_bloginfo('wpurl');
}
add_filter('login_headerurl', 'b3m_url_login_logo');

//Muda o texto do título do login
function b3m_login_logo_url_title()
{
    return 'Precisa de ajuda? Clique aqui.';
}
add_filter('login_headertitle', 'b3m_login_logo_url_title');

//alterar link do logo pág de login
add_filter('login_headerurl', 'custom_login_header_url');
function custom_login_header_url($url)
{
    return 'http://seusite.com.br';
}


// ORGANIZAR ORDEM DO MENU
function custom_menu_order($menu_ord)
{
    if (!$menu_ord) { return true;
    }
    return array(
    'index.php', // this represents the dashboard link
    'edit.php',
    'edit.php?post_type=page',
    'edit.php?post_type=slide',
    'edit.php?post_type=upload',
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

//retirando itens da barra admin
function alterar_admin_bar( $admin_bar )
{ 
    $admin_bar->remove_menu('wp-logo');
    return $admin_bar;
}
add_action('admin_bar_menu', 'alterar_admin_bar', 99);

/*Remover mensagens de atualização (não funciona na Umbler, da erro 500)*/
add_action('admin_menu', 'wp_hide_msg');
function wp_hide_msg()
{
    remove_action('admin_notices', 'update_nag', 3);
}

?>
