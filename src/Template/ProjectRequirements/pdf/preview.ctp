
<div>
  <h3 class="title has-text-weight-semibold">
    Fiche d'Exigences sécurité Projet > <span class="has-text-oci"><?= $project_sheet_requirement['project']['project_fullname'] ?></span>
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
          <td><?php $creation_date_project = new \DateTime($project_sheet_requirement['project']['created']) ; echo $creation_date_project->format('d-m-Y H:i:s');?></td>
          <td><?= $project_sheet_requirement['project']->project_priority ?></td>
          <td><?= $project_sheet_requirement['project']->project_type->project_type_denomination ?></td>
        </tr>
    </tbody>
  </table>

	<form name="createProjectSecurityRequirements" class="is-pad-top-0 is-pad-bot-40 hero is-white" ng-submit="create(requirement)">
			
	
		
		<table class="table is-narrow is-fullwidth">
			<thead>
				<tr class="oci-orange-b">
					<th class="has-text-white">Exigences</th>
					<th class="has-text-white has-text-centered">Status</th>
					<th class="has-text-white has-text-centered">Commentaire</th>
				</tr>
			</thead>
			<tbody>
				<!-- e1 -->
				<tr>
					<td>
							<span class="has-text-weight-semibold has-text-oci">[E-1.]</span> Le fournisseur doit identifier toutes les données sensibles qui seront utilisées, stockées ou transmises sur la plateforme qui héberge la solution. Une classification sera alors proposée en terme de sensibilité ((données traitées, traitements effectuées, durée de conservation…).
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e1->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e1->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e1->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e1->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e1->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e1->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e2 -->
				<tr>
					<td>
							<article>
								<span class="has-text-weight-semibold has-text-oci">[E-2.]</span>Le fournisseur doit détailler chaque rôle fonctionnel (rôle administrateur inclus) et préciser le type de contrôle d’accès nécessaire pour garantir une bonne séparation des tâches en fonction de la classification proposée précédemment :
			- liste rôles détaillée
			- liste des droits d’accès détaillée
			- détails sur l’implémentation du contrôle d’accès  (réseau, application, base de données, infrastructure, etc.) 

							</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e2->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e2->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e2->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e2->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e2->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e2->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e3 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-3.]</span>L’application/la solution doit permettre la création de profils basés sur RBAC (Role based access control). Cette fonctionnalité est nécessaire à une bonne gestion des droits et à l’intégration à la solution IAM de OCIT.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e3->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e3->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e3->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e3->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e3->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e3->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e4 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-4.]</span>Des mesures de sécurité doivent être implémentées pour garantir la sécurité de l’application et de la solution au global :
