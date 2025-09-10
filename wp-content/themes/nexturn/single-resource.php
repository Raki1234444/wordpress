<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 p-0">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php
					$resource_image = rwmb_meta('resource_image', ['size' => 'full'], get_the_ID());
					$img_url = '';
					if ($resource_image && is_array($resource_image)) {
						$img = reset($resource_image);
						$img_url = $img['url'];
					}
					?>

					<!-- Image Top -->
					<section>
						<?php if ($img_url): ?>
							<div class="w-100 position-relative">
								<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-100 vh-100 object-fit-cover d-block">
								<div class="position-absolute bottom-0 start-0 w-100">
									<div class="container">
										<div class="row">
											<div class="col-12 col-md-10 col-lg-8 text-start pb-3">
												<a class="svg-container action-click cta-btn" data-bs-toggle="modal" data-bs-target="#resource_form_modal"><span class="pe-3">Get this resource</span>
													<svg class="home-bn-arrow home-bn-arrow-sec" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
														<g data-name="Layer 2">
															<path d="M1 16a15 15 0 1 1 15 15A15 15 0 0 1 1 16Zm28 0a13 13 0 1 0-13 13 13 13 0 0 0 13-13Z" fill="#ffffff" class="fill-000000"></path>
															<path d="M12.13 21.59 17.71 16l-5.58-5.59a1 1 0 0 1 0-1.41 1 1 0 0 1 1.41 0l6.36 6.36a.91.91 0 0 1 0 1.28L13.54 23a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41Z" fill="#ffffff" class="fill-000000"></path>
														</g>
													</svg>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</section>

					<!-- Resource Form Modal (styled like join-our-team) -->
					<div class="modal fade findanwser" id="resource_form_modal" tabindex="-1" aria-labelledby="resourceFormLabel" aria-hidden="true">
						<div class="modal-dialog modal-xl">
							<div class="modal-content p-3">
								<div class="modal-header border-bottom-0 pb-0">
									<h2 class="modal-title section-title m-0 pb-5" id="resourceFormLabel">Get this resource</h2>
									<button type="button" class="close close-btn" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body pt-0">
									<div class="row">
										<div class="col-lg-12" id="resource-form">
											<?php echo do_shortcode('[contact-form-7 id="0e81076" title="Resource form"]'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Description Below Image -->
					<section class="py-5">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div id="resource-description" class="fs-5 lh-lg text-white">
										<?php
										$full_desc = rwmb_meta('resource_text', [], get_the_ID());
										if ($full_desc !== '') {
											echo nl2br(esc_html($full_desc));
										} else {
											the_content();
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</section>

			<?php endwhile;
			endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>