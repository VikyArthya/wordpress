<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <style>
        body {
            background-image: url("https://www.transparenttextures.com/patterns/skulls.png");
            background-repeat: repeat;
        }
        .event-list-page {
            font-family: "Segoe UI", Tahoma, sans-serif;
            color: #334155;
        }

        .event-list-page h1 {
            font-size: 2rem;
            font-weight: 600;
            color: #0073aa;
            text-align: center;
        }

        .event-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-top: 2rem;
        }

        .event-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .event-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }


        .event-card-banner img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .event-card-body {
            padding: 16px 18px;
        }
        .event-card-body h2 {
            margin: 0 0 10px 0;
            font-size: 1.25rem;
            font-weight: 600;
            line-height: 1.3;
        }
        .event-card-body h2 a {
            text-decoration: none;
            color: #1e293b;
            transition: color 0.2s;
        }
        .event-card-body h2 a:hover {
            color: #0073aa;
        }
        .event-card-body p {
            margin: 6px 0;
            font-size: 0.95rem;
            color: #475569;
        }

        .event-card-body .button {
            display: inline-block;
            background: #0073aa;
            color: #fff;
            font-size: 0.9rem;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 12px;
            transition: background 0.3s;
        }
        .event-card-body .button:hover {
            background: #005f8d;
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wp-site-blocks event-list-page">

    <?php block_template_part( 'header' ); ?>

    <main class="wp-block-group is-layout-flow" style="margin-top:3rem;margin-bottom:3rem">
        <div class="container" style="max-width: 1080px; margin-left: auto; margin-right: auto; padding-left: 15px; padding-right: 15px;">
            
            <h1>🎉 Daftar Event</h1>

            <div class="event-list">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="event-card">
                        <?php
                        $banner_data = pods_field('event_banner'); 
                        if (!empty($banner_data)) {
                            $banner_url = $banner_data['guid']; 
                            echo '<div class="event-card-banner"><img src="' . esc_url($banner_url) . '" alt="' . get_the_title() . '"></div>';
                        }
                        ?>
                        <div class="event-card-body">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php 
                            $price_data = pods_field('event_price');
                            if (is_array($price_data) && !empty($price_data[0])) : 
                            ?>
                                <p><strong>💰 Harga:</strong> Rp <?php echo number_format($price_data[0], 0, ',', '.'); ?></p>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="button">Lihat Detail</a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </main>
    
    <?php block_template_part( 'footer' ); ?>

</div>

<?php wp_footer(); ?>
</body>
</html>
