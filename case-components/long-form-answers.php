<?php
    function longFormAnswers(){ ?>
        <div class="col-md-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="incident-tab" data-toggle="tab" href="#incident" role="tab" aria-controls="incidentincident" area-selected="true">Incident Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="injuries-tab" href="#injuries" role="tab" aria-controls="injuries" aria-selected="false">Victim's Report of Injuries & Damages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="assets-tab" href="#assets" role="tab" aria-controls="assets" aria-selected="false">Vicitm's Report of Perpetrator's Assets</a>
                </li>
            </ul>
            <div class="tab-content" id="caseTabs" style="padding:20px;">
                <div class="tab-pane fade show active" id="incident" role="tabpanel" areia-labelledby="incident-tab"><?php the_field('incident_description');?></div>  
                <div class="tab-pane fade" id="injuries" role="tabpanel" aria-labelledby="injuries-tab"><?php the_field('victims_report_of_injuries_and_damages');?></div>
                <div class="tab-pane fade" id="assets" role="tabpanel" aria-labelledby="assets-tab"><?php the_field('victims_report_of_perpetrators_assets');?></div>
            </div>
        </div><?php 
    };
?>