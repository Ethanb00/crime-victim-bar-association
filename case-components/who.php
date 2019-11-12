<?php
    function who(){
        ?>
        <h4 class="card-header">Who</h4>
        <table>
            <tr>
                <th>Who Does the Victim Want to Sue:</th>
                <td><?php the_field('who_victim_ideally_wants_to_sue'); ?></td>
            </tr>
            <tr>
                <th>Victim Knows The Perpetrator:</th>
                <td><?php the_field('victim_knows_perpetrator'); ?></td>
            </tr>
            <tr>
                <th>Victim's Relationship with Perpetrator:</th>
                <td><?php the_field('victims_relationship_with_the_perpetrator');?>
            </tr>
            <tr>
                <th>Perpetrator's Current Location:</th>
                <td><?php echo(str_replace("  ",", ",get_field('where_perpetrator_currently_lives')));?></td>
            </tr>
        </table>  
        <?php  
    }
?>