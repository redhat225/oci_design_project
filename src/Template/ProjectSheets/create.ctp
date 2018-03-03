<section>
	<h3 class="title has-text-weight-semibold">
		Fiche Sécurité Projet > Visit Management System
	</h3>
	<div class="tabs">
	  <ul style="background: #000;">
	    <li class="is-active"><a ng-click="sheetsTabs = 'generals'">Généralités</a></li>
	    <li><a ng-click="sheetsTabs = 'section1'">Section 1</a></li>
	    <li><a ng-click="sheetsTabs = 'section2'">Section 2</a></li>
	    <li><a ng-click="sheetsTabs = 'section3'">Section 3</a></li>
	    <li><a ng-click="sheetsTabs = 'section4'">Section 4</a></li>
	    <li><a ng-click="sheetsTabs = 'section5'">Section 5</a></li>
	    <li><a ng-click="sheetsTabs = 'section6'">Section 6</a></li>
	  </ul>
	</div>
	<form ng-submit="submit_security_sheet(sheet)" name="createProjectSheetForm">
		
		<div id="main-content-create-sheet" ng-switch="sheetsTabs">

		<ng-form name="generals" ng-switch-when="generals">
					<!-- Objectives document -->
					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								Objectifs du document
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea readonly name="" id="" cols="30" rows="10" class="textarea">
										Les objectifs de ce document sont doubles

										•	Il sera examiné par l’équipe de Sécurité interne les mesures de la sécurité applicable au projet 
										•	Pour s’assurer que des ressources appropriées peuvent être alloués.

										Ce document doit être rempli par le chef de produit et a communiqué au Pôle Security by Design SPOC :
										•	Expert Security By Design – eric.aboa@orange.com au moins 15 jours avant le Jalon T-1.

										•	A – Objectif du document  •	F – Le profil du projet 
										•	B – Vision global du projet   •	G – Les actifs du projet
										•	C – Les Jalons TTM    •	H – Les exigences du projet
										•	D – Les Contacts Projets      •	I – Les risques principaux
										•	E – La Portée du Projet  •	J – Les risques sécurité
									</textarea>
								</div>
							</div>
						</div>
					</div>

					<!-- Vision globale du projet -->
					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								Vision globale du projet
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea placeholder="Ajoutez une brève description du projet (10 maximum des lignes.): Le contexte Business, les objectifs du projet, les principales attentes du projet." class="textarea" ng-model="sheet.project_global_review">
									</textarea>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Les jalons projet -->
					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								Les jalons TTM
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<h3 class="subtitle">T-1</h3>
								<div class="control">
									<input type="date" ng-model="sheet.project_steps.step_before" class="input browser-default">
								</div>
							</div>

							<div class="field">
								<h3 class="subtitle">T0</h3>
								<div class="control">
									<input type="date" ng-model="sheet.project_steps.step_0" class="input browser-default">
								</div>
							</div>

							<div class="field">
								<h3 class="subtitle">T1</h3>
								<div class="control">
									<input type="date" ng-model="sheet.project_steps.step_1" class="input browser-default">
								</div>
							</div>

							<div class="field">
								<h3 class="subtitle">T2</h3>
								<div class="control">
									<input type="date" ng-model="sheet.project_steps.step_2" class="input browser-default">
								</div>
							</div>

							<div class="field">
								<h3 class="subtitle">T3</h3>
								<div class="control">
									<input type="date" ng-model="sheet.project_steps.step_3" class="input browser-default">
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
										<button type="button" class="button is-oci" ng-click="addActorSheet()" >
											<span class="icon">
												<i class="fas fa-plus"></i>
											</span>
											<span>Ajouter un acteur</span>
										</button>
									</div>
								</div>
					         </div>


							<!-- Portée du projet -->
							<div class="field is-horizontal" id="actor_area">
								<div class="field-label">
									<label for="" class="label">
										Marketing Business Unit
									</label>
								</div>
								<div class="field-body">
									<div class="field" >
										<div class="control">
											<textarea name="" ng-model="sheet.scope_project.maketing_business_unit" id="" cols="30" rows="10" class="textarea" ng-model=""></textarea>
										</div>
									</div>
								</div>
					         </div>

							<div class="field is-horizontal" id="actor_area">
								<div class="field-label">
									<label for="" class="label">
										Champ d'action
									</label>
								</div>
								<div class="field-body">
									<div class="field" >
										<div class="control">
											<label class="checkbox">
											  <input type="checkbox" ng-model="sheet.scope_project.action_scope.is_service_exclusive_oci">
											  Scope 1: Services exclusivement pour OCI
											</label>
										</div>
									</div>

									<div class="field" >
										<div class="control">
											<label class="checkbox">
											  <input type="checkbox" ng-model="sheet.scope_project.action_scope.is_service_inclusive_oci_and_others">
											  Scope 2: Services pour OCI et ses filiales
											</label>
										</div>
									</div>
								</div>
					         </div>



							<!-- Profil projet -->
							<h3 class="subtitle has-text-weight-semibold">Profil de projet</h3>

							<div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Caractéristiques du projet
									</label>
								</div>

								<div class="field-body">
									<div class="field" >
										<div class="control">
											<label class="checkbox">
											  <input type="checkbox" ng-model="sheet.profile_project.is_update_or_evolution">
											  Scope 1: Mise à jour / Evolution
											</label>
										</div>
									</div>

									<div class="field" >
										<div class="control">
											<label class="checkbox">
											  <input type="checkbox" ng-model="sheet.profile_project.is_new_project">
											  Scope 2: Nouveau Projet
											</label>
										</div>
									</div>

									<div class="field" >
										<div class="control">
											<span class="has-text-weight-semibold">Autres</span>
											<label class="checkbox">
											  <input type="text" ng-model="sheet.profile_project.is_other">
											</label>
										</div>
									</div>
								</div>
					         </div>

					        <!-- Actifs impliqués dans le projet -->
							<h3 class="subtitle has-text-weight-semibold">Actifs impliqués dans le projet</h3>
									
									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Interconnexion réseau
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internal_network">
													  Client Réseau Interne
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internet">
													  Internet
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_client_vpn_orange">
														Client VPN Orange
													</label>	
												</div>
											</div>
										</div>
							         </div>


									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												&nbsp;
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_vpn_client_fai">
													  Client VPN (FAI)
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_partner_network">
													  Partenaire réseau (LAN/WAN)
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													  <span class="has-text-weight-semibold">Autre</span>
													  <input type="text" ng-model="sheet.involve_assets.network_interconnexion.is_others">
												</div>
											</div>
										</div>
							         </div>

									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Données en Transit
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_raw_data">
													  	Raw Data
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_email">
													   Email
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_instant_messaging">
													  Messagerie Instantannée
													</label>
												</div>
											</div>
										</div>
							         </div>

									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												&nbsp;
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_voice_over_ip">
													  	Voix sur IP
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_audio_video">
													   Audio/Video
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_file_transfert">
													  Transfert de fichier
													</label>
												</div>
											</div>
										</div>
							         </div>



									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												&nbsp;
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_share_doc">
													  	Partage de document
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_electronic_payment">
													   Paiement électronique
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													  <span class="has-text-weight-semibold">Autres</span>
													  <input type="text" ng-model="sheet.involve_assets.transit_data.is_other">
												</div>
											</div>
										</div>
							         </div>


									<!-- Nature de l'information -->
									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Nature de l'Information
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_personal_data">
													  	Données Personnelles
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_human_resources">
													   Ressources Humaines
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_medical_data">
													   Données Médicales
													</label>
												</div>	
											</div>
										</div>
							         </div>

									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												&nbsp;
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_governemental">
													  	Gouvernemental
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_financial">
													   Financière
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_other">
													   Autres
													</label>
												</div>	
											</div>
										</div>
							         </div>

					        <!-- Informations Complémentaires -->
							<h3 class="subtitle has-text-weight-semibold">Informations Complémentaires</h3>
									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
													Géolocalisation des Données 
													(en transit/au stockage)
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_only">
													   Côte d'Ivoire Seulement
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_eu_only">
													   Union Européenne
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_france">
														Côte d'Ivoire / France
													</label>	
												</div>
											</div>
										</div>
							         </div>

									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												&nbsp;
											</label>
										</div>
										<div class="field-body">
											<div class="field">
												<div class="control">
													<span class="has-text-weight-semibold">Autres territoires</span>
													<textarea name="" id="" cols="30" rows="10" class="textarea" ng-model="sheet.complementary_data.data_geoloc.is_others"></textarea>							
												</div>
											</div>
										</div>
							         </div>

									<div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
			 										Partenaires / sous-traitant
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.complementary_data.partner.is_gos">
													   GOS
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<label class="checkbox">
													  <input type="checkbox" ng-model="sheet.complementary_data.partner.is_sofrecom">
													    SOFRECOM
													</label>
												</div>
											</div>

											<div class="field" >
												<div class="control">
													<span class="has-text-weight-semibold">Repondre avec le nom des fournisseurs</span>
													<textarea name="" id="" cols="30" rows="10" class="textarea" ng-model="sheet.complementary_data.partner.partner_description"></textarea>
												</div>
											</div>
										</div>
							         </div>


					        <!-- Risques Principaux -->
							<h3 class="subtitle has-text-weight-semibold">Risques Principaux</h3>
								     <div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Quelles sont les principales fonctionnalités offerte par le service ou l’offre ?
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<textarea name="" id="" cols="30" rows="10" class="textarea" ng-model="sheet.main_risks.services_offer_features"></textarea>
												</div>
											</div>
										</div>
							         </div>


								     <div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Quelles sont les principales informations sensibles ?
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<textarea name="" id="" cols="30" rows="10" class="textarea" ng-model="sheet.main_risks.main_sensitives_data"></textarea>
												</div>
											</div>
										</div>
							         </div>


								     <div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Quelle est le temps d’arrêt maximale toléré ?
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<input type="text" class="input" ng-model="sheet.main_risks.tolerated_max_stop_service_time">
												</div>
											</div>
										</div>
							         </div>
		</ng-form>	
		
		<ng-form ng-switch-when="section1" name="section1">
			<h1 class="title">Informations générales</h1>

			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						Avez-vous une matrice de flux
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
							<textarea ui-tinymce="tinymceOptions" ng-model="sheet.section1.is_matrix_flux" class="textarea"></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						Lister les adresses IP du système impliquées
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>adresses IP de développement</span>
						<div class="control">
							<textarea name="" cols="30" rows="2" class="textarea" id="" ng-model="sheet.section1.listing_ip.dev"></textarea>
						</div>
					</div>

					<div class="field">
						<span>adresses IP de tests</span>
						<div class="control">
							<textarea name="" cols="30" rows="2" class="textarea" id="" ng-model="sheet.section1.listing_ip.test"></textarea>
						</div>
					</div>

					<div class="field">
						<span>adresses IP de production</span>
						<div class="control">
							<textarea name="" cols="30" rows="2" class="textarea" id="" ng-model="sheet.section1.listing_ip.prod"></textarea>
						</div>
					</div>
				</div>
			</div>

			<!-- Diagramme réseaux -->
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						 Avez-vous un diagramme réseau ? Si oui veuillez l’insérer
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control">
						  <div ng-if="!sheet.section1.network_diagram" ngf-drop ngf-select ngf-max-size="10MB" ng-change="check(sheet.section1.network_diagram)" ng-model="sheet.section1.network_diagram" class="drop-box button is-hgt-130 is-wth-130">
							<img src="/img/assets/forms/image_upload_drag_area.png" alt="">
						  </div>

							  <img id="diagram_network_item" ngf-thumbnail="sheet.section1.network_diagram">


						  <!-- change photo -->
						  <button type="button" class="button is-danger is-mar-bot-95" ng-show="sheet.section1.network_diagram" ng-click="sheet.section1.network_diagram = null"><span class="icon"><i class="far fa-window-close"></i></span>
													</button>
						</div>
					</div>
				</div>
			</div>


			<!-- la liste des Url de l’applications? -->
			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						&nbsp;
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>Fournir la liste des Url de l’applications?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.ip_list" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>Quelle est le groupe utilisateur cible au projet? </span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.target_group_user" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>Pour combien d’utilisateurs le système a été dimensionnée?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.user_dimensioning" class="textarea"></textarea>
						</div>
					</div>

				</div>
			</div>

			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						&nbsp;
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>Quel est le nombre d’utilisateur pouvant se connecter simultanément ?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.simultaneously_user" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>Combien d’utilisateurs avec le même identifiant peuvent se connecter simultanément à partir de la même IP ou IP différents  </span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.simultaneously_user_with_same_id_and_ip_or_not" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>L’application est-elle hébergé à l’extérieur de OCIT?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.is_app_hosted_ext_oci" class="textarea"></textarea>
						</div>
					</div>

				</div>
			</div>


			<div class="field is-horizontal">
				<div class="field-label">
					<label for="" class="label">
						&nbsp;
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>Avez-vous des données de production hébergées dans votre environnement de production?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.is_prod_data_hosted_in_prod_env" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>Avez-vous des données de production hébergées dans votre environnement de test?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.is_prod_env_data_hosted_in_test_env" class="textarea"></textarea>
						</div>
					</div>

				</div>
			</div>
		</ng-form>

		<ng-form ng-switch-when="section2" name="section2">
						<h1 class="title">Information sur le compte utilisateur</h1>


						<div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
										L’authentification de l’utilisateur est-il nécessaire?     
								</label>
							</div>

							<div class="field-body">
								<div class="field">
										<div class="control">
										  <label class="radio">
										    <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="true" name="sheet_is_account_data_is_auth_required">
										    Yes
										  </label>
										  <label class="radio">
										    <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="false" name="sheet_is_account_data_is_auth_required">
										    No
										  </label>
										</div>
								</div>
								<div class="field" ng-if="sheet.section2.account_user_info.is_auth_required == 'false'">
									<div class="control">
										<textarea  ng-model="sheet.section2.account_user_info.explain_is_auth_required" cols="30" rows="2"></textarea>
									</div>
								</div>
							</div>
						</div>


					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>Quelle est la méthode d’authentification des utilisateurs au système? Décrire les composants et le processus</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.auth_method_description" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Le Système utilise-t-il un contrôle d’accès basé sur le rôle?  Quel est le processus de définition et de gestion des rôle et de contrôle des droits d’accès</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.control_based_access_description" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Qui autorise l’accès au système et aux données?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.who_give_auth_system_data" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>Avez-vous inclus une notification avertissement du système d’accès/ d’ouverture de session?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.is_warning_notification_on_connect" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>A quelle fréquence les utilisateurs doivent ils modifier leurs mot de passe?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.password_rotation_freq" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>L’authentification à multiple facteurs est-elle nécessaire?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>Quelle est votre de stratégie de compte pour réinitialiser et forcer l’utilisation de mot de passe complexe?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.strategy_forcing_use_complex_password" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Les comptes générique, partagés, invites sont-ils autorisés?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.are_gen_shared_invite_account_authorized" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Qui peut ajouter, modifier, ou supprimer un compte ?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.who_add_mod_del_account" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>



					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>A quelle fréquence se ferait la revue périodique des comptes ?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.periodic_account_review_freq" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Les sessions multiples sont-elles autorisés par utilisateurs?</span>
								<div class="control">
										<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.are_multiple_sessions_authorized" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>
		</ng-form>

		<ng-form name="section3" ng-switch-when="section3">
			<h1 class="title">Information sur le compte système d’administration</h1>
				       <div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									Est-il prévu un système d’imputabilité des actions des administrateur?     
								</label>
							</div>

							<div class="field-body">
								<div class="field">
										<div class="control">
										  <label class="radio">
										    <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="true" name="sheet_is_planned_accountability_admin_action">
										    Oui
										  </label>
										  <label class="radio">
										    <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="false" name="sheet_is_planned_accountability_admin_action">
										    Non
										  </label>
										</div>
								</div>
								<div class="field" ng-if="sheet.section3.account_admin_info.is_planned_accountability_admin_action == 'false'">
									<div class="control">
										<textarea  ng-model="sheet.section3.account_admin_info.is_not_planned_accountability_admin_action" cols="30" rows="2"></textarea>
									</div>
								</div>
							</div>
						</div>


				       <div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									Le Système utilise-t-il un contrôle d’accès basé sur le rôle?  Quel est le processus de définition et de gestion des rôle et de contrôle des droits d’accès…, etc?       
								</label>
							</div>

							<div class="field-body">
								<div class="field">
									<div class="control">
										<textarea  ng-model="sheet.section3.account_admin_info.control_based_access_description" cols="30" rows="2"></textarea>
									</div>
								</div>
							</div>
						</div>


				       <div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									&nbsp;    
								</label>
							</div>

							<div class="field-body">
								<div class="field">
									<span>Qui autorise l'accès de l'administrateur système au système et aux données? </span>
									<div class="control">
										<textarea  ng-model="sheet.section3.account_admin_info.who_give_auth_system_data" cols="30" rows="2"></textarea>
									</div>
								</div>
							</div>


							<div class="field-body">
								<div class="field">
									<span>À quelle fréquence les administrateurs systèmes doivent-ils modifier leurs mots de passe?</span>
									<div class="control">
										<textarea  ng-model="sheet.section3.account_admin_info.password_rotation_freq" cols="30" rows="2"></textarea>
									</div>
								</div>
							</div>
						</div>



		</ng-form>

		</div>
		

		<!-- Validation  -->
		<div class="field is-horizontal">
			<div class="field-label">
				&nbsp;
			</div>
			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button class="button is-oci" type="submit" ng-disabled="createProjectSheetForm.$invalid || is_loading">
					      Créer la Fiche
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
</section>