<section ui-view>
	<h3 class="title has-text-weight-semibold">
		Fiche Sécurité Projet > <span class="has-text-oci">{{project.project_fullname}}</span>
	</h3>
	<!-- Tabs Element -->
	<div class="tabs" id="tabs" style=" z-index:9999;">
	  <ul style="background: #000;">
	  	<li>
	  		<div class="buttons has-addons">
			  <span class="button is-black">
			  	<span class="icon left_element">
			  		<i class="fas fa-chevron-left"></i>
			  	</span>
			  </span>
			  <span class="button is-black">
				 <span class="icon right_element">
				 	<i class="fas fa-chevron-right"></i>
				 </span>
			  </span>
			</div>
	  	</li>

	    <li><a ng-click="sheetsTabs = 'generals'" class="section_item_report first_tab_report">Généralités</a></li>
	    <li><a ng-click="sheetsTabs = 'section1'" class="section_item_report">Section 1</a></li>
	    <li><a ng-click="sheetsTabs = 'section2'" class="section_item_report">Section 2</a></li>
	    <li><a ng-click="sheetsTabs = 'section3'" class="section_item_report">Section 3</a></li>
	    <li><a ng-click="sheetsTabs = 'section4'" class="section_item_report">Section 4</a></li>
	    <li><a ng-click="sheetsTabs = 'section5'" class="section_item_report">Section 5</a></li>
	    <li><a ng-click="sheetsTabs = 'section6'" class="section_item_report">Section 6</a></li>

			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button class="trigger_send_security_sheet is-oci button">
					      Créer la Fiche
					    </button>
					  </p>
					  <p class="control">
					    <button class="trigger_cancel_security_sheet button is-black" type="button" ui-sref="admins.dashboard">
					      Annuler
					    </button>
					  </p>
					</div>
			</div>
	  </ul>
	</div>

	<form ng-submit="submit_security_sheet(sheet)" name="createProjectSheetForm" class="is-pad-top-40 is-pad-bot-40" style="background-color: white !important;">
		
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
									<textarea readonly name="" id="" cols="30" rows="14" class="textarea">
Les objectifs de ce document sont doubles

•	Il sera examiné par l’équipe de Sécurité interne les mesures de la sécurité applicable au projet 
•	Pour s’assurer que des ressources appropriées peuvent être alloués.

Ce document doit être rempli par le chef de produit et a communiqué au Pôle Security by Design SPOC :
•	Expert Security By Design – eric.aboa@orange.com au moins 15 jours avant le Jalon T-1.

