<?php 
/* Template Name: Career Apply */
get_header();
?>
<!-- Hero Section -->



<section class="innerHero-section" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/career/career-banner.svg' ?>);">
    <div class="container">
            <div class="innerBanner-text">
                <h1 class="fw-bold mb-4"><!--<div class="impact-text">--> Like <!--</div>--> Minded People <br/>Work <span class="impact-text">Together</span></h1>
            </div>
        </div>
</section>

<!--  specialized technology consulting -->



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
                                <h2 class="modal-title section-title m-0 pb-5" id="exampleModalLabel">Job Application Form</h2>
                                <button type="button" class="close close-btn" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pt-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form>
                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">First Name *</label>
                                                <input type="text" class="form-control" id="firstName" required="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name *</label>
                                                <input type="text" class="form-control" id="lastName" required="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <?php 
                                                    $role = '';
                                                    if($_GET['id'] == 1  || $_GET['id'] == 4 || $_GET['id'] == 6){
                                                        $role = 'Qlik Data Architect / Administrator';
                                                    } elseif ($_GET['id'] == 2  || $_GET['id'] == 3 || $_GET['id'] == 5) {
                                                       $role = 'Director, Customer Success';
                                                    }

                                                ?>
                                                <input type="text" class="form-control" id="role" value="<?php echo $role; ?>" disabled style="background-color: rgb(34,34,34); color: rgb(200,200,200);">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address *</label>
                                                <input type="email" class="form-control" id="email" required="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number *</label>
                                                <input type="tel" class="form-control" id="phone">
                                            </div>


                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message *</label>
                                                <textarea class="form-control" id="message" rows="5"
                                                    required=""></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="resume" class="form-label">Resume *</label>
                                                <input type="file" name="resume" id="resume" class="form-control"/>
                                                <label for="privacy">Only PDF / DOC / Text Files are acceptable</label>
                                                    
                                            </div>

                                            <div class="checkbox-container">
                                                <input type="checkbox" class="form-check-input"/>
                                                <label class="form-check-label" for="exampleCheck1">I agree to the <a href="https://nexturn.ai/wp-content/uploads/2025/04/NexTurn-Website_Privacy-Policy-Content_v1.0.pdf" target="_blank">Privacy Policy</a> and <a href="https://nexturn.ai/wp-content/uploads/2025/04/NexTurn-Website_Terms-of-Use-Content_v1.0.pdf" target="_blank">Terms of Use</a>.
                                            </div>
                                            
                                            <div class="text-center text-lg-end">
                                                <button type="submit" class="btn btn-submit">Submit <span
                                                        class="ms-2">→</span></button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div>
                    <a href="<?php echo site_url('careers'); ?>" class="back-link"><span class="icon">←</span> Back to Career</a>
                </div>
            </div>

            <h1 class="section-title">Qlik Data Architect / Administrator</h1>
            <h3 class="job-subtitle location mt-4">Location: KOP, USA<h3>

                    <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white">Work
                            Experience:</strong> 10+ years</p>

                    <h2 class="job-subtitle text-white mt-4">Requirements</h2>
                    <ul>
                        <li>Design and develop BI dashboards and reports in Qlik Sense</li>
                        <li>Develop and schedule Reports using NPrinting in Qlik Sense</li>
                        <li>Work with Analysts and Stakeholders to develop requirements</li>
                        <li>Create Data Models that optimize performance and extensibility</li>
                        <li>Create Visualizations by translating requirements and finding innovative solutions</li>
                        <li>Work with developers, BI engineers, business end users, UX designers and IT teams (DBA,
                            Source system Developers, Data Analysts, QA Testers) for data accuracy and performance</li>
                        <li>Work with a geographically diverse team. Escalate work progress and bottlenecks (if any) to
                            the Lead Developer</li>
                        <li>Minimum of 3 years overall Qlik experience</li>
                        <li>Minimum of 4 years overall BI experience</li>
                    </ul>

                    <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white ">Qualifications:
                        </strong>
                        Lorem Ipsum</p>
                    <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white ">Reports To: </strong>
                        Lorem Ipsum</p>

                    <p class="innersec-white-medium mt-4"><strong class="job-subtitle text-white ">Compensation:
                        </strong>
                        Lorem Ipsum</p>

                    <p><strong class="job-subtitle text-white ">Job Description:</strong></p>
                    <p class="innersec-white-medium"> Ut eget odio nec nibh fringilla eleifend. In lobortis ullamcorper
                        nisl, vitae gravida mi consequat ac. Orci varius natoque penatibus et magnis dis parturient
                        montes, nascetur ridiculus mus. In venenatis purus in turpis maximus iaculis. Mauris eget nisl
                        mattis, tristique odio eget, hendrerit elit. Etiam imperdiet arcu sit amet nisl ultrices, vel
                        convallis diam bibendum.</p>

                    <p class="innersec-white-medium">Ut eget odio nec nibh fringilla eleifend. In lobortis ullamcorper
                        nisl, vitae gravida mi consequat ac. Orci varius natoque penatibus et magnis dis parturient
                        montes, nascetur ridiculus mus. In venenatis purus in turpis maximus iaculis. Mauris eget nisl
                        mattis, tristique odio eget, hendrerit elit. Etiam imperdiet arcu sit amet nisl ultrices, vel
                        convallis diam bibendum.</p>

                    <div class="apply-btn-container text-left">
                        <button class="btn know-more-btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">Apply <span class="arrow-icon">→</span></button>

                    </div>



        </div>
</section>
<?php get_footer(); ?>