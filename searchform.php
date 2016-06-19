<!-- Этот файл описывает строку поиска.
Его можно включить в шаблон функцией get_search_form().
Этот файл всегда так и называется - searchform.php. -->
<form role="search" id="search-form" action="<?php echo home_url('/'); ?>" method="get">
  <div><label for="" class="screen-reader-text" for="s">Search for:</label>
    <!-- is_search() - является ли эта страница страницей поиска, если да, то
    вывести поисковой запрос функцие the_search_query() в качестве
    плейстхолдера -->
    <input type="text" name="s" value="" id="s" placeholder="<?php if(is_search()){the_search_query();}else{echo 'Search something!';} ?>">
    <input type="submit" id="searchsubmit" value="Search">
  </div>
</form>
