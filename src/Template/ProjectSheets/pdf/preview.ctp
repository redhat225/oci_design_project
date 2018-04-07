
  <h3 class="title has-text-weight-semibold">
    Fiche Sécurité Projet > <span class="has-text-oci"><?= $project_sheet['project']['project_fullname'] ?></span>
  </h3>

  <table class="table">
    <thead>
      <tr>
        <th class="oci-orange-b has-text-white">Propiétaire Fiche sécurité</th>
        <th class="oci-orange-b has-text-white">Date Création Fiche sécurité</th>
        <th class="oci-orange-b has-text-white">Date dernière modification Fiche sécurité</th>
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
          <td><?php $creation_date_project = new \DateTime($project_sheet['project']['created']) ; echo $creation_date_project->format('d-m-Y H:i:s');?></td>
          <td><?= $project_sheet['project']->project_priority ?></td>
          <td><?= $project_sheet['project']->project_type->project_type_denomination ?></td>
        </tr>
    </tbody>
  </table>

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
Les objectifs de ce document sont doubles

• Il sera examiné par l’équipe de Sécurité interne les mesures de la sécurité applicable au projet 
• Pour s’assurer que des ressources appropriées peuvent être alloués.

Ce document doit être rempli par le chef de produit et a communiqué au Pôle Security by Design SPOC :
• Expert Security By Design – eric.aboa@orange.com au moins 15 jours avant le Jalon T-1.

