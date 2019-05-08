<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=ASSETS?>images/favicon.png">
    <title>Bitouel - Votre assureur partenaire</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=ASSETS?>node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- This is for the animation CSS -->
    <link href="<?=ASSETS?>node_modules/aos/dist/aos.css" rel="stylesheet">
    <!-- This page slider css -->
    <link href="<?=ASSETS?>node_modules/bootstrap-touch-slider/bootstrap-touch-slider.css" rel="stylesheet" media="all">
    <link href="<?=ASSETS?>node_modules/owl.carousel/dist/assets/owl.theme.green.css" rel="stylesheet">
    <!-- This css we made it from our predefine componenet 
    we just copy that css and paste here you can also do that -->
    <link href="<?=ASSETS?>css/demo.css" rel="stylesheet">

    <link href="<?=ASSETS?>css/headers1-10.css" rel="stylesheet">    
    <link href="<?=ASSETS?>css/slider10.css" rel="stylesheet">    
    <!-- Common style CSS -->
    <link href="<?=ASSETS?>css/style.css" rel="stylesheet">
    <link href="<?=ASSETS?>css/CustomStyle.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
        if (!is_null($contentCss)) {
           echo $contentCss;
        }
    ?>
</head>
