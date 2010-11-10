<?php
require_once('headers/futurama.php');
$header = Futurama::get_header();
header($header[0].': '.$header[1]);

$ff = stripos($_SERVER['HTTP_USER_AGENT'], 'firefox') !== False;

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
  <title>X-Futurama Firefox extension</title>
  <meta name="description" content="Firefox extension that shows X-Bender, X-Fry, X-Leela, X-Professor-Farnsworth and X-Zapp-Brannigan HTTP headers.">
  <style type="text/css">
body {background:#53f28f;margin:0;font-family:"helvetica neue",arial,helvetica,sans-serif;font-size:100%;}
#what-if-machine {height:450px;margin-top:30px;}
#go-faster-stripe {height:20px;background-color:red;border-top:2px solid black;border-bottom:2px solid black;margin-bottom:20px;}
#go-faster-stripe .shade {background-color:#bd0000;height:10px;margin-top:10px;}
#quote {color:white;height:0;margin:auto;position:relative;text-align:center;text-transform:uppercase;top: 235px;width:450px;}
.add-button {-moz-border-radius:13px 13px 13px 13px;-moz-box-shadow:0 0 1px rgba(255, 255, 255, 0.1) inset;background:-moz-linear-gradient(center top , #93C85E 30%, #55A802 55%) repeat scroll 0 0 transparent;border:1px groove #3A7404;color:white;display:table;padding:0 0.5em;text-decoration:none;text-shadow:0 -1px 0 #3A7404;float:right;margin-top:7px;}
.add-button:hover {border-color:#1a5404;}
.add-button span {border-left:2px groove rgba(150, 150, 150, 0.35);display:inline-block;line-height:1.2;margin:0 0.25em 0 0.25em;padding:0.3em 0.5em 0.2em 0.65em;white-space:normal;display:table;padding: 0 0.5em;text-decoration:none;text-shadow:0 -1px 0 #3A7404;float:right;margin-top:7px;}
.download-button {-webkit-border-radius:13px;-webkit-box-shadow: #C0E1EE 0px 0px 3px inset;background:white none;border:1px groove #B5D9E5;color:#859FAE;text-shadow: white 0px 1px 0px;display:table;padding: 0 0.5em;text-decoration:none;float:right;margin-top:7px;}
.download-button span {border-left:2px groove rgba(150, 150, 150, 0.35);display:inline-block;line-height:1.2;margin:0 0.25em 0 0.25em;padding:0.3em 0.5em 0.2em 0.65em;white-space:normal;display:table;padding: 0 0.5em;text-decoration:none;text-shadow:0 -1px 0 #859FAE;float:right;margin-top:7px;}
#download-wrapper {-moz-border-radius:5px;background-color:white;border:2px solid grey;color:#444444;display:table;margin-top:20px;margin:auto;padding:0 20px 20px 20px;width:510px;}
a {color:#003595;text-decoration:none;}
#download-wrapper img {float:left;margin-right:10px;}
#download-wrapper p {margin:0;padding-bottom:15px;text-align:justify;}
table {font-size:85%;border-collpase:collapse;border-spacing:0;padding-bottom:20px;}
th, td {padding:5px 0;vertical-align:top;}
.divider th, .divider td {border-top:1px dotted #A5C9D5;}
th {color:#223355;text-align:left;padding-right:20px;}
td h2 {font-size:100%;font-weight:normal;padding:0;margin:0;}
#hull {padding-bottom:20px;}
  </style>
</head>
<body>
  <div id="what-if-machine">
    <div style="margin:auto;display:table;">
      <div id="quote"><?php echo strtr(substr($header[0],2), '-', ' ').': <strong>'.$header[1] ?></strong></div>
      <img src="what-if-machine.png" alt="What if machine" height="433" width="706"/>
    </div>
  </div>
  <div id="go-faster-stripe"><div class="shade"></div></div>
  <div id="hull">
    <div id="download-wrapper">
      <h1>X-Futurama</h1>
      <img src="icon.png" alt="X-Futurama Firefox extension icon"/>
      <p>Some websites, including this one, add a quote from Futurama to the <a href="http://en.wikipedia.org/wiki/List_of_HTTP_header_fields#Common_non-standard_headers">HTTP headers</a>.  If you are visiting a site that has these headers this Firefox extenstion shows the quote in the status bar.</p>
      <table>
        <tbody>
          <tr>
            <th>Current&nbsp;Version</th><td>1.0</td>
          </tr>
          <tr class="divider">
            <th>Works&nbsp;with</th><td>Firefox 1.5 - 3.6</td>
          </tr>
          <tr class="divider">
            <th>Recognised&nbsp;headers</th><td><h2>X-Bender, X-Fry, X-Leela, X-Professor-Farnsworth and X-Zapp-Brannigan</h2></td>
          </tr>
        </tbody>
      </table>
      <img src="preview.png" title="Bender: Behold, the internet." alt="X-Bender: Behold, the internet."/>
      <?php if ($ff) : ?>
        <a title="Add this extension to your copy of Firefox" href="xfuturama.1.0.xpi" class="add-button"><b>+</b><span>Add to Firefox</span></a>
      <?php else: ?>
        <a title="Download this extension" href="xfuturama.1.0.xpi" class="download-button"><b>&darr;</b><span>Download</span></a>
      <?php endif ?>
    </div>
  </div>
</body>
