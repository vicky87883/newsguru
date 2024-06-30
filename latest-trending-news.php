<?php
// dbcon.php content
$con = new mysqli('localhost', 'vikram', 'Parjapat@123', 'coder');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set charset to utf8mb4
$con->set_charset("utf8mb4");

// Fetching data from the 'frontload' table
$query = "SELECT * FROM `frontload` ORDER BY `id` DESC;";
$result = mysqli_query($con, $query);

// Fetching data from the 'education' table
$query2 = "SELECT * FROM `education` ORDER BY `id` DESC;";
$result2 = mysqli_query($con, $query2);
// Fetching data from the 'education' table
$query3 = "SELECT * FROM `linker` ORDER BY `id` DESC;";
$result3 = mysqli_query($con, $query3);
?>

<?php include "script.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Latest Education | Study | Research News Live | Newsguru</title>
    <meta name="description" content="Stay updated with the latest education, study, and research news live on newsguru.live. Get informed about the latest developments in the field of education and stay ahead in your academic journey.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon.svg">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/widgets.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://kit.fontawesome.com/353f0e393d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main-wrap">
        <?php include('header.php') ?>
        <main class="position-relative">
            <div class="archive-header text-center mb-50">
                <div class="container">
                    <h2><span class="text-success">Latest Education News</span></h2>
                    <div class="breadcrumb">
                        <span class="no-arrow">We found the latest articles for you</span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php include('sidebar.php') ?>
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row mb-50">
                            <div class="col-lg-8 col-md-12">
                                <div class="latest-post mb-50">
                                    <div class="loop-list-style-1">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                                <div class="d-md-flex d-block">
                                                    <div class="post-thumb post-thumb-big d-flex mr-15 border-radius-15 img-hover-scale">
                                                        <a class="color-white" href="<?php echo htmlspecialchars($row['link']); ?>">
                                                            <img class="border-radius-15" src="<?php echo htmlspecialchars($row['image']); ?>" alt>
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="#"><span class="post-in text-danger font-x-small"><?php echo htmlspecialchars($row['tag']); ?></span></a>
                                                        </div>
                                                        <h5 class="post-title mb-15 text-limit-2-row">
                                                            <span class="post-format-icon">
                                                                <i class="fa-brands fa-studiovinari"></i>
                                                            </span>
                                                            <a href="<?php echo htmlspecialchars($row['link']); ?>"><?php echo htmlspecialchars($row['heading']); ?></a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block"><?php echo htmlspecialchars($row['text']); ?></p>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="#">Newsguru Editors</a></span>
                                                            <span class="post-on"><?php echo htmlspecialchars($row['time']); ?></span>
                                                            <span class="time-reading">12 mins read</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Pagination -->
                                <div class="pagination-area mb-30">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start">
                                            <?php
                                            $pages = 5; // Example total pages, should be dynamic based on your pagination logic
                                            $current_page = isset($_GET['page-nr']) ? (int)$_GET['page-nr'] : 1;

                                            if ($current_page > 1) {
                                                ?>
                                                <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                    <a class="prev" href="?page-nr=<?php echo $current_page - 1; ?>">Prev</a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;">
                                                    <a class="prev">Prev</a>
                                                </li>
                                                <?php
                                            }

                                            for ($counter = 1; $counter <= $pages; $counter++) {
                                                ?>
                                                <li class="pageNumber active" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;">
                                                    <a href="?page-nr=<?php echo $counter; ?>"><?php echo $counter; ?></a>
                                                </li>
                                                <?php
                                            }

                                            if ($current_page < $pages) {
                                                ?>
                                                <li class="page-item" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;">
                                                    <a class="next" href="?page-nr=<?php echo $current_page + 1; ?>">Next</a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="page-item" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;">
                                                    <a class="next">Next</a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 sidebar-right">
<div class="sidebar-widget p-20 border-radius-15 bg-white widget-text wow fadeIn animated">
<div class="widget-header mb-30">
<h5 class=widget-title>Search <span>More News</span></h5>
</div>
<div>
<?php
                        while($row = mysqli_fetch_assoc($result3))
                        {
                            ?>
    <a class="font-small text-muted" href="<?php echo ($row['link']); ?>" style="color:blue !important;"><i class="fa-solid fa-link"></i><?php echo ($row['hlink']); ?></a>
    <br>
    <br>
    <?php
                        }
                            ?>
</div>

</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('footer.php') ?>
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
    <script src="https://ionicons.com/5.0.0/dist/ionicons.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function updateDateTime() {
            var d = new Date();
            var day = d.toLocaleString('en-us', { weekday: 'long' });
            var month = d.toLocaleString('en-us', { month: 'long' });
            var date = d.getDate();
            var hour = d.getHours();
            var minutes = d.getMinutes();
            var seconds = d.getSeconds();
            hour = (hour < 10 ? "0" : "") + hour;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            document.getElementById('date').innerHTML = date;
            document.getElementById('day').innerHTML = day;
            document.getElementById('time').innerHTML = hour + ':' + minutes + ':' + seconds;
            document.getElementById('month').innerHTML = month;
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>
