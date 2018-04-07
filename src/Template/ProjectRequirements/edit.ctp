<section ui-view>
<div>
	<h3 class="title">Fiche d'exigences projet > <span class="has-text-oci is-size-4 has-text-weight-semibold">{{project.project_fullname}}</span></h3>
	<form name="createProjectSecurityRequirements" class="is-pad-top-0 is-pad-bot-40 hero is-white" ng-submit="create(requirement)">
			
		<table class="table is-fullwidth">
			<thead>
				<tr class="oci-orange-b">
					<th class="has-text-white">Exigences</th>
					<th class="has-text-white has-text-centered">Status</th>
					<th class="has-text-white has-text-centered">Commentaire</th>
				</tr>
			</thead>
		</table>
		
		<!-- e1 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-1.]</span> Le fournisseur doit identifier toutes les données sensibles qui seront utilisées, stockées ou transmises sur la plateforme qui héberge la solution. Une classification sera alors proposée en terme de sensibilité ((données traitées, traitements effectuées, durée de conservation…).
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e1.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e1.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e2 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-2.]</span>Le fournisseur doit détailler chaque rôle fonctionnel (rôle administrateur inclus) et préciser le type de contrôle d’accès nécessaire pour garantir une bonne séparation des tâches en fonction de la classification proposée précédemment :
- liste rôles détaillée
- liste des droits d’accès détaillée
- détails sur l’implémentation du contrôle d’accès  (réseau, application, base de données, infrastructure, etc.) 

				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e2.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e2.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e3 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-3.]</span>L’application/la solution doit permettre la création de profils basés sur RBAC (Role based access control). Cette fonctionnalité est nécessaire à une bonne gestion des droits et à l’intégration à la solution IAM de OCIT.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e3.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e3.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e4 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-4.]</span>Des mesures de sécurité doivent être implémentées pour garantir la sécurité de l’application et de la solution au global :
