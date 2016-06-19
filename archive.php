<?php
// Этот файл описывает страницу определенных категорий, например на этой
// странице может быть:
// Список всех постов по определенному году, дню, месяцу, список всех постов
// по определенному тегу, по автору.
// Именно на этот тип страниц мы переходим, когда кликаем на ссылку с именем
// автора или ссылку категории статьи.
// Этот файл всегда называется так - archive.php

// Выводит сюда содержимое файла header.php
get_header();

// Есть ли статьи
if(have_posts()): ?>

<!-- Заголовок для категории -->
<h2 class='archive-title'>
  <?php
  // Если это раздел категорий, то вывести название категории.
  if(is_category()){
    single_cat_title();
  // Если это раздел тегов, то вывести название тега.
  }elseif(is_tag()){
    single_tag_title();
  // Если это раздел атвора, то вывести автора.
  // Чтобы get_the_author() точно сработал, нужно добавить перед ним
  // the_post(), а после - rewind_posts().
  }elseif(is_author()){
    the_post();
    echo 'Author: ' . get_the_author();
    rewind_posts();
  // Если это раздел дней, то вывести дату
  }elseif(is_day()){
    echo 'Daily archives: ' . get_the_date();
  // Если это раздел месяцев, то вывести месяц и год
  }elseif(is_month()){
    echo 'Monthly archives: ' . get_the_date('M Y');
  // Если это раздел годов, то вывести год
  }elseif(is_year()){
    echo 'Yearly archives: ' . get_the_date('Y');
  }else{
    echo 'Archives:';
  }
  ?>
</h2>
<?php
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
