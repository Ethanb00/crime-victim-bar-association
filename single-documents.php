<?php

$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );

get_header();
?>
<?php if(current_user_can('mepr-active','rule:3316')): ?>
    <h2 style="text-align:center; "><?php $title= get_the_title(); echo $title;  ?></h2>
    <article class="nv-single-post-wrap col" style="min-height:1000px; padding-right: 50px; padding-left: 50px;">
        <?php $file = get_field('file');
        $url = wp_get_attachment_url( $file ); ?>
        <div style="    display: flex;width: 100%; margin: 0 auto;">
            <a style="margin: 0 auto;" href="<?php echo esc_html($url); ?>"><button>View/Download File</button></a>
        </div>
        <div id="wrapper">
            <div id="column_container">
                <div id="column1">
                    <h3 style="text-align:center;">Document Details</h3>
                    <?php 
                    $fields = get_field_objects();
                    if( $fields ): ?>
                    <table>
                        <?php foreach( $fields as $field ): 
                                if($field['label'] != 'File' /*and $field['value'] != '' */): ?>
                        <tr >
                            <th><?php echo $field['label']; ?>:</th>
                            <td><?php echo $field['value']; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
                <div id="column2">
                    <h3 style="text-align:center;">File Preview</h3>
                    <?php echo wp_get_attachment_image( $file, array('700', '600'), "", array( "class" => "img-responsive" ) );?>
                </div>
            </div>
            
        <div>
    </article>
<?php endif; ?>
<?php if(!current_user_can('mepr-active','rule:3316')): ?>
<h3 style="text-align:center;">You do not have access. Please login:</h3>
<?php echo do_shortcode('[mepr-login-form]'); ?>
<?php endif; ?>

<?php
get_footer();