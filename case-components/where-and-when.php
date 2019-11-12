<?php
    function whereAndWhen() {?>
         <div class="content">
            <h4 class="card-header">When and Where</h4>
            <table>
                <tr>
                    <th>When did the crime(s) occur?</th>
                    <td><?php the_field('when_did_the_crimes_occur'); ?></td>
                </tr>
                <tr>
                    <th>Where did the crime(s) occur?</th>
                    <td><?php echo(str_replace("  ",", ",get_field('crime_location')));?>
                </tr>
                <tr>
                    <th>Location Type:</th>
                    <td><?php the_field('location_type'); ?></td>
                </tr>                             
                <tr>
                    <th>Crime(s) Committed:</th>
                    <td>
                        <div class="scrolling-section" style="box-shadow:none !important; padding:0 !important;">
                        <?php
                            $crimes = get_field('crimes_committed');
                            if( $crimes ):
                            echo '<ul>';
                            foreach( $crimes as $crime ):
                            echo '<li>' . $crime . '</li>';
                            endforeach;
                            echo '</ul>';
                            endif; ?>
                        </div>
                    </td>
                </tr>  
            </table>
        </div> <?php
    } 
?>