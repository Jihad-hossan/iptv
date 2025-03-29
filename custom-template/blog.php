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

<!-- Post Slider -->
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
                            'order' => 'DESC',
                            'category_name' => 'featured'
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
                                <a href="<?php echo get_the_permalink(); ?>" class="iptv-btn btn-1">See more</a>
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

<!-- Posts with filter -->
<section class="post-filter">
    <div class="container-small">
        <?php
        // Get the selected order from URL parameter or default to DESC (newest first)
        $selected_order = isset($_GET['order']) && $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';
        
        // Get current page
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 12,
            'orderby' => 'date',
            'order' => $selected_order,
            'paged' => $paged
        );
        $query = new WP_Query($args);

        // Get total published posts count
        $count_posts = wp_count_posts();
        $published_posts = $count_posts->publish;
        ?>
        
        <div class="row">
            <div class="filter-row">
                <h3 class="post-name"><?php echo get_the_title(); ?> <span class="total-post">(<?php echo $published_posts; ?>)</span></h3>
                <div class="filter">
                    <form id="sort-form" method="get">
                        <select name="order" id="post-order" onchange="this.form.submit()">
                            <option value="DESC" <?php selected($selected_order, 'DESC'); ?>>Newest</option>
                            <option value="ASC" <?php selected($selected_order, 'ASC'); ?>>Oldest</option>
                        </select>
                        <!-- Keep the page number in the form -->
                        <?php if ($paged > 1): ?>
                            <input type="hidden" name="paged" value="<?php echo $paged; ?>">
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row post-row">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-4">
                        <a class="post" href="<?php the_permalink(); ?>" data-background-image="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>">
                            <h4 class="title"><?php the_title(); ?></h4>
                            <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
                
                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    $big = 999999999; // need an unlikely integer
                    
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $query->max_num_pages,
                        'prev_text' => __('Prev'),
                        'next_text' => __('Next'),
                        'type' => 'list'
                    ));
                    ?>
                </div>
                
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No posts found</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>