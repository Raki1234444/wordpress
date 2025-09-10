<?php 
/* Template Name: Contact Us */ 
get_header();
?>
<!-- innerHero Section -->
<section class="innerHero-section" style="background-image: url(<?php echo get_template_directory_uri().'/assets/images/contact-banner.jpg'?>);">
        <div class="container">
		
           <div class="innerBanner-text">
            <h1>Let's <br>Collaborate to Innovate</h1>
       		</div>
        </div>
    </section>
    
    <!-- Form Section -->
    <div class="form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                        <!-- <div class="mb-3">
                            <label for="firstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization *</label>
                            <input type="text" class="form-control" id="organization" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role">
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                       <div class="d-lg-flex justify-content-between"> 
                        <div class="checkbox-container">
                            <input type="checkbox" id="privacy" required>
                            <label for="privacy">I agree to the <a href="#" class="privacy-link">privacy notice</a></label>
                        </div>
                        
                        <div class="text-center text-lg-end">
                            <button type="submit" class="btn btn-submit">Submit <span class="ms-2">→</span></button>
                        </div> -->
                        <?php echo do_shortcode('[contact-form-7 id="713f66f" title="Contact Page Form"]'); ?>
						   </div>
                </div>
                
                <!-- <div class="col-lg-4 mt-5 mt-lg-4" >
                    <div class="contact-info">
                        <div class="mb-4">
                            <p class="contact-email">For business enquiries: <a href="mailto:info@nexturn.com" target="_blank">info@nexturn.com</a></p>
                            <p class="contact-email">For job enquiries: <a href="mailto:careers@nexturn.com" target="_blank">careers@nexturn.com</a></p>
                        </div>
                        
                        <h3 class="section-title">Offices</h3>
                        
                        <div class="office-info">
                            <p><strong>Headquarters - US</strong></p>
                            <p>2018 156th Avenue, N.E. Building F, Suite 100</p>
                            <p>Bellevue, Washington 98007, U.S.A</p>
                        </div>
                        
                        <div class="office-info">
                            <p><strong>Corporate Office - India</strong></p>
                            <p>A1 Quadrant 3, 8th Floor, Cyber Towers,</p>
                            <p>Madhapur,</p>
                            <p>Hyderabad 500081, Telangana, India</p>
                        </div>
                        
                        <h3 class="section-title">Follow Us on</h3>
                        <div class="social-icons">
                            <a href="https://www.youtube.com/@TheNexTurnTV" target="_blank"><img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/icons/youtube.svg" alt="YouTube"></a>
                            <a href="https://www.linkedin.com/company/nexturn-inc" target="_blank"><img src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/icons/linkedin.svg" alt="LinkedIn"></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
<?php get_footer(); ?>