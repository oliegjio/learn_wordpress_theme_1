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
<!-- Если у поста есть превью-картинка, то добавить ей класс has-thumbnail -->
<article class="post <?php if(has_post_thumbnail()){echo 'has-thumbnail';} ?>">
  <!-- Добавляет картинке ссылку, ведущую на текщую статью -->
  <a href="<?php the_permalink(); ?>">
    <!-- Обертка для картинки, чтобы можно было пирменить к ней стили -->
    <div class="thumbnail">
      <!-- Выводит картинку с заданым соотношением сторон, которые можно
      настроить в functions.php -->
      <?php
      the_post_thumbnail('small-thumbnail');
      ?>
    </div>
  </a>
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
  <?php
  // Если у поста есть сокращение (сокращение видимого текста на странице,
  // Read More), то отобразить сокращение
  if($post->post_excerpt){
  ?>
    <p>
      <!-- Выводит сокращенное содержимое статьи -->
      <?php echo get_the_excerpt(); ?>
      <!-- Read More -->
      <a href="<?php get_the_permalink(); ?>">Read more&raquo;</a>
    </p>
  <?php
  // Если у поста нет сокращения, то отобразить его так, как есть
  } else {
    // Выводит содержимое статьи
    the_content();
  }
  ?>

</article>
<?php
  endwhile;
else:
  echo '<p>No content found</p>';
endif;

// Выводит сюда содержимое файла footer.php
get_footer();
?>
