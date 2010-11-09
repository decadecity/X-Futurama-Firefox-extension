<?php
require_once('headers/futurama.php');
$header = Futurama::get_header();
header($header[0].': '.$header[1]);
?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="<?php echo $header[0] ?>" content="<?php echo $header[1] ?>">
  <title></title>
  <meta name="description" content="">
  <meta name="author" content="">
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <style type="text/css">
body { background: #53f28f; margin:0; }

#what-if-machine {
  height: 450px;
  margin-top:30px;
}

#go-faster-stripe {
  height: 20px;
  background-color: red;
  border-top: 2px solid black;
  border-bottom: 2px solid black;
}

#go-faster-stripe .shade {
  background-color: #bd0000;
  height:10px;
  margin-top:10px;
}

#quote {
  position: relative;
  top: 235px;
  text-transform:uppercase;
  font-weight:bold;
  color:white;
  text-align:center;
  width:450px;
  margin:auto;
  height:0;
}
  </style>
</head>
<body>
<div id="what-if-machine">
  <div style="margin:auto;display:table;">
  <div id="quote"><?php echo strtr(substr($header[0],2), '-', ' ').': '.$header[1] ?></div>
  <img src="what-if-machine.png" height="433" width="706"/>
  </div>
</div>
<div id="go-faster-stripe"><div class="shade"></div></div>
<div id="hull"></div>
</body>
