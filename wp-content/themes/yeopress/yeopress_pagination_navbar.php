<?php
  $params = $GLOBALS['pagination_script_params'];
  $posts_per_page = $params['posts_per_page'];
  $real_human_page = $params['real_human_page'];
  $count_posts = $params['count_posts'];

  $show_pagination = false;
  if ($posts_per_page != 0 && $posts_per_page != -1) {
    $show_pagination = true;
  }
  if ($show_pagination) {
    $nr_of_pagination_pages = ceil($count_posts/$posts_per_page);
  }
  //echo "<strong>PAGE=$real_human_page || nr=$nr_of_pagination_pages</strong>"
?>

<!-- are there enough posts so that it makes sense to show a pagination bar? -->
<?php if ($show_pagination) : ?>
  <div style="text-align:center">
    <ul class="pagination">
      <!-- previous page -->
      <li>
        <a href="<?php 
          if ($real_human_page <= 1)
            echo '#!';
          else
            echo get_pagenum_link(max(1, $real_human_page-1)); 
          ?>">
          vorherige Seite
        </a>
      </li>
      
      <!-- some spacing -->
      <li>
        <div class="blind_a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      </li>

      <!-- first page with special symbol '<<' -->
      <li>
        <a href="<?php
          if ($real_human_page <= 1)
            echo '#!';
          else
            echo get_pagenum_link(1); 
        ?>">&laquo;</a>
      </li>

      <!-- previous pages with numbers -->
      <?php for ($i = max(1, ($real_human_page-3)); $i < $real_human_page; $i++) : ?> 
        <li>
          <a href="<?php echo get_pagenum_link($i); ?>">
            <?php echo $i?>
          </a>
        </li>
      <?php endfor; ?>

      <!-- current page --> 
      <li>
        <a href="#!" class="active">
          <?php echo $i ?>
        </a>
      </li>

      <!-- next pages with numbers -->
      <?php for ($i = $real_human_page+1; $i <= $nr_of_pagination_pages; $i++) : ?> 
        <li>
          <a href="<?php echo get_pagenum_link($i); ?>">
            <?php echo $i?>
          </a>
        </li>
      <?php endfor; ?>

      <!-- last page with special symbol '>>' -->
      <li>
        <a href="<?php
          if ($real_human_page >= $nr_of_pagination_pages)
            echo '#!';
          else
            echo get_pagenum_link($nr_of_pagination_pages); 
         ?>">&raquo;</a>
      </li>

      <!-- some spacing -->
      <li>
        <div class="blind_a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
      </li>


      <!-- next page -->
      <li>
        <a href="<?php 
          if ($real_human_page >= $nr_of_pagination_pages)
            echo '#!';
          else
            echo get_pagenum_link($real_human_page + 1); 
          ?>">
          n&auml;chste Seite
        </a>
      </li>
    </ul>
  </div>
<!-- END IF of ''are there enough posts so that it makes sense to show 
               a pagination bar?'' -->
<?php endif; ?>
