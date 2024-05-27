
<div class="latest-post mb-50">
<div class="widget-header position-relative mb-30">
<div class=row>
<div class=col-7>
<h4 class="widget-title mb-0">Latest <span>Posts</span></h4>
</div>
<div class="col-5 text-right">
<h6 class="font-medium pr-15">
<a class="text-muted font-small" href=#>View all</a>
</h6>
</div>
</div>
</div>
<div class=loop-list-style-1>

	<?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
<article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
	
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-15 img-hover-scale">
<a class=color-white href=amid-row-with-india.php>
<img class=border-radius-15 src="<?php echo ($row['image']); ?>" alt>
</a>
</div>
<div class="post-content media-body">
<div class="entry-meta mb-15 mt-10">
<a class="entry-meta meta-2" href=#><span class="post-in text-danger font-x-small"><?php echo ($row['tag']); ?></span></a>
</div>
<h5 class="post-title mb-15 text-limit-2-row">
<span class=post-format-icon>
<i class="fa-solid fa-person-biking"></i>
</span>
<a href="<?php echo ($row['link']); ?>">
	<?php echo ($row['heading']); ?>
	</a>
</h5>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
<span class=post-by>By <a href=#><?php echo ($row['name']); ?></a></span>
<span class=post-on><?php echo ($row['time']); ?></span>
<span class=time-reading><?php echo ($row['readtime']); ?></span>
</div>
</div>
</div>
	
</article>
<?php
                        }

                        ?>

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
