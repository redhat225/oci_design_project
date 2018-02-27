<section >
<!-- 	<h3 class="subtitle"><span class="icon">i.fas.fa-</span>Raccourcis</h3>
	<div class="tile is-ancestor">

	  <div class="tile is-parent is-8">
			<div class="tile is-child">
				    <div class="box is-radiusless is-pad-full-0">
				    	 <div class="panel-heading oci-black-b">
						    <span class="has-text-white">Projets</span>
						  </div>
						<div ui-sref="admins.projects.create" class="button is-oci is-outlined is-borderless is-none-border is-fullwidth is-radiusless">
							<span class="icon is-large">
								<i class="fa fa-plus"></i>
							</span>
							<span>Créer un projet</span>
						</div>
				    </div>
		  	</div>
	  </div>

    </div> -->			

	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<span class="icon">
					<i class="fab fa-2x fa-dyalog"></i>
				</span>
				<span class="has-text-intercoton-green has-text-weight-semibold is-pad-lft-20">Dashboard</span> 	
			</div>
		</div>
		<div class="level-right">
			<span class="icon">
					<i class="fas fa-2x fa-chart-line"></i>
			</span>
			<span class="level-item has-text-weight-semibold has-text-intercoton-green is-pad-lft-10"> Statistiques Brèves</span>
		</div>
	</div>
		<!-- Qucik Stats Preview - Observator & system -->
		<div class="tile is-ancestor">
			<div class="tile is-parent">
				<div class="tile is-child box hero is-oci is-none-radius">
					<div class="media">
						<div class="media-left">
							<span class="icon">
								<i class="fa fa-sticky-note fa-2x has-text-intercoton-green"></i>
							</span>
							 <span class=""></span>
						</div>
						<div class="media-content">
							<p class="is-size-5 has-text-weight-semibold has-text-intercoton-green">Projets</p>
							<p class="is-size-3 has-text-weight-semibold has-text-intercoton-green">30</p>
						</div>
						<div class="media-right">
							<span class="icon button is-medium is-intercoton-green" ui-sref="admins.projects.create">
								<i class="fa fa-plus"></i>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tile is-parent">
				<div class="tile is-child box  hero is-oci-bottledgreen is-none-radius">
					<div class="media">
						<div class="media-left">
							<span class="icon">
								<i class="fas fa-2x fa-users"></i>
							</span>
							 <span class=""></span>
						</div>
						<div class="media-content">
							<p class="is-size-5 has-text-weight-semibold has-text-intercoton-green">Utilisateurs</p>
							<p class="is-size-3 has-text-weight-semibold has-text-intercoton-green">40</p>
						</div>
						<div class="media-right">
							<span class="icon button is-medium is-intercoton-green" ui-sref="admins.cooperatives.create({page_id:1})">
								<i class="fa fa-plus"></i>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="tile is-parent">
				<div class="tile is-child box  hero is-black is-none-radius">
					<div class="media">
						<div class="media-left">
							<span class="icon">
								<i class="fas fa-2x fa-stopwatch"></i>
							</span>
							 <span class=""></span>
						</div>
						<div class="media-content">
							<p class="is-size-6 has-text-weight-semibold has-text-intercoton-green">Temps imparti passage jalon projet - Emeraude</p>
							<p class="is-size-3 has-text-weight-semibold has-text-intercoton-green">
										<div class="countup"></div>
								
							</p>
						</div>
					</div>

				</div>
		    </div>
     </div>
	<div class="tile is-ancestor">
		<div class="tile is-parent">
			<div class="tile is-7 is-child box is-pad-full-0 is-none-radius">
				<div class="panel">
					<div class="panel-heading  oci-bottledgreen-b is-pad-rgt-0 is-pad-rgt-0">
						<div>
							<span class="icon">
								<i class="fas fa-2x fa-chart-area"></i>
							</span>
							<span class="has-text-intercoton-green has-text-weight-semibold is-pad-lft-20 is-size-6">Statistiques des rapports rédigés/mois</span> 
						</div>
					</div>
					<div class="panel-block">
						<canvas  id="line" class="chart chart-line" chart-data="data"
						chart-labels="labels" chart-colors="colors" chart-series="series" chart-options="options"
						chart-dataset-override="datasetOverride" chart-click="onClick">
						</canvas>
					</div>
				</div>

			</div>
			<div class="tile is-1 is-child">
				&nbsp;
			</div>
			<!-- Doughnout -->
			<div class="tile is-4 is-child box is-pad-full-0 is-none-radius">
				<div class="panel">
					<div class="panel-heading oci-bottledgreen-b is-pad-rgt-0">
						<div>
							<span class="icon">
							<i class="fas fa-2x fa-thermometer-three-quarters"></i>
							</span>
							<span class="has-text-intercoton-green has-text-weight-semibold is-pad-lft-20 is-size-6">les vulnérabilités les plus rencontrées</span> 	
						</div>
					</div>
					<div class="panel-block">
						<canvas width="100%" height="100%" id="radar" class="chart chart-radar"
						  chart-data="data_radar" chart-options="options" chart-labels="labels_radar">
						</canvas> 
					</div>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
  $(document).ready(function() {
    $(".countup").flipTimer({
					date:"2018/02/10 10:00:00",
					timeZone:0,	//Time zone of New York
					past:true,
					borderRadius:0,
					bgColor:"#000",
					dividerColor:"#666",
					digitColor:"#f85800",
					textColor:"#f85800",
					boxShadow:false
    });
  });
</script>

</section>



