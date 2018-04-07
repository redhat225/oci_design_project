<style>
	.menu-list a.active{
		background: #f85800;
		transition-duration: 300ms;

	}

	.menu-item-wrapper.is-active .menu-item .menu-icon, .menu-item-wrapper.is-active .menu-item .menu-text{
			color: orange !important;
		transition-duration: 300ms;

	}

	.menu-item-wrapper.is-active{
		background: #c8e2d5;
		transition-duration: 300ms;
	}

	.menu-list li a:hover{
		transition-duration: 300ms;
	}
</style>

<section class="is-small is-pad-bot-200 is-pad-top-0" style="min-height: 800px !important;">
	<div class="menu-wrapper">
		<aside class="menu is-mar-top-20">
		  <p class="menu-label has-text-oci">
		    Accueil
		  </p>
		  <ul class="menu-list">
		    <li class="is-mar-top-5"><a ui-sref="admins.dashboard" ui-sref-active="active"><span class="icon"><i class="fab fa-dyalog"></i></span> Dashboard</a></li>
		    <li class="is-mar-top-5"><a ui-sref="admins.projects.view" ui-sref-active="active"><span class="icon"><i class="fab fa-patreon"></i></span>Projets</a></li>
		  </ul>
		  <p class="menu-label">
		    Administration
		  </p>
		  <ul class="menu-list">
		    <li class="is-mar-top-5"><a ui-sref="admins.accounts.view" ui-sref-active="active">Utilisateurs</a></li>
		    <li>
		      <a class="menu-list-include-wrapper">Gérer Utilisateurs</a>
		      <ul class="is-display-none">
		        <li><a ui-sref="admins.accounts.create">Ajouter</a></li>
		        <li><a ng-click="openModalViewUsers()">Modifier</a></li>
		      </ul>
		    </li>
		    <li class="is-mar-top-5"><a ui-sref="admins.plannings.view" ui-sref-active="active">Planning</a></li>
		    <li class="is-mar-top-5"><a class="remmanuel-info">A propos</a></li>
		  </ul>
		</aside>
	</div>
</section>

<?= $this->element('Admins/modal_users')  ?>

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


