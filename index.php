<?php require_once('Connections/wistream.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_wistream, $wistream);
$query_rsPolitics = "SELECT * FROM content WHERE category = 'politics' ORDER BY id DESC";
$rsPolitics = mysql_query($query_rsPolitics, $wistream) or die(mysql_error());
$row_rsPolitics = mysql_fetch_assoc($rsPolitics);
$totalRows_rsPolitics = mysql_num_rows($rsPolitics);

mysql_select_db($database_wistream, $wistream);
$query_rsEnter = "SELECT * FROM content WHERE category = 'entertainment' ORDER BY id DESC";
$rsEnter = mysql_query($query_rsEnter, $wistream) or die(mysql_error());
$row_rsEnter = mysql_fetch_assoc($rsEnter);
$totalRows_rsEnter = mysql_num_rows($rsEnter);

mysql_select_db($database_wistream, $wistream);
$query_rsTech = "SELECT * FROM content WHERE category = 'tech' ORDER BY id DESC";
$rsTech = mysql_query($query_rsTech, $wistream) or die(mysql_error());
$row_rsTech = mysql_fetch_assoc($rsTech);
$totalRows_rsTech = mysql_num_rows($rsTech);

mysql_select_db($database_wistream, $wistream);
$query_rsBusiness = "SELECT * FROM content WHERE category = 'business' ORDER BY id DESC";
$rsBusiness = mysql_query($query_rsBusiness, $wistream) or die(mysql_error());
$row_rsBusiness = mysql_fetch_assoc($rsBusiness);
$totalRows_rsBusiness = mysql_num_rows($rsBusiness);

$maxRows_rsLstyle = 12;
$pageNum_rsLstyle = 0;
if (isset($_GET['pageNum_rsLstyle'])) {
  $pageNum_rsLstyle = $_GET['pageNum_rsLstyle'];
}
$startRow_rsLstyle = $pageNum_rsLstyle * $maxRows_rsLstyle;

mysql_select_db($database_wistream, $wistream);
$query_rsLstyle = "SELECT * FROM content WHERE category = 'lifestyle' ORDER BY id DESC";
$query_limit_rsLstyle = sprintf("%s LIMIT %d, %d", $query_rsLstyle, $startRow_rsLstyle, $maxRows_rsLstyle);
$rsLstyle = mysql_query($query_limit_rsLstyle, $wistream) or die(mysql_error());
$row_rsLstyle = mysql_fetch_assoc($rsLstyle);

if (isset($_GET['totalRows_rsLstyle'])) {
  $totalRows_rsLstyle = $_GET['totalRows_rsLstyle'];
} else {
  $all_rsLstyle = mysql_query($query_rsLstyle);
  $totalRows_rsLstyle = mysql_num_rows($all_rsLstyle);
}
$totalPages_rsLstyle = ceil($totalRows_rsLstyle/$maxRows_rsLstyle)-1;

mysql_select_db($database_wistream, $wistream);
$query_rsSport = "SELECT * FROM content WHERE category = 'sports' ORDER BY id DESC";
$rsSport = mysql_query($query_rsSport, $wistream) or die(mysql_error());
$row_rsSport = mysql_fetch_assoc($rsSport);
$totalRows_rsSport = mysql_num_rows($rsSport);

$maxRows_rsSportr = 12;
$pageNum_rsSportr = 0;
if (isset($_GET['pageNum_rsSportr'])) {
  $pageNum_rsSportr = $_GET['pageNum_rsSportr'];
}
$startRow_rsSportr = $pageNum_rsSportr * $maxRows_rsSportr;

mysql_select_db($database_wistream, $wistream);
$query_rsSportr = "SELECT * FROM content WHERE category = 'sports' ORDER BY id DESC";
$query_limit_rsSportr = sprintf("%s LIMIT %d, %d", $query_rsSportr, $startRow_rsSportr, $maxRows_rsSportr);
$rsSportr = mysql_query($query_limit_rsSportr, $wistream) or die(mysql_error());
$row_rsSportr = mysql_fetch_assoc($rsSportr);

if (isset($_GET['totalRows_rsSportr'])) {
  $totalRows_rsSportr = $_GET['totalRows_rsSportr'];
} else {
  $all_rsSportr = mysql_query($query_rsSportr);
  $totalRows_rsSportr = mysql_num_rows($all_rsSportr);
}
$totalPages_rsSportr = ceil($totalRows_rsSportr/$maxRows_rsSportr)-1;

$maxRows_rsTechr = 12;
$pageNum_rsTechr = 0;
if (isset($_GET['pageNum_rsTechr'])) {
  $pageNum_rsTechr = $_GET['pageNum_rsTechr'];
}
$startRow_rsTechr = $pageNum_rsTechr * $maxRows_rsTechr;

mysql_select_db($database_wistream, $wistream);
$query_rsTechr = "SELECT * FROM content WHERE category = 'tech' ORDER BY id DESC";
$query_limit_rsTechr = sprintf("%s LIMIT %d, %d", $query_rsTechr, $startRow_rsTechr, $maxRows_rsTechr);
$rsTechr = mysql_query($query_limit_rsTechr, $wistream) or die(mysql_error());
$row_rsTechr = mysql_fetch_assoc($rsTechr);

if (isset($_GET['totalRows_rsTechr'])) {
  $totalRows_rsTechr = $_GET['totalRows_rsTechr'];
} else {
  $all_rsTechr = mysql_query($query_rsTechr);
  $totalRows_rsTechr = mysql_num_rows($all_rsTechr);
}
$totalPages_rsTechr = ceil($totalRows_rsTechr/$maxRows_rsTechr)-1;

$maxRows_rsTrend = 12;
$pageNum_rsTrend = 0;
if (isset($_GET['pageNum_rsTrend'])) {
  $pageNum_rsTrend = $_GET['pageNum_rsTrend'];
}
$startRow_rsTrend = $pageNum_rsTrend * $maxRows_rsTrend;

mysql_select_db($database_wistream, $wistream);
$query_rsTrend = "SELECT * FROM content WHERE category = 'trends' ORDER BY id DESC";
$query_limit_rsTrend = sprintf("%s LIMIT %d, %d", $query_rsTrend, $startRow_rsTrend, $maxRows_rsTrend);
$rsTrend = mysql_query($query_limit_rsTrend, $wistream) or die(mysql_error());
$row_rsTrend = mysql_fetch_assoc($rsTrend);

if (isset($_GET['totalRows_rsTrend'])) {
  $totalRows_rsTrend = $_GET['totalRows_rsTrend'];
} else {
  $all_rsTrend = mysql_query($query_rsTrend);
  $totalRows_rsTrend = mysql_num_rows($all_rsTrend);
}
$totalPages_rsTrend = ceil($totalRows_rsTrend/$maxRows_rsTrend)-1;

$maxRows_rsEnterr = 12;
$pageNum_rsEnterr = 0;
if (isset($_GET['pageNum_rsEnterr'])) {
  $pageNum_rsEnterr = $_GET['pageNum_rsEnterr'];
}
$startRow_rsEnterr = $pageNum_rsEnterr * $maxRows_rsEnterr;

mysql_select_db($database_wistream, $wistream);
$query_rsEnterr = "SELECT * FROM content WHERE category = 'entertainment' ORDER BY id DESC";
$query_limit_rsEnterr = sprintf("%s LIMIT %d, %d", $query_rsEnterr, $startRow_rsEnterr, $maxRows_rsEnterr);
$rsEnterr = mysql_query($query_limit_rsEnterr, $wistream) or die(mysql_error());
$row_rsEnterr = mysql_fetch_assoc($rsEnterr);

if (isset($_GET['totalRows_rsEnterr'])) {
  $totalRows_rsEnterr = $_GET['totalRows_rsEnterr'];
} else {
  $all_rsEnterr = mysql_query($query_rsEnterr);
  $totalRows_rsEnterr = mysql_num_rows($all_rsEnterr);
}
$totalPages_rsEnterr = ceil($totalRows_rsEnterr/$maxRows_rsEnterr)-1;

$maxRows_rsPoliticsr = 12;
$pageNum_rsPoliticsr = 0;
if (isset($_GET['pageNum_rsPoliticsr'])) {
  $pageNum_rsPoliticsr = $_GET['pageNum_rsPoliticsr'];
}
$startRow_rsPoliticsr = $pageNum_rsPoliticsr * $maxRows_rsPoliticsr;

mysql_select_db($database_wistream, $wistream);
$query_rsPoliticsr = "SELECT * FROM content WHERE category = 'politics' ORDER BY id DESC";
$query_limit_rsPoliticsr = sprintf("%s LIMIT %d, %d", $query_rsPoliticsr, $startRow_rsPoliticsr, $maxRows_rsPoliticsr);
$rsPoliticsr = mysql_query($query_limit_rsPoliticsr, $wistream) or die(mysql_error());
$row_rsPoliticsr = mysql_fetch_assoc($rsPoliticsr);

if (isset($_GET['totalRows_rsPoliticsr'])) {
  $totalRows_rsPoliticsr = $_GET['totalRows_rsPoliticsr'];
} else {
  $all_rsPoliticsr = mysql_query($query_rsPoliticsr);
  $totalRows_rsPoliticsr = mysql_num_rows($all_rsPoliticsr);
}
$totalPages_rsPoliticsr = ceil($totalRows_rsPoliticsr/$maxRows_rsPoliticsr)-1;

mysql_select_db($database_wistream, $wistream);
$query_rsworldr = "SELECT * FROM content WHERE category = 'world' ORDER BY id DESC";
$rsworldr = mysql_query($query_rsworldr, $wistream) or die(mysql_error());
$row_rsworldr = mysql_fetch_assoc($rsworldr);
$totalRows_rsworldr = mysql_num_rows($rsworldr);

$maxRows_rsWorld = 20;
$pageNum_rsWorld = 0;
if (isset($_GET['pageNum_rsWorld'])) {
  $pageNum_rsWorld = $_GET['pageNum_rsWorld'];
}
$startRow_rsWorld = $pageNum_rsWorld * $maxRows_rsWorld;

mysql_select_db($database_wistream, $wistream);
$query_rsWorld = "SELECT * FROM content WHERE category = 'world' ORDER BY id DESC";
$query_limit_rsWorld = sprintf("%s LIMIT %d, %d", $query_rsWorld, $startRow_rsWorld, $maxRows_rsWorld);
$rsWorld = mysql_query($query_limit_rsWorld, $wistream) or die(mysql_error());
$row_rsWorld = mysql_fetch_assoc($rsWorld);

if (isset($_GET['totalRows_rsWorld'])) {
  $totalRows_rsWorld = $_GET['totalRows_rsWorld'];
} else {
  $all_rsWorld = mysql_query($query_rsWorld);
  $totalRows_rsWorld = mysql_num_rows($all_rsWorld);
}
$totalPages_rsWorld = ceil($totalRows_rsWorld/$maxRows_rsWorld)-1;

$maxRows_rsJobs = 12;
$pageNum_rsJobs = 0;
if (isset($_GET['pageNum_rsJobs'])) {
  $pageNum_rsJobs = $_GET['pageNum_rsJobs'];
}
$startRow_rsJobs = $pageNum_rsJobs * $maxRows_rsJobs;

mysql_select_db($database_wistream, $wistream);
$query_rsJobs = "SELECT * FROM content WHERE category = 'jobs' ORDER BY id DESC";
$query_limit_rsJobs = sprintf("%s LIMIT %d, %d", $query_rsJobs, $startRow_rsJobs, $maxRows_rsJobs);
$rsJobs = mysql_query($query_limit_rsJobs, $wistream) or die(mysql_error());
$row_rsJobs = mysql_fetch_assoc($rsJobs);

if (isset($_GET['totalRows_rsJobs'])) {
  $totalRows_rsJobs = $_GET['totalRows_rsJobs'];
} else {
  $all_rsJobs = mysql_query($query_rsJobs);
  $totalRows_rsJobs = mysql_num_rows($all_rsJobs);
}
$totalPages_rsJobs = ceil($totalRows_rsJobs/$maxRows_rsJobs)-1;

mysql_select_db($database_wistream, $wistream);
$query_rsGen = "SELECT * FROM content WHERE photo <> '' ORDER BY id DESC";
$rsGen = mysql_query($query_rsGen, $wistream) or die(mysql_error());
$row_rsGen = mysql_fetch_assoc($rsGen);
$totalRows_rsGen = mysql_num_rows($rsGen);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Latest News, Politics, Technology, Sports, Nigerian News - Wistream</title>
<meta name="keywords" content="<?php echo $row_rsPolitics['title']; ?>, <?php echo $row_rsEnter['title']; ?>, <?php echo $row_rsTech['title']; ?>, <?php echo $row_rsBusiness['title']; ?>, <?php echo $row_rsLstyle['title']; ?>, <?php echo $row_rsSport['title']; ?> latest news, nigerian news, news naija nigeria online nigeria naijapals nigeria today, world news entertainment news, local news sport update scores live scores league football soccer articles" />
<meta name="description" content="Get the latest information and news on sports, politics, trends, entertainment (Hollywood, Nollywood, Bollywood), sports and more" />
<script language="javascript" src="lib/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
var timeout    = 400;
var closetimer = 0;
var ddmenuitem = 0;

function jsddm_open()
{  jsddm_canceltimer();
   jsddm_close();
   ddmenuitem = $(this).find('ul').css('visibility', 'visible');}

function jsddm_close()
{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{  closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{  if(closetimer)
   {  window.clearTimeout(closetimer);
      closetimer = null;}}

$(document).ready(function()
{  $('#jsddm > li').bind('mouseover', jsddm_open)
   $('#jsddm > li').bind('mouseout',  jsddm_timer)});

document.onclick = jsddm_close;
</script>
<style type="text/css">
#jsddm
{  margin: 0;
	padding: 0;}
	
	#jsddm li
	{	float: left;
		list-style: none;
		font: 14px Arial;
		font-weight:bold;
		}

	#jsddm li a
	{	display: block;
		background: #0C9;
		padding: 5px 12px;
		text-decoration: none;
		border-right: 0px solid white;
		width: 100px;
		color: #FFF;
		white-space: nowrap}

	#jsddm li a:hover
	{	background: #0F6;
	    color: #000;	
	}
		
		#jsddm li ul
		{	margin: 0;
			padding: 0;
			position: absolute;
			visibility: hidden;
			border-top: 0px solid white}
		
		#jsddm li ul li
		{	float: none;
			display: inline;
		}
		
		#jsddm li ul li a
		{	width: auto;
			background: #0F6;}
		
		#jsddm li ul li a:hover
		{	background: #0F6;}
</style>

<style type="text/css">
body {
	margin-top: 0px;
	background-image: url();
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.linkstyle
{
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
}
</style>
</head>

<body>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1010" height="106" bgcolor="#00CC99"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="23%" height="108" align="center" bgcolor="#FFFFFF"><a href="."><img src="images/wicee2.jpg" alt="" width="117" height="89" border="0" /></a></td>
        <td width="77%" align="center" bgcolor="#FFFFFF">

 <div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    gaTrack: true,
    gaId: 'UA-26254244-1',
    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<form action="http://www.google.com.ng" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-3172613345033093:5556369834" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" size="55" />
    <input type="submit" name="sa" value="Search" />
  </div>
</form>

<script type="text/javascript">
	<!--
	var _adynamo_client = "8ac59747-ee78-4437-a4f9-adc34dc4e752";
	var _adynamo_width = 728;
	var _adynamo_height = 90;
	//-->
</script>
<script type="text/javascript" src="http://static.addynamo.net/ad/js/deliverAds.js"></script>
        </td>
      </tr>
    </table>
      <ul id="jsddm">
        <li style="width:80px;"><a href=".">Home</a></li>
          <li style="width:100px;"><a href="politics">Politics</a></li>
          <li><a href="entertainment">Entertainment</a></li>
          <li style="width:100px;"><a href="lifestyle">Lifestyle</a></li>
          <li><a style="width:80px;" href="business">Business</a></li>
          <li style="width:110px;"><a href="tech">Technology</a></li>
          <li style="width:80px;"><a href="sports">Sports</a></li>
          <li style="width:80px;"><a href="trends">Trends</a></li>
          <li style="width:70px;"><a href="jobs">Jobs</a></li>
          <li style="width:70px;"><a href="world">World News</a></li>
      </ul>
    </td>
  </tr>
  <tr>
    <td height="250"><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" height="282" valign="top"><table width="100%" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="279" align="center">
            <div id="div1"><a href="<?php echo $row_rsGen['category']; ?>/<?php echo $row_rsGen['shorturl']; ?>"><b><font size="+2"><?php echo $row_rsGen['title']; ?></font></b><br />
              <img src="newsimg/<?php echo $row_rsGen['photo']; ?>" alt="" height="250" border="0" /><br />
              <br />
            </a></div></td>
          </tr>
          </table></td>
        <td width="34%" rowspan="2" align="center" valign="top">
        <table width="99%" border="1" bordercolor="#00FF66" cellspacing="0" cellpadding="0">
          <tr>
            <td height="335" valign="top"><table width="100%" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td style="padding-left:12px;" height="35" bgcolor="#00FF66"><font size="4" face="Arial"><strong>Featured</strong></font></td>
              </tr>
              <tr>
                <td height="296" align="center" valign="top">
                <table width="100%" border="1" align="center" bordercolor="#FF0000" cellpadding="0" cellspacing="0">
                  <tr>
                    <td  height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsPolitics['category']; ?>/<?php echo $row_rsPolitics['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsPolitics['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsEnter['category']; ?>/<?php echo $row_rsEnter['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsEnter['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsTech['category']; ?>/<?php echo $row_rsTech['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsTech['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsBusiness['category']; ?>/<?php echo $row_rsBusiness['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsBusiness['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsLstyle['category']; ?>/<?php echo $row_rsLstyle['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsLstyle['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsSport['category']; ?>/<?php echo $row_rsSport['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsSport['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsTrend['category']; ?>/<?php echo $row_rsTrend['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsTrend['title']; ?></span></a></td>
                  </tr>
                  <tr>
                    <td height="37" bgcolor="#FFFFFF" style="padding-left:12px;padding-right:10px;"><a href="<?php echo $row_rsWorld['category']; ?>/<?php echo $row_rsWorld['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsWorld['title']; ?></span></a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table>
 
       
<!-- BEGIN SMOWTION TAG - 300x250 - DO NOT MODIFY -->
<script type="text/javascript"><!--
smowtion_size = "300x250";
smowtion_section = "3224950";
//-->
</script>
<script type="text/javascript"
src="http://ads.smowtion.com/ad.js?s=3224950&z=300x250">
</script>
<!-- END SMOWTION TAG - 300x250 - DO NOT MODIFY -->
      
<table width="100%" bordercolor="#00FF66" border="1" cellspacing="0" cellpadding="0">
  <tr>
            <td><table width="100%" border="1" align="center" bordercolor="#FF0000" cellpadding="0" cellspacing="0">
              <tr>
                <td height="31" align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a style="color:#000;" href="world/">World News</a></font></b></td>
              </tr>
                <?php do { ?>
                <tr>
                  <td height="40" valign="top" bgcolor="#FFFFFF" style="padding-left:10px;padding-right:8px;"><a href="<?php echo $row_rsWorld['category']; ?>/<?php echo $row_rsWorld['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsWorld['title']; ?></span></a></td>
                                </tr>
                  <?php } while ($row_rsWorld = mysql_fetch_assoc($rsWorld)); ?>
            </table></td>
          </tr>
    </table>
<center>    
    <!-- BEGIN SMOWTION TAG - 336x280 - DO NOT MODIFY -->
<script type="text/javascript"><!--
smowtion_size = "336x280";
smowtion_section = "3224950";
//-->
</script>
<script type="text/javascript"
src="http://ads.smowtion.com/ad.js?s=3224950&z=336x280">
</script>
<!-- END SMOWTION TAG - 336x280 - DO NOT MODIFY -->
</center>    
    </td>
        <td width="16%" rowspan="2" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%" align="center" bgcolor="#FFFFFF"><a href="http://www.facebook.com/wicstream"><img src="images/facebook.png" alt="" name="facebook" width="35" height="36" border="0" id="facebook" /></a></td>
            <td width="50%" align="center" bgcolor="#FFFFFF"><a href="http://www.twitter.com/wistream"><img src="images/twitter.png" alt="" name="twitter" width="35" height="35" border="0" id="twitter" /></a></td>
            <td width="50%" align="center" bgcolor="#FFFFFF"><a href="http://talkdeygo.com/myarea/?r=profile:home&userid=wistream"><img src="images/logo.jpg" alt="" name="talkdeygo" width="35" height="35" id="talkdeygo" /></a></td>
          </tr>
          
        </table>
          <table width="99%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="106" align="center" valign="top">
              <table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#66FF33" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="92" valign="top"><table width="100%" bordercolor="#FF0000" border="1" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tr>
                      <td height="31" align="center" bgcolor="#00FF66"><font size="+1"><b>Jobs</b></font></td>
                    </tr>
                   
                      <?php do { ?>
                       <tr>
                        <td height="34" bgcolor="#FFFFFF" valign="top" style="padding-left:12px;"><a href="<?php echo $row_rsJobs['category']; ?>/<?php echo $row_rsJobs['shorturl']; ?>"><?php echo $row_rsJobs['title']; ?></a></td>
                         </tr>
                        <?php } while ($row_rsJobs = mysql_fetch_assoc($rsJobs)); ?>
                   
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="93%" cellspacing="0" cellpadding="0">
            <tr>
              <td height="178" align="center" valign="top">


<script type="text/javascript">
	<!--
	var _adynamo_client = "f41e490c-cf97-4b6d-85d7-3a0e61bc3070";
	var _adynamo_width = 160;
	var _adynamo_height = 600;
	//-->
</script>
<script type="text/javascript" src="http://static.addynamo.net/ad/js/deliverAds.js"></script>

<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#f50303',
      color: '#fffcff'
    },
    tweets: {
      background: '#ffffff',
      color: '#050505',
      links: '#f5084b'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: true,
    behavior: 'default'
  }
}).render().setUser('wistream').start();
</script>

<script type="text/javascript" src="http://voap.weather.com/weather/oap/USGA0028?template=GOLFV&par=3000000007&unit=1&key=twciweatherwidget"></script>
              
</td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td height="538" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="52%" height="269" valign="top">
            <table width="99%" border="1" cellspacing="0" bordercolor="#00FF66" cellpadding="0">
              <tr>
                  <td><table width="100%" border="1" bordercolor="#FF0000" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a href="sports" style="color:#000;">Sports</a></font></b></td>
                    </tr>
                    <?php do { ?>
                    <tr>
                        <td bgcolor="#FFFFFF" style="padding-left:10px;padding-right:8px;">
						<a href="<?php echo $row_rsSportr['category']; ?>/<?php echo $row_rsSportr['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsSportr['title']; ?></span></a></td>
                    </tr>
                    <?php } while ($row_rsSportr = mysql_fetch_assoc($rsSportr)); ?>
                  </table></td>
                </tr>
            </table></td>
            <td width="48%" valign="top"><table width="100%" border="1" bordercolor="#00FF66" cellspacing="0" cellpadding="0">
              <tr>
                  <td><table width="100%" border="1" bordercolor="#FF0000" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a href="tech" style="color:#000;">Technology</a></font></b></td>
                    </tr>
                      <?php do { ?>
                      <tr>
                        <td bgcolor="#FFFFFF" style="padding-left:10px;padding-right:8px;"><a href="<?php echo $row_rsTechr['category']; ?>/<?php echo $row_rsTechr['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsTechr['title']; ?></span></a></td>
                          </tr>
                        <?php } while ($row_rsTechr = mysql_fetch_assoc($rsTechr)); ?>
                    
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="269" valign="top"><table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FF66">
              <tr>
                  <td><table width="100%" border="1" bordercolor="#FF0000" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="32" align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a style="color:#000;" href="entertainment">Entertainment</a></font></b></td>
                    </tr>
                    <?php do { ?>
                    <tr>  
                        <td height="32" bgcolor="#FFFFFF" style="padding-left:10px;padding-right:8px;"><a href="<?php echo $row_rsEnterr['category']; ?>/<?php echo $row_rsEnterr['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsEnterr['title']; ?></span></a></td>
                                        </tr>
                        <?php } while ($row_rsEnterr = mysql_fetch_assoc($rsEnterr)); ?>
                  </table></td>
                </tr>
            </table></td>
            <td valign="top"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FF66">
              <tr>
                  <td><table width="100%" bordercolor="#FF0000" border="1" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="31" align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a style="color:#000;" href="politics">Politics</a></font></b></td>
                    </tr>
                    
                      <?php do { ?>
                      <tr>
                        <td height="39" bgcolor="#FFFFFF" style="padding-left:10px;padding-right:8px;"><a href="<?php echo $row_rsPoliticsr['category']; ?>/<?php echo $row_rsPoliticsr['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsPoliticsr['title']; ?></span></a></td>
                    </tr>
                        <?php } while ($row_rsPoliticsr = mysql_fetch_assoc($rsPoliticsr)); ?>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="269" valign="top"><table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FF66">
              <tr>
                <td><table width="100%" border="1" bordercolor="#FF0000" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="32" align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a style="color:#000;" href="lifestyle">LifeStyle</a></font></b></td>
                  </tr>
                  
                    <?php do { ?>
                    <tr>
                      <td height="32" style="padding-left:10px;padding-right:8px;"><a href="<?php echo $row_rsLstyle['category']; ?>/<?php echo $row_rsLstyle['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsLstyle['title']; ?></span></a></td>
                      </tr>
                      <?php } while ($row_rsLstyle = mysql_fetch_assoc($rsLstyle)); ?>
                  
                </table></td>
              </tr>
            </table></td>
            <td valign="top"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FF66">
              <tr>
                <td><table width="100%" border="1" bordercolor="#FF0000" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="31" align="center" bgcolor="#00FF66"><b><font size="4" face="Arial"><a style="color:#000;" href="trends">Trends</a></font></b></td>
                  </tr>
                 
                    <?php do { ?>
                     <tr>
                      <td height="37" style="padding-left:10px;padding-right:8px;"><a href="<?php echo $row_rsTrend['category']; ?>/<?php echo $row_rsTrend['shorturl']; ?>"><span class="linkstyle"><?php echo $row_rsTrend['title']; ?></span></a></td>
                      </tr>
                      <?php } while ($row_rsTrend = mysql_fetch_assoc($rsTrend)); ?>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
<center>

 <!-- Begin BidVertiser code -->
<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=462019&bid=1161042" type="text/javascript"></SCRIPT>
<noscript><a href="http://www.bidvertiser.com/bdv/BidVertiser/bdv_publisher_toolbar.dbm">toolbar</a></noscript>
<!-- End BidVertiser code --> 

</center>
<table width="1015" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1013" align="center" valign="top"><table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td height="37" align="center" bgcolor="#00B085"><font color="#FFFFFF" face="Arial" size="-1"><a href="."><font color="#FFFFFF"><strong>Home</strong></font></a> <strong>&bull; <a href="politics"><font color="#FFFFFF">Politics</font></a> &bull; <a href="entertainment"><font color="#FFFFFF">Entertainment</font></a> &bull; <a href="lifestyle"><font color="#FFFFFF">Lifestyle</font></a> &bull; <a href="business"><font color="#FFFFFF">Business</font></a> &bull; <a href="tech"><font color="#FFFFFF">Technology</font></a> &bull; <a href="sports"><font color="#FFFFFF">Sports</font></a> &bull;
          <a href="trends"><font color="#FFFFFF">Trends </font></a> &bull; <a href="jobs"><font color="#FFFFFF">Jobs</font></a> &bull; <a href="world"><font color="#FFFFFF">World News</font></a></strong></font></td>
        </tr>
        <tr>
          <td height="35" align="center" bgcolor="#00B085">
<center>
          <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fwicstream&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21&amp;appId=393328564049504" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>&nbsp;About Us&nbsp; Content Disclaimer
</center>
</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">(c) 2012 WiStream a subsidiary of Wicee</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsPolitics);

mysql_free_result($rsEnter);

mysql_free_result($rsTech);

mysql_free_result($rsBusiness);

mysql_free_result($rsLstyle);

mysql_free_result($rsSport);

mysql_free_result($rsSportr);

mysql_free_result($rsTechr);

mysql_free_result($rsTrend);

mysql_free_result($rsEnterr);

mysql_free_result($rsPoliticsr);

mysql_free_result($rsworldr);

mysql_free_result($rsWorld);

mysql_free_result($rsJobs);

mysql_free_result($rsGen);
?>
