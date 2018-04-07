<section ui-view>
  <h3 class="title has-text-weight-semibold">
    Fiche de prérequis audit Projet > <span class="has-text-oci"><?= $project_audit_requirement['project']['project_fullname'] ?></span>
  </h3>

  <table class="table">
    <thead>
      <tr>
        <th class="oci-orange-b has-text-white">Propiétaire Fiche exigences sécurité</th>
        <th class="oci-orange-b has-text-white">Création Fiche exigences sécurité</th>
        <th class="oci-orange-b has-text-white">dernière modification Fiche exigences sécurité</th>
        <th class="oci-orange-b has-text-white">Date création projet</th>
        <th class="oci-orange-b has-text-white">Priorité projet</th>
        <th class="oci-orange-b has-text-white">Type Projet</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td>
            <?= $creator['user']['user_fullname'] ?> <br>
            <?= $creator['user']['user_job'] ?>
          </td>

          <td>
            <?php $creation_project_sheet_older = new \DateTime($project_sheet_older['created']) ; echo $creation_project_sheet_older->format('d-m-Y H:i:s');?>
          </td>
          <td>
            <?php $creation_project_sheet_newer = new \DateTime($project_sheet_newer['created']) ; echo $creation_project_sheet_newer->format('d-m-Y H:i:s');?>
          </td>
          <td><?php $creation_date_project = new \DateTime($project_audit_requirement['project']['created']) ; echo $creation_date_project->format('d-m-Y H:i:s');?></td>
          <td><?= $project_audit_requirement['project']->project_priority ?></td>
          <td><?= $project_audit_requirement['project']->project_type->project_type_denomination ?></td>
        </tr>
    </tbody>
  </table>

	<form name="createProjectSecurityRequirements" class="is-pad-top-40 is-pad-bot-40 hero is-white" ng-submit="create(requirement)">
	<h2 class="subtitle has-text-oci has-text-weight-bold">Prérequis à fournir</h2>
		<!-- urls &amp; plage d'adresses -->
		<table class="table">
			<thead>
				<tr>
					<th>Les url cibles et / ou urls Web services</th>
					<th>La plage d’adresses IP</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->urls)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->urls ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
					<td>
				      <?php if(isset($project_audit_requirement['audit_requirement_content']->iprange)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->iprange ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Compte Administrateur &amp; profils -->
		<table class="table">
			<thead>
				<tr>
					<th>Compte administrateur applicatif</th>
					<th>Le nombre de profils existants</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->application_admin_account)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->application_admin_account ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
					<td>
				      <?php if(isset($project_audit_requirement['audit_requirement_content']->profil_quantity)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->profil_quantity ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
 	<!-- Compte utilisateur applicatif par profil existant ( ie :Si nous avons 3 profiles, il nous faut 3 comptes) --> 
		<table class="table">
			<thead>
				<tr>
					<th>Compte utilisateur applicatif par profil existant ( ie :Si nous avons 3 profiles, il nous faut 3 comptes)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->user_account_by_profile)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->user_account_by_profile ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Technologies applicatives -->
		<table class="table">
			<thead>
				<tr>
					<th>Les technologies applicatives et leur versions embarquées dans le projet</th>
					<th>Les technologies de Base de données</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->involved_application_technologies)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->involved_application_technologies ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
					<td>
				      <?php if(isset($project_audit_requirement['audit_requirement_content']->involved_bd_technologies)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->involved_bd_technologies ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Technologies OS -->
		<table class="table">
			<thead>
				<tr>
					<th>Les technologies OS et leur versions embarquée dans le projet.</th>
					<th>Fournir un accès administrateur aux différents OS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->involved_os_technologies)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->involved_os_technologies ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
					<td>
				      <?php if(isset($project_audit_requirement['audit_requirement_content']->provide__access_admin_os)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->provide__access_admin_os ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Plans -->
		<table class="table">
			<thead>
				<tr>
					<th>Le plan de sauvegarde et de restauration des serveurs.</th>
					<th>Le plan de redondance et de résilience des serveurs</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->backup_plan_and_restore_servers)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->backup_plan_and_restore_servers ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
					<td>
				      <?php if(isset($project_audit_requirement['audit_requirement_content']->redundancy_plan_and_resilience_servers)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->redundancy_plan_and_resilience_servers ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- Si le projet embarque une application pour smartphone , veuillez le spécifier -->
		<table class="table">
			<thead>
				<tr>
					<th>Si le projet embarque une application pour smartphone , veuillez le spécifier</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php if(isset($project_audit_requirement['audit_requirement_content']->set_project_have_phone_app_if_exist)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->set_project_have_phone_app_if_exist ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
		</table>

	<h2 class="subtitle has-text-oci has-text-weight-bold">Architecture</h2>
			<!-- Architecture Fonctionnelle -->
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						 Architecture Fonctionnelle
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
							<?php if(isset($project_audit_requirement['audit_requirement_content']->architecture->functional_path)) :?>
								<img src="sheets_assets/audit_security_requirements/<?= $project_audit_requirement['audit_requirement_content']->architecture->functional_path ?>" alt="">
							<?php else: ?>
								<?= '' ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Architecture Réseau -->
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						 Architecture Réseau
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
							<?php if(isset($project_audit_requirement['audit_requirement_content']->architecture->network_path)) :?>
								<img src="sheets_assets/audit_security_requirements/<?= $project_audit_requirement['audit_requirement_content']->architecture->network_path ?>" alt="">
							<?php else: ?>
								<?= '' ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Architecture Applicative -->
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						 Architecture Applicative
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
							<?php if(isset($project_audit_requirement['audit_requirement_content']->architecture->application_path)) :?>
								<img src="sheets_assets/audit_security_requirements/<?= $project_audit_requirement['audit_requirement_content']->architecture->application_path ?>" alt="">
							<?php else: ?>
								<?= '' ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
	

			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						Matrice des Flux
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<?php if(isset($project_audit_requirement['audit_requirement_content']->matrice->flux)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->matrice->flux ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						Flux
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<?php if(isset($project_audit_requirement['audit_requirement_content']->matrice->flux_2)) :?>
							<?= $project_audit_requirement['audit_requirement_content']->matrice->flux_2 ?>
						<?php else: ?>
							<?= '' ?>
						<?php endif; ?>
					</div>
				</div>
			</div>

	</form>
</section> 
