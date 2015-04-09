<?php
//$dir = dirname(__FILE__);
$dirCss1 = "./bootstrap/css/bootstrap.css";
$dirCss2= "./bootstrap/css/bootstrap-theme.css";
$dirJs = "./bootstrap/js/bootstrap.js";
$dirJquery = "./bootstrap/js/jquery.js";
echo "  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<title>Synapse for Hasi</title>
	 <link href=\"\" rel=\"stylesheet\">
    <link href=\"$dirCss1.\" rel=\"stylesheet\">
    <link href=\"$dirCss2\" rel=\"stylesheet\">
    <script src=\"$dirJquery\"></script>
    <script src=\"$dirJs\"></script>
	</head>
	<body class=\"post-template page\">
    <nav class=\"navbar navbar-inverse navbar-fixed-top\">
        <div class=\"container\">
          <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
              <span class=\"sr-only\">Toggle navigation</span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
              <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"#\">Synapse for Hasi</a>
          </div>
          <div class=\"navbar-collapse collapse\">
            <ul class=\"nav navbar-nav\">
              <li class=\"active\"><a href=\"./index.php\">主页</a></li>
			  
              
              <li><a href=\"./donate-list.php\">捐助名单</a></li>  
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    ";
//include('logo.php');
?>