•	A – Objectif du document      • F – Le profil du projet 
•	B – Vision global du projet   •	G – Les actifs du projet
•	C – Les Jalons TTM            •	H – Les exigences du projet
•	D – Les Contacts Projets      • I – Les risques principaux
•	E – La Portée du Projet       • J – Les risques sécurité
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

					<h1 class="subtitle has-text-weight-semibold has-text-oci">Les jalons TTM</h1>
					
					<!-- Les jalons projet -->
					<div class="field is-horizontal is-mar-bot-30 is-mar-top-30">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
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
											    <select required ng-model="u.assigned_role" ng-options="r.id as r.role_denomination for r in roles"></select>
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
							<!-- Modal add_actor -->
							<?= $this->element('Projects/modal_add_actor') ?>

							<!-- Portée du projet -->
							<div class="field is-horizontal is-mar-bot-30 is-mar-top-30" id="actor_area">
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
											  <input type="radio" value="exclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci">
											  Scope 1: Services exclusivement pour OCI
											</label>
										</div>
									</div>

									<div class="field" >
										<div class="control">
											<label class="checkbox">
											  <input type="radio" value="inclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci">
											   Scope 2: Services pour OCI et ses filiales
											</label>
										</div>
									</div>

								</div>
					         </div>



							<!-- Profil projet -->
							<h3 class="subtitle has-text-weight-semibold has-text-oci is-mar-top-30">Profil de projet</h3>

							<div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Caractéristiques du projet
									</label>
								</div>

								<div class="field-body">
									<div class="field" >
										<div class="control">
											  <input type="radio" value="progressive" name="profile_project_features" ng-model="sheet.profile_project.features">
											  Scope 1: Mise à jour / Evolution
										</div>
									</div>

									<div class="field" >
										<div class="control">
											  <input type="radio" value="new" name="profile_project_features" ng-model="sheet.profile_project.features">
											  Scope 2: Nouveau Projet
										</div>
									</div>

									<div class="field" >
										<div class="control">
											<span class="has-text-weight-semibold">Autres</span>
											  <input type="text" class="input" ng-model="sheet.profile_project.features_others">
										</div>
									</div>
								</div>

					         </div>

					        <!-- Actifs impliqués dans le projet -->
							<h3 class="subtitle has-text-weight-semibold has-text-oci is-mar-top-40">Actifs impliqués dans le projet</h3>
									
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
													  <input type="text" class="input" ng-model="sheet.involve_assets.network_interconnexion.is_others">
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
													  <input class="input" type="text" ng-model="sheet.involve_assets.transit_data.is_other">
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
							<h3 class="subtitle has-text-weight-semibold has-text-oci is-mar-top-50">Informations Complémentaires</h3>
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
													<textarea name="" id="" cols="30" rows="2" class="textarea" ng-model="sheet.complementary_data.data_geoloc.is_others"></textarea>							
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
													<textarea name="" id="" cols="30" rows="2" class="textarea" ng-model="sheet.complementary_data.partner.partner_description"></textarea>
												</div>
											</div>
										</div>
							         </div>


					        <!-- Risques Principaux -->
							<h3 class="subtitle has-text-weight-semibold has-text-oci">Risques Principaux</h3>
								     <div class="field is-horizontal">
							         	<div class="field-label">
											<label for="" class="label">
												Quelles sont les principales fonctionnalités offerte par le service ou l’offre ?
											</label>
										</div>
										<div class="field-body">
											<div class="field" >
												<div class="control">
													<textarea name="" id="" cols="30" rows="5" class="textarea" ng-model="sheet.main_risks.services_offer_features"></textarea>
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
													<textarea name="" id="" cols="30" rows="5" class="textarea" ng-model="sheet.main_risks.main_sensitives_data"></textarea>
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
			<h1 class="title has-text-oci">Informations générales</h1>

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
						  <div ng-if="!sheet.section1.network_diagram" ngf-drop ngf-select ngf-max-size="3MB" ng-change="check(sheet.section1.network_diagram)" ng-model="sheet.section1.network_diagram" class="drop-box button is-hgt-130 is-wth-130">
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
			<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
				<div class="field-label">
					<label for="" class="label">
						&nbsp;
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>Fournir la liste des Url de l’applications?</span>
						<div class="control">
								<textarea name="" id="" cols="30" rows="2" ng-model="sheet.section1.url_list" class="textarea"></textarea>
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
								<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section1.user_dimensioning" class="textarea"></textarea>
						</div>
					</div>

				</div>
			</div>

			<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
				<div class="field-label">
					<label for="" class="label">
						&nbsp;
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>Quel est le nombre d’utilisateur pouvant se connecter simultanément ?</span>
						<div class="control">
								<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section1.simultaneously_user" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>Combien d’utilisateurs avec le même identifiant peuvent se connecter simultanément à partir de la même IP ou IP différents  </span>
						<div class="control">
								<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section1.simultaneously_user_with_same_id_and_ip_or_not" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>L’application est-elle hébergé à l’extérieur de OCIT?</span>
						<div class="control">
								<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section1.is_app_hosted_ext_oci" class="textarea"></textarea>
						</div>
					</div>

				</div>
			</div>


			<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
				<div class="field-label">
					<label for="" class="label">
						&nbsp;
					</label>
				</div>
				<div class="field-body">
					<div class="field">
						<span>Avez-vous des données de production hébergées dans votre environnement de production?</span>
						<div class="control">
								<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section1.is_prod_data_hosted_in_prod_env" class="textarea"></textarea>
						</div>
					</div>

					<div class="field">
						<span>Avez-vous des données de production hébergées dans votre environnement de test?</span>
						<div class="control">
								<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section1.is_prod_env_data_hosted_in_test_env" class="textarea"></textarea>
						</div>
					</div>

				</div>
			</div>
		</ng-form>

		<ng-form ng-switch-when="section2"   name="section2">
						<h1 class="title has-text-oci">Information sur le compte utilisateur</h1>


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
										    Oui
										  </label>
										  <label class="radio">
										    <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="false" name="sheet_is_account_data_is_auth_required">
										    Non
										  </label>
										</div>
								</div>
								<div class="field" ng-if="sheet.section2.account_user_info.is_auth_required == 'false'">
									<div class="control">
										<span>Argumenter SVP</span>
										<textarea class="textarea"  ng-model="sheet.section2.account_user_info.explain_is_auth_required" cols="30" rows="2"></textarea>
									</div>
								</div>
							</div>
						</div>


					<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>Quelle est la méthode d’authentification des utilisateurs au système? Décrire les composants et le processus</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.auth_method_description" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Le Système utilise-t-il un contrôle d’accès basé sur le rôle?  Quel est le processus de définition et de gestion des rôle et de contrôle des droits d’accès</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.control_based_access_description" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Qui autorise l’accès au système et aux données?</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.who_give_auth_system_data" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>


					<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>Avez-vous inclus une notification avertissement du système d’accès/ d’ouverture de session?</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.is_warning_notification_on_connect" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>A quelle fréquence les utilisateurs doivent ils modifier leurs mot de passe?</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.password_rotation_freq" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>

					<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>L’authentification à multiple facteurs est-elle nécessaire?</span>
								<div class="control">
							                  <label class="radio">
							                    <input type="radio" value="true"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required">
							                         Oui
							                  </label>
							                  <label class="radio">
							                    <input type="radio" value="false"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required">
							                         Non
							                  </label>
								</div>
							</div>
						</div>
					</div>



					<div class="field is-horizontal is-mar-bot-40 is-mar-top-40">
						<div class="field-label">
							<label for="" class="label">
								&nbsp;
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<span>Quelle est votre de stratégie de compte pour réinitialiser et forcer l’utilisation de mot de passe complexe?</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.strategy_forcing_use_complex_password" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Les comptes générique, partagés, invites sont-ils autorisés?</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.are_gen_shared_invite_account_authorized" class="textarea"></textarea>
								</div>
							</div>

							<div class="field">
								<span>Qui peut ajouter, modifier, ou supprimer un compte ?</span>
								<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.who_add_mod_del_account" class="textarea"></textarea>
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
										<textarea class="textarea" name="" id="" cols="30" rows="2" ng-model="sheet.section2.account_user_info.are_multiple_sessions_authorized" class="textarea"></textarea>
								</div>
							</div>

						</div>
					</div>
		</ng-form>

		<ng-form name="section3" ng-switch-when="section3">
			<h1 class="title has-text-oci">Information sur le compte système d’administration</h1>
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
										<span>Argumenter SVP</span>
										<textarea class="textarea"  ng-model="sheet.section3.account_admin_info.is_not_planned_accountability_admin_action" cols="30" rows="2"></textarea>
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
										<textarea class="textarea"  ng-model="sheet.section3.account_admin_info.control_based_access_description" cols="30" rows="5"></textarea>
									</div>
								</div>
							</div>
						</div>


				       <div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									Qui autorise l'accès de l'administrateur système au système et aux données?    
								</label>
							</div>

							<div class="field-body">
								<div class="field">
									<div class="control">
										<textarea class="textarea"  ng-model="sheet.section3.account_admin_info.who_give_auth_system_data" cols="30" rows="4"></textarea>
									</div>
								</div>
							</div>

						</div>

				       <div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									À quelle fréquence les administrateurs systèmes doivent-ils modifier leurs mots de passe?   
								</label>
							</div>

							<div class="field-body">
								<div class="field">
									<div class="control">
										<textarea class="textarea"  ng-model="sheet.section3.account_admin_info.password_rotation_freq" cols="30" rows="4"></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									L’authentification à multiple facteurs est-elle requise?
								</label>								
							</div>
							<div class="field-body">
								<div class="field">
									<div class="control">
										<label class="radio">
										  <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required">
										       Oui
										</label>

										<label class="radio">
										  <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required">
										       Non
										</label>
									</div>
								</div>
								<div class="field">

									<div class="control" ng-if="sheet.section3.account_admin_info.is_multiple_auth_factor_required == 'false'">
										<span>Argument SVP</span>
											<textarea class="textarea"  ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required_explanation" cols="30" rows="4"></textarea>
									</div>
								</div>
							</div>

						</div>


						<div class="field is-horizontal">
							<div class="field-label">
								<label for="" class="label">
									Quelle est votre de stratégie de compte pour réinitialiser et forcer l’utilisation de mot de passe complexe?
								</label>
							</div>
							<div class="field-body">
								<div class="field">
									<div class="control">
										<textarea class="textarea" name="" id="" cols="30" rows="4" ng-model="sheet.section3.account_admin_info.strategy_forcing_use_complex_password" class="textarea"></textarea>
									</div>
								</div>
					
							</div>
						</div>

					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								A quelle fréquence se ferait la revue périodique des comptes d’administration système ?
							</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
										<textarea name="" id="" cols="30" rows="4" ng-model="sheet.section3.account_admin_info.periodic_account_review_freq" class="textarea"></textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label">
							<label for="" class="label">
								Tous les mots de passe admins par défaut de l’ensemble des composants applicatifs ont -il été modifié ?
							</label>
						</div>
						<div class="field-body">
								<div class="field">
										<div class="control">
											<label class="checkbox">
											  <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered">
											       Oui
											</label>
											<label class="checkbox">
											  <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered">
											       Non
											</label>
										</div>
								</div>
								<div class="field">
										<div class="control" ng-if="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered == 'false'">
											<span>Argumenter SVP</span>
											<div class="control">
												<textarea class="textarea" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered_explanation" cols="30" rows="4"></textarea>
											</div>
										</div>
								</div>
						  </div>
					</div>

		</ng-form>

			<ng-form name="section4" ng-switch-when="section4">
				<h1 class="title has-text-oci">Informations Réseaux</h1>
					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Quelles sont les ports qui besoin d’être ouvert sur le système?     
									</label>
								</div>

								<div class="field-body">
									<div class="field">
										<div class="control">
											<span>Argumenter SVP</span>
											<textarea class="textarea"  ng-model="sheet.section4.info_network.port_needed_to_be_opened" cols="30" rows="3"></textarea>
										</div>
									</div>
								</div>
							</div>

					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Quelles sont les ports qui besoin d’être ouverts sur les différents Firewalls?    
									</label>
								</div>

								<div class="field-body">
									<div class="field">
										<div class="control">
											<span>Argumenter SVP</span>
											<textarea class="textarea"  ng-model="sheet.section4.info_network.port_needed_to_be_opened_on_firewall" cols="30" rows="3"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les Données en transit ont-ils besoin d’être crypté?     
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="true" name="are_transit_data_needed_to_be_encrypted">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="false" name="are_transit_data_needed_to_be_encrypted">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted == 'false'">
										<div class="control">
											<span>Argumenter SVP</span>
											<textarea class="textarea"  ng-model="sheet.section4.info_network.are_transit_data_not_needed_to_be_encrypted_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>
			</ng-form>


			<ng-form name="section5" ng-switch-when="section5">
				<h1 class="title has-text-oci">
					Base de données
				</h1>

					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Le Système utilise-t-il une base de données ?  
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="true" name="is_system_using_database">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="false" name="is_system_using_database">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section5.database.is_system_using_database == 'true'">
										<div class="control">
											<span>Fournir la localisation des données</span>
											<textarea class="textarea"  ng-model="sheet.section5.database.is_system_not_using_database_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Y a-t-il un Backup ou une Copie de la BD 
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="true" name="is_exist_backup_or_bd_copy">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="false" name="is_exist_backup_or_bd_copy">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section5.database.is_exist_backup_or_bd_copy == 'true'">
										<div class="control">
											<span>Fournir la localisation des données</span>
											<textarea class="textarea"  ng-model="sheet.section5.database.is_exist_backup_or_bd_copy_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Media de Sauvegarde (Bande, disque ou autre)
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_backup_media" value="true" name="is_backup_media">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_backup_media" value="false" name="is_backup_media">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section5.database.is_backup_media == 'true'">
										<div class="control">
											<span>Fournir la localisation des données</span>
											<textarea class="textarea"  ng-model="sheet.section5.database.is_backup_media_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Existe –t-il une BD de Test ou de développement 
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="true" name="is_exist_test_bd_or_dev">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="false" name="is_exist_test_bd_or_dev">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section5.database.is_exist_test_bd_or_dev == 'true'">
										<div class="control">
											<span>Fournir la localisation des données</span>
											<textarea class="textarea"  ng-model="sheet.section5.database.is_exist_test_bd_or_dev_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>

					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Quelles sont les bases de données et les version de BD utilisées?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
										<div class="control">
											<textarea class="textarea"  ng-model="sheet.section5.database.what_are_bd_and_versions" cols="30" rows="2"></textarea>
										</div>
									</div>
							    </div>
						  </div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Avez-vous appliqué tous les patchs nécessaires?  
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="true" name="is_applied_patches_fixes">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="false" name="is_applied_patches_fixes">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>

					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Avez-vous correctement sécurisé la BD en suivant les directives de l’éditeur ou les références CIS?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="true" name="is_bd_secured_following_editor_or_cis">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="false" name="is_bd_secured_following_editor_or_cis">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les champs contenant des données sensibles ont -ils été correctement identifies et cryptés?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="true" name="is_forms_sensible_data_identified_encrypted">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="false" name="is_forms_sensible_data_identified_encrypted">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les développeurs sont –ils autorisés à modifier les données en production ?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="true" name="are_developers_authorized_altered_prod_data">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="false" name="are_developers_authorized_altered_prod_data">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>



					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les champs contenant des données sensibles se trouvent-ils dans la même table que les champs contenant des données non sensibles?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="true" name="are_sensible_data_on_same_table_with_nonsensible">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="false" name="are_sensible_data_on_same_table_with_nonsensible">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>

			</ng-form>

			<ng-form name="section6" ng-switch-when="section6">
				<h1 class="title has-text-oci">Backup &amp; Résilience</h1>
					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Backup des données effectuées ?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="true" name="is_backup_done">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="false" name="is_backup_done">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section6.backup.is_backup_done == 'true'">
										<div class="control">
											<span>faire une description des données avec leur chemin</span>
											<textarea class="textarea"  ng-model="sheet.section6.backup.is_backup_done_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Existe-t-il une procédure de sauvegarde formalisé ? 
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="true" name="is_formal_backup_procedure_exist">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="false" name="is_formal_backup_procedure_exist">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Media de Sauvegarde (Bande, disque ou autre) ? 
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="true" name="is_backup_media">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="false" name="is_backup_media">
											    Non
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section6.backup.is_backup_media == 'true'">
										<div class="control">
											<span>Localisation</span>
											<textarea class="textarea"  ng-model="sheet.section6.backup.is_backup_media_explanation" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Durée de rétention en ligne ?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
										<div class="control">
											<span>SVP veuillez fournir la durée </span>
											<textarea class="textarea"  ng-model="sheet.section6.backup.rentention_duration_online" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>

					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Durée de rétention en hors-ligne ?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
										<div class="control">
											<span>SVP veuillez fournir la durée et la localisation</span>
											<textarea class="textarea"  ng-model="sheet.section6.backup.rentention_duration_offline" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal is-mar-top-25   is-mar-bot-25">
								<div class="field-label">
									<label for="" class="label">
										Existe-t-il des sauvegarde de VM ?
									</label>
								</div>

								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="true" name="is_exist_vm_backup">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="false" name="is_exist_vm_backup">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>



					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les sauvegardes sont–elles automatiques ou manuelles ? 
									</label>
								</div>

								<div class="field-body">
									<div class="field">
										<div class="control">
											<span>Veuillez SVP préciser le mode</span>
											<textarea class="textarea" ng-model="sheet.section6.backup.are_backup_auto_or_manual" cols="30" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les Serveurs sont –il en HA ?
									</label>
								</div>
								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="true" name="are_server_in_ha">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="false" name="are_server_in_ha">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Les serveurs sont –il sur le même site ?  
									</label>
								</div>
								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="true" name="servers_on_same_site">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="false" name="servers_on_same_site">
											    Non
											  </label>
											</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Existe-t-il une procédure de reprise en cas de crash de l’application ?   
									</label>
								</div>
								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="true" name="is_exist_drp_after_app_crash">
											    Oui
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="false" name="is_exist_drp_after_app_crash">
											    Non
											  </label>
											</div>
									</div>
									<div class="field">
										<div class="control">
											<textarea class="textarea" name="" id="" cols="30" rows="3" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash_explanation"></textarea>
										</div>
									</div>
								</div>
							</div>

					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										En cas de sinistre sur un site, la bascule est-elle manuelle ou automatique ? 
									</label>
								</div>
								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="manual" name="is_overloading_auto_or_manual_in_sinister">
											    Manuelle	
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="automatic" name="is_overloading_auto_or_manual_in_sinister">
											    Automatique
											  </label>
											</div>
									</div>
								</div>
							</div>


					       <div class="field is-horizontal">
								<div class="field-label">
									<label for="" class="label">
										Existe-t-il une procédure de bascule ?
									</label>
								</div>
								<div class="field-body">
									<div class="field">
											<div class="control">
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="manual" name="is_exist_overloading_procedure">
											    Manuelle	
											  </label>
											  <label class="radio">
											    <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="automatic" name="is_exist_overloading_procedure">
											    Automatique
											  </label>
											</div>
									</div>
									<div class="field" ng-if="sheet.section6.backup.is_exist_overloading_procedure_explanation == 'true'">
										<div class="control">
											<textarea class="textarea" name="" id="" cols="30" rows="10" ng-model="sheet.section6.backup.is_exist_overloading_procedure_explanation"></textarea>
										</div>
									</div>
								</div>
							</div>
			</ng-form>	
		</div>
		

		<!-- Validation  -->
		<div class="field is-horizontal is-mar-top-50 is-display-none" style="display: none;">
			<div class="field-label">
				&nbsp;
			</div>
			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button id="send_report_sheet" class="button is-oci" type="submit" ng-disabled="createProjectSheetForm.$invalid || is_loading">
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

	<script>
		$(document).ready(function(){
			$('.section_item_report').on('click', function(){
				$('.section_item_report').parent().removeClass('is-active');
				$(this).parent().addClass('is-active');
			});

			$('.first_tab_report').trigger('click');


		   $(window).scroll(function(){
			    var width_screen = $(window).width();

					if(width_screen > 993)
					{
						var $scroll_top = $(this).scrollTop();
						if($scroll_top > 250)
						{
							$('#tabs').addClass('is-position-fixed');
							$('#tabs').css('top','1px');
						}else
						{
							$('#tabs').removeClass('is-position-fixed');
						}

					}
		    });


		});
		
	</script>

	<script>
		$(document).ready(function(){
			$('.left_element').on('click', function(){

				$('.section_item_report').each(function(index,element){
					if($(this).parent().hasClass('is-active')){
						 index_left = index;
					}
				});

				if(index_left > 0){
							$('.section_item_report').eq((index_left-1)).trigger('click');
				}
			});

			$('.right_element').on('click', function(){
				$('.section_item_report').each(function(index,element){
					if($(this).parent().hasClass('is-active')){
						 index_right = index;
					}
				});
					$('.section_item_report').eq((index_right+1)).trigger('click');
			});

			$('.trigger_send_security_sheet').on('click', function(){
				$('#send_report_sheet').trigger('click');
			});
		});
	</script>
</section>