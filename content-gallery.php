<!-- Этот файл описывает Gallery-посты.
Содержимое этого файла добавляется в другие файлы функцией
get_template_part('content', get_post_format()), где
get_post_format() возвращяет 'gallery'.
Этот файл должен называться именно так - content-gallery.php, хотя первая часть
имени - 'content', может быть другой, но это настраивается в функции
get_template_part('content', get_post_format()). -->
<article class="post post-gallery">
  <!-- Выводит заголовок -->
  <h2><?php the_title(); ?></h2>
  <!-- Выводит контент -->
  <?php the_content(); ?>
</article>
