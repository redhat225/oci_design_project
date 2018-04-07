<section ui-view>
	  <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
	<div class="columns">
		<div class="column">
			<nav class="breadcrumb" aria-label="breadcrumbs">
			  <ul>
			    <li><a ui-sref="admins.dashboard">Dashboard</a></li>
			    <li class="is-active"><a >Projets</a></li>
			  </ul>
			</nav>
		</div>
		<div class="column">
				<div class="field has-addons is-expanded">
					<div class="control is-expanded">
						<input type="text" class="input" ng-model="filter_keys">
					</div>
					<div class="control">
						<a class="button is-intercoton-green is-static">
							<span class="icon">
								<i class="fa fa-search"></i>
							</span>
							<span>Rechercher</span>
						</a>
					</div>
				</div>



		</div>
		<div class="column">
				<button class="button is-oci" ui-sref="admins.projects.create">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span>Créer un projet</span>
				</button>
		</div>
	</div>
	<!-- Pagintaion module -->
     	<div class="level is-mobile is-pad-bot-30">
     		<div class="level-left">
     			<div class="span level-item">
     				&nbsp;
     			</div>
     		</div>
     		<div class="level-right">
				<div class="field has-addons level-item">
				  <p class="control">
				    <a class="button is-intercoton-green" ng-click="previous_page()" ng-disabled="is_loading">
				      <span class="icon is-small">
				        <i class="fa fa-chevron-left"></i>
				      </span>
				      <span class="has-text-weight-semibold">Précédent</span>
				    </a>
				  </p>
				  <p class="control">
				    <a class="button is-static is-disabled">
				      <span ng-bind="pagination.current_page" ng-hide="is_loading">1</span> sur <span ng-bind="pagination.all_pages" ng-hide="is_loading">45</span>
				    </a>
				  </p>
				  <p class="control">
				    <a class="button is-intercoton-green" ng-click="next_page()" ng-disabled="is_loading">
				      <span class="has-text-weight-semibold">Suivant</span>
				      <span class="icon is-small">
				        <i class="fa fa-chevron-right"></i>
				      </span>
				    </a>
				  </p>
				</div>
     		</div>
     	</div>
		<div>
				<!-- Tabular view -->
				<table class="table is-hoverable is-striped is-fullwidth">
					<thead>
						<tr class="oci-orange-b">
							<th class="has-text-white">Nom</th>
							<th class="has-text-white">Priorité</th>
							<th class="has-text-white">Type</th>
							<th class="has-text-white">Création</th>
							<th class="has-text-white">Dernière Modification</th>
							<th class="has-text-white">Informations</th>
							<th class="has-text-white">Criticité</th>
							<th class="has-text-white">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="project in projects | filter:filter_keys" ng-class="set_cooperative_state(cooperative.deleted)" class="">
							<td>{{project.project_fullname}}</td>
							<td>{{project.project_priority}}</td>
							<td>{{project.project_type.project_type_denomination}}</td>
							<td>{{project.created | date:'dd/MM/yyyy HH:mm:ss' }}</td>
							<td>{{project.modified | date:'dd/MM/yyyy HH:mm:ss' }}</td>
							<td>
								<button class="button is-oci is-outlined" ng-click='openViewModal(project)'>
									<span class="icon">
										<i class="fas fa-info"></i>
									</span>
									<span>
										voir les infos
									</span>
								</button>
							</td>
							<td>
								<span ng-if="project.project_criticity == 'noncritical'">Non critique</span>

								<span ng-if="project.project_criticity == 'critical'">critique</span>
							</td>
				  			<td>
									   <div class="dropdown is-hoverable is-right">
											  <div class="dropdown-trigger">
											    <button class="button">
											      <span class="icon is-small">
													<i class="fas fa-cogs menu-icon"></i>
											      </span>
											    </button>
											  </div>
											  <div class="dropdown-menu" id="dropdown-menu" role="menu">
											    <div class="dropdown-content">
													  <h3 class="is-size-7 has-text-oci has-text-weight-bold">Projet</h3>
													 <a target="_blank" href="/projects/preview/{{project.id}}.pdf" target="_blank" class="dropdown-item">
											            	Ticket Project
													 </a>
													  <a ui-sref="admins.projects.edit({project_id:project.id})" class="dropdown-item">
											            	Modifier Projet
													 </a>
													   <a ng-click="showWorkflowModal()" class="dropdown-item">
											            	Workflow Projet
													 </a>
													  <hr class="dropdown-divider">
													  <h3 class="is-size-7 has-text-oci has-text-weight-bold">Fiche sécurité</h3>
													 <a ng-if="project.project_security_sheets == ''" ui-sref="admins.projects-sheets.create({project_id:project.id})" class="dropdown-item">
											            	Créer Fiche Sécurité Projet
													 </a>
													 <a ng-if="project.project_security_sheets != ''" href="/project-sheets/preview/{{project.project_security_sheets[0].id}}.pdf" target="_blank" class="dropdown-item">
											            	Voir Fiche Sécurité Projet
													 </a>
													 <a ng-if="project.project_security_sheets != ''" ui-sref="admins.projects-sheets.edit({project_sheet_id:project.project_security_sheets[0].id})" class="dropdown-item">
											            	Modifier Fiche Sécurité Projet
													 </a>
													  <hr class="dropdown-divider">
													  <h3 class="is-size-7 has-text-oci has-text-weight-bold">Fiche exigences</h3>
													 <a ng-if="project.project_security_requirements == ''" ui-sref="admins.projects-requirements.create({project_id:project.id})" class="dropdown-item">
											            	Créer Fiche Exigences
													 </a>
													 <a ng-if="project.project_security_requirements != ''" href="/project-requirements/preview/{{project.project_security_requirements[0].id}}.pdf" target="_blank" class="dropdown-item">
											            	Voir Fiche Exigences
													 </a>
													 <a ng-if="project.project_security_requirements != ''" ui-sref="admins.projects-requirements.edit({project_requirement_id:project.project_security_requirements[0].id})" class="dropdown-item">
											            	Modifier Fiche Exigences
													 </a>
													  <hr class="dropdown-divider">
													  <h3 class="is-size-7 has-text-oci has-text-weight-bold">Prerequis Audit</h3>
													 <a ng-if="project.project_security_audit_requirements == ''" ui-sref="admins.projects-audits-requirements.create({project_id:project.id})" class="dropdown-item">
											            	Créer Fiche Prérequis Audit
													 </a>
													 <a ng-if="project.project_security_audit_requirements != ''" href="/project-audit-requirements/preview/{{project.project_security_audit_requirements[0].id}}.pdf" target="_blank" class="dropdown-item">
											            	Voir Fiche Prérequis Audit
													 </a>
													 <a ng-if="project.project_security_audit_requirements != ''" ui-sref="admins.projects-audit-requirements.edit({project_requirement_id:project.project_security_audit_requirements[0].id})" class="dropdown-item">
											            	Modifier Fiche Prérequis Audit
													 </a>

											    </div>
											  </div>
									 </div>
				  			</td>
						</tr>
					</tbody> 
				</table>
		</div>
	</div>
	<!-- Pagintaion module -->
     	<div class="level is-mobile is-pad-bot-30">
     		<div class="level-left">
     			<div class="span level-item">
     				&nbsp;
     			</div>
     		</div>
     		<div class="level-right">
				<div class="field has-addons level-item">
				  <p class="control">
				    <a class="button is-intercoton-green" ng-click="previous_page()" ng-disabled="is_loading">
				      <span class="icon is-small">
				        <i class="fa fa-chevron-left"></i>
				      </span>
				      <span class="has-text-weight-semibold">Précédent</span>
				    </a>
				  </p>
				  <p class="control">
				    <a class="button is-static is-disabled">
				      <span ng-bind="pagination.current_page" ng-hide="is_loading">1</span> sur <span ng-bind="pagination.all_pages" ng-hide="is_loading">45</span>
				    </a>
				  </p>
				  <p class="control">
				    <a class="button is-intercoton-green" ng-click="next_page()" ng-disabled="is_loading">
				      <span class="has-text-weight-semibold">Suivant</span>
				      <span class="icon is-small">
				        <i class="fa fa-chevron-right"></i>
				      </span>
				    </a>
				  </p>
				</div>
     		</div>
     	</div>
     	<!-- Modal Box Info project -->
     	<?= $this->element('Projects/modal_info_project') ?>
     	<?= $this->element('Projects/modal_workflow_project') ?>
</section>
