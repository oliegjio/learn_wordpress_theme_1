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

        ?>

        <?php wp_nav_menu($args) ?>

      </nav>

    </header>
