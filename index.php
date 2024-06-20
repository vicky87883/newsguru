<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy Loading Content Example</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Add your CSS links here -->
    <script src="https://kit.fontawesome.com/353f0e393d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="preloader-active">
        <!-- Your preloader code goes here -->
    </div>
    <div class="main-wrap">
        <?php include('header.php'); ?>
        <main>
            <div class="container">
                <div class="row">
                    <?php include('sidebar.php'); ?>
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row" id="content-container">
                            <!-- Content will be dynamically loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('footer.php'); ?>
    </div>

    <div class="dark-mark"></div>

    <!-- Your JavaScript files -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            loadContent('topsection', 'content-container');
            loadContent('dontmiss', 'content-container');
        });

        function loadContent(type, containerId) {
            const container = document.getElementById(containerId);
            container.innerHTML = '<div class="loading">Loading...</div>';

            fetch(`fetch_data.php?type=${type}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    container.innerHTML = ''; // Clear loading indicator
                    if (data.error) {
                        container.innerHTML = `<div class="error">Error: ${data.error}</div>`;
                        return;
                    }
                    if (data.length) {
                        data.forEach(item => {
                            container.innerHTML += `
                                <article class="post">
                                    <div class="post-thumbnail">
                                        <img class="lazyload" src="assets/imgs/loading.svg" data-src="${item.image_url}" alt="${item.title}">
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title">${item.title}</h2>
                                        <p class="post-description">${item.description}</p>
                                    </div>
                                </article>`;
                        });
                        // Initialize lazyload after content is added
                        initializeLazyLoad();
                    } else {
                        container.innerHTML = '<p>No content available.</p>';
                    }
                })
                .catch(error => {
                    container.innerHTML = `<div class="error">Error loading content: ${error.message}</div>`;
                });
        }

        function initializeLazyLoad() {
            const lazyloadImages = document.querySelectorAll('img.lazyload');
            lazyloadImages.forEach(img => {
                img.addEventListener('load', () => {
                    img.classList.add('fade-in');
                });
                img.src = img.dataset.src;
            });
        }
    </script>
</body>
</html>
