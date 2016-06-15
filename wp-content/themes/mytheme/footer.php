      <footer class="site-footer">
        <!-- Меню навигации -->
        <!-- Здесь WordPress выводит ul с элементами li - пунктами менью,
        при этом к активному пункту меню (li) WordPress автоматически
        добавляет класс current-menu-item, что позволяет его стилизовать -->
        <nav class="site-nav">
          <?php
          $args = array(
            'theme_location' => 'footer'
          );

          // Выводит список меню из группы 'Footer Menu',
          // содержимое этой группы можно изменить в админке:
          // Appearence > Menus > Select a menu to edit
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
