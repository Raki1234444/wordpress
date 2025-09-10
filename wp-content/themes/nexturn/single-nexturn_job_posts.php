<?php
get_header();
?>
<!-- Hero Section -->



<section class="innerHero-section"
    style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/career/career-banner.jpg' ?>);">
    <div class="container">
        <div class="innerBanner-text">
            <h1 class="fw-bold mb-4"><!--<div class="impact-text">--> Like <!--</div>--> Minded People <br />Work <span
                    class="impact-text">Together</span></h1>
        </div>
    </div>
</section>

<!--  specialized technology consulting -->

<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <!-- Employer choice -->
        <section class="py-5 ">

            <div class="container job-container">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="apply-btn-container">

                            <button class="btn know-more-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">Apply <span
                                    class="arrow-icon">→</span></button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade findanwser" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content p-3">
                                    <div class="modal-header border-bottom-0 pb-0">
                                        <h2 class="modal-title section-title m-0 pb-5" id="exampleModalLabel">Job Application
                                            Form</h2>
                                        <button type="button" class="close close-btn" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php echo do_shortcode('[contact-form-7 id="f29b2c7" title="Job Apply Form" cand_role="' . get_the_title() . '"]'); ?>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="<?php echo site_url('careers'); ?>" class="back-link"><span class="icon">←</span> Back to
                                Career</a>
                        </div>
                    </div>

                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <h3 class="job-subtitle location mt-4">Location:
                        <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'location', TRUE); ?>
                        <h3>

                            <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white">Work
                                    Experience:</strong>
                                <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'work_exp', TRUE); ?></p>

                            <h2 class="job-subtitle text-white mt-4">Requirements</h2>
                            <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'req', TRUE); ?>

                            <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white ">Qualifications:
                                </strong>
                                <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'qual', TRUE); ?></p>
                            <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white ">Reports To: </strong>
                                <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'reports_to', TRUE); ?></p>

                            <p><strong class="job-subtitle text-white ">Job Description:</strong></p>
                            <?php echo get_post_meta(get_the_ID(), JOB_POST_PREFIX . 'desc', TRUE); ?>

                            <div class="apply-btn-container text-left">
                                <button class="btn know-more-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">Apply
                                    <span class="arrow-icon">→</span></button>

                            </div>
                </div>
        </section>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>