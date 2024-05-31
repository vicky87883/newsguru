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
	

<?php include('bottomnews.php') ?>	
</div>
</div>
</div>
