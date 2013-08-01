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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsCat = 30;
$pageNum_rsCat = 0;
if (isset($_GET['pageNum_rsCat'])) {
  $pageNum_rsCat = $_GET['pageNum_rsCat'];
}
$startRow_rsCat = $pageNum_rsCat * $maxRows_rsCat;

$colname_rsCat = "%";
if (isset($_GET['c'])) {
  $colname_rsCat = $_GET['c'];
}
mysql_select_db($database_wistream, $wistream);
$query_rsCat = sprintf("SELECT * FROM content WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rsCat, "text"));
$query_limit_rsCat = sprintf("%s LIMIT %d, %d", $query_rsCat, $startRow_rsCat, $maxRows_rsCat);
$rsCat = mysql_query($query_limit_rsCat, $wistream) or die(mysql_error());
$row_rsCat = mysql_fetch_assoc($rsCat);

if (isset($_GET['totalRows_rsCat'])) {
  $totalRows_rsCat = $_GET['totalRows_rsCat'];
} else {
  $all_rsCat = mysql_query($query_rsCat);
  $totalRows_rsCat = mysql_num_rows($all_rsCat);
}
$totalPages_rsCat = ceil($totalRows_rsCat/$maxRows_rsCat)-1;

$queryString_rsCat = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsCat") == false && 
        stristr($param, "totalRows_rsCat") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsCat = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsCat = sprintf("&totalRows_rsCat=%d%s", $totalRows_rsCat, $queryString_rsCat);


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

$maxRows_rsLstyle = 10;
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

$maxRows_rsSportr = 10;
$pageNum_rsSportr = 0;
if (isset($_GET['pageNum_rsSportr'])) {
  $pageNum_rsSportr = $_GET['pageNum_rsSportr'];
}
$startRow_rsSportr = $pageNum_rsSportr * $maxRows_rsSportr;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ucwords($row_rsCat['category']); ?> News on Wistream</title>
<meta name="keywords" content="<?php echo $row_rsCat['category']; ?> latest news, nigerian news, news naija nigeria online nigeria naijapals nigeria today, world news entertainment news, local news sport update scores live scores league football soccer articles" />
<meta name="description" content="Get the latest information and news on sports, politics, trends, entertainment (Hollywood, Nollywood, Bollywood), sports and more"  />
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
}
</style>
<link href="lib/main.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "257c6252-5568-4cec-8cf9-889224619003"}); </script>
<body>
<table width="1010" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="900" height="106" bgcolor="#00CC99"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="23%" height="95" align="center" bgcolor="#FFFFFF">
<a href="http://www.wiceeweb.com/"><img name="" src="images/wicee2.jpg" width="117" height="89" alt="" /></a></td>
        <td width="77%" align="center" bgcolor="#FFFFFF">
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
        <td width="50%" height="774" valign="top">
          <h2><?php echo ucwords($row_rsCat['category']); ?></h2>
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_fblike_hcount' displayText='Facebook Like'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
<span class='st_twitterfollow_hcount' displayText='Twitter Follow'></span>
<span class='st_email_hcount' displayText='Email'></span>
<span class='st_plusone_hcount' displayText='Google +1'></span></td>
            </tr>
          </table>
          <?php do { ?>
            
  <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#FF0000" style="border-width:thin;">
  <tr>
    <td><table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td height="27" colspan="2" bgcolor="#CCFFFF"><a href="<?php echo $row_rsCat['category']; ?>/<?php echo $row_rsCat['shorturl']; ?>" class="headertitle">
                 <?php echo $row_rsCat['title']; ?></a></td>
                </tr>
              <tr>
                <td width="26%" align="center"><font face="Arial" size="3">
                  <?php if($row_rsCat['photo'] != '') {  // Hide News Photo no News ?>
                </font><img src="newsimg/<?php echo $row_rsCat['photo']; ?>" alt="" width="100" /><font face="Arial" size="3">
                <?php } // Hide News Photo no News ?>
                </font></td>
                <td width="74%" height="43" valign="top" class="newscontent" style="padding-left:12px;"><?php echo substr($row_rsCat['content'],0 ,100); ?>...&nbsp;<a href="<?php echo $row_rsCat['category']; ?>/<?php echo $row_rsCat['shorturl']; ?>"><br />
                  <br />
                  Read
                  Full Story</a></td>
                </tr>
            </table></td>
  </tr>
</table>

            <table width="98%" cellspacing="0" cellpadding="0">
              <tr>
                <td height="31">&nbsp;</td>
                </tr>
            </table>
          <?php } while ($row_rsCat = mysql_fetch_assoc($rsCat)); ?>
          <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><a href="<?php printf("%s?pageNum_rsCat=%d%s", $currentPage, max(0, $pageNum_rsCat - 1), $queryString_rsCat); ?>">&lt; Previous</a> &bull; <a href="<?php printf("%s?pageNum_rsCat=%d%s", $currentPage, min($totalPages_rsCat, $pageNum_rsCat + 1), $queryString_rsCat); ?>">Next &gt;</a></td>
            </tr>
          </table></td>
        <td width="34%" valign="top"><table width="96%" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="280" align="center" valign="top">
            
