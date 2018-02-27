<!-- Navbar -->
<?= $this->element('navbar') ?>

<div class="columns is-mar-bot-0">
	<div class="column is-2 is-pad-rgt-0 is-pad-top-0 is-mar-top-10 is-pad-bot-0 oci-black-b" style="position:relative;">
		<?= $this->element('side-menu') ?>
	<!-- 	<?= $this->element('about-me') ?> -->

	</div>
	<div class="column is-10 hero is-pad-top-50 is-pad-lft-50" style="background:url('/img/assets/skeleton/back_2.png') #f8580014 no-repeat 50% 50%;border-left:2px solid #f8580052;">
		<!-- Main Section -->
		<section ui-view ng-hide="preloader"></section>
        
        <div class="is-position-relative" ng-hide="preloader">
	        <!-- Down image -->
			<figure class="is-position-absolute is-hidden-mobile" style="bottom:0px; left:-180px; z-index: -9999;">
					<img src="/img/assets/skeleton/loader_static_2.png" alt="">
			</figure>
        </div>


	</div>
</div>