<?php /* Template Name: Blog */ ?>
<?php get_header();?>


<?php 
    $banner = get_field( "banner" ); 
    if(!empty($banner)):
        $title = $banner['title'];
        $description = $banner['description'];
        $image = $banner['image'];
?>
<!-- Banner -->
<section class="banner" >
    <div class="container-wrapper">
        <div class="container">
            <div class="row">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?php echo get_site_url(); ?>">Home</a></li>
                        <li>></li>
                        <li class="current"><?php echo get_the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-small">
        <div class="row">
            <div class="col-md-6 left">
                <?php if(!empty($title)): ?>
                    <h1 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h1>
                <?php endif; ?>
                <?php if(!empty($description)): ?>
                    <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-6 right">
                <?php if(!empty($image)): ?>
                    <img class="circle-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo  esc_attr($image['alt']); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="posts-slider">
    <div class="container-small">
        <div class="row">
            <div class="col-md-12">
                <div class="swiper posts-swiper">
                    <div class="swiper-wrapper">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3, // Get 3 most recent posts
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $query = new WP_Query($args);
                        
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="post" data-background-image="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>">
                                <div class="content">
                                    <h4 class="title"><?php the_title(); ?></h4>
                                    <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                                </div>
                                <a href="#" class="iptv-btn btn-1">See more</a>
                            </div>
                        </div>
                        <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <p>No posts found</p>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>