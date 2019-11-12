<?php
/*
 * Template Name: Cases Assigned to User
 */

get_header();
$user = wp_get_current_user();
if (is_user_logged_in() == FALSE){ ?>
	<h3 style="text-align:center;">You must login to view assigned cases. Go <a href=<?php echo wp_login_url($_SERVER["REQUEST_URI"] );?>>here</a> to login and view your assigned cases.</h3> <?php
} elseif ( in_array( 'ars', (array) $user->roles ) ) { ?>
	<h2 style="text-align:center;">My Assigned Cases</h2>
	<div style="min-height:800px; max-width:800px; margin: 0 auto;">
		<div class="tab">
			<button class="tablinks active" onclick="openTab(event, 'NewReferrals')">New Referrals</button>
			<button class="tablinks" onclick="openTab(event,'Closed')">Closed</button>
			<button class="tablinks" onclick="openTab(event, 'Declined')">Declined</button>
		</div>
		<div id="NewReferrals" class="tabcontent" style="display:block;">
			<h3 style="text-align:center">New Referrals</h3>
			<section style="">
				<table id="NewCasesTable" class="display" style="width:100%;">
					<thead>
						<tr>
							<th>Case Title</th>
							<th>Date Created</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$attorney_name = get_current_user_id();
						$args = array(
							'post_type'        => 'ars_cases',
							'meta_query'	=> array(
								'relation'	=> 'AND',
								array(
									'key'        => 'assigned_attorney',
									'value'    => $attorney_name,
									'compare'	=> '='
								),
								array(
									'key'	=> 'status',
									'value'	=> 'Initial Consultation Scheduled',
									'compare'	=> '='
								)
							)
						);
						//$the_query = new WP_Query( $args );
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
			</section>
		</div>
		<div id="Closed" class="tabcontent">
			<h3 style="text-align:center">Closed - Payment Recieved</h3>
			<section style="">
				<table id="ClosedCasesTable" class="display" style="width:100%;">
					<thead>
						<tr>
							<th>Case Title</th>
							<th>Date Created</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$attorney_name = get_current_user_id();
						$args = array(
							'post_type'        => 'ars_cases',
							'meta_query'	=> array(
								'relation'	=> 'AND',
								array(
									'key'        => 'assigned_attorney',
									'value'    => $attorney_name,
									'compare'	=> '='
								),
								array(
									'key'	=> 'status',
									'value'	=> 'Closed - Payment Received',
									'compare'	=> '='
								)
							)
						);
						//$the_query = new WP_Query( $args );
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
			</section>
		</div>



		<div id="Declined" class="tabcontent" >
			<h3 style="text-align:center">Declined Referrals</h3>
			<section>
				<table id="DeclinedCasesTable" class="display" style="width:100%;">
					<thead>
						<tr>
							<th>Case Title</th>
							<th>Date Created</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$attorney_name = get_current_user_id();
						$args = array(
							'post_type'        => 'ars_cases',
							'meta_query'	=> array(
								'relation'	=> 'AND',
								array(
									'key'        => 'assigned_attorney',
									'value'    => $attorney_name,
									'compare'	=> '='
								),
								array(
									'key'	=> 'status',
									'value'	=> 'Declined',
									'compare'	=> 'like'
								)
							)
						);
						//$the_query = new WP_Query( $args );
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
			</section>
		</div>
		<script>
			function openTab(evt, status) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(status).style.display = "block";
				evt.currentTarget.className += " active";
			}
		</script>
	</div>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
			<script>
				jQuery(document).ready(function($){
						$('#NewCasesTable').DataTable();
						$('#DeclinedCasesTable').DataTable();
						$('#ClosedCasesTable').DataTable();
					} );
	</script> <?php
} else{ ?>
	<h3 style="text-align:center; margin-top: 20px;">According to our records you are not a member of the Attorney Referral Service. If you believe that is in error, please <a href="/contact-us">contact us</a>.</h3> <?php
} ?>
<?php get_footer();?>