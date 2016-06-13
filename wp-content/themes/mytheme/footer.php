      <footer class="site-footer">

        <nav class="site-nav">

          <?php

          $args = array(
            'theme_location' => 'footer'
          );

          ?>

          <?php wp_nav_menu($args) ?>

        </nav>

        <p>
          <?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?>
        </p>

      </footer>

      <!-- Обязательная функция, нужна WordPress'у -->
      <?php wp_footer(); ?>

    </div> <!-- .wrapper -->

  </body>
</html>
