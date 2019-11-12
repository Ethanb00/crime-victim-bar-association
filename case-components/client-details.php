<?php
    function clientDetails(){ ?>
        <h4 class="card-header">Client Details</h4>
        <?php $via=get_field('referred_to_this_service_by_voice_in_action');
        if ($via=='Yes'){    //if client was referred by VIA then say so and return the ID # from VIA?>
            <div class="alert alert-success">
                <strong>Case Referred by VIA.</strong><br/>
                <strong>VIA Assigned Assailant ID: </strong><?php the_field('assailant_id_number_assigned_by_via');?>
            </div>
        <?php } 
        else {  //if client was not referred by VIA, return that info?>
            <div class="alert alert-info">
                <strong>Case not referred by VIA.</strong>
            </div><?php 
        }?>
        <table style="margin-top:0; margin-bottom:0;"> <?php //build a table to hold all the client details ?>
            <tr>
                <th>Name</th>
                <td><?php the_field('client_name'); ?></td>
            </tr>
            <tr>
                <th>Address</th> <?php //There's a better way to do this (for example, ACF has a combined address field {thingsEthanDidntNotice.gif})...potentially worth cleaning up at some point. ?>
                <td>
                    <p style="margin-bottom:0;"><?php the_field('client_address_line_1');?></p>
                    <p style="margin-bottom:0;"><?php the_field('client_address_line_2');?></p>
                    <p style="margin-bottom:0;"><?php the_field('client_city');?>,
                        <?php the_field('client_state');?> <?php the_field('client_zip');?></p>
                </td>
            </tr>
            <tr>
                <th>Phone #:</th>
                <td><?php the_field('client_phone'); ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php the_field('client_email'); ?></td>
            </tr>
            <tr>
                <th>Preferred Contact Method:</th>
                <td><?php the_field('preferred_contact_method');?></td>
            </tr>
        </table> <?php
}
?>