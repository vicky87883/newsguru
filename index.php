<?php
require_once('dbcon.php');
$query3 = "SELECT * FROM `dontmiss`   ORDER BY `id` DESC;";
$query5 = "SELECT * FROM `frontload`   ORDER BY `id` DESC;";
$result3 = mysqli_query($con,$query3);
$result5 = mysqli_query($con,$query5);
?>
<?php include "script.php" ?>
<!DOCTYPE html>
<html class=no-js lang=en>
<head>
<meta charset=utf-8>
<meta http-equiv=x-ua-compatible content="ie=edge">
<title>NewsGuru Insights: Unlocking the Secrets of Media Literacy</title>
<meta name=description content="Get your daily dose of news from NewsGuru, where you can access breaking news, in-depth analysis, and trending stories all in one place.Stay informed with the latest news and updates from NewsGuru.">
<meta name=viewport content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel=manifest href=site.webmanifest>
<link rel="shortcut icon" type=image/x-icon href=assets/imgs/favicon.svg>
<link rel=canonical href=https://www.newsguru.live/ />
<link rel=stylesheet href=assets/css/style.css>
<link rel=stylesheet href=assets/css/widgets.css>
<link rel=stylesheet href=assets/css/color.css>
<link rel=stylesheet href=assets/css/responsive.css>
<script src=https://kit.fontawesome.com/353f0e393d.js crossorigin=anonymous></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag("js",new Date());gtag("config","G-V6HH2RKGTW");</script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755"
     crossorigin="anonymous"></script>
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
<div class=container>
<div class=row>
<?php include('sidebar.php') ?>
<div class="col-lg-10 col-md-9 order-1 order-md-2">
<div class=row>
<div class="col-lg-8 col-md-12">
<div class="featured-post mb-50">
<h4 class="widget-title mb-30">Today <span>Highlight</span></h4>
</div>
<div class=sidebar-widget>
<div class="block-tab-item post-module-1 post-module-4">
<div class=row>
    
	<?php
                        while($row = mysqli_fetch_assoc($result5))
                        {
                            ?>
	<div class="slider-single col-md-6 mb-30">
<div class="img-hover-scale border-radius-10">
<span class="top-right-icon background10"><i class="mdi mdi-share"></i></span>
<a href="<?php echo ($row['link']); ?>">
<img class=border-radius-10 src="<?php echo ($row['image']); ?>" alt=post-slider>
</a>
</div>
<h5 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
<a href="<?php echo ($row['link']); ?>"><?php echo ($row['heading']); ?>
</a>
</h5>
<div class="entry-meta meta-1 font-x-small mt-10 pr-5 pl-5 text-muted">
<span><span class=mr-5><i class="fa fa-eye" aria-hidden=true></i></span>30k</span>
<span class=ml-15><span class="mr-5 text-muted"><i class="fa fa-comment" aria-hidden=true></i></span>1.5k</span>
<span class=ml-15><span class="mr-5 text-muted"><i class="fa fa-share-alt" aria-hidden=true></i></span>15k</span>
<a class=float-right href=#><i class=ti-bookmark></i></a>
</div>
</div> 
		<?php
						}
                            ?>

	</div>
</div>
</div>
<div class="pagination-area mb-30">
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-start">
<?php
    if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1)
    {
        ?>
<li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;"> <a class=prev href="?page-nr=<?php echo $_GET['page-nr'] - 1?>">prev</a></li>
<?php
    }
    else{
        ?>
<li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;"><a class=prev>prev</a></li>
<?php
    }
    ?>
<?php
        for( $counter= 1; $counter <= $pages; $counter++ )
        {
        ?>
<li class="pageNumber active" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;"><a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a></li>
<?php

        }
        ?>
<?php
    if(!isset($_GET['page-nr']))
    {
        ?>
	<li class="page-item" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;"><a href="?page-nr=2" class=next>Next</a></li>
<?php
    }else{
        if($_GET['page-nr']>=$pages)
        {
            ?>
<li class="page-item" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;"><a class=next>Next</a></li>
<?php
        }else{
            ?>
<li class="page-item" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;"><a class=next href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a></li>
<?php
        }
    }
    ?>

</ul>
</nav>
</div>
</div>
	<!-- displayads1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6958761602872755"
     data-ad-slot="1409631386"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php include('rightside.php') ?>
</div>
</div>
</div>
</div>
<div><ins class=adsbygoogle style=display:block data-ad-client=ca-pub-6958761602872755 data-ad-slot=4240534231 data-ad-format=auto data-full-width-responsive=true></ins>
<script>(adsbygoogle=window.adsbygoogle||[]).push({});</script></div>
</main>
<?php include('footer.php') ?>
</div>
<div class=dark-mark></div>
<script src=assets/js/vendor/modernizr-3.6.0.min.js></script>
<script src=assets/js/vendor/jquery-3.6.0.min.js></script>
<script src=assets/js/vendor/popper.min.js></script>
<script src=assets/js/vendor/bootstrap.min.js></script>
<script src=assets/js/vendor/jquery.slicknav.js></script>
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
<script src=ionicons.js></script>
<script src=assets/js/main.js></script>
<script>function updateDateTime(){var m=new Date();var n=m.getDate();var h=m.toLocaleString("en-us",{weekday:"long"});var i=m.getHours();var l=m.getMinutes();var j=m.getSeconds();var k=m.toLocaleString("en-us",{month:"long"});i=(i<10?"0":"")+i;l=(l<10?"0":"")+l;j=(j<10?"0":"")+j;document.getElementById("date").innerHTML=n;document.getElementById("day").innerHTML=h;document.getElementById("time").innerHTML=i+":"+l+":"+j;document.getElementById("month").innerHTML=k}updateDateTime();setInterval(updateDateTime,1000);</script>
<script>function incrementCount(){var b=document.getElementById("count-value");var a=parseInt(b.innerText);a++;b.innerText=a};</script>
</body>
</html>