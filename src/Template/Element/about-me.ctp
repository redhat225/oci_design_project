		<div id="remmanuel-info" class="level-item has-text-centered is-pointer">
				<img src="/img/assets/chartkit/signature.png" alt="" width="130px" class="hvr-grow">
	     </div>

<div class="modal" id="remmanuel">
  <div class="modal-background"></div>
  <div class="modal-content hero is-black box is-none-radius">
  	<p class="has-text-centered is-pad-top-30">
	   <img src="/img/assets/chartkit/signature.png" width="180px" alt="">
  	</p>
  	<h3 class="subtitle has-text-weight-bold is-pad-top-15 is-mar-bot-5 has-text-centered">RIEHL EMMANUEL</h3>
  	<h3 class="subtitle is-mar-bot-5 has-text-centered">Développeur FullStack</h3>
  	<h3 class="subtitle is-mar-bot-5 has-text-centered">+225 8785-3436</h3>
  	<h3 class="subtitle is-mar-bot-5 has-text-centered"><a href="https://www.riehl-emmanuel.xyz">En savoir plus</a></h3>
  	<div class="field is-mar-top-30 has-text-white">
  		<div class="control is-grouped has-text-centered">
	<a href="https://github.com/redhat225" target="_blank" class="button">
		<span class="icon">
			<i class="fa fa-github"></i>
		</span>
		<span>GitHub</span>
	</a>
	<button class="button is-intercoton-green">
		<span class="icon">
			<i class="fa fa-coffee"></i>
		</span>
		<span>Offre-moi un café</span>
	</button>
  		</div>
  	</div>

  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<script>
	$('#remmanuel-info').on('click', function(){
		$('#remmanuel').toggleClass('is-active');

	});

	$('.modal-close').on('click', function(){
			$(this).parents().removeClass('is-active');
		});
</script>