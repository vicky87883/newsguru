<?php
// Database connection details
$servername = "localhost";
$username = "vikram";
$password = "Parjapat@123";
$dbname = "coder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch articles from the `article` table
$sql1 = "SELECT id, heading, text FROM article";
$result1 = $conn->query($sql1);
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Current Affairs Today - Latest Current Affairs 2024 by newsguru | Current Affairs Daily | All Around World</title>
<meta name="description" content="Newsguru's Current Affairs Today Section provides latest and Best Daily Current Affairs 2022-2023 for UPSC, IAS/PCS, Banking, IBPS, SSC, Railway, UPPSC, RPSC, BPSC, MPPSC, TNPSC, MPSC, KPSC and other competition exams.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="site.webmanifest">
<link rel="shortcut icon" type="image/x-icon" href="../assets/imgs/favicon.svg">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/widgets.css">
<link rel="stylesheet" href="../assets/css/color.css">
<link rel="stylesheet" href="../assets/css/responsive.css">
<script src="https://kit.fontawesome.com/353f0e393d.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img class="jump mb-50" src="../assets/imgs/loading.svg" alt>
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
    <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
        <button class="off-canvas-close"><i class="ti-close"></i></button>
        <div class="sidebar-inner">
            <div class="siderbar-widget mb-50 mt-30">
                <form action="#" method="get" class="search-form position-relative">
                    <input type="text" class="search_field" placeholder="Search" name="s">
                    <span class="search-icon"><i class="ti-search mr-5"></i></span>
                </form>
            </div>
            <!-- Sidebar Widgets -->
            <!-- Add your sidebar widgets here -->
        </div>
    </aside>

    <?php include('header.php'); ?>

    <main class="position-relative">
        <div class="archive-header text-center mb-50">
            <div class="container">
                <h2><span class="text-success">Current Affairs Today - Current Affairs - 2024</span></h2>
                <div class="breadcrumb"><span class="no-arrow">Daily Current Affairs Quiz: June 23-24, 2024</span></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php include('../sidebar.php'); ?>

                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row mb-50">
                        <div class="col-lg-8 col-md-12">
                            <div class="latest-post mb-50">
                                <div class="loop-list-style-1">
                                    <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                        <?php if ($result1->num_rows > 0): ?>
                                            <ul>
                                                <?php while ($row = $result1->fetch_assoc()): ?>
                                                    <li class="article-item">
                                                        <div class="d-md-flex d-block">
                                                            <div class="post-thumb post-thumb-big d-flex mr-15 border-radius-15 img-hover-scale">
                                                                <a class="color-white" href="article.php?id=<?php echo $row['id']; ?>">
                                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                                        <span class="post-format-icon">
                                                                            <i class="fa-solid fa-notes-medical"></i>
                                                                        </span>
                                                                        <?php echo ($row['heading']); ?>
                                                                    </h5>
                                                                </a>
                                                            </div>
                                                            <p class="post-excerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                                <?php echo (mb_strimwidth($row['text'], 0, 150, '...')); ?>
                                                            </p>
                                                        </div>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php else: ?>
                                            <p>No articles found.</p>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            </div>

                            <!-- Pagination Area -->
                            <div class="pagination-area mb-30">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        <?php
                                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1) {
                                            ?>
                                            <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                <a class="prev" href="?page-nr=<?php echo $_GET['page-nr'] - 1?>">Prev</a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                <a class="prev">Prev</a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        for ($counter= 1; $counter <= $pages; $counter++) {
                                            ?>
                                            <li class="page-item active" style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (!isset($_GET['page-nr'])) {
                                            ?>
                                            <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                <a href="?page-nr=2" class="next">Next</a>
                                            </li>
                                            <?php
                                        } else {
                                            if ($_GET['page-nr'] >= $pages) {
                                                ?>
                                                <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                    <a class="next">Next</a>
                                                </li>
                                                <?php
                                            } else {
                                                ?>
                                                <li style="background:#e24257;color:#fff !important;padding:5px;border-radius:5px;margin:5px;">
                                                    <a class="next" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
<!-- Fetch data from another table -->
<?php
        // Fetch data from another table, e.g., `news`
        $sql2 = "SELECT id, link, hlink FROM linker"; // Change this to your table name and columns
        $result2 = $conn->query($sql2);
        ?>
                        <div class="col-lg-4 col-md-12 sidebar-right">
                            <div class="sidebar-widget p-20 border-radius-15 bg-white widget-text wow fadeIn animated">
                                <div class="widget-header mb-30">
                                    <h5 class="widget-title">Search <span>More News</span></h5>
                                </div>
                                <div>
                                <?php
                        while($row = mysqli_fetch_assoc($result2))
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

    <?php include('footer.php'); ?>

    <!-- Back to top button -->
    <div class="dark-mark"></div>
    <a href="#" class="scroll-to-top"><i class="fas fa-chevron-up"></i></a>
</div>

<script src="../assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="../assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="../assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="../assets/js/plugins/slick.js"></script>
<script src="../assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="../assets/js/plugins/wow.js"></script>
<script src="../assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="../assets/js/plugins/countdown.min.js"></script>
<script src="../assets/js/plugins/images-loaded.js"></script>
<script src="../assets/js/plugins/isotope.js"></script>
<script src="../assets/js/plugins/scrollup.js"></script>
<script src="../assets/js/plugins/jquery.vticker-min.js"></script>
<script src="../assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="../assets/js/plugins/jquery.elevatezoom.js"></script>
<script src="../assets/js/plugins/ajax-mail.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>

<?php
// Close connections
$conn->close();
?>
