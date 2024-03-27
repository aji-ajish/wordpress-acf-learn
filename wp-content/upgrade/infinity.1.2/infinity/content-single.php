<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">    
	<?php echo infinity_post_date() . infinity_post_comments() . infinity_post_author() . infinity_post_sticky() . infinity_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">
  	<?php the_content(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo infinity_link_pages(); ?>
  
  <div class="entry-meta-bottom">
  <?php echo infinity_post_category() . infinity_post_tags(); ?>
  </div><!-- .entry-meta -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php infinity_author(); ?> 

<?php comments_template( '', true ); ?>