<!-- Этот файл описывает Link-посты.
Содержимое этого файла добавляется в другие файлы функцией
get_template_part('content', get_post_format()), где
get_post_format() возвращяет 'link'.
Этот файл должен называться именно так - content-link.php, хотя первая часть
имени - 'content', может быть другой, но это настраивается в функции
get_template_part('content', get_post_format()). -->
<article class="post post-link">
  <!-- Выводит контент в качестве ссылки, и заголовок в качестве описания
  ссылки -->
  <a href="<?php echo get_the_content(); ?>"><?php the_title(); ?></a>
</article>
