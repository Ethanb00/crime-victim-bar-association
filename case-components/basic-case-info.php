<?php
    function basicCaseInfo(){ ?>
        <h4 class="card-header">Basic Case Information</h4>
        <table style="margin-top:0; margin-bottom:0;">
            <tr>
                <th>Case Number</th>
                <td><?php the_field('case_number'); ?></td>
            </tr>
            <tr>
                <th>Assigned Attorney</th>
                <td><?php //it's a pain to work with users and user objects...so: this section handles the userID, displayname, & slugifies their name to build a URL so we can link to the ARS attorney profile of the assigned attorney.
                        $assigned_atty = get_field('assigned_attorney'); 
                        $fullname = $assigned_atty['display_name'];
                        $slugifiedName =  strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $fullname)));   //takes the user's fullname, replaces spaces with dashes, & lowercases?>
                    <a href="/attorneys/<?php echo $slugifiedName?>">
                        <?php echo $fullname;?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Case Status</th>
                <td><?php the_field('status'); ?> </td>
            </tr>
            <tr>
                <th>Referral Date</th>
                <td><?php the_field('referral_date'); ?></td>
            </tr>
        </table><?php 
    } 
?>