<?php
require_once('dbcon.php');
$query2 = "SELECT * FROM `buisness`   ORDER BY `id` DESC;";
$query2 = "SELECT * FROM `buisness`   ORDER BY `id` DESC;";
$result2 = mysqli_query($con,$query2);
?>
<?php include "script.php" ?> 
<!DOCTYPE html>
<html class=no-js lang=en>
<head>
<meta charset=utf-8>
<meta http-equiv=x-ua-compatible content="ie=edge">
<title>Latest Buisness News | newsguru.live</title>
<meta name=description content="Get the latest business news and stay informed about market trends, financial updates, and industry insights. Visit our website for valuable information and analysis.">
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel=manifest href=site.webmanifest>
<link rel="shortcut icon" type=image/x-icon href=assets/imgs/favicon.svg>
<link rel=stylesheet href=assets/css/style.css>
<link rel=stylesheet href=assets/css/widgets.css>
<link rel=stylesheet href=assets/css/color.css>
<link rel=stylesheet href=assets/css/responsive.css>
	<script src="https://kit.fontawesome.com/353f0e393d.js" crossorigin="anonymous"></script>
	
</head>
<body>
<div id=preloader-active>
<div class="preloader d-flex align-items-center justify-content-center">
<div class="preloader-inner position-relative">
<div class=text-center>
<img class="jump mb-50" src=assets/imgs/loading.svg alt>
<h6>Now Loading</h6>
<div class=loader>
<div class="bar bar1"></div>
<div class="bar bar2"></div>
<div class="bar bar3"></div>
</div>
</div>
</div>
</div>
</div>
<div class=main-wrap>
<aside id=sidebar-wrapper class="custom-scrollbar offcanvas-sidebar position-right">
<button class=off-canvas-close><i class=ti-close></i></button>
<div class=sidebar-inner>
<div class="siderbar-widget mb-50 mt-30">
<form action=# method=get class="search-form position-relative">
<input type=text class=search_field placeholder=Search value name=s>
<span class=search-icon><i class="ti-search mr-5"></i></span>
</form>
</div>
<div class="sidebar-widget mb-50">
<div class="widget-header mb-30">
<h5 class=widget-title>Top <span>Trending</span></h5>
</div>
<div class=post-aside-style-2>
<ul class=list-post>
<li class="mb-30 wow fadeIn animated">
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
<a class=color-white href=#>
<img src=assets/imgs/thumbnail-2.jpg alt>
</a>
</div>
<div class="post-content media-body">
<h6 class="post-title mb-10 text-limit-2-row"><a href=#>Vancouver woman finds pictures and videos of herself online</a></h6>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#>K. Marry</a></span>
<span class=post-on>4m ago</span>
</div>
</div>
</div>
</li>
<li class="mb-30 wow fadeIn animated">
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
<a class=color-white href=#>
<img src=../assets/imgs/thumbnail-3.jpg alt>
</a>
</div>
<div class="post-content media-body">
<h6 class="post-title mb-10 text-limit-2-row"><a href=#>4 Things Emotionally Intelligent People Don’t Do</a></h6>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#>Mr. John</a></span>
<span class=post-on>3h ago</span>
</div>
</div>
</div>
</li>
<li class="mb-30 wow fadeIn animated">
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
<a class=color-white href=#>
<img src=assets/imgs/thumbnail-5.jpg alt>
</a>
</div>
<div class="post-content media-body">
<h6 class="post-title mb-10 text-limit-2-row"><a href=#>Reflections from a Token Black Friend</a></h6>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#>Kenedy</a></span>
<span class=post-on>4h ago</span>
</div>
</div>
</div>
</li>
<li class="mb-30 wow fadeIn animated">
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
<a class=color-white href=#>
<img src=assets/imgs/thumbnail-7.jpg alt>
</a>
</div>
<div class="post-content media-body">
<h6 class="post-title mb-10 text-limit-2-row"><a href=#>How to Identify a Smart Person in 3 Minutes</a></h6>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#>Steven</a></span>
<span class=post-on>5h ago</span>
</div>
</div>
</div>
</li>
<li class="wow fadeIn animated">
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
<a class=color-white href=#>
<img src=assets/imgs/thumbnail-8.jpg alt>
</a>
</div>
<div class="post-content media-body">
<h6 class="post-title mb-10 text-limit-2-row"><a href=#>Blackface Minstrel Songs Don’t Belong in Children’s Music Class</a></h6>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#>J.Smith</a></span>
<span class=post-on>5h30 ago</span>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>
<div class="sidebar-widget widget_tag_cloud mb-50">
<div class="widget-header tags-close mb-20">
<h5 class="widget-title mt-5">Tags Cloud</h5>
</div>
<div class=tagcloud>
<a href=#>Beauty</a>
<a href=#>Book</a>
<a href=#>Design</a>
<a href=#>Fashion</a>
<a href=#>Lifestyle</a>
<a href=#>Travel</a>
<a href=#>Science</a>
<a href=#>Health</a>
<a href=#>Sports</a>
<a href=#>Arts</a>
<a href=#>Books</a>
<a href=#>Style</a>
</div>
</div>
</div>
</aside>
<?php include('header.php') ?>
<main class=position-relative>
<div class="archive-header text-center mb-50">
<div class=container>
<h2>
<span class=text-success>Search result for "Buisness News"</span>
</h2>
<div class=breadcrumb>
<span class=no-arrow>we found latest articles for you</span>
</div>
</div>
</div>
<div class=container>
<div class=row>
<?php include('../sidebar.php') ?>
<div class="col-lg-10 col-md-9 order-1 order-md-2">
<div class="row mb-50">
	
