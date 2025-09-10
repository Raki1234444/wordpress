<?php 
/* Template Name: Oracle*/
get_header();?>
<!-- Hero Section -->
	

    <!--  specialized technology consulting -->
    
    

    <!-- Value Propositions -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php get_footer();?>