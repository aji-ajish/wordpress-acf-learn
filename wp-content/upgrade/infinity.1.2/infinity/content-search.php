<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php $entry_title = ( 'page' == get_post_type() && infinity_post_edit_link() == '' )? 'entry-title entry-title-page' : 'entry-title'; ?>
  <h2 class="<?php echo $entry_title; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
  
  <?php if ( 'post' == get_post_type() ) : ?>  
  <div class="entry-meta">    
	<?php echo infinity_post_date() . infinity_post_comments() . infinity_post_author() . infinity_post_sticky() . infinity_post_edit_link(); ?>
  </div><!-- .entry-meta -->  
  <?php elseif ( 'page' == get_post_type() && infinity_post_edit_link() != '' ) : ?>  
  <div class="entry-meta"> 
    <?php echo infinity_post_edit_link(); ?> 
  </div>  
  <?php endif;?>
  
  <?php infinity_featured_image(); ?>  
  
  <div class="entry-content clearfix">
	<?php infinity_post_style(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo infinity_link_pages(); ?>
  
  <?php if ( 'post' == get_post_type() ) : ?>
  <div class="entry-meta-bottom">    
  <?php echo infinity_post_category() . infinity_post_tags(); ?>    
  </div><!-- .entry-meta-bottom -->
  <?php endif; ?>

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->