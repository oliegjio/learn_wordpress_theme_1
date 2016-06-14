<?php
/*
Template Name: Special Layout
*/
// Строка выше нужна, чтобы зарегестировать шаблон
// Теперь этот шаблон можно применить к странице/статье в админке

// В админке нужно зайти в редактирование статьи/страницы, далее
// Page Attributes > Template, и выбрать этот шаблон

// Этот файл описывает все страницы

// Выводит сюда содержимое файла header.php
get_header();

// Есть ли статьи
if(have_posts()):
  while(have_posts()):
    // Итератор переходит на эту статью, что позволяет использовать функции
    // снизу
    the_post();
?>
<div class="disclaimer">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<!-- Выводит блок со статьей через цикл сверху -->
<article class="post">
  <h1>
    <!-- Выводит ссылку на статью -->
    <a href="<?php the_permalink(); ?>">
      <!-- Выводит заголовок статьи -->
      <?php the_title(); ?>
    </a>
  </h1>
  <p>
    <!-- Выводит содержимое статьи -->
    <?php the_content(); ?>
  </p>
</article>
<?php
  endwhile;
else:
  echo '<p>No content found</p>';
endif;

// Выводит сюда содержимое файла footer.php
get_footer();
?>
