<!DOCTYPE html>
<html lang="<?php echo $lan; ?>">
<?php $zufall=rand(0,9999); ?>
<?php global $socialImg; if(!$fbimage) $fbimage = str_replace(" ", "%20", $socialImg); else $fbimage = $img_pfad.$fbimage; if(!$fbimage) $fbimage = $dir.'fav/apple-touch-icon.png'; ?>
<head>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<!-- Made with CMS Morpheus copyright 2020 by pixel-dusche.de -->
<title><?php echo $title; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?php echo htmlspecialchars($desc); ?>">
<meta name="keywords" content="<?php echo $keyw; ?>" />
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php echo utf8_encode($title); ?>">
<meta itemprop="description" content="<?php echo htmlspecialchars($desc); ?>">
<meta itemprop="image" content="<?php echo $fbimage; ?>">
<!-- Open Graph data -->
<meta property="og:title" content="<?php echo utf8_encode($title); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo substr($dir, 0, -1).$uri; ?>" />
<?php if($fbimage) { ?><meta property="og:image" content="<?php echo $fbimage; ?>" /><?php } ?>
<meta property="og:description" content="<?php echo htmlspecialchars($desc); ?>" />
<meta property="og:site_name" content="<?php echo utf8_encode($title); ?>" />

<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $dir; ?>fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $dir; ?>fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $dir; ?>fav/favicon-16x16.png">
<link rel="manifest" href="<?php echo $dir; ?>fav/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fitodac/bsnav@master/dist/bsnav.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flickity@2/dist/flickity.css">
<link href="<?php echo $dir; ?>/shop/catalog/view/javascript/ionicons/css/ionicons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $dir; ?>css/styles.css?v=<?php echo $zufall; ?>" type="text/css">
<link rel="stylesheet" href="<?php echo $dir; ?>css/mobile.css?v=<?php echo $zufall; ?>" type="text/css">


<?php $size = $fbimage ? getimagesize($fbimage) : array(200,200); ?>

<script type='application/ld+json' class='yoast-schema-graph yoast-schema-graph--main'>{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"<?php echo $dir; ?>#website","url":"<?php echo $dir; ?>","name":"<?php echo $morpheus["client"]; ?>","potentialAction":{"@type":"SearchAction","target":"<?php echo $dir; ?>?s={suche}","query-input":"required name=suche"}},{"@type":"ImageObject","@id":"<?php echo substr($dir, 0, -1).$uri; ?>#primaryimage","url":"<?php echo $fbimage; ?>","width":<?php echo $size[0]; ?>,"height":<?php echo $size[1]; ?>,"caption":"<?php echo $morpheus["client"]; ?>"},{"@type":"WebPage","@id":"<?php echo substr($dir, 0, -1).$uri; ?>#webpage","url":"<?php echo substr($dir, 0, -1).$uri; ?>","inLanguage":"de-DE","name":"<?php echo $title; ?>","isPartOf":{"@id":"<?php echo $dir; ?>#website"},"primaryImageOfPage":{"@id":"<?php echo $fbimage; ?>"},"datePublished":"2019-07-30T10:00:00+00:00","dateModified":"<?php echo $changeDat; ?>T12:00:00+00:00","description":"<?php echo $desc; ?>"}]}</script>

</head>
<body itemscope itemtype="https://schema.org/WebPage" class="p<?php echo $hn_id; ?>">
<a id="top"></a>

<div id="page">