- Pour le développement d’applications web et la configuration des serveurs Web: le respect des exigences de l’OWASP est un minimum
- Pour la configuration des OS, des bases de données et des équipements réseau: les standards du CIS doivent être implémentés au minimum.
Selon leur pertinence, des standards de sécurité du Groupe Orange, seront également communiqués au chef de projet et au fournisseur pour prise en compte.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e4.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e4.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e5 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-5.]</span>L’architecture proposée par le fournisseur doit être conforme au modèle 3-tiers :
•	Couche de connexion à la base de données : serveur de bases de données
•	Couche pour la gestion des données : serveur applicatif qui interroge la base de données pour récupérer ou modifier des données
•	Couche interface utilisateur (IHM ou GUI) : serveur client qui affiche le résultat de l’opération

				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e5.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e5.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e6 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-6.]</span>Le projet/fournisseur doit fournir une matrice des flux détaillant les informations sur les adresses IPs source/destination, protocoles, ports, service. Cette matrice doit également identifier les flux de production, flux d'exploitation, flux d'utilisateurs.

				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e6.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e6.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e7 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-7.]</span>Les serveurs hébergeant des services ou applications exposées sur Internet doivent être isolés dans des DMZ spécifiques.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e7.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e7.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e8 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-8.]</span>La solution doit être capable de générer des logs d’accès et d’activité à centraliser vers un serveur dédié de OCIT. Et également, permettre une analyse à froid de tout accès et de toute opération non autorisés.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e8.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e8.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e9 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-9.]</span>Tous les services réseaux inutilisés doivent être désactivés sur chaque équipement.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e9.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e9.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e10 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-10.]</span>L'identité des serveurs web doit être garantie par un certificat délivré par une autorité de certification digne de confiance et officielle, le certificat est à jour et non révoqué.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e10.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e10.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e11 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-11.]</span>L’accès des exploitants doit s’appuyer sur un système garantissant authentification, autorisation, traçabilité et imputabilité.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e11.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e11.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e12 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-12.]</span>Une description complète des données sauvegardées doit être fournie par le projet/fournisseur. Cette description doit détailler à minima : la stratégie de sauvegarde proposée, la fréquence des sauvegardes, la durée de rétention. OCIT se réserve le droit de compléter et/ou modifier ces informations.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e12.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e12.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e13 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-13.]</span>Le fournisseur doit s’engager à réaliser des tests de restauration pour s’assurer de la disponibilité et de l’intégrité des données sauvegardées
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e13.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e13.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e14 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-14.]</span>L’architecture de l’application/la solution doit garantir une haute disponibilité du service avec une redondance des infrastructures, des nœuds et des équipements. 
Le projet/le fournisseur doit décrire et documenter la solution qu’il propose pour la haute disponibilité.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e14.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e14.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e15 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-15.]</span>L’application/la solution doit proposer un mécanisme pour forcer l’utilisation de mots de passe complexes, respectant les exigences de la politique des mots de passe de OCIT (longueur minimum de 8 caractères dont un chiffre et un caractère spécial, historisation, fréquence de changement…)
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e15.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e15.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e16 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-16.]</span>L’application/la solution doit garantir la traçabilité et l’imputabilité des accès à l’ensemble des fonctionnalités.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e16.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e16.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e17 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-17.]</span>Toute session authentifiée doit être chiffrée, dès la phase d’authentification. Le procotole utilisé pour se connecter et gérer les équipements doit garantir l’authentification et le chiffrement des communications type ssh, https, sftp, pgp, échange de certificat.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e17.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e17.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e18 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-18.]</span>L’application/la solution doit permettre l’insertion de bannière personnalisable sur l’écran d’accueil.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e18.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e18.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e19 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-19.]</span>Les tâches d’administration doivent se faire via un réseau d’administration en utilisant une connexion VPN.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e19.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e19.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e20 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-20.]</span>Les logiciels doivent être exécutés avec les privilèges minimaux nécessaires à un fonctionnement correct. En particulier, un logiciel ne doit pas être exécuté avec les droits administrateur (root).
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e20.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e20.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e21 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-21.]</span>Le compte administrateur/root doit être configuré pour être accessible uniquement en local.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e21.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e21.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e22 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-22.]</span>Les environnements de production, de développement et de test doivent être séparés par au minimum, des mécanismes logiques empêchant les connexions non autorisées entre ces environnements.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e22.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e22.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e23 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-23.]</span>Le projet/fournisseur doit fournir une description détaillée des logs générés par l’application et les équipements (type, emplacement, contenu, …)
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e23.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e23.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e24 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-24.]</span>L’application/la solution ne doit pas générer de logs contenant les mots de passe des utilisateurs.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e24.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e24.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e25 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-25.]</span>Tous les accès aux applications doivent être journalisés (source, date, heure, login, IP) 
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e25.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e25.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e26 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-26.]</span>Toutes les machines et équipements utilisés dans le cadre du projet doivent être synchronisés avec un des serveurs NTP (Network Time Protocol) de OCIT. 
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e26.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e26.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e27 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-27.]</span>Le protocole snmp v3 doit être configuré au minimum sur les équipements impliqués dans le projet.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e27.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e27.comments"></textarea>
					</div>
				</div>
			</div>
		</div>


		<!-- e28 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-28.]</span>Des audits de sécurité seront réalisés après le développement de l’application et/ou la conception de la solution (entre le T2 et le T3). Le projet et/ou le fournisseur doit s’engager à apporter les corrections nécessaires, identifiées par l’équipe sécurité de OCIT, avant l’approbation de la mise en production.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e28.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e28.comments"></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- e29 -->
		<div class="columns">
			<div class="column">
				<article>
					<span class="has-text-weight-semibold has-text-oci">[E-29.]</span>La procédure de mise en production et celle de retour en arrière doivent être complètement décrites par le fournisseur et validées par OCIT.
				</article>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e28.status"></textarea>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="field">
					<div class="control">
						<textarea ui-tinymce="tinymceOptions" name="" id="" class="textarea" ng-model="requirement.e28.comments"></textarea>
					</div>
				</div>
			</div>
		</div>
		
		<div class="columns">
			<div class="column">
				&nbsp;
			</div>
			<div class="column">
			<div class="field-body">
					<div class="field is-grouped">
					  <p class="control">
					    <button class="button is-oci" type="submit" ng-disabled="createProjectSecurityRequirements.$invalid || is_loading">
					      Modifier Fiche Exigences projet
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
			<div class="column"></div>
		</div>
	</form>
</div>
</section>
