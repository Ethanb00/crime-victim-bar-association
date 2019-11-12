<?php
//build the page
$container_class = apply_filters( 'neve_container_class_filter', 'container', 'single-post' );
get_header();
//Security check: Only allow case to be viewed if the logged in user has the role of administrator OR if their ID matches the assigned attorney
$user_id = get_current_user_id();
$attorney_id = get_field('assigned_attorney')['ID']; //Get and store the user ID of the assigned attorney
echo ($attorney_id);
if (($attorney_id != '' && $user_id == $attorney_id) || current_user_can('administrator') ){ // If the user is allowed to see the following content: ?>
    <article class="nv-single-post-wrap col" id="ars-content" style=""> <?php //Build a standard content section ?>
        <h2 style="text-align:center; margin-top:10px; ">Case #: <?php $title= get_the_title(); echo $title;  ?></h2> <?php //Build the title based on the case # ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter" style="margin:0 auto; display: block;">
            Update Case Status
        </button>
        <div class="row"> <?php //Build the row that will house the case information columns ?>
            <div class="col-md-3" style="margin-top:20px"> <?php //Build the left-most column. Used for Case Status, and Client Info ?>
                <h3 class="section-header">Case Status & Client Details</h3> 
                <div class="card" style="margin-bottom:10px;"> 
                    <?php   //Card for case metadata
                        include 'case-components/basic-case-info.php';
                        echo basicCaseInfo();
                    ?>
                </div>
                <div class="card">
                    <?php   //Card for Client details
                        include 'case-components/client-details.php';
                        echo clientDetails();
                    ?>
                </div>
                <div class="card">
                    <?php   //Card for details on exsting civil action
                        include 'case-components/existing-suit-details.php';
                        echo existingSuitDetails();
                    ?>
                </div>
            </div>
            <div class="col-md-9" style="margin-top:20px">
                <h3 class="section-header">Case Details</h3>
                <div class="row">
                    <?php  //Tabbed area for the longer form questions (these questions don't really work in tables because they're input field in the form is a text-area, so they can be pretty long).
                        include 'case-components/long-form-answers.php';
                        echo longFormAnswers();
                    ?>
                    <div class="col-md-4">
                        <div class="card"> 
                           <?php    //Card for the details on the hwhere and when.
                                include 'case-components/where-and-when.php';
                                echo whereAndWhen();
                            ?>
                        </div>
                        <div class="card">
                            <?php   //Card for the details on the perpetrator.
                                include 'case-components/who.php';
                                echo who();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </article>
    <!-- Modal -->
    <?php
        include 'case-components/update-modal.php';
        echo updateModal();
    ?>    
    <!-- End Modal -->


    <script>
        var acc = document.getElementsByClassName("ars-accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


    <script>
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    </script> 
    
    <?php
} elseif (is_user_logged_in() == FALSE){ ?>
    <h3 style="text-align:center;">You must login to view assigned cases. Go <a href=<?php echo wp_login_url($_SERVER["REQUEST_URI"] );?>>here</a> to login and view your assigned cases.</h3> <?php
} else { 
    $user = wp_get_current_user();
    if ( in_array( 'ars', (array) $user->roles ) ) { ?>
        <h3 style="text-align:center; margin-top: 20px;">You are a member of the Attorney Referral Service, but you do not have access to this case. <br> To view your assigned cases, go <a href="/my-assigned-cases">here</a>.</h3> <?php 
    }
    else{ ?>
        <h3 style="text-align:center; margin-top: 20px;">According to our records you are not a member of the Attorney Referral Service. If you believe that is in error, please <a href="/contact-us">contact us</a>.</h3> <?php
    }
}?>
<?php get_footer();