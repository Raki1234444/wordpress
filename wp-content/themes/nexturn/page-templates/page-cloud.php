<?php 
/* Template Name: Cloud */
get_header(); ?>
<!--  specialized technology consulting -->
<!-- Value Propositions -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<?php //get_template_part('template','partner-contact') ?>
<?php get_footer(); ?>