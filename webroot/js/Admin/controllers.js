angular.module('oci_controllers',[])
		.controller('AdminsController',['$scope','profile','userService','$state', function($scope,profile,userService,$state){
			$scope.profile = profile.data.user;
			userService.all().then(function(resp){	
				$scope.users =	resp.data.users;
			}, function(err){
				toastr.error('Une erreur est survenue, veuillez réessayer');
			});

		    $scope.openModalViewUsers = function(){
		    	$scope.activate_admins_users = 'is-active';
		    };

		    $scope.closeModalViewUsers = function(user_id = null){
		    	$scope.activate_admins_users = '';
		    	if(user_id!= null)
		    		$state.go('admins.accounts.edit',{"user_id":user_id},{reload:true});
		    };

		    $scope.search_actors_side_menu = '';

		}])
		.controller('DashController',['$scope', function($scope){
  			$scope.labels_radar =["SQLi", "DirTrav", "Xss", "Default Password", "Dns Poisoning", "Cookie Stealing", "Verbose System"];

			  $scope.data_radar = [
			    [65, 59, 90, 81, 56, 55, 40],
			    [28, 48, 40, 19, 96, 27, 100]
			  ];


			$scope.colors = ["#17224e","#098a33","#caebd5","#fff70c","#626984","#3D0100","#8A0C09","#023D15","#573A0E","#97305B","#1FBDAC"];
			 //graph
			 $scope.labels = ["January", "February", "March", "April", "May", "June", "July",];
			  $scope.series = ['Series A', 'Series B'];
			  $scope.data = [
			    [65, 59, 80, 81, 56, 55, 40],
			    [28, 48, 40, 19, 86, 27, 90]
			  ];
			  $scope.onClick = function (points, evt) {
			    console.log(points, evt);
			  };
			  $scope.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
			  $scope.options = {
			    scales: {
			      yAxes: [
			        {
			          id: 'y-axis-1',
			          type: 'linear',
			          display: true,
			          position: 'left'
			        },
			        {
			          id: 'y-axis-2',
			          type: 'linear',
			          display: true,
			          position: 'right'
			        }
			      ]
			    }
			   };

			  //doughnout
			  $scope.labels_doughnout = [];
			  $scope.data_doughnout = [];

		}]).controller('PlanningViewController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService){
			var self = this;
			        $scope.calendarOptions = {

        };
	        $scope.events = [
	            {
	                title: 'My Event',
	                start: new Date(),
	                description: 'This is a cool event',
	                color:'#5f6dd0'
	            },
	            {
	                title: 'My Event',
	                start: new moment().add(1,'days'),
	                description: 'This is a cool event',
	                color:'#af6dd0'
	            }
	        ]
		}]).controller('ProjectsController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService){
			var self = this;
			$scope.project =  {
				project_create_card: true
			};
			project_types.all().then(function(resp){
				$scope.project_types = resp.data.projects_types;
			});

		    userService.all().then(function(resp){
				  	$scope.users = resp.data.users;
				  	$scope.users.forEach(function(element){
				  		element.is_selected = false;
				  		element.assigned_role = '';
				  	});
			});

		    roleContributorService.all().then(function(resp){
				$scope.roles = resp.data.roles;
			});
		    $scope.search_actors = '';

			$scope.create = function (project){
				var users_selected = [];
					$scope.users.forEach(function(element){
						if(element.is_selected)
							users_selected.push(element);
					});
				
				project.contributors = users_selected;

				projects.create(project).then(function(resp){			
					if(resp.data.response.criticity == 'noncritical')
					{
					    $scope.ticket_path = resp.data.response.ticket_path;
						$scope.active_failure_project_modal = 'is-active';
					}
					else
					{	
			              toastr.success('Projet enregistré avec succès');
			              if(project.project_create_card == true)
						     $state.go('admins.projects-sheets.create',{"project_id":resp.data.response.id},{reload:true});
						  else
						  	 $state.go('admins.projects.view');
					}
				}, function(err){
			              toastr.error('Une erreur est survenue veuillez réessayer');
				});
			};

			$scope.addActorSheetObject = function(actor){
				actor.is_selected = true;
		    };

			$scope.retireActorSheetObject = function(actor){
				actor.is_selected = false;
		    };

		    $scope.openActorModal = function(){
		    	$scope.addActorModalTrigger = 'is-active';
		    };

		    $scope.closeActorModal = function(){
		    	$scope.addActorModalTrigger = '';
		    };

		    $scope.filter_keys = '';



		}]).controller('ProjectsViewController',['$scope','projects', function($scope,projects){
			projects.all().then(function(resp){
				$scope.projects = resp.data.projects;
			});

				$scope.openViewModal = function(project){
					$scope.openViewModalTrigger = 'is-active';
					$scope.info_project = project;
				};

				$scope.closeViewModalTrigger = function(){
					$scope.openViewModalTrigger = '';
				};

		    // Manage workflow
		    $scope.showWorkflowModalTrigger = '';
		    $scope.showWorkflowModal = function(){
		    	$scope.showWorkflowModalTrigger = 'is-active';
		    };
		    $scope.closeWorkflowModal = function(){
		    	$scope.showWorkflowModalTrigger = '';
		    };

		    $scope.workflow_tab = 'history';


		}])
		.controller('ProjectSheetsController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService','projectSheets','$stateParams','Upload', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService,projectSheets,$stateParams,Upload){
				  var self = this;

				  $scope.sheetsTabs = 'generals';

				  $scope.tinymceOptions = {
				    plugins: 'link image code table',
				    toolbar: 'undo redo table| bold italic | alignleft aligncenter alignright | code'
				  };

				  self.formatting_contributors = function(){
				  	$scope.users.forEach(function(user){
				  		user.is_selected = false;
				  		$scope.project.project_contributors.forEach(function(contributor){
				  			if(user.id === contributor.user_account.user.id){
				  				user.is_selected = true;
				  				user.assigned_role = contributor.project_contributor_role_id;
				  			}
				  		});
				  		console.log($scope.users);
				  	});
				  };

				  userService.all().then(function(resp){
				  	$scope.users = resp.data.users;
				  	return true;
				  }).then(function(resp){
					  projects.get($stateParams.project_id).then(function(resp){
					  	 $scope.project = resp.data.project;
					  	 $scope.sheet = {
				  	          project_global_review: 'Ajoutez une brève description du projet (10 maximum des lignes.): Le contexte Business, les objectifs du projet, les principales attentes du projet.',
				  	          project: $scope.project
					  	 };
					  	 return true;
					  }).then(function(resp){
						    roleContributorService.all().then(function(resp){
								$scope.roles = resp.data.roles;
					  	        self.formatting_contributors();
							}, function(err){
								toastr.error('Une erreur est survenu, veuillez réessayer');
							});
					  });
				  });



				  // manage actors & modal actors


					$scope.search_actor_sheet = '';

					$scope.addActorSheetObject = function(contributor){
						contributor.is_selected = true;
				    };

					$scope.retireActorSheetObject = function(contributor){
						var r = confirm('Etes-vous sûre de vouloir retirer cet contributeur?');
						if(r == true)
						  contributor.is_selected = false;
				    };

				    $scope.openActorModal = function(){
				    	$scope.addActorModalTrigger = 'is-active';
				    };

				    $scope.closeActorModal = function(){
				    	$scope.addActorModalTrigger = '';
				    };

				  $scope.submit_security_sheet = function(diagram){
				  	var r = confirm('Etes-vous sûre de vouloir soumettre cette fiche?');

				  	if(r == true){
					$scope.is_loading = "is-loading";
						Upload.upload({
							url:'/project-sheets/create',
							data:{'project-sheet':diagram,'contributors':$scope.users}
						}).then(function(resp){
							toastr.success('Fiche créée avec succès');
							$state.go('admins.projects.view',{reload:true});
						}, function(err){
							toastr.error('Une erreur est survenue, veuillez réessayer');
						}, function(evt){

						}).finally(function(){
							$scope.is_loading = '';
						});
				  	}
				  };
		}]).controller('ProjectSheetsEditController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService','projectSheets','$stateParams','Upload', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService,projectSheets,$stateParams,Upload){
				  var self = this;

				  $scope.sheetsTabs = 'generals';

				  $scope.tinymceOptions = {
				    plugins: 'link image code table',
				    toolbar: 'undo redo table| bold italic | alignleft aligncenter alignright | code'
				  };

				  self.formatting_contributors = function(){
				  	$scope.users.forEach(function(user){
				  		user.is_selected = false;
				  		$scope.project.project_contributors.forEach(function(contributor){
				  			if(user.id === contributor.user_account.user.id){
				  				user.is_selected = true;
				  				user.assigned_role = contributor.project_contributor_role_id;
				  			}
				  			
				  		});
				  	});
				  };

				  userService.all().then(function(resp){
				  	$scope.users = resp.data.users;
				  	return true;
				  }).then(function(resp){
					  projectSheets.get($stateParams.project_sheet_id).then(function(resp){
					  	 $scope.project = resp.data.security_sheet.project;
					  	 $scope.security_sheet = resp.data.security_sheet;
					  	 $scope.sheet = $scope.security_sheet.sheet_content;
					  	 $scope.sheet.project = $scope.project;
					  	 console.log($scope.sheet);

					  	 if($scope.sheet.section1){
					  	 	if($scope.sheet.section1.network_diagram)
					  	 		$scope.sheet.section1.network_diagram = null;
					  	 }

						for (var step in $scope.sheet.project_steps) {
							if($scope.sheet.project_steps[step] != 'null'){
						       var date_security_sheet = new Date($scope.sheet.project_steps[step]);
						       $scope.sheet.project_steps[step] = date_security_sheet;
							}else
							   $scope.sheet.project_steps[step] = null;

						}
					  	 return true;
					  }).then(function(resp){
						    roleContributorService.all().then(function(resp){
								$scope.roles = resp.data.roles;
					  	        self.formatting_contributors();
							}, function(err){
								toastr.error('Une erreur est survenu, veuillez réessayer');
							});
					  });
				  });
				  self.is_changing_image = false;
				  $scope.delete_network_diagram = function(){
				  	self.is_changing_image = false;
				  	$scope.sheet.section1.network_diagram_candidate = null;
				  };
				  // manage actors & modal actors
					$scope.search_actor_sheet = '';

					$scope.addActorSheetObject = function(contributor){
						contributor.is_selected = true;
				    };

					$scope.retireActorSheetObject = function(contributor){
						var r = confirm('Etes-vous sûre de vouloir retirer cet contributeur?');
						if(r == true)
						  contributor.is_selected = false;
				    };

				    $scope.openActorModal = function(){
				    	$scope.addActorModalTrigger = 'is-active';
				    };

				    $scope.closeActorModal = function(){
				    	$scope.addActorModalTrigger = '';
				    };

				  $scope.submit_security_sheet = function(diagram){
				  	var r = confirm('Etes-vous sûre de vouloir soumettre cette fiche?');

				  	if(r == true){
					$scope.is_loading = "is-loading";
						Upload.upload({
							url:'/project-sheets/create',
							data:{'project-sheet':diagram,'contributors':$scope.users}
						}).then(function(resp){
							toastr.success('Fiche modifiée avec succès');
							$state.go('admins.projects.view',{reload:true});
						}, function(err){
							toastr.error('Une erreur est survenue, veuillez réessayer');
						}, function(evt){

						}).finally(function(){
							$scope.is_loading = '';
						});
				  	}
				  };
		}]).controller('ProjectRequirementsController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService','projectSheets','$stateParams','Upload', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService,projectSheets,$stateParams,Upload){
				  var self = this;
				  		$scope.is_loading = false;
				  $scope.tinymceOptions = {
				    plugins: 'link table',
				    toolbar: 'undo redo table| bold italic | alignleft aligncenter alignright',
				        theme: "modern",
				  };
				  $scope.project = {};
				  projects.get($stateParams.project_id).then(function(resp){
					  	 $scope.project = resp.data.project;
					  	 $scope.requirement = {
					  	 	project: $scope.project
					  	 }
				  });

				  $scope.create = function(requirement){
				  	var r = confirm('Etes-vous sûre de soumttre cette fiche?');

				  	if(r == true){
				  		$scope.is_loading = true;
				  		Upload.upload({
				  			url:"/project-requirements/create",
				  			data:{'requirement':requirement}
				  		}).then(function(resp){
						      toastr.success("Fiche d'exigences créée avec succès");
						      $state.go('admins.projects.view',{reload:true});
				  		}).finally(function(){
				  			$scope.isloading = false;
				  		});
				  	}
				  };

		}]).controller('ProjectRequirementsEditController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService','projectRequirements','$stateParams','Upload', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService,projectRequirements,$stateParams,Upload){
				  var self = this;
				  		$scope.is_loading = false;
				  $scope.tinymceOptions = {
				    plugins: 'link table',
				    toolbar: 'undo redo table| bold italic | alignleft aligncenter alignright',
				        theme: "modern",
				  };
				  $scope.project = {};
				  projectRequirements.get($stateParams.project_requirement_id).then(function(resp){
					  	 $scope.project = resp.data.security_requirement.project;
					  	 $scope.requirement = resp.data.security_requirement.requirement_content;
					  	 $scope.requirement.project = resp.data.security_requirement.project;
				  });

				  $scope.create = function(requirement){
				  	var r = confirm('Etes-vous sûre de soumttre cette fiche?');

				  	if(r == true){
				  		$scope.is_loading = true;
				  		Upload.upload({
				  			url:"/project-requirements/create",
				  			data:{'requirement':requirement}
				  		}).then(function(resp){
						      toastr.success("Fiche d'exigences créée avec succès");
						      $state.go('admins.projects.view',{reload:true});
				  		}).finally(function(){
				  			$scope.isloading = false;
				  		});
				  	}
				  };

		}]).controller('ProjectAuditRequirementsController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleContributorService','projectRequirements','$stateParams','Upload', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleContributorService,projectRequirements,$stateParams,Upload){
				  var self = this;
				  var self = this;
				  $scope.is_loading = false;

				  $scope.tinymceOptions = {
				    plugins: 'link table',
				    toolbar: 'undo redo table| bold italic | alignleft aligncenter alignright',
				        theme: "modern",
				  };
				  
				  projects.get($stateParams.project_id).then(function(resp){
					  	 $scope.project = resp.data.project;
					  	 $scope.requirement = {
					  	 	project: $scope.project,
							  	matrice:{
							  		flux:'<table class="MsoTableGrid" style="border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 1184; mso-padding-alt: 0cm 5.4pt 0cm 5.4pt;" border="1" cellspacing="0" cellpadding="0">↵<tbody>↵<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">↵<td style="width: 464.3pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: gray; mso-background-themecolor: background1; mso-background-themeshade: 128; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="4" width="619">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%;" align="center"><strong><span style="mso-bidi-font-size: 9.0pt; line-height: 115%; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">Nom du NE [Network Element] </span></strong></p>↵</td>↵</tr>↵<tr style="mso-yfti-irow: 1;">↵<td style="width: 113.55pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%;" align="center"><strong style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="font-size: 10.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: "Helvetica 75",sans-serif;">Public IP 1/Netmask</span></strong></p>↵</td>↵<td style="width: 113.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%;" align="center"><span lang="EN-US" style="font-family: "Helvetica 75",sans-serif;">Gateway</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal"><span lang="EN-US">&nbsp;</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal"><span lang="EN-US">&nbsp;</span></p>↵</td>↵</tr>↵<tr style="mso-yfti-irow: 2;">↵<td style="width: 113.55pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%;" align="center"><strong style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="font-size: 10.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: "Helvetica 75",sans-serif;">Private IP 1/Netmask</span></strong></p>↵</td>↵<td style="width: 113.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%;" align="center"><span lang="EN-US" style="font-family: "Helvetica 75",sans-serif;">Gateway</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal"><span lang="EN-US">&nbsp;</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal"><span lang="EN-US">&nbsp;</span></p>↵</td>↵</tr>↵<tr style="mso…left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal" style="page-break-after: avoid;"><span lang="EN-US">&nbsp;</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal" style="page-break-after: avoid;"><span lang="EN-US">&nbsp;</span></p>↵</td>↵</tr>↵<tr style="mso-yfti-irow: 2;">↵<td style="width: 113.55pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%; page-break-after: avoid;" align="center"><strong style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="font-size: 10.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: "Helvetica 75",sans-serif;">Private IP 1/Netmask</span></strong></p>↵</td>↵<td style="width: 113.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%; page-break-after: avoid;" align="center"><span lang="EN-US" style="font-family: "Helvetica 75",sans-serif;">Gateway</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal" style="page-break-after: avoid;"><span lang="EN-US">&nbsp;</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal" style="page-break-after: avoid;"><span lang="EN-US">&nbsp;</span></p>↵</td>↵</tr>↵<tr style="mso-yfti-irow: 3; mso-yfti-lastrow: yes;">↵<td style="width: 113.55pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%; page-break-after: avoid;" align="center"><strong style="mso-bidi-font-weight: normal;"><span lang="EN-US" style="font-size: 10.0pt; mso-bidi-font-size: 11.0pt; line-height: 115%; font-family: "Helvetica 75",sans-serif;">Private IP 1/Netmask</span></strong></p>↵</td>↵<td style="width: 113.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #31849B; mso-background-themecolor: accent5; mso-background-themeshade: 191; padding: 0cm 5.4pt 0cm 5.4pt;" width="151">↵<p class="MsoNormal" style="margin-bottom: 10.0pt; text-align: center; line-height: 115%; page-break-after: avoid;" align="center"><span lang="EN-US" style="font-family: "Helvetica 75",sans-serif;">Gateway</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal" style="page-break-after: avoid;"><span lang="EN-US">&nbsp;</span></p>↵</td>↵<td style="width: 118.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0cm 5.4pt 0cm 5.4pt;" valign="top" width="158">↵<p class="MsoNormal" style="page-break-after: avoid;"><span lang="EN-US">&nbsp;</span></p>↵</td>↵</tr>↵</tbody>↵</table>',
							  		flux_2:'<table class="MsoNormalTable" style="width: 386.75pt; margin-left: 2.75pt; border-collapse: collapse; mso-yfti-tbllook: 1184; mso-padding-alt: 0cm 3.5pt 0cm 3.5pt;" border="0" width="516" cellspacing="0" cellpadding="0">↵<tbody>↵<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 15.75pt;">↵<td style="width: 128.75pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #C4D79B; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.75pt;" valign="bottom" nowrap="nowrap" width="172">↵<p class="MsoNormal" style="page-break-after: avoid;"><span style="font-size: 9.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">Identifiant ou Nom</span></p>↵</td>↵<td style="width: 123.0pt; border: solid windowtext 1.0pt; border-left: none; mso-border-top-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; background: #C4D79B; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.75pt;" valign="bottom" nowrap="nowrap" width="164">↵<p class="MsoNormal" style="page-break-after: avoid;"><span style="font-size: 9.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">IP Adress</span></p>↵</td>↵<td style="width: 135.0pt; border: solid windowtext 1.0pt; border-left: none; mso-border-top-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; background: #C4D79B; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.75pt;" valign="bottom" nowrap="nowrap" width="180">↵<p class="MsoNormal" style="page-break-after: avoid;"><span style="font-size: 9.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">Interface</span></p>↵</td>↵</tr>↵<tr style="mso-yfti-irow: 1; height: 15.0pt;">↵<td style="width: 128.75pt; border: solid windowtext 1.0pt; border-top: none; mso-border-left-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">&nbsp;</td>↵<td style="width: 123.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="164">&nbsp;</td>↵<td style="width: 135.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="180">&nbsp;</td>↵</tr>↵<tr style="mso-yfti-irow: 2; height: 15.0pt;">↵<td style="width: 128.75pt; border: solid windowtext 1.0pt; border-top: none; mso-border-left-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">&nbsp;</td>↵<td style="width: 123.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="164">&nbsp;</td>↵<td style="width: 135.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="180">&nbsp;</td>↵</tr>↵<tr style="mso-yfti-irow: 3; height: 15.0pt;">↵<td style="width: 128.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">&nbsp;</td>↵<td style="width: 123.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="164">&nbsp;</td>↵<td style="width: 135.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="180">&nbsp;</td>↵</tr>↵<tr style="mso-yfti-irow: 4; height: 15.0pt;">↵<td style="width: 128.75pt; background: #FABF8F; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">↵<p class="MsoNormal" style="page-break-after: avoid;"><strong><span style="font-size: 10.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">WAN</span></strong></p>↵</td>↵<td style="width: 123.0pt; background: #FABF8F; p…-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 54.0pt;" nowrap="nowrap" width="172">&nbsp;</td>↵<td style="width: 123.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 54.0pt;" width="164">&nbsp;</td>↵<td style="width: 135.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 54.0pt;" width="180">&nbsp;</td>↵</tr>↵<tr style="mso-yfti-irow: 7; height: 15.0pt;">↵<td style="width: 128.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">&nbsp;</td>↵<td style="width: 123.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="164">&nbsp;</td>↵<td style="width: 135.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="180">&nbsp;</td>↵</tr>↵<tr style="mso-yfti-irow: 8; height: 15.0pt;">↵<td style="width: 128.75pt; background: #FABF8F; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">↵<p class="MsoNormal" style="page-break-after: avoid;"><strong><span style="font-size: 10.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">INSIDE</span></strong></p>↵</td>↵<td style="width: 123.0pt; background: #FABF8F; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="164">↵<p class="MsoNormal" style="page-break-after: avoid;"><strong><span style="font-size: 10.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">WAN</span></strong></p>↵</td>↵<td style="width: 135.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="180">&nbsp;</td>↵</tr>↵<tr style="mso-yfti-irow: 9; height: 15.0pt;">↵<td style="width: 128.75pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #C4D79B; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="172">↵<p class="MsoNormal" style="page-break-after: avoid;"><strong><span style="font-size: 10.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">Source </span></strong></p>↵</td>↵<td style="width: 123.0pt; border: solid windowtext 1.0pt; border-left: none; mso-border-top-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; background: #C4D79B; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="164">↵<p class="MsoNormal" style="page-break-after: avoid;"><strong><span style="font-size: 10.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">Destination</span></strong></p>↵</td>↵<td style="width: 135.0pt; border: solid windowtext 1.0pt; border-left: none; mso-border-top-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; background: #C4D79B; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" valign="bottom" nowrap="nowrap" width="180">↵<p class="MsoNormal" style="page-break-after: avoid;"><strong><span style="font-size: 10.0pt; font-family: "Century Gothic",sans-serif; mso-fareast-font-family: "Times New Roman"; color: black; mso-ansi-language: FR; mso-fareast-language: FR;">Services ou Port </span></strong></p>↵</td>↵</tr>↵<tr style="mso-yfti-irow: 10; mso-yfti-lastrow: yes; height: 71.25pt;">↵<td style="width: 128.75pt; border: solid windowtext 1.0pt; border-top: none; mso-border-left-alt: solid windowtext .5pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 71.25pt;" width="172">&nbsp;</td>↵<td style="width: 123.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 71.25pt;" nowrap="nowrap" width="164">&nbsp;</td>↵<td style="width: 135.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-bottom-alt: solid windowtext .5pt; mso-border-right-alt: solid windowtext .5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 71.25pt;" width="180">&nbsp;</td>↵</tr>↵</tbody>↵</table>'
							  	}
					  	 }
				  });

				  $scope.create = function(requirement){
				  	var r = confirm('Etes-vous sûre de soumttre cette fiche?');

				  	if(r == true){
				  		// $scope.is_loading = true;
				  		Upload.upload({
				  			url:"/project-audit-requirements/create",
				  			data:{'requirement':requirement}
				  		}).then(function(resp){
						      toastr.success("Fiche de prérequis audit créée avec succès");
						      $state.go('admins.projects.view',{reload:true});
				  		}).finally(function(){
				  			// $scope.isloading = false;
				  		});
				  	}
				  	console.log(requirement);
				  };

		}]).controller('AccountsController',['$scope','roleAccountService','Upload','$state', function($scope,roleAccountService,Upload,$state){
			roleAccountService.all().then(function(resp){
				$scope.roles = resp.data.roles;
			});

			$scope.upload = function(user){
				var r = confirm('Etes-vous sûre de vouloir créer un nouvel utilisateur');
				if(r == true)
				{
					$scope.is_loading = "is-loading";
					Upload.upload({
						url:'/users/create',
						data:{'user':user}
					}).then(function(resp){
						toastr.success('Compte créé avec succès');
						$state.go('admins.accounts.view',{reload:true});
					}, function(err){
						toastr.error('Une erreur est survenue, veuillez réessayer');
					}, function(evt){

					}).finally(function(){
						$scope.is_loading = '';
					});
				}

			};



		}]).controller('ProfilesEditController',['$scope','userService','profileService','roleAccountService','Upload', function($scope,userService,profileService,roleAccountService,Upload){
			
			var self  = this;
			self.is_changing_image = false;
			profileService.all().then(function(resp){
				$scope.profile = resp.data.profile;
			}, function(err){
				toastr.error('Une erreur est survenue, veuillez réessayer');
			});			

			roleAccountService.all().then(function(resp){
				$scope.roles = resp.data.roles;
			});

			$scope.delete_user_account_avatar_candidate = function(){
				self.is_changing_image = false;
				$scope.profile.user_account_avatar_candidate = null;
			};

			$scope.update = function(profile){
				var r = confirm('Etes-vous sûre de vouloir modifier vos informations de compte?');
				if(r == true){
					if($scope.profile.user_account_avatar_candidate == null)
						delete $scope.profile.user_account_avatar_candidate;

					$scope.isloading = true;
					Upload.upload({
						url:'/profiles/edit',
						data:{'profile':profile}
					}).then(function(resp){

					}, function(err){

					}, function(evt){

					}).finally(function(){
						$scope.isloading = false;
					});
				}
			};
		}]).controller('AccountsViewController',['$scope','userService','AccountService', function($scope,userService,AccountService){
  				userService.all().then(function(resp){
				  	$scope.users = resp.data.users;
				});
				$scope.openViewModal = function(user){
					$scope.openViewModalTrigger = 'is-active';
					$scope.info_user = user;
				};

				$scope.closeViewModalTrigger = function(){
					$scope.openViewModalTrigger = '';
				};

			$scope.lock_user_account_trigger = function(user_account_id,user_account){
				var r = confirm('Etes-vous sûre de verrouiller cet utilisateur ?');
				if(r === true){
					AccountService.unlock(user_account_id).then(function(resp){
						toastr.success('Modifications réalisées avec succès');
						console.log(user_account);
						if(user_account.user_account_is_active == true)
							user_account.user_account_is_active = false;
						else
							user_account.user_account_is_active = true;

					}, function(){
						toastr.error('Une erreur est survenue, veuillez réessayer');
					});
				}
			};

			$scope.reinit_passsword = function(user_account_id){
				var r = confirm('Etes-vous sûre de vouloir réinitialiser le mot de passe de cet utilisateur?');
				if(r == true){
					AccountService.renew_password(user_account_id).then(function(resp){
						toastr.success('Réinitialisation réalisée avec succès');
					}, function(err){
							toastr.error('Une erreur est survenue, veuillez réessayer');
					});
				}
			};
		}]).controller('AccountsEditController',['$scope','userService','roleAccountService','Upload','AccountService','$stateParams', function($scope,userService,roleAccountService,Upload,AccountService,$stateParams){
			
			var self  = this;
			self.is_changing_image = false;
			self.is_changing_image_avatar = false;
			$scope.user = {};
			// load account info
			AccountService.get($stateParams.user_id).then(function(resp){
				$scope.user = resp.data.user;
			}, function(err){
				toastr.error('Une erreur est survenue, veuillez réessayer');
			});

			roleAccountService.all().then(function(resp){
				$scope.roles = resp.data.roles;
			});

			$scope.delete_user_photo_candidate = function(){
				self.is_changing_image = false;
				$scope.user.user_photo_candidate = null;
			};

			$scope.delete_user_avatar_candidate = function(){
				self.is_changing_image_avatar = false;
				$scope.user.user_accounts[0].user_account_avatar_candidate = null;
			};

			

			$scope.update = function(profile){
				var r = confirm('Etes-vous sûre de vouloir modifier les informations de utilisateur?');
				if(r == true){
				$scope.is_loading = 'is-loading';

					if($scope.user.user_photo_candidate == null)
						delete $scope.user.user_photo_candidate;
					
					$scope.isloading = true;
					Upload.upload({
						url:'/accounts/edit',
						data:{'profile':profile}
					}).then(function(resp){
						toastr.success('modifications réalisées avec succès');
						$state.go('admins.accounts.view',{reload:true});
					}, function(err){
						toastr.error('Une erreur est survenue, veuillez réessayer');
					}, function(evt){

					}).finally(function(){
						$scope.is_loading = '';				
					});
				}
			};




		}])