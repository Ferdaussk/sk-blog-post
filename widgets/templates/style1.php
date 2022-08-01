
		<div class="bwd_blog_design_1">
            <div class="container">
                <div class="row">
                <?php 
                // $wp_query = new WP_Query(array('post_per_page'=>-1));
                // $sk_query = new WP_Query( array( 'posts_per_page' =>4 ) );
                $sk_query = new \WP_Query( $bwdbp_args );
                    if($sk_query->have_posts()) :
                        while($sk_query->have_posts()) : $sk_query->the_post();
					echo '<div class="col-xxl-4 '. $bwdbp_xl_dev_clmn .' '. $bwdbp_lg_dev_clmn .'">';
						?>
						<div class="bwd_blog_area">
							<div class="bwd_blog_img">
								<?php $this->bwdbp_post_thumbnail_here(); ?>
							</div>
							<div class="bwd_blog-content">
								<?php
								if($bwdbp_yes_value === $bwdbp_date_swtcher){ ?>
									<div class="bwd_date-home">
										<i class="fa-solid fa-calendar-days"></i>
										<?php
										echo get_the_date($bwdbp_blog_date_format);
										?>
									</div>
								<?php
								}
								?>
								<div class="bwd_meta-info mb-15">
									<ul>
										<?php if($bwdbp_yes_value === $bwdbp_author_swtcher){ ?><li><i class="fa fa-user"></i> <span class="bwd_meta_text"><?php echo get_the_author_meta( 'nickname' ); ?></span></li><?php } ?>
										<?php if($bwdbp_yes_value === $bwdbp_comments_swtcher){ ?><li><i class="fa fa-comments"></i> <span class="bwd_meta_text"><?php if(!have_comments()){ echo esc_html__('Comment ', 'bwd-blog-post') . get_comments_number(); } ?></span></li><?php } ?>
										<?php if($bwdbp_yes_value === $bwdbp_categories_swtcher){ ?><li><?php $this->bwdbp_post_categories(); ?></li><?php } ?>
										<?php if($bwdbp_yes_value === $bwdbp_tags_swtcher){ ?><li><?php the_tags(); ?></li><?php } ?>
									</ul>
								</div>
								<?php
								if($bwdbp_yes_value === $bwdbp_title_swtcher){
									?>
								<div class="bwd_main_title mb-15"><a style="color:black; text-decoration:none !important;" onMouseOver="this.style.color='#ff5e15'" onMouseOut="this.style.color='black'" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></div>
								<?php
								}
								if($bwdbp_yes_value === $bwdbp_description_swtcher){
								?>
								<div class="bwd_sub_title speech">
									<p><?php echo wp_trim_words(get_the_content(), $bwdbp_post_description_words); ?></p>
								</div>
								<?php
								}
								if($bwdbp_yes_value === $settings['bwdbp_button_show_switcher']){
								?>
								<div class="bwd_blog__bttn mt-20">
									<a class="bwd_bwd_blog-btn" href="<?php the_permalink(); ?>" <?php if($bwdbp_yes_value === $settings['bwdbp_button_open_switcher']){ ?>target="_blank" <?php } ?>><?php echo esc_html__($settings['bwdbp_blog_button_title'], 'bwd-blog-post'); ?></a>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
                    <?php
						endwhile;
					endif;
                    ?>
				</div>
			</div>
		</div>
		<?php
		bestwpdevelopertd_blog_pagination();
		echo 'Ferdaus';