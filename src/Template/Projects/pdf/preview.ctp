<div class="container">
    <img src="img/assets/chartkit/oci_web_project_logo_4.png" width="150px" alt="">
    <h1 class="title is-mar-top-30">
        Ticket Création Projet - <?= $project['project_fullname'] ?> - <?php $creation_date = new \DateTime($project['created']); echo $creation_date->format('d-m-Y H:i:s') ?>
    </h1>

    <h2 class="has-text-semibold is-mar-top-20 is-mar-bot-20 has-text-weight-semibold is-size-5"><strong>Créateur: <?= $creator['user']->user_fullname ?> - <?= $creator['user']->user_job ?></strong></h2>

    <h2 class="is-size-4 has-text-weight-semibold">Verdict</h2>
    <article style="border: 3px solid orange;" class="is-pad-full-10">
        <p>
            Après analyse il est retenu que le projet <?= $project['project_fullname'] ?> 
			 <?php if($project['project_criticity'] == 'critical'): ?>
			             <strong>sera audité par le pôle SecurityByDesign</strong>  car il répond aux critères d'éligibilité édictés en la matière (se réferer plus bas pour en avoir connaissance, le cas échéant).
			 <?php else: ?>
   						 <strong>ne sera pas audité par le pôle SecurityByDesign</strong>  car il ne répond pas aux critères d'éligibilité édictés en la matière (se réferer plus bas pour en avoir connaissance, le cas échéant).
			 <?php endif; ?>
 
        </p>
    </article>
    <div>

    <h2 class="is-size-4 has-text-weight-semibold is-mar-top-30">Formulaire récapitulatif</h3>

    <form name="createProjectForm">
        <div class="field is-horizontal is-mar-top-30">
            <h1 class="subtitle has-text-weight-semibold">
                  Nom du Projet
            </h1>
			<?= $project->project_fullname ?>
        </div>
        <div class="field is-horizontal">
            <h1 class="subtitle has-text-weight-semibold">
                Priorité du projet
            </h1>
			<?= $project->project_priority ?>
        </div>
        <div class="field is-horizontal">
            <h1 class="subtitle has-text-weight-semibold">
                Initiateur du projet
            </h1>
			<?= $project['project_type']['project_type_denomination'] ?>
        </div>

        <?php if(isset($project['project_contributors'])): ?>
        	<?php if(count($project['project_contributors'])>0): ?>
                            <!-- Contacts du projet -->
                            <div class="field is-horizontal" id="actor_area">
                                       <h1 class="subtitle has-text-weight-semibold">Les contacts du projet </h1> 
                                </div>

                                <div class="field-body">
                                    <div class="field" >
										<?php foreach($project['project_contributors'] as $key => $value): ?>
											<table class="table is-striped is-narrow is-hoverable is-fullwidth">
												<tbody>
													<tr class="actor_cadre" ng-repeat="u in users | filter:search_actors">
														<td>
																<img width="130px" src="img/assets/admins/photo/<?= $value['user_account']['user']['user_photo'] ?>">
														</td>
														<td>
															  <p>
														        <strong><?= $value['user_account']['user']['user_fullname'] ?></strong>
														        <br>
																<?= $value['user_account']['user']['user_email'] ?>
																<br>
																<?= $value['user_account']['user']['user_job'] ?> <br>
																Role: <?= $value['project_contributor_role']['role_denomination'] ?>
														      </p>
														</td>
													</tr>
												</tbody>
											</table>
										  <?php endforeach; ?>
                                    </div>
                                </div>
                             </div>
		     <?php endif; ?>
        <?php endif; ?>

        <!-- Indices projet -->
        <div class="field is-horizontal">
			    <h1 class="subtitle has-text-weight-semibold">
					Indices Projet
			    </h1>
            <div class="field-body">
                <!-- is application connected internet? -->
                <div class="field is-mar-bot-15">
                    <h3 class="subtitle has-text-weight-semibold">Connectivité Internet</h3>
                    	<?php if($project->project_indices->project_is_internet_connected == 'true') :?>
                    		Oui
                    	<?php else: ?>
							Non
						<?php endif; ?>
                </div>

                <!-- is application harmful data? -->
                <div class="field is-mar-bot-5">
                    <h3 class="subtitle has-text-weight-semibold">Utilisation de données sensibles?</h3>
                    	<?php if($project->project_indices->project_is_used_harmful_data == 'true') :?>
                    		Oui
                    	<?php else: ?>
							Non
                    	<?php endif; ?>
                </div>
                <!-- is application used third connexions? -->
                <div class="field is-mar-bot-15">
                    <h3 class="subtitle has-text-weight-semibold">Connexions Tierces</h3>
                    	<?php if($project->project_indices->project_is_used_third_connexions == 'true') :?>
                    		Oui
                    	<?php else: ?>
							Non
                    	<?php endif; ?>
                </div>


            </div>
        </div>

        <!-- Indices projet Suite -->
        <div class="field is-horizontal">
            <div class="field-label">
                <label for="" class="label">
                    &nbsp;
                </label>
            </div>
            <div class="field-body">

                <!-- is application franchise exchanged? -->
                <div class="field is-mar-bot-15">
                    <h3 class="subtitle has-text-weight-semibold">Exposition Franchise</h3>
	                    	<?php if($project->project_indices->project_is_franchise_exposed == 'true') :?>
	                    		Oui
	                    	<?php else: ?>
								Non
	                    	<?php endif; ?>
                </div>

                <!-- is service for OCI and subs? -->
                <div class="field is-mar-bot-15">
                    <h3 class="subtitle has-text-weight-semibold">Service OCI et filiales?</h3>
	                    	<?php if($project->project_indices->project_is_for_oci_and_subs == 'true') :?>
	                    		Oui
	                    	<?php else: ?>
								Non
	                    	<?php endif; ?>
                </div>
                <!-- is application used third connexions? -->
                <div class="field is-mar-bot-15">
                    <h3 class="subtitle has-text-weight-semibold">Centralisation de données client?</h3>
	                    	<?php if($project->project_indices->project_is_client_data_centralized == 'true') :?>
	                    		Oui
	                    	<?php else: ?>
								Non
	                    	<?php endif; ?>
                </div>


            </div>
        </div>
    </form>
</div>


    
	</div>
	    </div>
<div class="new-page">
		    <h2 class="is-size-4 has-text-weight-semibold is-mar-top-50">Critères d'éligibilité</h2>
		<p>D'après la convention ABCD signé le ABCD, est défini projet critique:</p>
		<p>
			<ul>
				<li>Les projets PO</li>
				<li>Les projets de Digitalisation</li>
				<li>Les projets OM</li>
				<li>Les projets Marketing</li>
				<li>Les projets ouverts au public via Internet</li>
				<li>Les projets exposés aux franchises</li>
				<li>Les projets manipulants et/ou centralisant des données sensibles</li>
				<li>Les projets à destination de OCI et ses filiales</li>
			</ul>
		</p>
</div>