- Pour le développement d’applications web et la configuration des serveurs Web: le respect des exigences de l’OWASP est un minimum
- Pour la configuration des OS, des bases de données et des équipements réseau: les standards du CIS doivent être implémentés au minimum.
Selon leur pertinence, des standards de sécurité du Groupe Orange, seront également communiqués au chef de projet et au fournisseur pour prise en compte.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e4->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e4->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e4->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e4->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e4->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e4->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e5 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-5.]</span>L’architecture proposée par le fournisseur doit être conforme au modèle 3-tiers :
•	Couche de connexion à la base de données : serveur de bases de données
•	Couche pour la gestion des données : serveur applicatif qui interroge la base de données pour récupérer ou modifier des données
•	Couche interface utilisateur (IHM ou GUI) : serveur client qui affiche le résultat de l’opération

				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e5->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e5->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e5->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e5->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e5->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e5->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e6 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-6.]</span>Le projet/fournisseur doit fournir une matrice des flux détaillant les informations sur les adresses IPs source/destination, protocoles, ports, service. Cette matrice doit également identifier les flux de production, flux d'exploitation, flux d'utilisateurs.

				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e6->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e6->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e6->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e6->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e6->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e6->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e7 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-7.]</span>Les serveurs hébergeant des services ou applications exposées sur Internet doivent être isolés dans des DMZ spécifiques.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e7->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e7->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e7->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e7->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e7->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e7->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e8 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-8.]</span>La solution doit être capable de générer des logs d’accès et d’activité à centraliser vers un serveur dédié de OCIT. Et également, permettre une analyse à froid de tout accès et de toute opération non autorisés.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e8->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e8->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e8->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e8->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e8->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e8->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e9 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-9.]</span>Tous les services réseaux inutilisés doivent être désactivés sur chaque équipement.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e9->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e9->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e9->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e9->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e9->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e9->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e10 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-10.]</span>L'identité des serveurs web doit être garantie par un certificat délivré par une autorité de certification digne de confiance et officielle, le certificat est à jour et non révoqué.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e10->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e10->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e10->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e10->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e10->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e10->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e11 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-11.]</span>L’accès des exploitants doit s’appuyer sur un système garantissant authentification, autorisation, traçabilité et imputabilité.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e11->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e11->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e11->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e11->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e11->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e11->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-12.]</span>Une description complète des données sauvegardées doit être fournie par le projet/fournisseur. Cette description doit détailler à minima : la stratégie de sauvegarde proposée, la fréquence des sauvegardes, la durée de rétention. OCIT se réserve le droit de compléter et/ou modifier ces informations.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e11->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e11->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e11->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e11->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e11->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e11->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e12 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-12.]</span>Une description complète des données sauvegardées doit être fournie par le projet/fournisseur. Cette description doit détailler à minima : la stratégie de sauvegarde proposée, la fréquence des sauvegardes, la durée de rétention. OCIT se réserve le droit de compléter et/ou modifier ces informations.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e12->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e12->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e12->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e12->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e12->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e12->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e13 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-13.]</span>Le fournisseur doit s’engager à réaliser des tests de restauration pour s’assurer de la disponibilité et de l’intégrité des données sauvegardées
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e13->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e13->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e13->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e13->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e13->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e13->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e14 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-14.]</span>L’architecture de l’application/la solution doit garantir une haute disponibilité du service avec une redondance des infrastructures, des nœuds et des équipements. 
Le projet/le fournisseur doit décrire et documenter la solution qu’il propose pour la haute disponibilité.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e14->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e14->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e14->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e14->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e14->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e14->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e15 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-15.]</span>L’application/la solution doit proposer un mécanisme pour forcer l’utilisation de mots de passe complexes, respectant les exigences de la politique des mots de passe de OCIT (longueur minimum de 8 caractères dont un chiffre et un caractère spécial, historisation, fréquence de changement…)
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e15->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e15->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e15->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e15->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e15->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e15->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e16 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-16.]</span>L’application/la solution doit garantir la traçabilité et l’imputabilité des accès à l’ensemble des fonctionnalités.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e16->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e16->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e16->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e16->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e16->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e16->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e17 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-17.]</span>Toute session authentifiée doit être chiffrée, dès la phase d’authentification. Le procotole utilisé pour se connecter et gérer les équipements doit garantir l’authentification et le chiffrement des communications type ssh, https, sftp, pgp, échange de certificat.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e17->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e17->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e17->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e17->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e17->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e17->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e18 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-18.]</span>L’application/la solution doit permettre l’insertion de bannière personnalisable sur l’écran d’accueil.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e18->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e18->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e18->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e18->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e18->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e18->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e19 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-19.]</span>Les tâches d’administration doivent se faire via un réseau d’administration en utilisant une connexion VPN.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e19->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e19->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e19->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e19->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e19->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e19->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e20 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-20.]</span>Les logiciels doivent être exécutés avec les privilèges minimaux nécessaires à un fonctionnement correct. En particulier, un logiciel ne doit pas être exécuté avec les droits administrateur (root).
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e20->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e20->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e20->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e20->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e20->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e20->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e21 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-21.]</span>Le compte administrateur/root doit être configuré pour être accessible uniquement en local.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e21->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e21->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e21->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e21->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e21->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e21->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e22 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-22.]</span>Les environnements de production, de développement et de test doivent être séparés par au minimum, des mécanismes logiques empêchant les connexions non autorisées entre ces environnements.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e22->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e22->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e22->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e22->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e22->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e22->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e23 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-23.]</span>Le projet/fournisseur doit fournir une description détaillée des logs générés par l’application et les équipements (type, emplacement, contenu, …)
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e23->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e23->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e23->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e23->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e23->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e23->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e24 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-24.]</span>L’application/la solution ne doit pas générer de logs contenant les mots de passe des utilisateurs.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e24->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e24->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e24->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e24->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e24->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e24->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e25 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-25.]</span>Tous les accès aux applications doivent être journalisés (source, date, heure, login, IP) 
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e25->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e25->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e25->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e25->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e25->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e25->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e26 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-26.]</span>Toutes les machines et équipements utilisés dans le cadre du projet doivent être synchronisés avec un des serveurs NTP (Network Time Protocol) de OCIT. 
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e26->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e26->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e26->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e26->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e26->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e26->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e27 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-27.]</span>Le protocole snmp v3 doit être configuré au minimum sur les équipements impliqués dans le projet.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e27->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e27->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e27->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e27->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e27->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e27->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e28 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-28.]</span>Des audits de sécurité seront réalisés après le développement de l’application et/ou la conception de la solution (entre le T2 et le T3). Le projet et/ou le fournisseur doit s’engager à apporter les corrections nécessaires, identifiées par l’équipe sécurité de OCIT, avant l’approbation de la mise en production.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e28->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e28->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e28->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e28->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e28->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e28->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
				<!-- e29 -->
				<tr>
					<td>
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-29.]</span>La procédure de mise en production et celle de retour en arrière doivent être complètement décrites par le fournisseur et validées par OCIT.
				</article>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e29->status)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e29->status) :?>
										<?= $project_sheet_requirement['requirement_content']->e29->status ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($project_sheet_requirement['requirement_content']->e29->comments)): ?>
								<?php if($project_sheet_requirement['requirement_content']->e29->comments) :?>
										<?= $project_sheet_requirement['requirement_content']->e29->comments ?>
								<?php else: ?>
									<?= "N/A" ?>
								<?php endif; ?>
						<?php else: ?>
							<?= "N/A" ?>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>

		</table>

	</form>
</div>
