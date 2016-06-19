<!-- Этот файл описывает Aside-посты.
Содержимое этого файла добавляется в другие файлы функцией
get_template_part('content', get_post_format()), где
get_post_format() возвращяет 'aside'.
Этот файл должен называться именно так - content-aside.php, хотя первая часть
имени - 'content', может быть другой, но это настраивается в функции
get_template_part('content', get_post_format()). -->
<article class="post post-aside">
  <!-- Выводит информацию о посте: автора, время публикации -->
  <p class="aside-meta">
    <?php the_author(); ?> <span>@</span> <?php the_time('F j Y'); ?>
  </p>
  <br>
  <!-- Выводит контент -->
  <?php the_content(); ?>
</article>
