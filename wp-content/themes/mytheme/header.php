<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>"
    <meta name="viewport" content="width=device-width">

    <!-- bloginfo('name') - выводит название сайта -->
    <title>
      <?php bloginfo('name'); ?>
    </title>

    <!-- Обязательная функция, ныжна WordPress'у -->
    <?php wp_head(); ?>

  </head>
<!-- body_class() - обязательная функция, нужна WordPress'у -->
<body <?php body_class(); ?>>

  <div class="wrapper">

    <?php

    if(is_page('articles')):

    ?>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

    <?php

    endif;

    ?>

    <header class="site-header">
      <h1>
        <!-- home_url() выводит адрес домашней страницы -->
        <a href="<?php home_url(); ?>">
          <?php bloginfo('name'); ?>
        </a>
      </h1>

      <h5>
        <!-- Выводит описание сайта -->
        <?php bloginfo('description'); ?>
      </h5>

      <nav class="site-nav">

        <?php

        $args = array(
          'theme_location' => 'primary'
        );

        // Выводит список меню из группы 'footer', содержимое этой группы
        // можно изменить в админке
        // Подробнее в файле functions.php
        wp_nav_menu($args);

        ?>

      </nav>

    </header>
