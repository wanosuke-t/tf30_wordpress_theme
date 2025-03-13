<?php if (paginate_links()): ?>
  <!-- pagination -->
  <div class="pagination">
    <?php
    echo paginate_links(
      array(
        'end_size' => 1,
        'mid_size' => 1,
        'prev_next' => true,
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>',
      )
    );
    ?>
  </div><!-- /pagination -->
<?php endif; ?>