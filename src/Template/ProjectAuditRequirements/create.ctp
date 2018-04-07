<section ui-view>
	<h3 class="title">Fiche de preréquis d'audit > <span class="has-text-oci is-size-4">{{project.project_fullname}}</span></h3>
	<form name="createProjectSecurityRequirements" class="is-pad-top-40 is-pad-bot-40 hero is-white" ng-submit="create(requirement)">
			<h2 class="subtitle has-text-oci has-text-weight-bold">Prérequis à fournir</h2>
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					urls &amp; plage d'adresses
				</label>
			</div>
			<div class="field-body">

				<div class="field">
					<h3 class="subtitle is-size-6">Les url cibles et / ou urls Web services</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.urls"></textarea>
					</div>
				</div>
				<div class="field">
					<h3 class="subtitle is-size-6">La plage d’adresses IP</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.iprange"></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Compte Administrateur &amp; profils
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<h3 class="subtitle is-size-6">Compte administrateur applicatif</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.application_admin_account"></textarea>
					</div>
				</div>
				<div class="field-body">
					<div class="field">
						<h3 class="subtitle is-size-6">Le nombre de profils existants</h3>
						<div class="control">
							<textarea name="" id="" class="textarea" ng-model="requirement.profil_quantity"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Compte utilisateur applicatif par profil existant ( ie :Si nous avons 3 profiles, il nous faut 3 comptes) -->
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Compte utilisateur applicatif par profil existant ( ie :Si nous avons 3 profiles, il nous faut 3 comptes)
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.user_account_by_profile"></textarea>
					</div>
				</div>
			</div>
		</div>	

		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Technologies applicatives
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<h3 class="subtitle is-size-6">Les technologies applicatives et leur versions embarquées dans le projet</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.involved_application_technologies"></textarea>
					</div>
				</div>

				<div class="field">
					<h3 class="subtitle is-size-6">Les technologies de Base de données</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.involved_bd_technologies"></textarea>
					</div>
				</div>
			</div>
		</div>


		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Technologies OS
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<h3 class="subtitle is-size-6">Les technologies OS et leur versions embarquée dans le projet.</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.involved_os_technologies"></textarea>
					</div>
				</div>

				<div class="field">
					<h3 class="subtitle is-size-6">Fournir un accès administrateur aux différents OS </h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.provide__access_admin_os"></textarea>
					</div>
				</div>
			</div>
		</div>	

		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Plans
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<h3 class="subtitle is-size-6">Le plan de sauvegarde et de restauration des serveurs.</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.backup_plan_and_restore_servers"></textarea>
					</div>
				</div>

				<div class="field">
					<h3 class="subtitle is-size-6">Le plan de redondance et de résilience des serveurs</h3>
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.redundancy_plan_and_resilience_servers"></textarea>
					</div>
				</div>
			</div>
		</div>	
		
		<!-- Si le projet embarque une application pour smartphone , veuillez le spécifier -->
		<div class="field is-horizontal">
			<div class="field-label">
				<label for="" class="label">
					Si le projet embarque une application pour smartphone , veuillez le spécifier
				</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control">
						<textarea name="" id="" class="textarea" ng-model="requirement.set_project_have_phone_app_if_exist"></textarea>
					</div>
				</div>
			</div>
		</div>	
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
						  <div ng-if="!requirement.architecture.functional" ngf-drop ngf-select ngf-max-size="3MB" ng-change="check(requirement.architecture.functional)" ng-model="requirement.architecture.functional" class="drop-box button is-hgt-130 is-wth-130">
							<img src="/img/assets/forms/image_upload_drag_area.png" alt="">
						  </div>
							<img id="diagram_network_item" ngf-thumbnail="requirement.architecture.functional">
						  <!-- change photo -->
						   <button type="button" class="button is-danger is-mar-bot-95" ng-show="requirement.architecture.functional" ng-click="requirement.architecture.functional = null"><span class="icon"><i class="far fa-window-close"></i></span>
						   </button>
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
						  <div ng-if="!requirement.architecture.network" ngf-drop ngf-select ngf-max-size="3MB" ng-change="check(requirement.architecture.network)" ng-model="requirement.architecture.network" class="drop-box button is-hgt-130 is-wth-130">
							<img src="/img/assets/forms/image_upload_drag_area.png" alt="">
						  </div>
							<img id="diagram_network_item" ngf-thumbnail="requirement.architecture.network">
						  <!-- change photo -->
						   <button type="button" class="button is-danger is-mar-bot-95" ng-show="requirement.architecture.network" ng-click="requirement.architecture.network = null"><span class="icon"><i class="far fa-window-close"></i></span>
						   </button>
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
						  <div ng-if="!requirement.architecture.application" ngf-drop ngf-select ngf-max-size="3MB" ng-change="check(requirement.architecture.application)" ng-model="requirement.architecture.application" class="drop-box button is-hgt-130 is-wth-130">
							<img src="/img/assets/forms/image_upload_drag_area.png" alt="">
						  </div>
							<img id="diagram_network_item" ngf-thumbnail="requirement.architecture.application">
						  <!-- change photo -->
						   <button type="button" class="button is-danger is-mar-bot-95" ng-show="requirement.architecture.application" ng-click="requirement.architecture.application = null"><span class="icon"><i class="far fa-window-close"></i></span>
						   </button>
						</div>
					</div>
				</div>
			</div>

			<h2 class="subtitle has-text-oci has-text-weight-bold">Matrice des Flux</h2>
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						 Matrice des flux
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
							<textarea rows="15" ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.matrice.flux">
								
							</textarea>	
						</div>
					</div>
				</div>
			</div>

			<h2 class="subtitle has-text-oci has-text-weight-bold">Matrice des Flux</h2>
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						 Flux
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
							<textarea rows="15" ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.matrice.flux_2">
								
							</textarea>	
						</div>
					</div>
				</div>
			</div>

		<div class="field is-horizontal is-mar-top-30">
			<div class="field-label">
				&nbsp;
			</div>
			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button id="send_report_sheet" class="button is-oci" type="submit" ng-disabled="createProjectSecurityRequirements.$invalid || is_loading">
					      Créer la Fiche
					    </button>
					  </p>
					  <p class="control">
					    <button type="reset" ui-sref="admins.dashboard" ng-click="go_back()" class="button is-black">
					      Annuler
					    </button>
					  </p>
					</div>
			</div>
		</div>
	</form>
</section> 