• A – Objectif du document      • F – Le profil du projet 
• B – Vision global du projet   • G – Les actifs du projet
• C – Les Jalons TTM            • H – Les exigences du projet
• D – Les Contacts Projets      • I – Les risques principaux
• E – La Portée du Projet       • J – Les risques sécurité
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
                  <?= $project_sheet['sheet_content']->project_global_review  ?>
                </div>
              </div>
            </div>
          </div>

          <h1 class="subtitle has-text-weight-semibold has-text-oci">Les jalons TTM</h1>
          
          <!-- Les jalons projet -->
          
          <div class="jalon_steps has-text-centered">
              <span class="is-pad-rgt-170 has-text-left"><b>T-1</b></span>
              <span class="is-pad-rgt-100 has-text-left"><b>T0</b></span>
              <span class="is-pad-rgt-150 has-text-left"><b>T1</b></span>
              <span class="is-pad-rgt-150 has-text-left"><b>T2</b></span>
              <span class="is-pad-rgt-150 has-text-left"><b>T3</b></span>
          </div>
          <div class="jalon_steps_values has-text-centered">
              <span class="is-pad-rgt-80"><b>
                   <?php if(isset($project_sheet['sheet_content']->project_steps->step_before)) :?>
                          <?php if($project_sheet['sheet_content']->project_steps->step_before != 'null') :?>
                          <?php $date_t_before = new \DateTime($project_sheet['sheet_content']->project_steps->step_before); echo $date_t_before->format('d-m-Y') ?>
                        <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                        <?php endif; ?>
                   <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                   <?php endif; ?>
              </b></span>
              <span class="is-pad-rgt-40"><b>
                    <?php if(isset($project_sheet['sheet_content']->project_steps->step_0)) :?>
                            <?php if($project_sheet['sheet_content']->project_steps->step_0 != 'null') :?>
                          <?php $date_t_0 = new \DateTime($project_sheet['sheet_content']->project_steps->step_0); echo $date_t_0->format('d-m-Y') ?>
                        <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                        <?php endif; ?>
                   <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                   <?php endif; ?>
              </b></span>
              <span class="is-pad-rgt-80"><b>
                    <?php if(isset($project_sheet['sheet_content']->project_steps->step_1)) :?>
                            <?php if($project_sheet['sheet_content']->project_steps->step_1 != 'null'): ?>
                          <?php $date_t_1 = new \DateTime($project_sheet['sheet_content']->project_steps->step_1); echo $date_t_1->format('d-m-Y') ?>
                        <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>

                        <?php endif; ?>
                   <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                   <?php endif; ?>
              </b></span>
              <span class="is-pad-rgt-80"><b>
                  <?php if(isset($project_sheet['sheet_content']->project_steps->step_2)) :?>
                          <?php if($project_sheet['sheet_content']->project_steps->step_2 != 'null'): ?>
                          <?php $date_t_2 = new \DateTime($project_sheet['sheet_content']->project_steps->step_2); echo $date_t_2->format('d-m-Y') ?>
                        <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                        <?php endif; ?>
                   <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                   <?php endif; ?>
              </b></span>
              <span class="is-pad-rgt-80"><b>
                    <?php if(isset($project_sheet['sheet_content']->project_steps->step_3)) :?>
                            <?php if($project_sheet['sheet_content']->project_steps->step_3 != 'null'): ?>
                          <?php $date_t_3 = new \DateTime($project_sheet['sheet_content']->project_steps->step_3); echo $date_t_3->format('d-m-Y') ?>
                        <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                        <?php endif; ?>
                   <?php else: ?>
                          <?= 'jj-mm-aaaa' ?>
                   <?php endif; ?>
              </b></span>
          </div>
          
           <!-- Contacts du projet -->
           <div class="section is-pad-lft-0">
              <h1 class="subtitle has-text-oci has-text-weight-bold">Les ressources du projet</h1>
              <?php if($project_sheet['project']->project_contributors):?>
                  <?php foreach ($project_sheet['project']->project_contributors as $key => $value) :?>
                                      <table class="table is-striped is-hoverable is-fullwidth" style="border-style: none !important;">
                                        <tbody>
                                          <tr class="">
                                            <td>
                                                <img width="120px" src="img/assets/admins/photo/<?= $value->user_account->user->user_photo ?>">
                                            </td>
                                            <td>
                                                <p>
                                                    <strong><?= $value->user_account->user->user_fullname ?></strong>
                                                    <br>
                                                <?= $value->user_account->user->user_email ?>
                                                <br>
                                                <?= $value->user_account->user->user_job ?> <br>
                                                Role: <?= $value->project_contributor_role->role_denomination ?>
                                                  </p>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                  <?php endforeach; ?>
              <?php endif; ?>
           </div>

              <!-- Portée du projet -->
              <div class="field is-horizontal is-mar-bot-30 is-mar-top-1" id="actor_area">
                <div class="field-label">
                  <label for="" class="label">
                    Marketing Business Unit
                  </label>
                </div>
                <div class="field-body">
                  <div class="field" >
                    <div class="control">
                      <p>
                        <?php if(isset($project_sheet['sheet_content']->scope_project->maketing_business_unit)) :?>
                             <?= $project_sheet['sheet_content']->scope_project->maketing_business_unit ?>
                          <?php else: ?>
                             Non renseigné
                         <?php endif; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Champ d'action -->
              <h3 class="subtitle is-size-6 has-text-weight-bold">Champ d'action</h3>
               <table>
                <tr>
                  <td>
                    <div class="field">
                      <div class="control">
                        <?php if(isset($project_sheet['sheet_content']->scope_project->is_service_exclusive_or_inclusive_oci)): ?>
                              <?php if($project_sheet['sheet_content']->scope_project->is_service_exclusive_or_inclusive_oci=="exclusive") :?>
                                        <input type="radio" value="exclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci" checked="checked">
                                       <b>Scope 1: Services exclusivement pour OCI</b>
                              <?php else :?>
                                        <input type="radio" value="exclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci">
                                          Scope 1: Services exclusivement pour OCI
                              <?php endif; ?>
                        <?php else :?>
                              <input type="radio" value="exclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci">
                                    Scope 1: Services exclusivement pour OCI
                        <?php endif; ?>

                      </div>  
                    </div>
   
                  </td>
                  <td>
                    <div class="field">
                      <div class="control">
                        <?php if(isset($project_sheet['sheet_content']->scope_project->is_service_exclusive_or_inclusive_oci)): ?>
                            <?php if($project_sheet['sheet_content']->scope_project->is_service_exclusive_or_inclusive_oci=="inclusive") :?>
                                    <input type="radio" value="inclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci" checked="checked">
                                   <b>Scope 2: Services pour OCI et ses filiales</b> 
                            <?php else :?>
                                   <input type="radio" value="inclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci">
                                   Scope 2: Services pour OCI et ses filiales
                            <?php endif; ?>
                        <?php else: ?>
                                  <input type="radio" value="inclusive" name="is_service_exclusive_or_inclusive_oci" ng-model="sheet.scope_project.is_service_exclusive_or_inclusive_oci">
                                   Scope 2: Services pour OCI et ses filiales
                        <?php endif; ?>

                      </div>
                    </div>
            
                  </td>
                </tr>
              </table>




              <!-- Profil projet -->
              <h3 class="subtitle has-text-weight-semibold has-text-oci is-mar-top-30">Profil de projet</h3>
              <h3 class="subtitle is-size-6 has-text-weight-bold">Caractéristiques du projet</h3>

              <table>
                <tr>
                  <td>
                    <div class="field" >
                      <div class="control">
                        <?php if(isset($project_sheet['sheet_content']->profile_project->features)) :?>
                            <?php if($project_sheet['sheet_content']->profile_project->features == 'progressive') :?>
                               <input type="radio" value="progressive" name="profile_project_features" ng-model="sheet.profile_project.features" checked="checked">
                               <b>Scope 1: Mise à jour / Evolution</b> 
                            <?php else: ?>
                               <input type="radio" value="progressive" name="profile_project_features" ng-model="sheet.profile_project.features">
                               Scope 1: Mise à jour / Evolution
                            <?php endif; ?>
                         <?php else: ?>
                            <input type="radio" value="progressive" name="profile_project_features" ng-model="sheet.profile_project.features">
                              Scope 1: Mise à jour / Evolution
                          <?php endif; ?>
                      </div>
                    </div>
                  </td>
                  <td>
                     <div class="field" >
                      <div class="control">
                        <?php if(isset($project_sheet['sheet_content']->profile_project->features)) :?>
                            <?php if($project_sheet['sheet_content']->profile_project->features == 'new') :?>
                              <input type="radio" value="new" name="profile_project_features" ng-model="sheet.profile_project.features" checked="checked">
                              <b>Scope 2: Nouveau Projet</b>
                            <?php else: ?>
                              <input type="radio" value="new" name="profile_project_features" ng-model="sheet.profile_project.features">
                              Scope 2: Nouveau Projet
                            <?php endif; ?>
                        <?php else: ?>
                             <input type="radio" value="new" name="profile_project_features" ng-model="sheet.profile_project.features">
                              Scope 2: Nouveau Projet
                        <?php endif; ?>
                      </div>
                     </div>
                  </td>
                  <td colspan="3">
                    &nbsp;
                  </td>
                  <td>
                    <div class="field" >
                      <div class="control">
                        <span class="has-text-weight-semibold">Autres</span>
                          <?php if(isset($project_sheet['sheet_content']->profile_project->features_others)) :?>
                            <input type="text" class="input" ng-model="sheet.profile_project.features_others" value="<?= $project_sheet['sheet_content']->profile_project->features_others ?>">
                          <?php else: ?>
                                <input type="text" class="input" ng-model="sheet.profile_project.features_others" value="">
                          <?php endif; ?>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>


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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_internal_network)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_internal_network == 'true'): ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internal_network" checked="checked">
                                       <b>Client Réseau Interne</b>
                                  <?php else: ?>
                                    <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internal_network">
                                     Client Réseau Interne
                                  <?php endif; ?>
                               <?php else: ?>
                                  <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internal_network">
                                 Client Réseau Interne
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">

                             <?php if(isset($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_internet)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_internet == 'true'): ?>
                                       <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internet" checked="checked">
                                         <b>Internet</b> 
                                  <?php else: ?>
                                        <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internet">
                                          Internet
                                  <?php endif; ?>
                               <?php else: ?>
                                    <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_internet">
                                        Internet
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_client_vpn_orange)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_client_vpn_orange == 'true'): ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_client_vpn_orange" checked="checked">
                                                                <b>Client VPN Orange</b> 
                                  <?php else: ?>
                                        <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_client_vpn_orange">
                                                                  Client VPN Orange
                                  <?php endif; ?>
                               <?php else: ?>
                                        <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_client_vpn_orange">
                                                                  Client VPN Orange
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_vpn_client_fai)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_vpn_client_fai == 'true'): ?>
                                       <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_vpn_client_fai" checked="checked">
                                        <b> Client VPN (FAI)</b>
                                  <?php else: ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_vpn_client_fai">
                                         Client VPN (FAI)
                                  <?php endif; ?>
                               <?php else: ?>
                                        <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_client_vpn_orange">
                                           Client VPN Orange
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_partner_network)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_partner_network == 'true'): ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_partner_network" checked="checked">
                                         Partenaire réseau (LAN/WAN)
                                  <?php else: ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_partner_network">
                                      Partenaire réseau (LAN/WAN)
                                  <?php endif; ?>
                               <?php else: ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.network_interconnexion.is_partner_network">
                                      Partenaire réseau (LAN/WAN)
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                            <span class="has-text-weight-semibold">Autre</span>
                            <?php if(isset($project_sheet['sheet_content']->involve_assets->network_interconnexion->is_others)) :?>
                            <input type="text" class="input" ng-model="sheet.involve_assets.network_interconnexion.is_others" value="<?= $project_sheet['sheet_content']->involve_assets->network_interconnexion->is_others ?>">
                          <?php else: ?>
                            <input type="text" class="input" ng-model="sheet.involve_assets.network_interconnexion.is_others">
                          <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_raw_data)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_raw_data == 'true'): ?>
                                    <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_raw_data" checked="checked">
                                       <b>Raw Data</b>
                                  <?php else: ?>
                                    <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_raw_data">
                                    Raw Data
                                  <?php endif; ?>
                               <?php else: ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_raw_data">
                                    Raw Data
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_email)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_email == 'true'): ?>
                                   <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_email" checked="checked">
                                     <b>Email</b>
                                  <?php else: ?>
                                    <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_email">
                                     Email
                                  <?php endif; ?>
                               <?php else: ?>
                                  <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_email">
                                     Email
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_voice_over_ip)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_voice_over_ip == 'true'): ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_voice_over_ip" checked="checked">
                                      <b>Voix sur IP</b>
                                  <?php else: ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_voice_over_ip">
                                     Voix sur IP
                                  <?php endif; ?>
                               <?php else: ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_voice_over_ip">
                                    Voix sur IP
                             <?php endif; ?>
                      
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_audio_video)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_audio_video == 'true'): ?>
                            <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_audio_video">
                            <b>Audio/Video</b> 
                                  <?php else: ?>
                              <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_audio_video">
                             Audio/Video
                                  <?php endif; ?>
                               <?php else: ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_audio_video">
                             Audio/Video
                             <?php endif; ?>
                           
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_file_transfert)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_file_transfert == 'true'): ?>
                           <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_file_transfert" checked="checked">
                             <b>Transfert de fichier</b>
                                  <?php else: ?>
                             <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_file_transfert">
                            Transfert de fichier
                                  <?php endif; ?>
                               <?php else: ?>
                            <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_file_transfert">
                            Transfert de fichier
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_share_doc)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_share_doc == 'true'): ?>
                              <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_share_doc" checked="checked">
                               <b>Partage de document</b>
                                  <?php else: ?>
                              <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_share_doc">
                              Partage de document
                                  <?php endif; ?>
                               <?php else: ?>
                              <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_share_doc">
                              Partage de document
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_electronic_payment)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->transit_data->is_electronic_payment == 'true'): ?>
                               <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_electronic_payment" checked="checked">
                             <b>Paiement électronique</b>
                                  <?php else: ?>
                              <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_electronic_payment">
                             Paiement électronique
                                  <?php endif; ?>
                               <?php else: ?>
                               <input type="checkbox" ng-model="sheet.involve_assets.transit_data.is_electronic_payment">
                             Paiement électronique
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                            <span class="has-text-weight-semibold">Autres</span>
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->transit_data->is_other)) :?>
                                  <input class="input" type="text" ng-model="sheet.involve_assets.transit_data.is_other" value="<?= $project_sheet['sheet_content']->involve_assets->transit_data->is_other ?>">
                              <?php else: ?>
                                   <input class="input" type="text" ng-model="sheet.involve_assets.transit_data.is_other">
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->information_nature->is_personal_data)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->information_nature->is_personal_data == 'true'): ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_personal_data" checked="checked">
                               <b>Données Personnelles</b>
                                  <?php else: ?>
                             <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_personal_data">
                              Données Personnelles
                                  <?php endif; ?>
                               <?php else: ?>
                                <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_personal_data">
                              Données Personnelles
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->information_nature->is_human_resources)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->information_nature->is_human_resources == 'true'): ?>
                                     <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_human_resources" checked="checked">
                             <b>Ressources Humaines</b>
                                  <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_human_resources">
                             Ressources Humaines
                                  <?php endif; ?>
                               <?php else: ?>
                                   <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_human_resources">
                             Ressources Humaines
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->information_nature->is_medical_data)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->information_nature->is_medical_data == 'true'): ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_medical_data" checked="checked">
                            <b>Données Médicales</b> 
                                  <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_medical_data">
                             Données Médicales
                                  <?php endif; ?>
                               <?php else: ?>
                                    <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_medical_data">
                             Données Médicales
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->information_nature->is_governemental)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->information_nature->is_governemental == 'true'): ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_governemental" checked="checked">
                              <b>Gouvernemental</b>
                                  <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_governemental">
                              Gouvernemental
                                  <?php endif; ?>
                               <?php else: ?>
                                  <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_governemental">
                              Gouvernemental
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->information_nature->is_financial)) :?>
                                  <?php if($project_sheet['sheet_content']->involve_assets->information_nature->is_financial == 'true'): ?>
                                      <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_financial" checked="checked">
                                       <b>Financière</b>
                                  <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_financial">
                             Financière
                                  <?php endif; ?>
                               <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_financial">
                             Financière
                             <?php endif; ?>
                            
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->involve_assets->information_nature->is_other)) :?>
                                       <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_other" value="<?= $project_sheet['sheet_content']->involve_assets->information_nature->is_other ?>">
                              <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.involve_assets.information_nature.is_other">
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->complementary_data->data_geoloc->is_civ_only)) :?>
                                  <?php if($project_sheet['sheet_content']->complementary_data->data_geoloc->is_civ_only == 'true'): ?>
                                              <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_only" checked="checked">
                                 <b>Côte d'Ivoire Seulement</b>
                                  <?php else: ?>
                                  <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_only">
                             Côte d'Ivoire Seulement
                                  <?php endif; ?>
                               <?php else: ?>
                                        <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_only">
                             Côte d'Ivoire Seulement
                             <?php endif; ?>
                    
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->complementary_data->data_geoloc->is_eu_only)) :?>
                                  <?php if($project_sheet['sheet_content']->complementary_data->data_geoloc->is_eu_only == 'true'): ?>
                                            <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_eu_only" checked="checked">
                             <b>Union Européenne</b>
                                  <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_eu_only">
                             Union Européenne
                                  <?php endif; ?>
                               <?php else: ?>
                                     <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_eu_only">
                             Union Européenne
                             <?php endif; ?>
                            
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->complementary_data->data_geoloc->is_civ_france)) :?>
                                  <?php if($project_sheet['sheet_content']->complementary_data->data_geoloc->is_civ_france == 'true'): ?>
                                              <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_france" checked="checked">
                            <b>Côte d'Ivoire / France</b>
                                  <?php else: ?>
                                   <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_france">
                            Côte d'Ivoire / France
                                  <?php endif; ?>
                               <?php else: ?>
                                       <input type="checkbox" ng-model="sheet.complementary_data.data_geoloc.is_civ_france">
                            Côte d'Ivoire / France
                             <?php endif; ?>
                          
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
                             <?php if(isset($project_sheet['sheet_content']->complementary_data->data_geoloc->is_others)) :?>
                                    <?= $project_sheet['sheet_content']->complementary_data->data_geoloc->is_others  ?>
                              <?php else: ?>
                             <input type="text" class="input">         
                             <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->complementary_data->partner->is_gos)) :?>
                                  <?php if($project_sheet['sheet_content']->complementary_data->partner->is_gos == 'true'): ?>
                                              <input type="checkbox" ng-model="sheet.complementary_data.partner.is_gos" checked="checked">
                             <b>GOS</b>
                                  <?php else: ?>
                                  <input type="checkbox" ng-model="sheet.complementary_data.partner.is_gos">
                             GOS
                                  <?php endif; ?>
                               <?php else: ?>
                                 <input type="checkbox" ng-model="sheet.complementary_data.partner.is_gos">
                             GOS
                             <?php endif; ?>
                           
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <label class="checkbox">
                             <?php if(isset($project_sheet['sheet_content']->complementary_data->partner->is_sofrecom)) :?>
                                  <?php if($project_sheet['sheet_content']->complementary_data->partner->is_sofrecom == 'true'): ?>
                                 <input type="checkbox" ng-model="sheet.complementary_data.partner.is_sofrecom" checked="checked">
                              <b>SOFRECOM</b>
                                  <?php else: ?>
                              <input type="checkbox" ng-model="sheet.complementary_data.partner.is_sofrecom">
                              SOFRECOM
                                  <?php endif; ?>
                               <?php else: ?>
                               <input type="checkbox" ng-model="sheet.complementary_data.partner.is_sofrecom">
                              SOFRECOM
                             <?php endif; ?>
                          </label>
                        </div>
                      </div>

                      <div class="field" >
                        <div class="control">
                          <span class="has-text-weight-semibold">Repondre avec le nom des fournisseurs</span>
                           <?php if(isset($project_sheet['sheet_content']->complementary_data->partner->partner_description)) :?>
                                <?= $project_sheet['sheet_content']->complementary_data->partner->partner_description ?>
                                <?php else: ?>
                                      <input type="text" class="input">
                             <?php endif; ?>
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
                         <?php if(isset($project_sheet['sheet_content']->main_risks->services_offer_features)) :?>
                                <?= $project_sheet['sheet_content']->main_risks->services_offer_features ?>
                          <?php else: ?>
                                 <input type="text" class="input">
                         <?php endif; ?>
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
                         <?php if(isset($project_sheet['sheet_content']->main_risks->main_sensitives_data)) :?>
                                <?= $project_sheet['sheet_content']->main_risks->main_sensitives_data ?>
                          <?php else: ?>
                          <input type="text" class="input">
                         <?php endif; ?>
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
                             <?php if(isset($project_sheet['sheet_content']->main_risks->tolerated_max_stop_service_time)) :?>
                                    <?= $project_sheet['sheet_content']->main_risks->tolerated_max_stop_service_time ?>
                              <?php else: ?>
                             <input type="text" class="input" ng-model="sheet.main_risks.tolerated_max_stop_service_time">
                             <?php endif; ?>
                            </div>
                          </div>
                        </div>
                       </div>
    </ng-form>  
    
    <ng-form ng-switch-when="section1"  name="section1">
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
                           <?php if(isset($project_sheet['sheet_content']->section1->is_matrix_flux)) :?>
                                    <?= $project_sheet['sheet_content']->section1->is_matrix_flux ?>
                            <?php else: ?>
 <input type="text" class="input">
                           <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section1->listing_ip->dev)) :?>
                                    <?= $project_sheet['sheet_content']->section1->listing_ip->dev ?>
                            <?php else: ?>
                               <input type="text" class="input">
                           <?php endif; ?>
            </div>
          </div>

          <div class="field">
            <span>adresses IP de tests</span>
            <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section1->listing_ip->test)) :?>
                                    <?= $project_sheet['sheet_content']->section1->listing_ip->test ?>
                            <?php else: ?>
     <input type="text" class="input">
                           <?php endif; ?>
            </div>
          </div>

          <div class="field">
            <span>adresses IP de production</span>
            <div class="control">
                            <?php if(isset($project_sheet['sheet_content']->section1->listing_ip->prod)) :?>
                                    <?= $project_sheet['sheet_content']->section1->listing_ip->prod ?>
                            <?php else: ?>
     <input type="text" class="input">
                           <?php endif; ?>
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
                            <?php if(isset($project_sheet['sheet_content']->section1->network_diagram)) :?>
                                    <img width="70%" src="sheets_assets/security_sheets/<?=$project_sheet['sheet_content']->section1->network_diagram_path  ?>" alt="">
                            <?php else: ?>
                                      <span>Aucun diagramme fourni</span>
                           <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section1->url_list)) :?>
                                <?= $project_sheet['sheet_content']->section1->url_list ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
           
            </div>
          </div>

          <div class="field">
            <span>Quelle est le groupe utilisateur cible au projet? </span>
            <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section1->target_group_user)) :?>
                                <?= $project_sheet['sheet_content']->section1->target_group_user ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
            </div>
          </div>

          <div class="field">
            <span>Pour combien d’utilisateurs le système a été dimensionnée?</span>
            <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section1->user_dimensioning)) :?>
                                <?= $project_sheet['sheet_content']->section1->user_dimensioning ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
      
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
                           <?php if(isset($project_sheet['sheet_content']->section1->simultaneously_user)) :?>
                                <?= $project_sheet['sheet_content']->section1->simultaneously_user ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
      
     
            </div>
          </div>

          <div class="field">
            <span>Combien d’utilisateurs avec le même identifiant peuvent se connecter simultanément à partir de la même IP ou IP différents  </span>
            <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section1->simultaneously_user_with_same_id_and_ip_or_not)) :?>
                                <?= $project_sheet['sheet_content']->section1->simultaneously_user_with_same_id_and_ip_or_not ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
  
            </div>
          </div>

          <div class="field">
            <span>L’application est-elle hébergé à l’extérieur de OCIT?</span>
            <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section1->is_app_hosted_ext_oci)) :?>
                                <?= $project_sheet['sheet_content']->section1->is_app_hosted_ext_oci ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
            
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
                           <?php if(isset($project_sheet['sheet_content']->section1->is_prod_data_hosted_in_prod_env)) :?>
                                <?= $project_sheet['sheet_content']->section1->is_prod_data_hosted_in_prod_env ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
            </div>
          </div>

          <div class="field">
            <span>Avez-vous des données de production hébergées dans votre environnement de test?</span>
            <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section1->is_prod_env_data_hosted_in_test_env)) :?>
                                <?= $project_sheet['sheet_content']->section1->is_prod_env_data_hosted_in_test_env ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>

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
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->is_auth_required)) :?>
                                <?php if($project_sheet['sheet_content']->section2->account_user_info->is_auth_required =='true'): ?>
                                      <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="true" name="sheet_is_account_data_is_auth_required" checked="checked">
                                       <b>Oui</b>
                                     <?php else: ?>
                                      <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="true" name="sheet_is_account_data_is_auth_required">
                                       Oui
                                  <?php endif; ?>
                            <?php else: ?>
                                     <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="true" name="sheet_is_account_data_is_auth_required">
                                       Oui
                           <?php endif; ?>

                   
                      </label>
                      <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->is_auth_required)) :?>
                                <?php if($project_sheet['sheet_content']->section2->account_user_info->is_auth_required =='false'): ?>
                                    <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="false" name="sheet_is_account_data_is_auth_required" checked="checked">
                                                          <b>Non</b>  
                                  <?php else: ?>
                                       <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="false" name="sheet_is_account_data_is_auth_required">
                                                            Non
                                  <?php endif; ?>
                            <?php else: ?>
                                       <input type="radio" ng-model="sheet.section2.account_user_info.is_auth_required" value="false" name="sheet_is_account_data_is_auth_required">
                                                            Non
                           <?php endif; ?>
                      </label>
                    </div>
                </div>
                <div class="field" ng-if="sheet.section2.account_user_info.is_auth_required == 'false'">
                  <div class="control">
                    <span>Argumenter SVP</span>
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->explain_is_auth_required)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->explain_is_auth_required ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->auth_method_description)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->auth_method_description ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
               
                </div>
              </div>

              <div class="field">
                <span>Le Système utilise-t-il un contrôle d’accès basé sur le rôle?  Quel est le processus de définition et de gestion des rôle et de contrôle des droits d’accès</span>
                <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->control_based_access_description)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->control_based_access_description ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
                </div>
              </div>

              <div class="field">
                <span>Qui autorise l’accès au système et aux données?</span>
                <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->who_give_auth_system_data)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->who_give_auth_system_data ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->is_warning_notification_on_connect)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->is_warning_notification_on_connect ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
           
                </div>
              </div>

              <div class="field">
                <span>A quelle fréquence les utilisateurs doivent ils modifier leurs mot de passe?</span>
                <div class="control">

                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->password_rotation_freq)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->password_rotation_freq ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
         
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
                             <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->is_multiple_auth_factor_required)) :?>
                                  <?php if($project_sheet['sheet_content']->section2->account_user_info->is_multiple_auth_factor_required == 'true'): ?>
                                    <input type="radio" value="true"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required" checked="checked">
                                    <b>Oui</b>
                                  <?php else: ?>
                                  <input type="radio" value="true"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required">
                                   Oui
                                  <?php endif; ?>
                               <?php else: ?>
                                <input type="radio" value="true"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required">
                                 Oui
                             <?php endif; ?>
                    </label>
                    <label class="radio">
                             <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->is_multiple_auth_factor_required)) :?>
                                  <?php if($project_sheet['sheet_content']->section2->account_user_info->is_multiple_auth_factor_required == 'false'): ?>
                                    <input type="radio" value="false"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required" checked="checked">
                                   <b>Non</b> 
                                  <?php else: ?>
                                    <input type="radio" value="false"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required">
                                    Non
                                  <?php endif; ?>
                               <?php else: ?>
                                  <input type="radio" value="false"  name="is_multiple_auth_factor_required_section2" ng-model="sheet.section2.account_user_info.is_multiple_auth_factor_required">
                                   Non
                             <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->strategy_forcing_use_complex_password)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->strategy_forcing_use_complex_password ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
                </div>
              </div>

              <div class="field">
                <span>Les comptes générique, partagés, invites sont-ils autorisés?</span>
                <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->are_gen_shared_invite_account_authorized)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->are_gen_shared_invite_account_authorized ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
                </div>
              </div>

              <div class="field">
                <span>Qui peut ajouter, modifier, ou supprimer un compte ?</span>
                <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->who_add_mod_del_account)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->who_add_mod_del_account ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->periodic_account_review_freq)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->periodic_account_review_freq ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
                </div>
              </div>

              <div class="field">
                <span>Les sessions multiples sont-elles autorisés par utilisateurs?</span>
                <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section2->account_user_info->are_multiple_sessions_authorized)) :?>
                                <?= $project_sheet['sheet_content']->section2->account_user_info->are_multiple_sessions_authorized ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>
     
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
                            <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->is_planned_accountability_admin_action)) :?>
                                <?php if($project_sheet['sheet_content']->section3->account_admin_info->is_planned_accountability_admin_action =='true'): ?>
                                       <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="true" name="sheet_is_planned_accountability_admin_action" checked="checked">
                                                           <b>Oui</b> 
                                     <?php else: ?>
                                       <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="true" name="sheet_is_planned_accountability_admin_action">
                                                            Oui
                                  <?php endif; ?>
                            <?php else: ?>
                                   <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="true" name="sheet_is_planned_accountability_admin_action">
                                   Oui
                           <?php endif; ?>

                       
                      </label>
                      <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->is_planned_accountability_admin_action)) :?>
                                <?php if($project_sheet['sheet_content']->section3->account_admin_info->is_planned_accountability_admin_action =='false'): ?>
                                       <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="false" name="sheet_is_planned_accountability_admin_action" checked="checked">
                                                             <b>Non</b> 
                                     <?php else: ?>
                                        <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="false" name="sheet_is_planned_accountability_admin_action">
                                                                Non
                                  <?php endif; ?>
                            <?php else: ?>
                                        <input type="radio" ng-model="sheet.section3.account_admin_info.is_planned_accountability_admin_action" value="false" name="sheet_is_planned_accountability_admin_action">
                                                                Non
                           <?php endif; ?>
                      </label>
                    </div>
                </div>
                <div class="field" ng-if="sheet.section3.account_admin_info.is_planned_accountability_admin_action == 'false'">
                  <div class="control">
                    <span>Argumenter SVP</span>
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->is_not_planned_accountability_admin_action)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->is_not_planned_accountability_admin_action ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>                   
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
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->control_based_access_description)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->control_based_access_description ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?>    
                 
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
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->who_give_auth_system_data)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->who_give_auth_system_data ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
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
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->password_rotation_freq)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->password_rotation_freq ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
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
                            <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->is_multiple_auth_factor_required)) :?>
                                <?php if($project_sheet['sheet_content']->section3->account_admin_info->is_multiple_auth_factor_required =='true'): ?>
                                        <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required" checked="checked">
                                                                   <b>Oui</b>
                                     <?php else: ?>
                                           <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required">
                                                                   Oui
                                  <?php endif; ?>
                            <?php else: ?>
                                   <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required">
                                                           Oui
                           <?php endif; ?>
                   
                    </label>

                    <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->is_multiple_auth_factor_required)) :?>
                                <?php if($project_sheet['sheet_content']->section3->account_admin_info->is_multiple_auth_factor_required =='false'): ?>
   <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required" checked="checked">
                           <b>Non</b>
                                     <?php else: ?>
   <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required">
                           Non
                                  <?php endif; ?>
                            <?php else: ?>
   <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.is_multiple_auth_factor_required">
                           Non
                           <?php endif; ?>
                   
                    </label>
                  </div>
                </div>
                <div class="field">

                  <div class="control" ng-if="sheet.section3.account_admin_info.is_multiple_auth_factor_required == 'false'">
                    <span>Argument SVP</span>
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->is_multiple_auth_factor_required_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->is_multiple_auth_factor_required_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 

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
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->strategy_forcing_use_complex_password)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->strategy_forcing_use_complex_password ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 

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
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->periodic_account_review_freq)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->periodic_account_review_freq ?>
                            <?php else: ?>

     <input type="text" class="input">

                           <?php endif; ?> 

                    
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
                      <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->are_admin_default_password_appcomponent_altered)) :?>
                                <?php if($project_sheet['sheet_content']->section3->account_admin_info->are_admin_default_password_appcomponent_altered =='true'): ?>
                                      <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered" checked="checked">
                                        <b>Oui</b> 
                                     <?php else: ?>
                                        <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered">
                                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
                                 <input type="radio" value="true" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered">
                                      Oui
                           <?php endif; ?>
               
                      </label>
                      <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->are_admin_default_password_appcomponent_altered)) :?>
                                <?php if($project_sheet['sheet_content']->section3->account_admin_info->are_admin_default_password_appcomponent_altered =='false'): ?>
                <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered" checked="checked">
                            <b>Non</b> 
                                     <?php else: ?>
      <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered">
                             Non
                                  <?php endif; ?>
                            <?php else: ?>
             <input type="radio" value="false" ng-model="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered">
                             Non
                           <?php endif; ?>
                    
                      </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control" ng-if="sheet.section3.account_admin_info.are_admin_default_password_appcomponent_altered == 'false'">
                      <span>Argumenter SVP</span>
                      <div class="control">
                           <?php if(isset($project_sheet['sheet_content']->section3->account_admin_info->are_admin_default_password_appcomponent_altered_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section3->account_admin_info->are_admin_default_password_appcomponent_altered_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 

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
                           <?php if(isset($project_sheet['sheet_content']->section4->info_network->port_needed_to_be_opened)) :?>
                                <?= $project_sheet['sheet_content']->section4->info_network->port_needed_to_be_opened ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                 
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
                           <?php if(isset($project_sheet['sheet_content']->section4->info_network->port_needed_to_be_opened_on_firewall)) :?>
                                <?= $project_sheet['sheet_content']->section4->info_network->port_needed_to_be_opened_on_firewall ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                   
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
                            <?php if(isset($project_sheet['sheet_content']->section4->info_network->are_transit_data_needed_to_be_encrypted)) :?>
                                <?php if($project_sheet['sheet_content']->section4->info_network->are_transit_data_needed_to_be_encrypted =='true'): ?>
                                  <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="true" name="are_transit_data_needed_to_be_encrypted" checked="checked">
                                                        <b>Oui</b>  
                                     <?php else: ?>
                                  <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="true" name="are_transit_data_needed_to_be_encrypted">
                                                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
                                  <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="true" name="are_transit_data_needed_to_be_encrypted">
                                                          Oui
                           <?php endif; ?>
                        
                        </label>
                        <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section4->info_network->are_transit_data_needed_to_be_encrypted)) :?>
                                <?php if($project_sheet['sheet_content']->section4->info_network->are_transit_data_needed_to_be_encrypted =='false'): ?>
                      <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="false" name="are_transit_data_needed_to_be_encrypted" checked="checked">
                         <b>Non</b> 
                                     <?php else: ?>
                      <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="false" name="are_transit_data_needed_to_be_encrypted">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
                      <input type="radio" ng-model="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted" value="false" name="are_transit_data_needed_to_be_encrypted">
                          Non
                           <?php endif; ?>
    
                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section4.info_network.are_transit_data_needed_to_be_encrypted == 'false'">
                    <div class="control">
                      <span>Argumenter SVP</span>
                           <?php if(isset($project_sheet['sheet_content']->section4->info_network->are_transit_data_not_needed_to_be_encrypted_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section4->info_network->are_transit_data_not_needed_to_be_encrypted_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                   
               
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
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_system_using_database)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_system_using_database =='true'): ?>
  <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="true" name="is_system_using_database" checked="checked">
                          <b>Oui</b>
                                     <?php else: ?>
     <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="true" name="is_system_using_database">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
  <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="true" name="is_system_using_database">
                          Oui
                           <?php endif; ?>
                        
                        </label>
                        <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_system_using_database)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_system_using_database =='false'): ?>
                                <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="false" name="is_system_using_database" checked="checked">
                                <b>Non</b>
                            <?php else: ?>
                                  <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="false" name="is_system_using_database">
                                  Non
                                  <?php endif; ?>
                            <?php else: ?>
                              <input type="radio" ng-model="sheet.section5.database.is_system_using_database" value="false" name="is_system_using_database">
                              Non
                           <?php endif; ?>
                        

                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section5.database.is_system_using_database == 'true'">
                    <div class="control">
                      <span>Fournir la localisation des données</span>
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_system_not_using_database_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section5->database->is_system_not_using_database_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
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
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_exist_backup_or_bd_copy)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_exist_backup_or_bd_copy =='true'): ?>
  <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="true" name="is_exist_backup_or_bd_copy" checked="checked">
                            <b>Oui</b>
                            <?php else: ?>
  <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="true" name="is_exist_backup_or_bd_copy">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
  <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="true" name="is_exist_backup_or_bd_copy">
                          Oui
                           <?php endif; ?>
                        
                        </label>
                        <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_exist_backup_or_bd_copy)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_exist_backup_or_bd_copy =='false'): ?>
                                      <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="false" name="is_exist_backup_or_bd_copy" checked="checked">
                                                    <b>Non</b>
                            <?php else: ?>
                                    <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="false" name="is_exist_backup_or_bd_copy">
                                                Non
                                  <?php endif; ?>
                            <?php else: ?>
                                  <input type="radio" ng-model="sheet.section5.database.is_exist_backup_or_bd_copy" value="false" name="is_exist_backup_or_bd_copy">
                                              Non
                           <?php endif; ?>
                        
            
                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section5.database.is_exist_backup_or_bd_copy == 'true'">
                    <div class="control">
                      <span>Fournir la localisation des données</span>
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_exist_backup_or_bd_copy_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section5->database->is_exist_backup_or_bd_copy_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                 
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
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_backup_media)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_backup_media =='true'): ?>
<input type="radio" ng-model="sheet.section5.database.is_backup_media" value="true" name="is_backup_media" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
<input type="radio" ng-model="sheet.section5.database.is_backup_media" value="true" name="is_backup_media">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
  <input type="radio" ng-model="sheet.section5.database.is_backup_media" value="true" name="is_backup_media">
                          Oui
                           <?php endif; ?>
                        
                          
                        </label>
                        <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_backup_media)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_backup_media =='false'): ?>
 <input type="radio" ng-model="sheet.section5.database.is_backup_media" value="false" name="is_backup_media" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section5.database.is_backup_media" value="false" name="is_backup_media">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section5.database.is_backup_media" value="false" name="is_backup_media">
                          Non
                           <?php endif; ?>
                        
                          
                         
                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section5.database.is_backup_media == 'true'">
                    <div class="control">
                      <span>Fournir la localisation des données</span>
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_backup_media_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section5->database->is_backup_media_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                      
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
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_exist_test_bd_or_dev)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_exist_test_bd_or_dev =='true'): ?>
            <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="true" name="is_exist_test_bd_or_dev" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
            <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="true" name="is_exist_test_bd_or_dev">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
            <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="true" name="is_exist_test_bd_or_dev">
                          Oui
                           <?php endif; ?>
                        
                          
              
                        </label>
                        <label class="radio">
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_exist_test_bd_or_dev)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_exist_test_bd_or_dev =='false'): ?>
                          
                          <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="false" name="is_exist_test_bd_or_dev" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
                          
                          <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="false" name="is_exist_test_bd_or_dev">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
                          
                          <input type="radio" ng-model="sheet.section5.database.is_exist_test_bd_or_dev" value="false" name="is_exist_test_bd_or_dev">
                          Non
                           <?php endif; ?>
                        

                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section5.database.is_exist_test_bd_or_dev == 'true'">
                    <div class="control">
                      <span>Fournir la localisation des données</span>
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_exist_test_bd_or_dev_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section5->database->is_exist_test_bd_or_dev_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                      
                    
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
                           <?php if(isset($project_sheet['sheet_content']->section5->database->what_are_bd_and_versions)) :?>
                                <?= $project_sheet['sheet_content']->section5->database->what_are_bd_and_versions ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                      
               
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
                            <?php if(isset($project_sheet['sheet_content']->section5->database->is_applied_patches_fixes)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_applied_patches_fixes =='true'): ?>
                          
           <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="true" name="is_applied_patches_fixes" checked="checked">
                         <b>Oui</b> 
                            <?php else: ?>
                          
           <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="true" name="is_applied_patches_fixes">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
           <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="true" name="is_applied_patches_fixes">
                          Oui
                           <?php endif; ?>

               
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_applied_patches_fixes)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_applied_patches_fixes =='false'): ?>
               <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="false" name="is_applied_patches_fixes" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
                          
                  <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="false" name="is_applied_patches_fixes">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
                <input type="radio" ng-model="sheet.section5.database.is_applied_patches_fixes" value="false" name="is_applied_patches_fixes">
                          Non
                           <?php endif; ?>

               
           
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
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_bd_secured_following_editor_or_cis)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_bd_secured_following_editor_or_cis =='true'): ?>
            <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="true" name="is_bd_secured_following_editor_or_cis" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
                          
             <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="true" name="is_bd_secured_following_editor_or_cis">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
            <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="true" name="is_bd_secured_following_editor_or_cis">
                          Oui
                           <?php endif; ?>
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_bd_secured_following_editor_or_cis)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_bd_secured_following_editor_or_cis =='false'): ?>
                                 <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="false" name="is_bd_secured_following_editor_or_cis" checked="checked">
                                <b>Non</b>
                            <?php else: ?>
                              <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="false" name="is_bd_secured_following_editor_or_cis">
                               Non
                                  <?php endif; ?>
                            <?php else: ?>
                               <input type="radio" ng-model="sheet.section5.database.is_bd_secured_following_editor_or_cis" value="false" name="is_bd_secured_following_editor_or_cis">
                                 Non
                           <?php endif; ?>
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
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_forms_sensible_data_identified_encrypted)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_forms_sensible_data_identified_encrypted =='true'): ?>
     <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="true" name="is_forms_sensible_data_identified_encrypted" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
                             <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="true" name="is_forms_sensible_data_identified_encrypted">
                                Oui
                                  <?php endif; ?>
                            <?php else: ?>
                              <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="true" name="is_forms_sensible_data_identified_encrypted">
                              Oui
                           <?php endif; ?>
                     
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section5->database->is_forms_sensible_data_identified_encrypted)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->is_forms_sensible_data_identified_encrypted =='false'): ?>
 <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="false" name="is_forms_sensible_data_identified_encrypted" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="false" name="is_forms_sensible_data_identified_encrypted">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section5.database.is_forms_sensible_data_identified_encrypted" value="false" name="is_forms_sensible_data_identified_encrypted">
                          Non
                           <?php endif; ?>
                     
                         
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
                           <?php if(isset($project_sheet['sheet_content']->section5->database->are_developers_authorized_altered_prod_data)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->are_developers_authorized_altered_prod_data =='true'): ?>
      <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="true" name="are_developers_authorized_altered_prod_data" checked="checked">
                         <b>Oui</b> 
                            <?php else: ?>
      <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="true" name="are_developers_authorized_altered_prod_data">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
      <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="true" name="are_developers_authorized_altered_prod_data">
                          Oui
                           <?php endif; ?>
                     
                         
                    
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section5->database->are_developers_authorized_altered_prod_data)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->are_developers_authorized_altered_prod_data =='false'): ?>
   <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="false" name="are_developers_authorized_altered_prod_data" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
     <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="false" name="are_developers_authorized_altered_prod_data">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
     <input type="radio" ng-model="sheet.section5.database.are_developers_authorized_altered_prod_data" value="false" name="are_developers_authorized_altered_prod_data">
                          Non
                           <?php endif; ?>
                     
                         
                       
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
                           <?php if(isset($project_sheet['sheet_content']->section5->database->are_sensible_data_on_same_table_with_nonsensible)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->are_sensible_data_on_same_table_with_nonsensible =='true'): ?>
      <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="true" name="are_sensible_data_on_same_table_with_nonsensible" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
      <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="true" name="are_sensible_data_on_same_table_with_nonsensible">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
      <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="true" name="are_sensible_data_on_same_table_with_nonsensible">
                          Oui
                           <?php endif; ?>
                     
                         
                    
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section5->database->are_sensible_data_on_same_table_with_nonsensible)) :?>
                                <?php if($project_sheet['sheet_content']->section5->database->are_sensible_data_on_same_table_with_nonsensible =='true'): ?>
    <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="false" name="are_sensible_data_on_same_table_with_nonsensible" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
  <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="false" name="are_sensible_data_on_same_table_with_nonsensible">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section5.database.are_sensible_data_on_same_table_with_nonsensible" value="false" name="are_sensible_data_on_same_table_with_nonsensible">
                          Non
                           <?php endif; ?>
                     
                         
                         
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_backup_done)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_backup_done =='true'): ?>
      
                          <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="true" name="is_backup_done" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
      
                          <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="true" name="is_backup_done">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
      
                          <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="true" name="is_backup_done">
                          Oui
                           <?php endif; ?>
                     
                         
                   
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_backup_done)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_backup_done =='false'): ?>
      
 <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="false" name="is_backup_done" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
   <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="false" name="is_backup_done">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section6.backup.is_backup_done" value="false" name="is_backup_done">
                          Non
                           <?php endif; ?>
                     
                         
                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section6.backup.is_backup_done == 'true'">
                    <div class="control">
                      <span>faire une description des données avec leur chemin</span>
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_backup_done_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->is_backup_done_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                      
               
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_formal_backup_procedure_exist)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_formal_backup_procedure_exist =='true'): ?>
      
   <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="true" name="is_formal_backup_procedure_exist" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
   <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="true" name="is_formal_backup_procedure_exist">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
   <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="true" name="is_formal_backup_procedure_exist">
                          Oui
                           <?php endif; ?>
                     
                       
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_formal_backup_procedure_exist)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_formal_backup_procedure_exist =='false'): ?>
      
        <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="false" name="is_formal_backup_procedure_exist" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
        <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="false" name="is_formal_backup_procedure_exist">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
        <input type="radio" ng-model="sheet.section6.backup.is_formal_backup_procedure_exist" value="false" name="is_formal_backup_procedure_exist">
                          Non
                           <?php endif; ?>
                     
                  
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_backup_media)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_backup_media =='true'): ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="true" name="is_backup_media" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="true" name="is_backup_media">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="true" name="is_backup_media">
                          Oui
                           <?php endif; ?>
                     
                  
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_backup_media)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_backup_media =='false'): ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="false" name="is_backup_media" checked="checked">
                          <b>Non</b>
                            <?php else: ?>


                          <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="false" name="is_backup_media">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>

 
                          <input type="radio" ng-model="sheet.section6.backup.is_backup_media" value="false" name="is_backup_media">
                          Non
                           <?php endif; ?>
                     
                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section6.backup.is_backup_media == 'true'">
                    <div class="control">
                      <span>Localisation</span>
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_backup_media_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->is_backup_media_explanation ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                      
            
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->rentention_duration_online)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->rentention_duration_online ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
                      
            
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->rentention_duration_offline)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->rentention_duration_offline ?>
                            <?php else: ?>
     <input type="text" class="input">

                           <?php endif; ?> 
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_vm_backup)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_exist_vm_backup =='true'): ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="true" name="is_exist_vm_backup" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="true" name="is_exist_vm_backup">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="true" name="is_exist_vm_backup">
                          Oui
                           <?php endif; ?>
                     
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_vm_backup)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_exist_vm_backup =='false'): ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="false" name="is_exist_vm_backup" checked="checked">
                          <b>Non</b>
                            <?php else: ?>

                           <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="false" name="is_exist_vm_backup">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>

                          <input type="radio" ng-model="sheet.section6.backup.is_exist_vm_backup" value="false" name="is_exist_vm_backup">
                          Non
                           <?php endif; ?>

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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->are_backup_auto_or_manual)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->are_backup_auto_or_manual ?>
                            <?php else: ?>
     <input type="text" class="input">
                           <?php endif; ?> 
                 
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->are_server_in_ha)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->are_server_in_ha =='true'): ?>
                          <input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="true" name="are_server_in_ha" checked="checked">
                           <b>Oui</b>
                            <?php else: ?>
                          <input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="true" name="are_server_in_ha">
                           Oui
                                  <?php endif; ?>
                            <?php else: ?>
                           <input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="true" name="are_server_in_ha">
                           Oui
                           <?php endif; ?>

                          
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->are_server_in_ha)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->are_server_in_ha =='false'): ?>
<input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="false" name="are_server_in_ha" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
<input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="false" name="are_server_in_ha">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
<input type="radio" ng-model="sheet.section6.backup.are_server_in_ha" value="false" name="are_server_in_ha">
                          Non
                           <?php endif; ?>

                          
                          
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->servers_on_same_site)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->servers_on_same_site =='true'): ?>
                          
                          <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="true" name="servers_on_same_site" checked="checked">
                            <b>Oui</b>
                            <?php else: ?>
                          
                          <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="true" name="servers_on_same_site">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
                          
                          <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="true" name="servers_on_same_site">
                          Oui
                           <?php endif; ?>

                          

                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->servers_on_same_site)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->servers_on_same_site =='false'): ?>
 <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="false" name="servers_on_same_site" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
  <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="false" name="servers_on_same_site">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
                          
  <input type="radio" ng-model="sheet.section6.backup.servers_on_same_site" value="false" name="servers_on_same_site">
                          Non
                           <?php endif; ?>

                          

                         
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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_drp_after_app_crash)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_exist_drp_after_app_crash =='true'): ?>
 <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="true" name="is_exist_drp_after_app_crash" checked="checked">
                          <b>Oui</b>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="true" name="is_exist_drp_after_app_crash">
                          Oui
                                  <?php endif; ?>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="true" name="is_exist_drp_after_app_crash">
                          Oui
                           <?php endif; ?>

                          
                         
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_drp_after_app_crash)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_exist_drp_after_app_crash =='false'): ?>
 <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="false" name="is_exist_drp_after_app_crash" checked="checked">
                          <b>Non</b>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="false" name="is_exist_drp_after_app_crash">
                          Non
                                  <?php endif; ?>
                            <?php else: ?>
 <input type="radio" ng-model="sheet.section6.backup.is_exist_drp_after_app_crash" value="false" name="is_exist_drp_after_app_crash">
                          Non
                           <?php endif; ?>
                        </label>
                      </div>
                  </div>
                  <div class="field">
                    <div class="control">
                      <span>Procedure attachée</span>

                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_drp_after_app_crash_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->is_exist_drp_after_app_crash_explanation ?>
                            <?php else: ?>
                 <input type="text" class="input">
                           <?php endif; ?> 
                 

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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_overloading_auto_or_manual_in_sinister)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_overloading_auto_or_manual_in_sinister =='manual'): ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="manual" name="is_overloading_auto_or_manual_in_sinister" checked="checked">
                          <b>Manuelle</b>  
                            <?php else: ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="manual" name="is_overloading_auto_or_manual_in_sinister">
                          Manuelle  
                                  <?php endif; ?>
                            <?php else: ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="manual" name="is_overloading_auto_or_manual_in_sinister">
                          Manuelle  
                           <?php endif; ?>

                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_overloading_auto_or_manual_in_sinister)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_overloading_auto_or_manual_in_sinister =='automatic'): ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="automatic" name="is_overloading_auto_or_manual_in_sinister" checked="checked">
                          <b>Automatique</b>
                            <?php else: ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="automatic" name="is_overloading_auto_or_manual_in_sinister">
                          Automatique
                                  <?php endif; ?>
                            <?php else: ?>
                          <input type="radio" ng-model="sheet.section6.backup.is_overloading_auto_or_manual_in_sinister" value="automatic" name="is_overloading_auto_or_manual_in_sinister">
                          Automatique 
                           <?php endif; ?>

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
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_overloading_procedure)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_exist_overloading_procedure =='manual'): ?>
                                <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="manual" name="is_exist_overloading_procedure" checked="checked">
                                <b>Manuelle</b> 
                            <?php else: ?>
                                <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="manual" name="is_exist_overloading_procedure">
                              Manuelle
                                  <?php endif; ?>
                            <?php else: ?>
                              <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="manual" name="is_exist_overloading_procedure">
                              Manuelle
                           <?php endif; ?>                         
                        </label>
                        <label class="radio">
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_overloading_procedure)) :?>
                                <?php if($project_sheet['sheet_content']->section6->backup->is_exist_overloading_procedure =='automatic'): ?>
                                    <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="automatic" name="is_exist_overloading_procedure" checked="checked">
                                    <b>Automatique</b>
                            <?php else: ?>
                                    <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="automatic" name="is_exist_overloading_procedure">
                                    Automatique
                                  <?php endif; ?>
                            <?php else: ?>
                                    <input type="radio" ng-model="sheet.section6.backup.is_exist_overloading_procedure" value="automatic" name="is_exist_overloading_procedure">
                                    Automatique
                           <?php endif; ?> 
                          
                        </label>
                      </div>
                  </div>
                  <div class="field" ng-if="sheet.section6.backup.is_exist_overloading_procedure_explanation == 'true'">
                    <div class="control">
                      <span>Procedure attachée</span>
                           <?php if(isset($project_sheet['sheet_content']->section6->backup->is_exist_overloading_procedure_explanation)) :?>
                                <?= $project_sheet['sheet_content']->section6->backup->is_exist_overloading_procedure_explanation ?>
                            <?php else: ?>
                    <input type="text" class="input">
                           <?php endif; ?> 
                    </div>
                  </div>
                </div>
              </div>
      </ng-form>  
    </div>
  