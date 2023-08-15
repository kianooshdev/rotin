<!--Start show Comment-->
<div class="container">
  <div class="comments box_shadow">
    <?php 
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
	        comments_template();
        endif;
    ?>
    
  <!--End Show Comment-->
</div>
