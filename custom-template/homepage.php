<?php /* Template Name: Home */ ?>
<?php get_header();?>
<!-- Banner -->

<?php 
    $hero = get_field( "hero" ); 
    if(!empty($hero)):
?>
<section class="hero" >
    <div class="container">
        <div class="row">
            <?php 
                $title = $hero['title'];
                $description = $hero['description'];
                $button__01 = $hero['button__01'];
                $button_02 = $hero['button_02'];
                $image_slider = $hero['image_slider'];
                $scroll_to_bottom = $hero['scroll_to_bottom'];
            ?>
            <div class="col-md-6 left-side">
                <img class="circle-shape" src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-circle.png" alt="<?php echo __("shape", 'iptv'); ?>">
                <?php if(!empty($title)): ?>
                    <h1 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h1>
                <?php endif; ?>
                <?php if(!empty($description)): ?>
                    <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                <?php endif; ?>
                <?php if(!empty($button__01) || !empty($button__02)): ?>
                    <div class="btns-wrapper">
                        <?php if(!empty($button__01)): ?>
                            <a href="<?php echo esc_url( $button__01['url'] ); ?>" target="<?php echo esc_attr( $button__01['target'] ); ?>" class="iptv-btn btn-1"><?php echo esc_html(_e($button__01['title'], 'iptv')); ?></a>
                        <?php endif; ?>
                        <?php if(!empty($button_02)): ?>
                            <a href="<?php echo esc_url( $button_02['url'] ); ?>" target="<?php echo esc_attr( $button_02['target'] ); ?>" class="iptv-btn btn-2"><?php echo esc_html(_e($button_02['title'], 'iptv')); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($image_slider)): ?>
                <div class="col-md-6 right-side">
                    <div class="swiper hero-card-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($image_slider as $item): ?>
                                <div class="swiper-slide"><img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" class="slider-img"></div>
                            <?php endforeach;?>
                        </div>
                        <span class="swiper-notification"></span>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar hidden"></div>
                    </div>

                    <?php if(!empty($scroll_to_bottom)): ?>
                        <div class="scroll-bottom">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/scroll-icon.png" alt="<?php echo esc_html(_e("Arrow", 'iptv'))  ?>">
                            <a href="#bottom-content" class="scroll-btn"><?php echo esc_html(_e($scroll_to_bottom, 'iptv')); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php 
    $icon_list = $hero['icon_list'];
    if(!empty($icon_list)):
        $icon_1 = $icon_list['icon_1'];
        $title_1 = $icon_list['title_1'];
        $icon_2 = $icon_list['icon_2'];
        $title_2 = $icon_list['title_2'];
?>
<!-- reel -->
<section class="reel">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="quality-badge">
                    <div class="left">
                        <?php if(!empty($icon_1)): ?>
                            <div class="icon"><img src="<?php echo esc_url($icon_1['url']); ?>" alt="<?php echo  esc_attr($icon_1['alt']); ?>"></div>
                        <?php endif; ?>
                        <?php if(!empty($title_1)): ?>
                            <div class="content"><p><?php echo esc_html(_e($title_1, 'iptv')); ?></p></div>
                        <?php endif; ?>
                    </div>
                    <div class="right">
                        <?php if(!empty($icon_2)): ?>
                            <div class="icon"><img src="<?php echo esc_url($icon_2['url']); ?>" alt="<?php echo  esc_attr($icon_2['alt']); ?>"></div>
                        <?php endif; ?>
                        <?php if(!empty($title_2)): ?>
                            <div class="content"><p><?php echo esc_html(_e($title_2, 'iptv')); ?></p></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; endif; ?>

<?php 
    $about = get_field( "about" ); 
    if(!empty($about)):

        $top_image = $about['top_image'];
        $title = $about['title'];
        $description = $about['description'];
        $cards = $about['cards'];
?>
<!-- Abonnement section -->
<section class="abonnement" id="bottom-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left">
                <?php if(!empty($top_image)): ?>
                    <img class="circle-shape" src="<?php echo esc_url($top_image['url']); ?>" alt="<?php echo  esc_attr($top_image['alt']); ?>">
                <?php endif; ?>
                <?php if(!empty($title)): ?>
                    <h2 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h2>
                <?php endif; ?>
            </div>

            <?php if(!empty($description)): ?>
                <div class="col-md-6 right">
                    <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <?php if(!empty($cards)): ?>
            <div class="row to-center">
                <div class="cards">
                    <?php foreach ($cards as $item): 
                        $icon = $item['icon'];
                        $title = $item['title'];
                        $description = $item['description'];
                    ?>
                    <div class="card">
                        <?php if(!empty($icon)): ?>
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo  esc_attr($icon['alt']); ?>">
                        <?php endif; ?>
                        <?php if(!empty($title)): ?>
                            <h4 class="card-title"><?php echo esc_html(_e($title, 'iptv')); ?></h4>
                        <?php endif; ?>
                        <?php if(!empty($description)): ?>
                            <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php 
    $series = get_field( "series" ); 
    if(!empty($series)):

        $subtitle = $series['subtitle'];
        $title = $series['title'];
        $description = $series['description'];
        $series_slider_1 = $series['series_slider_1'];
        $series_slider_2 = $series['series_slider_2'];
        $series_slider_3 = $series['series_slider_3'];
