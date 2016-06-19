<!-- Этот файл описывает статьи, отображаемые на разных страницах.
Его можно включить в другой файл функцией get_template_part('content.php').
Этот файл может называться каку угодно. -->

<!-- Если у поста есть картинка-превью то добавить ему класс has-thumbnail.
Если у следующего поста нет формата, то добавить посту класс post-with-border.
get_adjacent_post(true, '', true) - возвращяет следующий
пост (старше по времени), а
get_adjacent_post(false, '', false) - возвращяет предыдущий
пост (младше по времени). -->
<article class="post <?php if(has_post_thumbnail()){echo 'has-thumbnail';} ?> <?php if(get_post_format(get_adjacent_post(true, '', true)->ID) == false){echo 'post-with-border';} ?>">
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
  // Если это пост-поиск или пост-архив...
  if(is_search() || is_archive()){ ?>
    <p>
      <!-- Выводит сокращенное содержимое статьи -->
      <?php echo get_the_excerpt(); ?>
      <!-- Read More -->
      <a href="<?php get_the_permalink(); ?>">Read more&raquo;</a>
    </p>
  <?php
  }else{
    // Если у поста есть сокращение (сокращение видимого текста на странице,
    // Read More), то отобразить сокращение
    if($post->post_excerpt){ ?>
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
  }
  ?>
</article>
