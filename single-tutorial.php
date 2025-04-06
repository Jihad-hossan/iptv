<?php
/**
 * The template for displaying single Tutorial posts
 *
 * @package YourThemeName
 */

get_header(); // Load header template
?>

<!-- Banner -->
<section class="banner">
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
</section>

<section class="post_cont">
    <div class="container-small">
        <main id="primary" class="site-main">
            <?php
            // Start the Loop
            while (have_posts()):
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()): ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Post Header (Title, Meta) -->
                    <header class="entry-header">
                        <?php
                        the_title('<h1 class="entry-title">', '</h1>');

                        if ('tutorial' === get_post_type()):
                            ?>
                            <div class="entry-meta">
                                <?php
                                the_date('', '<span class="posted-on">', '</span>');
                                the_author_posts_link('<span class="byline"> by ', '</span>');
                                ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <!-- Post Content -->
                    <div class="entry-content">
                        <?php
                        the_content();

                        // Pagination for multi-page posts
                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'yourthemename'),
                                'after' => '</div>',
                            )
                        );
                        ?>
                    </div>

                </article>

            <?php
            endwhile; // End the Loop
            ?>
        </main>
    </div>
</section>

<?php
get_footer(); // Load footer template
?>