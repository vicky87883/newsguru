<div class="col-lg-4 col-md-12 sidebar-right">
<div class="sidebar-widget mb-50">
<div class="widget-header mb-30">
<h5 class=widget-title>Most <span>Popular</span></h5>
</div>
<div class=post-aside-style-3>
	<?php
                        while($row = mysqli_fetch_assoc($result2))
                        {
                            ?>
<article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
<div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
<a href="<?php echo ($row['link']); ?>">
<img src="<?php echo ($row['image']); ?>" alt=blog />
</a>
</div>
<div class="pl-10 pr-10">
<h5 class="post-title mb-15"><a href="<?php echo ($row['link']); ?>"><?php echo ($row['heading']); ?></a></h5>
<div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
<span class=post-in><?php echo ($row['type']); ?></span>
<span class=post-by><?php echo ($row['name']); ?></span>
<span class=post-on><?php echo ($row['readtime']); ?></span>
</div>
</div>
</article>
	<?php
                        }

                        ?>
</div>
</div>
</div>
