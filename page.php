<?php
// Этот файл описывает все страницы, не попавшие под какие-либо другие описания,
// например не домашнюю (её описывает index.php), не страницу Articles (её
// описывает page-articles.php).
// У этого файла всегда именно такое имя - page.php

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
  <!-- Если у этой страницы есть дочерние элементы, или она сама
  является родительским, то отобразить меню навигации по потомкам -->
  <!-- Настроить какая страницы является родительской или дочерней к какой-либо
  странице можно в админке:
  Pages > All Pages > (Выбрать страницу и нажать Edit) >
  > Page Attributes > Parent. -->
  <?php if(get_children(get_top_ancestor_id())): ?>
    <!-- Меню навигации по потомкам -->
    <nav class='nav-children-pages'>
      <!-- Ссылка указывает на самого верхнего родителя страницы -->
      <!-- get_top_ancestor_id() - кастомная функция, описанная в файле
      functions.php, которая возвращает самого верхнего родителя страницы -->
      <!-- get_the_permalink() - возвращает адрес страницы по её ID -->
      <a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>">
        <?php echo get_the_title(get_top_ancestor_id()); ?>
      </a>
      <ul>
        <!-- Выводит список (li элементы) всех дочерних элементов самого
        верхнего потомка страницы (li), и убирает li с самым верним потомком.
        Это сделано потому, что у нас есть вверху кастомная ссылка на самого
        верхнего потомка -->
        <?php
        $args = array(
          'child_of' => get_top_ancestor_id(),
          'title_li' => ''
        );
        wp_list_pages($args);
        ?>
      </ul>
    </nav>
  <?php endif; ?>
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