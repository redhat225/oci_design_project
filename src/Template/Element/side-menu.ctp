<style>
	.menu-item-wrapper .menu-item .menu-icon, .menu-item-wrapper .menu-item .menu-text{
			color: #808080 !important;
	}

	.menu-item-wrapper.is-active .menu-item .menu-icon, .menu-item-wrapper.is-active .menu-item .menu-text{
			color: green !important;
	}

	.menu-item-wrapper.is-active{
		background: #c8e2d5;
	}
</style>

<section class="is-small is-pad-bot-200 is-pad-top-0">
	<div class="menu-wrapper">
		<aside class="menu">
		  <p class="menu-label has-text-oci">
		    Accueil
		  </p>
		  <ul class="menu-list">
		    <li ><a ui-sref="admins.dashboard" ui-sref-active="active"><span class="icon"><i class="fab fa-dyalog"></i></span> Dashboard</a></li>
		    <li><a><span class="icon"><i class="fa fa-product-hunt"></i></span>Projets</a></li>
		  </ul>
		  <p class="menu-label">
		    Administration
		  </p>
		  <ul class="menu-list">
		    <li><a>Utilisateurs</a></li>
		    <li>
		      <a class="menu-list-include-wrapper">Gérer Utilisateurs</a>
		      <ul class="is-display-none">
		        <li><a>Ajouter</a></li>
		        <li><a>Modifier</a></li>
		        <li><a>Supprimer</a></li>
		      </ul>
		    </li>
		    <li><a>Planning</a></li>
		    <li><a>A propos</a></li>
		  </ul>
		</aside>
	</div>
</section>

<script>
	$(document).ready(function(){
		$('.menu-list-include-wrapper').on('click', function(){
			$('.menu-list-include-wrapper').removeClass('active');
			$(this).toggleClass('is-active');
			if($(this).hasClass('is-active'))
			  $(this).next('ul').slideDown();
			else
			  $(this).next('ul').slideUp();

		});
	});
</script>


