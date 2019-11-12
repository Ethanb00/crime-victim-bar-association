<?php

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

get_header();

?>
<article class="nv-single-post-wrap col" style="min-height:1000px; padding-right: 50px; padding-left: 50px;">
    <div style="margin-top:30px; margin-bottom:30px;">
        <h2 style="text-align:center; ">ARS Attorney Details - <?php $title= get_the_title(); echo $title;  ?></h2>
    </div>
    <div class="row">
        <div class="ARS-column" style=" float:left;">
            <div class="scrolling-section"
                style="margin-bottom:20px; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding: 30px; max-height:500px; overflow:scroll;">
                <h4
                    style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">
                    Practice Area(s)</h4>
                <div>
                    <?php
                    $practice_areas = get_field('practice_areas');
                    if( $practice_areas ):
                    echo '<ul style="text-align:center;>';
                    foreach( $practice_areas as $area ):
                    echo '<li class="ARS-list-item" style="margin-bottom:5px;">' . $area . '</li>';
                    endforeach;
                    echo '</ul>';
                    endif; ?>
                </div>

            </div>
            <div class="scrolling-section"
                style="margin-bottom:20px; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px; max-height:500px; overflow:scroll;">
                <h4
                    style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">
                    Juristictions Where Licensed to Practice</h4>
                <?php
                $licensing = get_field('licensing');
                if( $licensing ):
                echo '<ul style="text-align:center;">';
                foreach( $licensing as $licensed ):
                echo '<li>' . $licensed . '</li>';
                endforeach;
                echo '</ul>';
                endif; ?>
            </div>
        </div>
        <div class="ARS-column" style="float:left;">
            <div
                style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px;">
                <h4
                    style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">
                    ARS Database Details</h4>
                <table style="margin-top:0; margin-bottom:0;">
                    <tr>
                        <th>ARS Status</th>
                        <td><?php the_field('attorney_status'); ?></td>
                    </tr>
                    <tr>
                        <th>Excluded From Referral Searches</th>
                        <td><?php the_field('exclude_from_referral_searches'); ?></td>
                    </tr>
                    <tr>
                        <th>Initial Intake Required?</th>
                        <td><?php the_field('initial_intake_needed'); ?></td>
                    </tr>
                    <tr>
                        <th>Staff Attorney Follow-Up Required?</th>
                        <td><?php the_field('staff_attorney_follow-up_needed'); ?></td>
                    </tr>
                </table>
            </div>
            <div
                style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px;">
                <h4
                    style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">
                    Contact Details</h4>
                <table style="margin-top:0; margin-bottom:0;">
                    <tr>
                        <th>Title</th>
                        <td><?php the_field('attorney_title'); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php the_field('attorney_email'); ?></td>
                    </tr>
                    <tr>
                        <th>Home Phone</th>
                        <td><?php the_field('home_phone'); ?></td>
                    </tr>
                    <tr>
                        <th>Work Phone</th>
                        <td><?php the_field('work_phone'); ?></td>
                    </tr>
                    <tr>
                        <th>Fax</th>
                        <td><?php the_field('fax'); ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            <p style="margin-bottom:0;"><?php the_field('address_line_1'); ?></p>
                            <p style="margin-bottom:0;"><?php the_field('address_line_2;');?></p>
                            <p style="margin-bottom:0;"><?php the_field('city')?>, <?php the_field('state') ?>
                                <?php the_field('zip_code') ?></p>
                            <p><?php echo '<a href="https://maps.google.com/?q=' . get_field('address_line_1'). " " . get_field('city') . " ". get_field('state') . '">View in Google Maps</a>'; ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th>Firm</th>
                        <td><?php the_field('firm'); ?></td>
                    </tr>
                </table>
            </div>
        </div>   
        <div class="ARS-column" style="float:left; min-width:300px;">
            <div
                style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px; max-width: 800px;">
                <h4 style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">Assigned Cases</h4>
                <table id="RGdataTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Case Title</th>
                            <th>Date Created</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $the_user = get_user_by('login', $title);
                        $attorney_name = $the_user->ID;
                        $args = array(
                            'post_type'        => 'ars_cases',
                            'meta_key'        => 'assigned_attorney',
                            'meta_value'    => $attorney_name
                        );
                        $posts = get_posts($args);
                        foreach ($posts as $post) : setup_postdata($post); 
                    ?>
                            <tr>
                                <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                                <td><?php the_field('referral_date', get_the_ID()); ?></td>
                                <td><?php the_field('status', get_the_ID()); ?></td>
                            </tr>
                        <?php wp_reset_postdata(); endforeach; ?>
                    <tbody>
                </table>                        
                <?php wp_reset_query(); ?>
                <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                <script>
                    jQuery(document).ready(function($){
                            $('#RGdataTable').DataTable();
                        } );
                </script>
            </div>
            <div style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px; max-width: 800px;">
                <h4 style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;"> Notes</h4>
                <?php the_field('notes')?>
            </div>
        </div>
    </div>
</article>
<?php
get_footer();
