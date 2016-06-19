<?php
// Файл отвечает за кастомные функции для твоей страницы.
// Чтобы не писать чисто новые функции прямо в файле версти, и для того, чтобы
// использовать функцию во всех файлах сайта, нужен этот файл.
// Этот файл всегда называется functions.php

// Загрузка ресурсов сайта.
function MyTheme_resources(){
  // Загружает таблицу стилей style.css.
  // get_stylesheet_uri() возвращает путь (вместе с именем файла)
  // к текущей таблице стилей темы (style.css).
  wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'MyTheme_resources');

// Меню навигации.
// Регестрирует группы меню, в которые через админку можно добавить отдельные
// страницы.
register_nav_menus(array(
  'primary' => __('Primary Menu'),
  'footer' => __('Footer Menu')
));

// Функция, которая возращает ID самого верхнего родительского
// элемента страницы.
// Настроить какая страницы является родительской или дочерней к какой-либо
// странице можно в админке:
// Pages > All Pages > (Выбрать страницу и нажать Edit) >
// > Page Attributes > Parent
// Если у страницы его нет, то возвращает ID этой же страницы.
function get_top_ancestor_id(){
  global $post;
  if($post->post_parent){
    $ancestors = array_reverse(get_post_ancestors($post->ID));
    return $ancestors[0];
  }
  return $post->ID;
}

// Фильтр, который задает длинну стандартного сокращения для статей.
function custom_excerpt_length(){
  return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Настройка нашей темы.
function MyTheme_setup(){
  // Добавить поддержку Featured Image (это картинка, которая представляет твою
  // статью)
  add_theme_support('post-thumbnails');
  // Добавляет поддержку нового соотношения сторон, 'small-thumbnail'
  // теперь можно применить в функции the_post_thumnail('small-thumbnail').
  // Четвертый аргумент - массив, который описывает как изоображение будет
  // вырезатся для того, чтобы удовлетворять заданному разрешению.
  // Можно создать сколько угодно таких кофигураций.
  add_image_size('small-thumbnail', 180, 120, array('center', 'left'));
  add_image_size('banner-image', 920, 210, array('center', 'left'));
  // Включить поддержку форматов статей, таких как: Gallery, Link, Aside
  add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'MyTheme_setup');
