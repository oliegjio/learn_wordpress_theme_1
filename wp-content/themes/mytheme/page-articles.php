<?php
// Этот файл описывает все страницу "Articles"

// Выводит сюда содержимое файла header.php
get_header();

// Есть ли статьи
if(have_posts()):
  while(have_posts()):
    // Итератор переходит на эту статью, что позволяет использовать функции
    // снизу
    the_post();

?>

<!-- Выводит блок со статьей через цикл сверху -->
<article class="post articles-page">
  <h1>
    <!-- Выводит ссылку на статью -->
    <a href="
      <?php
        the_permalink();
      ?>
    ">
      <!-- Выводит заголовок статьи -->
      <?php
        the_title();
      ?>
    </a>
  </h1>
  <p>
    <!-- Выводит содержимое статьи -->
    <?php
      the_content();
    ?>
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
