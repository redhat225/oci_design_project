		<div class="remmanuel-info level-item has-text-centered is-pointer" style="position: absolute;
    bottom: 1px;
    left: 20%;">
				<img src="/img/assets/chartkit/signature.png" alt="" width="130px" class="hvr-grow">
	     </div>

<div class="modal" id="remmanuel" style="">
  <div class="modal-background"></div>
  <div class="modal-content hero is-black box is-none-radius">
  	<p class="has-text-centered is-pad-top-30">
	   <img src="/img/assets/chartkit/signature.png" width="180px" alt="">
  	</p>
  	<h3 class="subtitle has-text-weight-bold is-pad-top-15 is-mar-bot-5 has-text-centered">Pôle Security By Design</h3>
          <h3 class="subtitle is-mar-bot-5 has-text-centered">DDT/DSDT</h3>

    <p class="has-text-centered">
          <span class="has-text-centered">Eric <b>ABOA</b> . </span>
        
          <span class="has-text-centered">Boris <b>NCHO</b> . </span>

          <span class="has-text-centered">Emmanuel <b>RIEHL</b></span>
    </p>

  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<script>
	$('.remmanuel-info').on('click', function(){
		$('#remmanuel').toggleClass('is-active');

	});

	$('.modal-close').on('click', function(){
			$(this).parents().removeClass('is-active');
		});
</script>