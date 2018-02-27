<div>
	<h3 class="title">Création nouveau projet</h3>

	<form ng-submit="create(project)">
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Nom du Projet
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control has-icons-left has-icons-right">
						<input required type="text" class="input is-uppercase has-text-weight-semibold" ng-model="projects.project_name" required>
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
					Type du projet
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control has-icons-left">
						    <div class="select">
						      <select required ng-model="project.project_type_id" ng-options="p.id as p.project_type_denomination for p in project_types">
						      </select>
						    </div>
						    <div class="icon is-small is-left">
						    	<i class="fas fa-binoculars has-text-oci"></i>
						    </div>
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
		<!-- Validation  -->
		<div class="field is-horizontal">
			<div class="field-label">
				&nbsp;
			</div>
			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button class="button is-oci" type="submit">
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
</div>