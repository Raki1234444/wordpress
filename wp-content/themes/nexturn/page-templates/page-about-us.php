<?php
/* Template Name: About Us */
get_header();
?>

<section class="innerHero-section"
  
    style="background-image: url(http://localhost/wordpress/wp-content/uploads/2025/04/home-banner-scaled-2.jpg);">
     <!-- style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/about_banner.svg'; ?>);"> -->
   <div class="container">
      <div class="innerBanner-text">
         <h1 class="display-4 fw-bold mb-4">Engineering Impact for Global Leaders and Innovators<br>
            <!-- <span class="global-text">Global Leaders</span> <span class="innovators-text">and Innovators</span> -->
         </h1>
         <p class="lead mb-4">
            We are here to propel organizations into the future, crafting transformative technologies
            that drive progress, amplify impact, and inspire greatness.
         </p>
         <?php get_template_part('template', 'partner-link'); ?>
      </div>
   </div>
</section>

<section class="pt-5 bg-white">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <p class="lead text-dark">NexTurn harnesses the power of cloud technologies and AI responsibly, delivering
               industry-specific, sustainable, and impactful solutions that drive growth, efficiency, and a better
               tomorrow.</p>
            <p class="lead mt-4 text-dark">Unlike traditional system integrators, we embrace a technology-first approach, blending
               deep expertise in AI, cloud engineering, and analytics to deliver transformative results faster. Our
               AI-driven delivery ecosystem, paired with agile advisory models, ensures cost-effective, scalable
               solutions that consistently outperform industry benchmarks.</p>
            <p class="lead mt-4 text-dark">Our commitment to a "people-first culture" shines through in personalized client
               engagements and end-to-end support. From enhancing customer experiences to modernizing legacy
               infrastructures, NexTurn combines innovation, agility, and expertise to unlock measurable value.</p>
         </div>
      </div>
   </div>
</section>

<section class="team">
   <div class="container">
      <h2 class="text-left display-4">Team</h2>
      <div class="team-section">
         <div class="row g-4">
            <?php echo do_shortcode('[put_team_thumbs]'); ?>
         </div>
      </div>
   </div> <!-- ✅ This closing div was missing -->
</section>

<?php get_template_part('template', 'partner-contact'); ?>
<?php get_footer(); ?>