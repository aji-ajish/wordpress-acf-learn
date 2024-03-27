<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <div class="entry-meta">    
	<?php echo infinity_post_date() . infinity_post_comments() . infinity_post_author() . infinity_post_sticky() . infinity_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">	
	<?php infinity_featured_image(); ?>
	<?php infinity_post_style(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo infinity_link_pages(); ?>
  
  <div class="entry-meta-bottom">    
  <?php echo infinity_post_category() . infinity_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->