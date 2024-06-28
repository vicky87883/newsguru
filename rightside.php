<div class="col-lg-4 col-md-12 sidebar-right">
<div class="sidebar-widget mb-30">
<div class="widget-header position-relative mb-30">
<div class=row>
<div class=col-7>
<h4 class="widget-title mb-0">Don't <span>miss</span></h4>
</div>
<div class="col-5 text-right">
<h6 class="font-medium pr-15">
<a class="text-muted font-small" href=#>View all</a>
</h6>
</div>
</div>
</div>
<div class="post-aside-style-1 border-radius-10 p-20 bg-white">
<ul class=list-post>
	<?php
                        while($row = mysqli_fetch_assoc($result3))
                        {
                            ?>
<li class=mb-20>
<div class=d-flex>
<div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
<a class=color-white href="<?php echo ($row['link']); ?>">
<img src="<?php echo ($row['image']); ?>" alt>
</a>
</div>
<div class="post-content media-body">
<h6 class="post-title mb-10 text-limit-2-row"><a href="<?php echo ($row['link']); ?>"><?php echo ($row['heading']); ?></a></h6>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6958761602872755"
     data-ad-slot="6842988096"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
</li>
	<?php
						}
                            ?>
	</ul>
</div>
</div>
<div class="sidebar-widget widget_newsletter border-radius-10 p-20 bg-white mb-30">
<div class="widget-header widget-header-style-1 position-relative mb-15">
<h5 class=widget-title>Newsletter</h5>
</div>
<!-- displayads4 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6958761602872755"
     data-ad-slot="6842988096"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div class=newsletter>
<p class=font-medium>Heaven fruitful doesn't over les idays appear creeping</p>
<form target=_blank action=# method=get class="subscribe_form relative mail_part">
<div class=form-newsletter-cover>
<div class="form-newsletter position-relative">
<input type=email name=EMAIL placeholder="Put your email here" required>
<button type=submit>
<i class="ti ti-email"></i>
</button>
</div>
</div>
</form>
</div>
</div>
</div>
