
<!DOCTYPE html>
<html>
<head>
    <base href="/var/www/oci_design_project/webroot/">
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Ticket Projet
    </title>
	<style>
			@media print {
			  .new-page {
			    page-break-before: always;
			  }
			}
	</style>

    <link href="node_modules/bulma/custom_bulma.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <link href="node_modules/angular-colorbox/themes/dark/colorbox-darktheme.css" type="text/css" rel="stylesheet" />
    <link href="css/loading-bar-custom.css" type="text/css" rel="stylesheet" />
    <link href="node_modules/hover.css/css/hover-min.css" type="text/css" rel="stylesheet" />
    <link href="node_modules/toastr/build/toastr.min.css" type="text/css" rel="stylesheet" />


    <?= $this->fetch('css') ?>
    <script
      src="https://code.jquery.com/jquery-1.11.2.min.js"
      integrity="sha256-Ls0pXSlb7AYs7evhd+VLnWsZ/AqEHcXBeMZUycz/CcA="
      crossorigin="anonymous"></script>
      <script src="bower_components/tinymce/tinymce.js"></script>
      <script src="node_modules/angular-colorbox/bower_components/jquery-colorbox/jquery.colorbox.js"></script>
      <script src="/node_modules/angular/angular.min.js"></script>

      <script src="node_modules/@uirouter/angularjs/release/angular-ui-router.min.js"></script>
      <script src="node_modules/toastr/build/toastr.min.js"></script>
      <script src="node_modules/ng-file-upload/dist/ng-file-upload-all.min.js"></script>
      <script src="node_modules/angular-loading-bar/src/loading-bar.js"></script>


      <script src="bower_components/angular-ui-tinymce/src/tinymce.js"></script>
      <script src="node_modules/angular-colorbox/js/angular-colorbox.js"></script>
      <script src="node_modules/chart.js/dist/Chart.min.js"></script>

      <script src="node_modules/angular-chart.js/dist/angular-chart.min.js"></script>
      <script src="node_modules/angular-loading-bar/src/loading-bar.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
</head>
<body ng-app="generator" ng-controller="MainCtrl">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quisquam voluptatem possimus aut quas! Adipisci nesciunt error voluptatibus quia, dolores consequuntur, voluptatem cupiditate dicta est consequatur quis ipsa quasi, fuga. {{mock}}

    <script>
        angular.module('generator',[])
                .controller('MainCtrl',['$scope', function($scope){
                    $scope.mock = 'yeaah';
                }])
    </script>
</body>
</html>



















