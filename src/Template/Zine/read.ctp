<?php $this->layout=false; ?>
<!doctype html>
<html ng-app="zine" ng-controller="ZineCtrl as zinectrl">
<head>
    <title>Orange Security Projects</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="IE=Edge" http-equiv="X-UA-Compatible"></meta>
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
    <style type="text/css" media="screen">
        html, body	{ height:100%; }
        body { margin:0; padding:0; overflow:auto;}
        .infoBox > * {font-family:Lato;}
        #flashContent { display:none; }
    </style>
    <?= $this->Html->meta('favicon.png','/img/favicon.png',['type'=>'icon']) ?>
    
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <?= $this->Html->css('../flowpaper/css/flowpaper') ?>


    <?= $this->Html->script('../flowpaper/js/jquery.min') ?>
    <?= $this->Html->script('../flowpaper/js/jquery.extensions.min') ?>
    <?= $this->Html->script('../flowpaper/js/three.min') ?>
    <?= $this->Html->script('../flowpaper/js/flowpaper') ?>
    <?= $this->Html->script('../flowpaper/js/flowpaper_handlers') ?>

<style type="text/css">
    .flowpaper_viewer_container{
        background:url('/webroot/img/assets/background/back.jpg') !important;
    }
    .red-text{
        color: red;
    }
</style>


</head>
<body>
<div id="documentViewer" class="flowpaper_viewer" style="position:absolute;width:100%;height:100%;" > 
</div>


<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script>
    $(document).ready(function(){
            $('#documentViewer').FlowPaperViewer(
            { config : {
                PDFFile : "<?= $path ?>",
                cssDirectory:"/webroot/flowpaper/css/",
                jsDirectory:"/webroot/flowpaper/js/",
                localeDirectory:"/webroot/flowpaper/locale/",
                Scale : 1,
                ZoomTransition : 'easeOut',
                ZoomTime : 0.5,
                ZoomInterval : 0.1,
                FitPageOnLoad : true,
                // FitWidthOnLoad : false,
                FullScreenAsMaxWindow : true,
                ProgressiveLoading : true,
                MinZoomSize : 1,
                MaxZoomSize : 5,
                SearchMatchAll : false,
                InitViewMode : '',
                RenderingOrder : 'html5,html',
                StartAtPage : '',

                EnableWebGL : true,
                ViewModeToolsVisible : true,
                ZoomToolsVisible : true,
                NavToolsVisible : true,
                CursorToolsVisible : true,
                SearchToolsVisible : true,
                WMode : 'transparent',
                localeChain: 'fr_FR'
                }}
           );
    });

</script>
</body>
</html>