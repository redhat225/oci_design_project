<div>
	<h3 class="title">Création nouveau projet</h3>

	<form name="createProjectForm" ng-submit="create(project)">
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Nom du Projet
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control has-icons-left has-icons-right">
						<input required type="text" class="input is-uppercase has-text-weight-semibold" ng-model="project.project_name" required>
					</div>
				</div>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Priorité du projet
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control has-icons-left">
						    <div class="select" ng-init="project.project_priority='P0'">
						      <select required ng-model="project.project_priority">
						        <option value="P0">Priorité 0</option>
						        <option value="P1">Priorité 1</option>
						        <option value="P2">Priorité 2</option>
						      </select>
						    </div>
						    <div class="icon is-small is-left">
						    	<i class="fas fa-exclamation has-text-oci"></i>
						    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Initiateur du projet
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control has-icons-left">
						    <div class="select">
						      <select required ng-model="project.project_type_id" ng-options="p.project_type_denomination for p in project_types">
						      </select>
						    </div>
						    <div class="icon is-small is-left">
						    	<i class="fas fa-binoculars has-text-oci"></i>
						    </div>
					</div>
				</div>
			</div>
		</div>

					        <!-- Contacts du projet -->
							<div class="field is-horizontal" id="actor_area">
								<div class="field-label">
									<label for="" class="label">
										Les contacts du projet
									</label>
								</div>

								<div class="field-body">
									<div class="field" >
										<button id="add_actor_trigger" ng-click="openActorModal()" type="button" class="button is-oci">
											<span class="icon">
												<i class="fas fa-plus"></i>
											</span>
											<span>Ajouter un collaborateur</span>
										</button>
									</div>
								</div>
					         </div>

		
		<!-- project contributors  -->
		<div class="field is-horizontal" ng-repeat="u in users" ng-if="u.is_selected">
			<div class="field-label">
				<label>&nbsp;</label>
			</div>

			<div class="field-body">
				<div class="field" >
					 <div class="control">
					 		<input type="text" class="input" readonly value="{{u.user_fullname}}">
					 </div>
				</div>
				<div class="field">
					<div class="control">
						<div class="select">
						    <select required ng-model="u.assigned_role" ng-options="r.role_denomination for r in roles"></select>
						</div>

					</div>
				</div>
				<div class="field">
					<div class="control">
						<button class="button is-danger is-outlined" ng-click="retireActorSheetObject(u)">
							<span class="icon">
								<i class="fas fa-times"></i>
							</span>
							<span>Effacer</span>
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkbox wether to create or not  -->
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					&nbsp;
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control has-icons-left">
						<label class="checkbox">
						   <input type="checkbox" ng-model="project.project_create_card">
						    Créer une fiche projet après validation
						</label>
					</div>
				</div>
			</div>
		</div>
		<!-- Indices projet -->
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Indices Projet*
				</label>
			</div>
			<div class="field-body">

				<!-- is application connected internet? -->
				<div class="field">
					<h3 class="subtitle">Connectivité Internet</h3>
					<div class="control">
					  <label class="radio">
					    <input type="radio" required value="true" ng-model="project.indices.project_is_internet_connected" name="project_is_internet_connected">
					    Oui
					  </label>
					  <label class="radio">
					    <input type="radio" required value="false" ng-model="project.indices.project_is_internet_connected" name="project_is_internet_connected">
					    Non
					  </label>
					</div>
				</div>

				<!-- is application harmful data? -->
				<div class="field">
					<h3 class="subtitle">Utilisation de données sensibles?</h3>
					<div class="control">
					  <label class="radio">
					    <input type="radio" required value="true"  ng-model="project.indices.project_is_used_harmful_data" name="project_is_used_harmful_data">
					    Oui
					  </label>
					  <label class="radio">
					    <input type="radio" required value="false" ng-model="project.indices.project_is_used_harmful_data" name="project_is_used_harmful_data">
					    Non
					  </label>
					</div>
				</div>

				<!-- is application used third connexions? -->
				<div class="field">
					<h3 class="subtitle">Connexions Tierces</h3>
					<div class="control">
					  <label class="radio">
					    <input type="radio" required value="true" ng-model="project.indices.project_is_used_third_connexions" name="project_is_used_third_connexions">
					    Oui
					  </label>
					  <label class="radio">
					    <input type="radio" required value="false" ng-model="project.indices.project_is_used_third_connexions" name="project_is_used_third_connexions">
					    Non
					  </label>
					</div>
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
				<div class="field">
					<h3 class="subtitle">Exposition Franchise</h3>
					<div class="control">
					  <label class="radio">
					    <input type="radio" required value="true" ng-model="project.indices.project_is_franchise_exposed" name="project_is_franchise_exposed">
					    Oui
					  </label>
					  <label class="radio">
					    <input type="radio" required value="false" ng-model="project.indices.project_is_franchise_exposed" name="project_is_franchise_exposed">
					    Non
					  </label>
					</div>
				</div>

				<!-- is service for OCI and subs? -->
				<div class="field">
					<h3 class="subtitle">Service OCI et filiales?</h3>
					<div class="control">
					  <label class="radio">
					    <input type="radio" required value="true"  ng-model="project.indices.project_is_for_oci_and_subs" name="project_is_for_oci_and_subs">
					    Oui
					  </label>
					  <label class="radio">
					    <input type="radio" required value="false" ng-model="project.indices.project_is_for_oci_and_subs" name="project_is_for_oci_and_subs">
					    Non
					  </label>
					</div>
				</div>

				<!-- is application used third connexions? -->
				<div class="field">
					<h3 class="subtitle">Centralisation de données client?</h3>
					<div class="control">
					  <label class="radio">
					    <input type="radio" required value="true" ng-model="project.indices.project_is_client_data_centralized" name="project_is_client_data_centralized">
					    Oui
					  </label>
					  <label class="radio">
					    <input type="radio" required value="false" ng-model="project.indices.project_is_client_data_centralized" name="project_is_client_data_centralized">
					    Non
					  </label>
					</div>
				</div>


			</div>
		</div>


		<!-- Validation  -->
		<div class="field is-horizontal">
			<div class="field-label">
				&nbsp;
			</div>
			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button class="button is-oci" type="submit" ng-disabled="createProjectForm.$invalid || is_loading">
					      Créer projet
					    </button>
					  </p>
					  <p class="control">
					    <button type="reset" ng-click="go_back()" class="button is-black">
					      Annuler
					    </button>
					  </p>
					</div>
			</div>
		</div>
	</form>
	<?= $this->element('Projects/modal_add_actor') ?>
	<?= $this->element('Projects/modal_project_fail') ?>
</div>