<?php
    function updateModal(){ ?>
        <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Case Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php 
                        $settings = array(
                            'fields' => array('field_5db331d03001a'),
                            'new_post' => false,
                            'post_title'	=> false,
                            'submit_value'	=> 'Update Case Status',
                            'kses'	=> true,	'return' => '',
                            'return' => '%post_url%'
                        );
                        acf_form_head();?>
                        <script>      
                                (function($) {
                                $(document).ready(function() {
                                    acf.unload.active = false;
                                });
                                })(jQuery);
                        </script>
                        <?php acf_form( $settings ); ?>

                    </div>
                </div>
            </div>
        </div> <?php
    }
?>