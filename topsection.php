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

<?php include('bottomnews.php') ?>	
</div>
</div>
</div>
