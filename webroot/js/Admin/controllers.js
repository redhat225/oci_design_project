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

		}])
		.controller('ProjectsController',['$scope','project_types', function($scope,project_types){

			project_types.all().then(function(resp){
				$scope.project_types = resp.data.projects_types;
				console.log($scope.project_types);
			});

			$scope.create = function (project){
				console.log(project);
			};
		}])