<!-- Begin BidVertiser code -->
<SCRIPT LANGUAGE="JavaScript1.1" SRC="http://bdv.bidvertiser.com/BidVertiser.dbm?pid=462019&bid=1161048" type="text/javascript"></SCRIPT>
<noscript><a href="http://www.bidvertiser.com/bdv/BidVertiser/bdv_publisher_toolbar.dbm">toolbar</a></noscript>
<!-- End BidVertiser code --> 


            </td>
          </tr>
          </table>
          <table width="98%" border="1" align="center" cellpadding="0" bordercolor="#FF0000" cellspacing="0">
            <tr>
              <td height="29" align="center" bgcolor="#00FF66"><font size="+1"><b>Top Stories</b></font></td>
            </tr>
            <tr>
              <td height="36" style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row_rsPolitics['category']; ?>/<?php echo $row_rsPolitics['shorturl']; ?>"><?php echo $row_rsPolitics['title']; ?></a></td>
            </tr>
            <tr>
              <td height="36" style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row_rsEnter['category']; ?>/<?php echo $row_rsEnter['shorturl']; ?>"><?php echo $row_rsEnter['title']; ?></a></td>
            </tr>
            <tr>
              <td height="36" style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row_rsTech['category']; ?>/<?php echo $row_rsTech['shorturl']; ?>"><?php echo $row_rsTech['title']; ?></a></td>
            </tr>
            <tr>
              <td height="36" style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row_rsBusiness['category']; ?>/<?php echo $row_rsBusiness['shorturl']; ?>"><?php echo $row_rsBusiness['title']; ?></a></td>
            </tr>
            <tr>
              <td height="36" style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row_rsLstyle['category']; ?>/<?php echo $row_rsLstyle['shorturl']; ?>"><?php echo $row_rsLstyle['title']; ?></a></td>
            </tr>
            <tr>
              <td height="36" style="padding-left:10px;padding-right:10px;"><a href="<?php echo $row_rsSport['category']; ?>/<?php echo $row_rsSport['shorturl']; ?>"><?php echo $row_rsSport['title']; ?></a></td>
            </tr>
          </table>
<br />          
<center>
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

<p></p>

<script type="text/javascript">
	<!--
	var _adynamo_client = "79fb9c35-b0b5-420c-98c2-bca7f2f9f0a7";
	var _adynamo_width = 300;
	var _adynamo_height = 600;
	//-->
</script>
<script type="text/javascript" src="http://static.addynamo.net/ad/js/deliverAds.js"></script>

	</center>
          </td>
        <td width="16%" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="50%" align="center" bgcolor="#FFFFFF"><a href="http://www.facebook.com/wicstream"><img src="images/facebook.png" alt="" name="facebook" width="35" height="36" border="0" id="facebook" /></a></td>
            <td width="50%" align="center" bgcolor="#FFFFFF"><a href="http://www.twitter.com/wistream"><img src="images/twitter.png" alt="" name="twitter" width="35" height="35" border="0" id="twitter" /></a></td>
            <td width="50%" align="center" bgcolor="#FFFFFF"><img src="images/logo.jpg" alt="" name="talkdeygo" width="35" height="35" id="twitter2" /></td>
          </tr>
        </table>
          <table width="99%" cellspacing="0" cellpadding="0">
            <tr>
              <td height="178" valign="top">
<script type="text/javascript">
	<!--
	var _adynamo_client = "f41e490c-cf97-4b6d-85d7-3a0e61bc3070";
	var _adynamo_width = 160;
	var _adynamo_height = 600;
	//-->
</script>
<script type="text/javascript" src="http://static.addynamo.net/ad/js/deliverAds.js"></script>

              </td>
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
    <td width="1013" align="center"><img name="" src="" width="724" height="15" alt="" />
      <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td height="37" align="center" bgcolor="#00B085"><font color="#FFFFFF" face="Arial" size="-1"><a href="."><font color="#FFFFFF"><strong>Home</strong></font></a> <strong>&bull; <a href="politics"><font color="#FFFFFF">Politics</font></a> &bull; <a href="entertainment"><font color="#FFFFFF">Entertainment</font></a> &bull; <a href="lifestyle"><font color="#FFFFFF">Lifestyle</font></a> &bull; <a href="business"><font color="#FFFFFF">Business</font></a> &bull; <a href="technology"><font color="#FFFFFF">Technology</font></a> &bull; <a href="sports"><font color="#FFFFFF">Sports</font></a> &bull; <a href="trends"><font color="#FFFFFF">Trends</font></a> &bull; <a href="jobs"><font color="#FFFFFF">Jobs</font></a> &bull; <a href="world"><font color="#FFFFFF">World News</font></a></strong></font></td>
        </tr>
        <tr>
          <td height="35" align="center" bgcolor="#00B085"><a href="http://www.facebook.com/wistream"><font color="#FFFFFF">Facebook</font></a> &bull; <a href="http://www.twitter.com/wistream"><font color="#FFFFFF">Twitter</font></a> &bull; <a href="mailto:wistream@wiceeweb.com"><font color="#FFFFFF">Email</font></a> &bull; <a href="rss.php"><font color="#FFFFFF">RSS</font></a> &bull; <a href="about"><font color="#FFFFFF">About Us</font></a></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">(c) 2012 WiStream a subsidiary of <a href="http://www.wiceeweb.com/">Wicee</a></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsCat);

mysql_free_result($rsPolitics);

mysql_free_result($rsEnter);

mysql_free_result($rsTech);

mysql_free_result($rsLstyle);

mysql_free_result($rsSport);

mysql_free_result($rsBusiness);
?>