<div class="col-lg-8 col-md-12">
<div class="latest-post mb-50">
<div class=loop-list-style-1>
	
<article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
	<?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
<div class="d-md-flex d-block">
<div class="post-thumb post-thumb-big d-flex mr-15 border-radius-15 img-hover-scale">
<a class=color-white href="<?php echo ($row['link']); ?>">
<img class=border-radius-15 src="<?php echo ($row['image']); ?>" alt>
</a>
</div>
<div class="post-content media-body">
<div class="entry-meta mb-15 mt-10">
<a class="entry-meta meta-2" href=#><span class="post-in text-danger font-x-small"><?php echo ($row['tag']); ?></span></a>
</div>
<h5 class="post-title mb-15 text-limit-2-row">
<span class=post-format-icon>
	<i class="fa-solid fa-bomb"></i>
</span>
<a href="<?php echo ($row['link']); ?>"><?php echo ($row['heading']); ?></a></h5>
<p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block"><?php echo ($row['text']); ?></p>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#>Newsguru Editors</a></span>
<span class=post-on><?php echo ($row['time']); ?></span>
<span class=time-reading><?php echo ($row['readtime']); ?></span>
</div>
</div>
</div>
</article>
</div>
</div>
<div class="pagination-area mb-30">
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-start">
<?php
    if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1)
    {
        ?>
<li> <a class=prev href="?page-nr=<?php echo $_GET['page-nr'] - 1?>">Previous</a></li>
<?php
    }
    else{
        ?>
<li><a class=prev>Previous</a></li>
<?php
    }
    ?>
<?php
        for( $counter= 1; $counter <= $pages; $counter++ )
        {
        ?>
<li class="page-item active"><a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a></li>
<?php

        }
        ?>
<?php
    if(!isset($_GET['page-nr']))
    {
        ?>
	<li><a href="?page-nr=2" class=next>Next</a></li>
<?php
    }else{
        if($_GET['page-nr']>=$pages)
        {
            ?>
<li><a class=next>Next</a></li>
<?php
        }else{
            ?>
<li><a class=next href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a></li>
<?php
        }
    }
    ?>
</ul>
</nav>
</div>
</div>
<div class="col-lg-4 col-md-12 sidebar-right">
<div class="sidebar-widget p-20 border-radius-15 bg-white widget-text wow fadeIn animated">
<div class="widget-header mb-30">
<h5 class=widget-title>Search <span>tips</span></h5>
</div>
<div>
    <a class="font-small text-muted" href="<?php echo ($row['link']); ?>" style="color:blue !important;"><i class="fa-solid fa-link"></i><?php echo ($row['link']); ?></a>
</div>

<?php
                        }

                        ?>
</div>
</div>

</div>
</div>
</div>
</div>
</main>
<?php include('../footer.php') ?>
</div>
<div class=dark-mark></div>
<script src=../assets/js/vendor/modernizr-3.6.0.min.js></script>
<script src=../assets/js/vendor/jquery-3.6.0.min.js></script>
<script src=../assets/js/vendor/popper.min.js></script>
<script src=../assets/js/vendor/bootstrap.min.js></script>
<script src=../assets/js/vendor/jquery.slicknav.js></script>
		<script src="https://kit.fontawesome.com/353f0e393d.js" crossorigin="anonymous"></script>

<script src=assets/js/vendor/owl.carousel.min.js></script>
<script src=assets/js/vendor/slick.min.js></script>
<script src=assets/js/vendor/wow.min.js></script>
<script src=assets/js/vendor/animated.headline.js></script>
<script src=assets/js/vendor/jquery.magnific-popup.js></script>
<script src=assets/js/vendor/jquery.ticker.js></script>
<script src=assets/js/vendor/jquery.vticker-min.js></script>
<script src=assets/js/vendor/jquery.scrollUp.min.js></script>
<script src=assets/js/vendor/jquery.nice-select.min.js></script>
<script src=assets/js/vendor/jquery.sticky.js></script>
<script src=assets/js/vendor/perfect-scrollbar.js></script>
<script src=assets/js/vendor/waypoints.min.js></script>
<script src=assets/js/vendor/jquery.counterup.min.js></script>
<script src=assets/js/vendor/jquery.theia.sticky.js></script>
<script src=../ionicons%405.0.0/dist/ionicons.js></script>
<script src=assets/js/main.js></script>
	<script>function updateDateTime(){var d=new Date();var c=d.getDate();var b=d.toLocaleString("en-us",{weekday:"long"});var a=d.getHours();var e=d.getMinutes();var g=d.getSeconds();var f=d.toLocaleString("en-us",{month:"long"});a=(a<10?"0":"")+a;e=(e<10?"0":"")+e;g=(g<10?"0":"")+g;document.getElementById("date").innerHTML=c;document.getElementById("day").innerHTML=b;document.getElementById("time").innerHTML=a+":"+e+":"+g;document.getElementById("month").innerHTML=f}updateDateTime();setInterval(updateDateTime,1000);</script>
</body>
</html>