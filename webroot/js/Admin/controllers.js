angular.module('oci_controllers',[])
		.controller('AdminsController',['$scope', function($scope){

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

		}]).controller('ProjectsController',['$scope','project_types','projects','$state', function($scope,project_types,projects,$state){
			$scope.project =  {
				project_create_card: true
			};
			project_types.all().then(function(resp){
				$scope.project_types = resp.data.projects_types;
				console.log($scope.project_types);
			});

			$scope.create = function (project){
				projects.create(project).then(function(resp){
					// $state.go('admins.projects-sheets.create',{reload:true});
				});
			};
		}]).controller('ProjectSheetsController',['$scope','project_types','projects','$state','$templateCache','$compile','userService','roleService', function($scope,project_types,projects,$state,$templateCache,$compile,userService,roleService){
			  $scope.current_state = $state.current.name;

			  if($scope.current_state === "admins.projects-sheets.create"){
				  $scope.sheetsTabs = 'generals';

				  $scope.tinymceOptions = {
				    plugins: 'link image code table',
				    toolbar: 'undo redo table| bold italic | alignleft aligncenter alignright | code'
				  };

				  $scope.sheet = {
				  	project_global_review: 'Ajoutez une brève description du projet (10 maximum des lignes.): Le contexte Business, les objectifs du projet, les principales attentes du projet.'
				  };

				  userService.all().then(function(resp){
				  	$scope.users = resp.data.users;
				  });

				  roleService.all().then(function(resp){
				  	$scope.roles = resp.data.roles;
				  });

				  $scope.addActorSheet = function(){
					  childScope = $scope.$new();
					  var recursiveFields = $("<div actor-add-item-directive></div>");
					  recursiveFields.insertAfter('#actor_area');
					  $compile(recursiveFields)(childScope);
					  $templateCache.removeAll();
				  };

				  $scope.submit_security_sheet = function(diagram){
				  		console.log(diagram);
				  };
			  }
		}])