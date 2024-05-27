<div class=related-posts>
							<h3 class=mb-30>Related posts</h3>
							<div class=row>
								<?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            ?>
								<article class=col-lg-4>
									<div class="background-white border-radius-10 p-10 mb-30">
										<div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale"><a
												href=#><img class=border-radius-15 src="<?php echo ($row['image']); ?>" alt></a>
										</div>
										<div class="pl-10 pr-10">
											<div class="entry-meta mb-15 mt-10"><a class="entry-meta meta-2"
													href=<?php echo ($row['link']); ?>><span
														class="post-in text-primary font-x-small"><?php echo ($row['tag']); ?></span></a>
											</div>
											<h5 class="post-title mb-15"><span class=post-format-icon><ion-icon
														name=image-outline role=img class="md hydrated"
														aria-label="image outline"></ion-icon></span><a href="<?php echo ($row['link']); ?>"><?php echo ($row['heading']); ?></a></h5>
											<div
												class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
												<span class=post-by><?php echo ($row['name']); ?></span><span
													class=post-on><?php echo ($row['readtime']); ?></span></div>
										</div>
									</div>
								</article>
								
								<?php
                        }

                        ?>
							</div>
						</div>