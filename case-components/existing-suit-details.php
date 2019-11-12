<?php
    function existingSuitDetails(){ ?>
        <div class="content">
            <h4 class="card-header">Existing Suit Details</h4>
            <?php 
            //get ready for a wild ride of ifs and elses.
            //BEGINING THE LOOPS FOR EXISTING CIVIL ACTIONS AND CASE STATUS
            if (get_field('victim_reported_crime_to_law_enforcement') == "Yes"){  //if the victim reported to law enforcement, say so. ?>
                <div class="alert alert-success">
                    <strong>Victim reported crime to law enforcement.</strong>
                </div><?php
                    if (get_field('arrest_charge_or_conviction_from_law_enforcement_report')== "Yes"){  //if the victim reported to cops AND if there was action taken, say so ?>
                        <div class="alert alert-success">
                            <strong>Victim is aware of an arrest, charge, and/or conviction.</strong>
                        </div><?php
                        if (get_field('victim_is_aware_of_hearing_or_trial_dates' == "Yes")){ //if there was police action AND the victim knows of a court date, say so ?>
                            <div class="alert alert-success">
                                <strong>Victim is aware of a hearing/trial date.</strong>
                            </div><?php
                        } else { //if the vicitm reported to cops AND if there was action taken BUT the victim doesn't know of any court dates, say so ?>
                            <div class="alert alert-warning">
                                <strong>Victim is not aware of a hearing/trial date.</strong>
                            </div><?php
                        }
                    } elseif (get_field('arrest_charge_or_conviction_from_law_enforcement_report' == "No")) { //if the victim has no knowledge of action taken by the police, say so ?>
                        <div class="alert alert-warning">
                            <strong>Victim is not aware of an arrest, charge, and/or convcition.</strong>
                        </div><?php
                    } elseif (get_field('arrest_charge_or_conviction_from_law_enforcement_report') == "Unsure/Unaware"){  //if the victim is unsure/unaware of actions taken by the police, say so.?>
                        <div class="alert alert-warning">
                            <strong>Victim is unsure/unaware of an arrest, charge, and/or conviction.</strong>
                        </div> <?php
                    } else { ?>
                        <div class="alert alert-warning">
                            <strong>For the question about whether the victim has knowledge of an arrest/charge/conviction, the victim selected "other" & stated: </strong> <?php the_field('arrest_charge_or_conviction_from_law_enforcement_report'); ?>
                        </div> <?php
                    }                               
            } else { //if the victim did not report to law enforcement ?>
                <div class="alert alert-warning">
                    <strong>Victim did not report crime to law enforcement.</strong>
                </div><?php
            }
            if (get_field('victim_has_already_retained_other_civil_attorneys') == "Yes"){ //if the victim has retained an attorney already, say so. ?>                                    
                <div class="alert alert-warning">
                    <strong>Victim Has Already Retained Civil Counsel.</strong>
                </div><?php
            } elseif (get_field('victim_has_already_retained_other_civil_attorneys') != "No"){ //otherwise, if the victim has answered "other" on the retained  attorney question, provide deets. ?>                                    
                <div class="alert alert-info">
                    <strong>For the question about whether the victim has already retained civil counsel, the victim selected "other" & stated: </strong> <?php the_field('victim_has_already_retained_other_civil_attorneys') ?>
                </div>
            <?php
            }
            if (get_field('victim_is_aware_of_other_civil_cases_related_to_this_crime') == "Yes"){ //if the victim is aware of other related cases, say so. ?>
                <div class="alert alert-info">
                    <strong>Victim is aware of other civil case(s) related to this crime.</strong>
                </div><?php
            } elseif (get_field('victim_is_aware_of_other_civil_cases_related_to_this_crime') == "Maybe"){ ?>
                <div class="alert alert-info">
                    <strong>Victim may know about other legal proceedings related to this case.</strong>
                </div><?php
            } elseif (get_field('victim_is_aware_of_other_civil_cases_related_to_this_crime') != "No"){ //if victim did not answer Yes to being aware of other cases AND they did not answer No, then give their Other answer. ?>
                    <div class="alert alert-warning">
                        <strong>For the question about whether the victim is aware of other civil case(s) related to this case, the victim selected "other" option & stated:</strong> <?php the_field('victim_is_aware_of_other_civil_cases_related_to_this_crime') ?>
                    </div><?php
            } 
            if (get_field('victim_is_aware_of_the_status_of_other_civil_cases')== "Yes"){ //if the victim is aware of related cases, say so. ?>
                <div class="alert alert-info">
                    <strong>Victim is aware of the status of other civil case(s) related to this crime.</strong>
                </div><?php
            } elseif (get_field('victim_is_aware_of_the_status_of_other_civil_cases') == "No") { //if the victim is not aware of related cases, say so. ?>
                <div class="alert alert-warning">
                    <strong>Victim is not aware of the status of other civil case(s) related to this crime.</strong>
                </div><?php
            } else {  //if the victim is answered other to the question about related case statuses?>
                <div class="alert alert-warning">
                    <strong>For the question about whether the victim is aware of the status of other civil case(s), the victim selected "other" option & stated:</strong> <?php the_field('victim_is_aware_of_the_status_of_other_civil_cases') ?>
                </div><?php
            }  
            // END THE SECTION FOR EXISTING CIVIL CASES AND STATUS   
            ?>
        </div>
    <?php 
    }
?>