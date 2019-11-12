<?php

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

get_header();
?>
<?php if(current_user_can('mepr-active','rule:3321')): ?>
<h3 style="text-align:center; "><?php $title= get_the_title(); echo $title;  ?></h3>
<article class="nv-single-post-wrap col" style="min-height:1000px; padding-right: 50px; padding-left: 50px;">
    <div class="row">
        <div class="ARS-column" style="float:left;">
            <div style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px;">
                <h4 style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">Citation</h4>
                <table>
                    <tr>
                        <th>Citation</th>
                        <td><?php the_field('citation'); ?></td>
                    </tr>
                    <tr>
                        <th>Case Date</th>
                        <td><?php the_field('case_date'); ?></td>
                    </tr>
                    <tr>
                        <th>Court</th>
                        <td><?php the_field('court'); ?></td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td><?php the_field('state'); ?></td>
                    </tr>
                </table>
            </div>
            <div style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px;">
                <h4 style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">Case Details</h4>
                <table>
                    <tr>
                        <th>Category</th>
                        <td><?php the_field('category'); ?></td>
                    </tr>
                    <tr>
                        <th>Topic</th>
                        <td><?php the_field('topic'); ?></td>
                    </tr>
                    <tr>
                        <th>Prevailing Party</th>
                        <td><?php the_field('prevailing_party'); ?></td>
                    </tr>
                    <tr>
                        <th>Other Parties</th>
                        <td><?php the_field('other_parties'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="ARS-column" style="float:left; max-width:600px;">
            <div style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px;">
                <h4 style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">Statement of Facts</h4>
                <?php the_field('statement_of_facts'); ?>
            </div>
        </div>
        <div class="ARS-column" style="float:left; max-width:600px;">
            <div style="margin-bottom:20px;   box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); padding:30px;">
                <h4 style="text-align:center; border-bottom-color: black; border-bottom-width: 1px; border-bottom-style: solid;">Holding</h4>
                <?php the_field('holding'); ?>
            </div>
        </div>
    </div>
</article>
<?php endif; ?>

<?php if(!current_user_can('mepr-active','rule:3316')): ?>
<h3 style="text-align:center;">You do not have access. Please login:</h3>
<?php echo do_shortcode('[mepr-login-form]'); ?>
<?php endif; ?>
<?php
get_footer();