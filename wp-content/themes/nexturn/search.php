<?php  get_header(); ?>
<?php get_header(); ?>
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
?>
<div class="container">
	<section class="search-page">
	<?php
	if ( $the_query->have_posts() ) {
	        echo "<h2>Search Results for: ".get_query_var('s')."</h2>";
	        while ( $the_query->have_posts() ) {
	           $the_query->the_post();
	                 ?>
	                    <p class="lead">
	                        <a class="fs-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                        <p><?php the_excerpt(); ?></p>
	                    </p>
	                 <?php
	        }
	    }else{
	?>
	        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
	        <div class="alert alert-info">
	          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
	        </div>
	<?php } ?>
	</section>
</div>

<?php  get_footer(); ?>