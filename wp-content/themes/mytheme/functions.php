<?php

  // Загрузка ресурсов сайта
  function MyTheme_resources(){

    // Загружает таблицу стилей style.css
    // get_stylesheet_uri() возвращает путь (вместе с именем файла)
    // к текущей таблице стилей темы (style.css)
    wp_enqueue_style(
      'style',
      get_stylesheet_uri()
    );

  }
  add_action(
    'wp_enqueue_scripts',
    'MyTheme_resources'
  );

  // Меню навигации
  // Регестрирует группы меню, в которые через админку можно добавить отдельные
  // страницы
  register_nav_menus(array(
    'primary' =>
    __( 'Primary Menu' ),

    'footer' =>
    __( 'Footer Menu' )
  ));

  function get_top_ancestor_id() {

    if ( $post->post_parent ) {

      $ancestors = get_post_ancestors( $post->ID );

      return $ancestors[0];

    }

    return $post->ID;

  }

?>
