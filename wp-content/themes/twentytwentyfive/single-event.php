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
        
        .event-detail {
            font-family: "Segoe UI", Tahoma, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .event-detail h1 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: #0073aa;
            text-align: center;
        }

        .event-detail-banner {
            text-align: center;
            margin: 1.5rem 0;
        }
        .event-detail-banner img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        #countdown {
            display: flex;
            justify-content: center;
            gap: 1rem;
            background: #f1f5f9;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin: 1.5rem 0;
            font-size: 1.1rem;
            font-weight: bold;
            color: #1e293b;
        }
        #countdown div {
            text-align: center;
        }
        #countdown span {
            font-size: 1.6rem;
            color: #0073aa;
            display: block;
        }
        #countdown .separator {
            font-size: 1.5rem;
            color: #475569;
            align-self: center;
        }

        .event-info {
            background: #f9fafb;
            border-left: 5px solid #0073aa;
            padding: 1rem 1.5rem;
            margin: 2rem 0;
            border-radius: 8px;
        }
        .event-info p {
            margin: 0.5rem 0;
        }

        .event-description h3 {
            margin-bottom: 0.8rem;
            font-size: 1.5rem;
            color: #0073aa;
        }
        .event-description {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wp-site-blocks">
    <?php block_template_part( 'header' ); ?>

    <main class="wp-block-group is-layout-flow" style="margin-top:3rem;margin-bottom:3rem">
        <div class="container" style="max-width: 960px; margin-left: auto; margin-right: auto; padding-left: 15px; padding-right: 15px;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                $banner_data = pods_field('event_banner');
                $price_data = pods_field('event_price');

                $datetime_data = pods_field('event_datetime');
                $datetime_raw = !empty($datetime_data[0]) ? $datetime_data[0] : '';

                $location_data = pods_field('event_location');
                $location = !empty($location_data[0]) ? $location_data[0] : 'Lokasi belum ditentukan';

                $datetime_formatted = !empty($datetime_raw) ? date("l, d F Y \p\u\k\u\l H:i", strtotime($datetime_raw)) : 'Segera';
                ?>

                <article class="event-detail">
                    <h1><?php the_title(); ?></h1>

                    <?php 
                    if (!empty($banner_data)) {
                        $banner_url = $banner_data['guid'];
                        echo '<div class="event-detail-banner"><img src="' . esc_url($banner_url) . '" alt="' . get_the_title() . '"></div>';
                    }
                    ?>
        
                    <h3 style="text-align:center; color:#0073aa; margin-bottom:1rem;">⏳ Hitung Mundur Event</h3>
                    <div id="countdown" data-datetime="<?php echo esc_attr($datetime_raw); ?>">
                        <div><span id="days">0</span> Hari</div>
                        <div class="separator">:</div>
                        <div><span id="hours">0</span> Jam</div>
                        <div class="separator">:</div>
                        <div><span id="minutes">0</span> Menit</div>
                        <div class="separator">:</div>
                        <div><span id="seconds">0</span> Detik</div>
                    </div>

                    <div class="event-info">
                        <p><strong>🗓 Waktu:</strong> <?php echo $datetime_formatted; ?></p>
                        <p><strong>📍 Lokasi:</strong> <?php echo esc_html($location); ?></p>
                        <?php 
                        if (is_array($price_data) && !empty($price_data[0])) {
                            echo '<p><strong>💰 Harga:</strong> Rp ' . number_format($price_data[0], 0, ',', '.') . '</p>';
                        }
                        ?>
                    </div>

                    <div class="event-description">
                        <h3>📖 Deskripsi Event</h3>
                        <?php the_content(); ?>
                    </div>
                </article>

            <?php endwhile; endif; ?>
        </div>
    </main>

    <?php block_template_part( 'footer' ); ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const countdownElement = document.getElementById('countdown');
    if (countdownElement) {
        const eventDateTime = countdownElement.getAttribute('data-datetime');
        
        if (!eventDateTime) {
            countdownElement.innerHTML = "⏰ Waktu event belum ditentukan.";
            return;
        }

        const targetDate = new Date(eventDateTime).getTime();

        const interval = setInterval(function() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(interval);
                countdownElement.innerHTML = "🎉 EVENT SUDAH BERLANGSUNG";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').innerText = days;
            document.getElementById('hours').innerText = hours;
            document.getElementById('minutes').innerText = minutes;
            document.getElementById('seconds').innerText = seconds;

        }, 1000);
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
