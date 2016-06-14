      <footer class="site-footer">
        <!-- Меню навигации -->
        <nav class="site-nav">
          <?php
          $args = array(
            'theme_location' => 'footer'
          );

          // Выводит список меню из группы 'footer', содержимое этой группы
          // можно изменить в админке
          // Подробнее в файле functions.php
          wp_nav_menu($args);
          ?>
        </nav>
        <p>
          <!-- Выводит имя сайта -->
          <?php bloginfo('name'); ?> - &copy;
          <!-- Выводит год -->
          <?php echo date('Y'); ?>
        </p>
      </footer>
      <!-- Обязательная функция, нужна WordPress'у -->
      <?php wp_footer(); ?>
    <!-- .wrapper -->
    </div>
  </body>
</html>
