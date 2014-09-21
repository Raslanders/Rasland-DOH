<?php
	function checkClass($loc, $num) {
		if ( $loc == $num ) {
			return "active";
		}
	}
?>

<!-- Start progress bar -->
<header class="grey">
<div class="row">
	<div class="small-block-grid-5">
		<div class="row line">
				<div class="small-12">
					<div class="progress-line-grey"></div>
				</div>
		</div>
		<li>
			<div class="progress-dot-grey <?php echo checkClass($loc, 0); ?>">
			</div>
		</li>
		<li>
			<div class="progress-dot-grey <?php echo checkClass($loc, 1); ?>">
			</div>
		</li>
		<li>
			<div class="progress-dot-grey <?php echo checkClass($loc, 2); ?>">
			</div>
		</li>
		<li>
			<div class="progress-dot-grey <?php echo checkClass($loc, 3); ?>">
			</div>
		</li>
		<li>
			<div class="progress-dot-grey <?php echo checkClass($loc, 4); ?>">
			</div>
		</li>
	</div>
</div>
<div class="row">		
	<div class="small-8 column small-centered">
		<img src="img/webFlockLogoGrey.png" style="width: 100%" />
	</div>
</div>
</header>
<!-- End progress bar -->