<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NewsGuru Insights: Unlocking the Secrets of Media Literacy</title>
    <meta name="description" content="Get your daily dose of news from NewsGuru, where you can access breaking news, in-depth analysis, and trending stories all in one place. Stay informed with the latest news and updates from NewsGuru.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon.svg">
    <link rel="canonical" href="https://www.newsguru.live/">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://kit.fontawesome.com/353f0e393d.js" crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6HH2RKGTW"></script>
    <script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag("js", new Date()); gtag("config", "G-V6HH2RKGTW");</script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6958761602872755" crossorigin="anonymous"></script>
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img class="jump mb-50" src="assets/imgs/loading.svg" alt="Loading">
                <h6>Now Loading</h6>
                <div class="loader">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-wrap">
    <?php include('header.php'); ?>
    <main class="position-relative">
        <div class="container">
            <div class="row">
                <?php include('sidebar.php'); ?>
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="featured-post mb-50">
                                <h4 class="widget-title mb-30">Today <span>Highlight</span></h4>
                                <!-- Placeholder for dynamic content -->
                                <div id="topsection-content"></div>
                            </div>
                            <div id="dontmiss-content"></div>
                        </div>
                        <?php include('rightside.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ads -->
        <div>
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6958761602872755" data-ad-slot="4240534231" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        </div>
    </main>
    <?php include('footer.php'); ?>
</div>
<div class="dark-mark"></div>
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/vendor/jquery.slicknav.js"></script>
<script src="assets/js/vendor/owl.carousel.min.js"></script>
<script src="assets/js/vendor/slick.min.js"></script>
<script src="assets/js/vendor/wow.min.js"></script>
<script src="assets/js/vendor/animated.headline.js"></script>
<script src="assets/js/vendor/jquery.magnific-popup.js"></script>
<script src="assets/js/vendor/jquery.ticker.js"></script>
<script src="assets/js/vendor/jquery.vticker-min.js"></script>
<script src="assets/js/vendor/jquery.scrollUp.min.js"></script>
<script src="assets/js/vendor/jquery.nice-select.min.js"></script>
<script src="assets/js/vendor/jquery.sticky.js"></script>
<script src="assets/js/vendor/perfect-scrollbar.js"></script>
<script src="assets/js/vendor/waypoints.min.js"></script>
<script src="assets/js/vendor/jquery.counterup.min.js"></script>
<script src="assets/js/vendor/jquery.theia.sticky.js"></script>
<script src="assets/js/main.js"></script>
<script src="ionicons.js"></script>
<script>
    // Function to load data asynchronously
    function loadData(type, containerId) {
        const container = document.getElementById(containerId);
        container.innerHTML = '<div class="loading">Loading...</div>';
        
        fetch(`fetch_data.php?type=${type}`)
            .then(response => response.json())
            .then(data => {
                container.innerHTML = '';
                if (data.length) {
                    data.forEach(item => {
                        container.innerHTML += `
                            <article class="p-10 background-white border-radius-10 mb-30">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a href="#">
                                            <img class="lazyload" src="assets/imgs/loading.svg" data-src="${item.image_url}" alt="${item.title}">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h5 class="post-title mb-15">
                                            <a href="#">${item.title}</a>
                                        </h5>
                                        <p class="post-excerpt mb-0">${item.description}</p>
                                    </div>
                                </div>
                            </article>`;
                    });
                } else {
                    container.innerHTML = '<p>No content available.</p>';
                }
            })
            .catch(error => {
                container.innerHTML = `<div class="error">Error loading content: ${error.message}</div>`;
            });
    }

    // Load 'topsection' content on page load
    document.addEventListener("DOMContentLoaded", () => {
        loadData('topsection', 'topsection-content');
        loadData('dontmiss', 'dontmiss-content');
    });
</script>
</body>
</html>
