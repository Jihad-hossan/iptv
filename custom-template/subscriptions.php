<?php /* Template Name: Subscriptions */ ?>
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
                        <li><a href="<?php echo get_site_url(); ?>"><?php echo esc_html(_e('Home', 'iptv')); ?></a></li>
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


<?php 
    $pricing_plan = get_field( "pricing_plan" ); 
        if(!empty($pricing_plan)):

        $pricing_cards = $pricing_plan['pricing_cards'];
?>
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
<?php endif; endif;?>


<?php 
    $iptv_boxen = get_field( "iptv_boxen" ); 
    if(!empty($iptv_boxen)):

        $title = $iptv_boxen['title'];
        $description = $iptv_boxen['description'];
        $cards = $iptv_boxen['cards'];
?>
<!-- Abonnement section -->
<section class="boxen">
    <div class="container-small">
        <div class="row">
            <div class="col-md-6 left">
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
                        <div class="title-des">
                            <?php if(!empty($title)): ?>
                                <h4 class="card-title"><?php echo esc_html(_e($title, 'iptv')); ?></h4>
                            <?php endif; ?>
                            <?php if(!empty($description)): ?>
                                <p><?php echo esc_html(_e($description, 'iptv')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>