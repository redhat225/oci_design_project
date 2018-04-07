<style>
    #wangwei{
        position:absolute; bottom: -100px; right:300px; overflow: hidden; z-index: 9999;
		transition-duration: 850ms;

    }
	#wangwei:hover{
		cursor:pointer;
		bottom: -30px;
		transition-duration: 850ms;
	}
</style>

<!-- Navbar -->
<?= $this->element('navbar') ?>

<div class="columns is-mar-bot-0" style="position:relative; overflow: hidden;">
	<div id="side-menu" class="column is-2 is-pad-rgt-0 is-pad-top-0 is-mar-top-10 is-pad-bot-0 oci-black-b" style="position:relative; overflow:hidden;">
		<?= $this->element('side-menu') ?>
	    <?= $this->element('about-me') ?>

	</div>
	<div id="wide-menu" class="column is-10 is-pad-top-50 is-mar-top-10 is-pad-lft-50" style="background-color: #f8580014; border-left:2px solid #f8580052;overflow-y: scroll;">
		<!-- Main Section -->
		<section ui-view ng-hide="preloader"></section>
        <div class="dropdown is-hoverable">
	

        <!-- Down image -->
        <div class="is-position-relative" ng-hide="preloader">    
			<figure class="is-position-absolute is-hidden-mobile" style="bottom:0px; left:-180px; z-index: -9999;">
					<img src="/img/assets/skeleton/loader_static_2.png" alt="">
			</figure>
        </div>
	</div>

        <!-- Wangwei -->
				<div class="dropdown is-hoverable" id="wangwei">
				  <div class="dropdown-trigger">
			            <figure  aria-haspopup="true" aria-controls="dropdown-menu4">
			                <img src="/img/assets/wangwei/ww.png" class="is-wth-125" alt="">
			            </figure>
				  </div>
				  <div class="dropdown-menu" id="dropdown-menu4" role="menu">
				    <div class="dropdown-content">
				      <div class="dropdown-item">
				        <p>You can insert <strong>any type of content</strong> within the dropdown menu.</p>
				      </div>
				    </div>
				  </div>
				</div>


			<!-- 	<div  class="dropdown is-hoverable">
				  <div class="dropdown-trigger">

				  </div>
				  <div class="dropdown-menu" id="dropdown-menu4" role="menu">
				    <div class="dropdown-content">
			           <nav class="panel" style="position: absolute; top: 1px;">
							  <p class="panel-heading">
							    repositories
							  </p>
							  <div class="panel-block">
							    <p class="control has-icons-left">
							      <input class="input is-small" type="text" placeholder="search">
							      <span class="icon is-small is-left">
							        <i class="fas fa-search"></i>
							      </span>
							    </p>
							  </div>
							  <p class="panel-tabs">
							    <a class="is-active">all</a>
							    <a>public</a>
							    <a>private</a>
							    <a>sources</a>
							    <a>forks</a>
							  </p>
							  <a class="panel-block is-active">
							    <span class="panel-icon">
							      <i class="fas fa-book"></i>
							    </span>
							    bulma
							  </a>
							  <a class="panel-block">
							    <span class="panel-icon">
							      <i class="fas fa-book"></i>
							    </span>
							    marksheet
							  </a>
							  <a class="panel-block">
							    <span class="panel-icon">
							      <i class="fas fa-book"></i>
							    </span>
							    minireset.css
							  </a>
							  <a class="panel-block">
							    <span class="panel-icon">
							      <i class="fas fa-book"></i>
							    </span>
							    jgthms.github.io
							  </a>
							  <a class="panel-block">
							    <span class="panel-icon">
							      <i class="fas fa-code-branch"></i>
							    </span>
							    daniellowtw/infboard
							  </a>
							  <a class="panel-block">
							    <span class="panel-icon">
							      <i class="fas fa-code-branch"></i>
							    </span>
							    mojs
							  </a>
							  <label class="panel-block">
							    <input type="checkbox">
							    remember me
							  </label>
							  <div class="panel-block">
							    <button class="button is-link is-outlined is-fullwidth">
							      reset all filters
							    </button>
							  </div>
							</nav>
				    </div>
				  </div>
				</div>
 -->

            </div>



<script>
	$('.trigger-resizer').on('click', function(){
		$('#side-menu').toggleClass('is-display-none');
		$('#wide-menu').toggleClass('is-10');
	});
</script>