
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
	<style>
			@media screen,print {
			  .new-page {
			    page-break-before: always;
			  }
			}
	</style>
    <base href="/var/www/oci_design_project/webroot/">
    <!-- assets -->
     <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="node_modules/bulma/custom_bulma.css">
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <?= $this->fetch('content') ?>

</body>
</html>



















