<?php
// Этот файл описывает страницу с результатами поиска статей

// Выводит сюда содержимое файла header.php
get_header(); ?>

<h2 class='search-header'>
  Search for: <?php the_search_query(); ?>
</h2>

<?php
// Есть ли статьи
if(have_posts()):
  while(have_posts()):
    // Итерирует все посты, что позволяет использовать функции
    // снизу
    the_post();
    // Выводит сюда содержимое файла content.php
    get_template_part('content', get_post_format());
  endwhile;
else:
  echo '<p>No content found</p>';
endif;

// Выводит сюда содержимое файла footer.php
get_footer();
?>
