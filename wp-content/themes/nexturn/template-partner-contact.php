<div class="modal fade findanwser" id="partner_contact_modal" tabindex="-1"
    aria-labelledby="partner_contact_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content p-3">
            <div class="modal-header border-bottom-0 pb-0">
                <h2 class="modal-title section-title m-0 pb-5" id="partner_contact_modal_label">Partner With Us</h2>
                <button type="button" class="close close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="row">
                    <div class="col-lg-12">
                        
                            <?php echo do_shortcode('[contact-form-7 id="e6838f1" title="Partner Contact Form"]') ?>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo get_template_part('template','contact-popup'); ?>