?>
<!-- series -->
<div class="series-wrapper">
    <section class="series">
        <div class="container">
            <div class="row to-center">
                <div class="content">
                    <?php if(!empty($subtitle)): ?>
                        <p class="subtitle text-center"><?php echo esc_html(_e($subtitle, 'iptv')); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($title)): ?>
                        <h2 class="section-title text-center"><?php echo esc_html(_e($title, 'iptv')); ?></h2>
                    <?php endif; ?>
                    <?php if(!empty($description)): ?>
                        <p class="text-center"><?php echo esc_html(_e($description, 'iptv')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(!empty($series_slider_1)): ?>
    <section class="series-2">
        <div class="container-fluid">
            <div class="photobanner__wrap">
                <div class="photobanner">
                    <?php foreach ($series_slider_1 as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
                <div class="photobanner">
                    <?php foreach ($series_slider_1 as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
            <div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($series_slider_2)): ?>
    <section class="series-2">
        <div class="container-fluid">
            <div class="photobanner__wrap_2">
                <div class="photobanner_2">
                    <?php foreach ($series_slider_2 as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
                <div class="photobanner_2">
                    <?php foreach ($series_slider_2 as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
            <div>
        </div>
    </section>
    <?php endif; ?>

    <?php if(!empty($series_slider_3)): ?>
    <!-- Streaming Platform -->
    <section class="streaming">
        <div class="container-fluid">
            <div class="photobanner__wrap_3">
                <div class="photobanner_3">
                    <?php foreach ($series_slider_3 as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
                <div class="photobanner_3">
                    <?php foreach ($series_slider_3 as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
            <div>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php 
    $pricing_plan = get_field( "pricing_plan" ); 
    if(!empty($pricing_plan)):

        $title = $pricing_plan['title'];
        $description = $pricing_plan['description'];
        $image = $pricing_plan['image'];
        $pricing_cards = $pricing_plan['pricing_cards'];
?>
<!-- Plan -->
<section class="plan">
    <div class="container">
        <div class="row plan-row">
            <div class="col-md-6 content">
                <?php if(!empty($title)): ?>
                    <h3 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h3>
                <?php endif; ?>
                <?php if(!empty($description)): ?>
                    <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                <?php endif; ?>
            </div>
            <?php if(!empty($image)): ?>
                <div class="col-md-6">
                    <div class="reel-camera">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo  esc_attr($image['alt']); ?>">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(!empty($pricing_cards)): ?>
<section class="plan_2">
    <div class="container-full">
        <div class="pricing">
            <div class="swiper pricing-swiper">
                <div class="swiper-wrapper">
                    <?php 
                        foreach ($pricing_cards as $item): 
                            $features = $item['features'];
                            $button_01 = $item['button_01'];
                            $button_2 = $item['button_2'];
                            $payment_methods = $item['payment_methods'];
                    ?>
                        <div class="swiper-slide <?php if($item['is_popular'] == 'yes'){ echo 'popular';} ?>">
                            <div class="pricing-card">
                                <?php if(!empty($item['popular_text'])): ?>
                                    <div class="popular-badge">
                                        <p><?php echo esc_html(_e($item['popular_text'], 'iptv')); ?></p>
                                    </div>
                                <?php endif; ?>
                                <div class="card-top">
                                    <div class="top">
                                        <?php if(!empty($item['limit'])): ?>
                                            <p><?php echo esc_html(_e($item['limit'], 'iptv')); ?></p>
                                        <?php endif; ?>
                                        <div class="price-review">
                                            <?php if(!empty($item['price'])): ?>
                                                <div class="price">
                                                    <h1 class="amount"><?php echo esc_html(_e($item['price'], 'iptv')); ?></h1>
                                                    <p><?php echo esc_html(_e($item['one_time_or_yearly'], 'iptv')); ?></p>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(!empty($item['rating'])): ?>
                                                <div class="review">
                                                    <img src="<?php echo esc_url($item['rating']['url']); ?>" alt="<?php echo  esc_attr($item['rating']['alt']); ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(!empty($features)): ?>
                                        <div class="middle">
                                            <ul class="features">
                                                <?php 
                                                    foreach ($features as $list): 
                                                    $icon = $list['icon'];
                                                    $title = $list['title'];
                                                ?>
                                                    <li><img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo  esc_attr($icon['alt']); ?>"><span><?php echo esc_html(_e($title, 'iptv')); ?></span></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($button_01) || !empty($button__02)): ?>
                                        <div class="bottom">
                                            <?php if(!empty($button_01)): ?>
                                                <a href="<?php echo esc_url( $button_01['url'] ); ?>" target="<?php echo esc_attr( $button_01['target'] ); ?>" class="iptv-btn btn-1"><?php echo esc_html(_e($button_01['title'], 'iptv')); ?></a>
                                            <?php endif; ?>
                                            <?php if(!empty($button_2)): ?>
                                                <a href="<?php echo esc_url( $button_2['url'] ); ?>" target="<?php echo esc_attr( $button_2['target'] ); ?>" class="iptv-btn btn-2"><?php echo esc_html(_e($button_2['title'], 'iptv')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(!empty($payment_methods)): ?>
                                    <div class="card-bottom">
                                        <?php foreach ($payment_methods as $item): ?>
                                            <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                                        <?php endforeach;?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<?php endif; endif; ?>

<?php 
    $testimonial = get_field( "testimonial" ); 
    if(!empty($testimonial)):

        $title = $testimonial['title'];
        $description = $testimonial['description'];
        $button__1 = $testimonial['button__1'];
        $button__2 = $testimonial['button__2'];
        $image = $testimonial['image'];
?>
<!-- Testimonial -->
<section class="testimonial">
    <div class="container">
        <div class="row plan-row">
            <div class="col-md-6">
                <?php if(!empty($image)): ?>
                    <img class="circle-shape" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo  esc_attr($image['alt']); ?>">
                <?php endif; ?>
                <?php if(!empty($title)): ?>
                    <h2 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-md-6 right">
                <div class="content">
                    <?php if(!empty($description)): ?>
                        <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($button__1) || !empty($button__2)): ?>
                        <div class="btns-wrapper">
                            <?php if(!empty($button__1)): ?>
                                <a href="<?php echo esc_url( $button__1['url'] ); ?>" target="<?php echo esc_attr( $button__1['target'] ); ?>" class="iptv-btn btn-1"><?php echo esc_html(_e($button__1['title'], 'iptv')); ?></a>
                            <?php endif; ?>
                            <?php if(!empty($button__2)): ?>
                                <a href="<?php echo esc_url( $button__2['url'] ); ?>" target="<?php echo esc_attr( $button__2['target'] ); ?>" class="iptv-btn btn-2"><?php echo esc_html(_e($button__2['title'], 'iptv')); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php 
    $faq = get_field( "faq" ); 
    if(!empty($faq)):

        $image = $faq['image'];
        $title = $faq['title'];
        $description = $faq['description'];
        $faq_list = $faq['faq_list'];
?>
<!-- FAQ -->
<section class="faq">
    <div class="container">
        <div class="row plan-row">
            <div class="content">
                <?php if(!empty($image)): ?>
                    <img class="img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo  esc_attr($image['alt']); ?>">
                <?php endif; ?>
                <?php if(!empty($title)): ?>
                    <h2 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h2>
                <?php endif; ?>
                <?php if(!empty($description)): ?>
                    <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if(!empty($faq_list)): ?>
            <div class="row plan-row mt-5">
                <div class="faq-inner">
                    <div class="accordion" id="accordionExample">
                        <?php 
                            foreach ($faq_list as $index => $item): 
                                $title = $item['title'];
                                $description = $item['description'];
                                $heading_id = 'heading-' . $index;
                                $collapse_id = 'collapse-' . $index;
                                $show_class = ($index === 0) ? 'show' : '';
                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                    <button class="accordion-button <?php echo ($index !== 0) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo ($index === 0) ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                        <?php echo esc_html($title); ?>
                                    </button>
                                </h2>
                                <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo esc_attr($show_class); ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php echo wp_kses_post($description); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>


<?php 
    $country = get_field( "country" ); 
    if(!empty($country)):

        $flags = $country['flags'];
?>
<!-- Flags -->
<div class="flags-wrapper">
    <section class="flags">
        <div class="container-fluid">
            <div class="photobanner__wrap_3">
                <div class="photobanner_3">
                    <?php foreach ($flags as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
                <div class="photobanner_3">
                    <?php foreach ($flags as $item): ?>
                        <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" />
                    <?php endforeach;?>
                </div>
            <div>
        </div>
    </section>
</div>
<?php endif; ?>

<?php 
    $blogs = get_field( "blogs" ); 
    if(!empty($blogs)):

        $title = $blogs['title'];
        $image = $blogs['image'];
?>
<!-- Blogs -->
<section class="blogs">
    <div class="container">
        <div class="row plan-row">
            <?php if(!empty($title)): ?>
                <div class="col-md-6 left">
                    <h2 class="section-title"><?php echo esc_html(_e($title, 'iptv')); ?></h2>
                </div>
            <?php endif; ?>
            <?php if(!empty($image)): ?>
                <div class="col-md-6 right">
                    <img class="img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo  esc_attr($image['alt']); ?>">
                </div>
            <?php endif; ?>
        </div>
        <div class="row post-row">
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
                    <div class="col-md-4">
                        <a class="post" href="<?php the_permalink(); ?>" data-background-image="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>">
                            <h4 class="title"><?php the_title(); ?></h4>
                            <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No posts found</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>