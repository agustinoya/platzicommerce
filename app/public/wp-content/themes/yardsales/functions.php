<?php

function plz_assets(){

    wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@100;400;500;700&display=swap",array(),false,'all');
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css",array(),"5-1",'all');

    wp_enqueue_style("estilos",get_template_directory_uri()."/assets/css/style.css", array("google-font","bootstrap"));

    wp_enqueue_script("yardsale-js",get_template_directory_uri()."/assets/js/script.js");
}

add_action("wp_enqueue_scripts","plz_assets");

function plz_analytics(){
    ?>
    <!-- <h1>ANALYTICS</h1> -->
    <?php
}

add_action("wp_body_open", "plz_analytics");

function plz_theme_supports(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', 
    array(
        "width" => 170,
        "height" => 35,
        "flex-width" => true,
        "flex-height" => true,
    ));
}

add_action("after_setup_theme", "plz_theme_supports");

function plz_add_menus(){
    register_nav_menus(
        array(
            'menu-principal' => "Menu Principal",
            'menu-responsive' => "Menu Responsive",
        )
    );
}

add_action("after_setup_theme", "plz_add_menus");

function plz_add_sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de pagina',
            'id' => 'pie-pagina',
            'before-widget' => '',
            'after-widget' => ''
        )
    );
}

add_action("widgets_init", "plz_add_sidebar");