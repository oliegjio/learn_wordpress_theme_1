<?php
// Этот файл описывает домашнюю страницу, на которой перечисляются все
// опубликованные посты.
// Этот файл всегда называется index.php

// Выводит сюда содержимое файла header.php
get_header();

// Есть ли статьи
if(have_posts()):
  while(have_posts()):
    // Итерирует все посты, что позволяет использовать функции
    // снизу
    the_post();
?>

<!-- Выводит блок со статьей через цикл сверху -->
<article class="post">
  <?php
  the_post_thumbnail('banner-image');
  ?>
  <h2>
    <!-- Выводит ссылку на статью -->
    <a href="<?php the_permalink(); ?>">
      <!-- Выводит заголовок статьи -->
      <?php the_title(); ?>
    </a>
  </h2>
  <p class="post-info">
    <?php the_time('F jS, Y g:i a'); ?> | By
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
      <?php the_author(); ?>
    </a> | Posted in
    <?php
    $categories = get_the_category();
    $separator = ', ';
    $output = '';

    if($categories){
      foreach($categories as $category){
        $output .=
        "<a href='" . get_category_link($category) . "'>" .
        $category->cat_name .
        "</a>" .
        $separator
        ;
      }
      echo trim($output, $separator);
    }
    ?>
  </p>
  <p>

  </p>
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
