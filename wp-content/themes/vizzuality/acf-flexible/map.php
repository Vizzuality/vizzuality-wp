<?php if (have_rows('repeater_locations')): ?>
    <section class="m-map">
        <div id="mapInput">
            <div class="row">
                <div class="grid-item"></div>
            </div>
        </div>
        <div id="map"></div>
        <div class="m-map-locations">
            <div class="row">
                <?php $_cnt = 0; while (have_rows('repeater_locations')): the_row(); ++$_cnt ?>
                    <div class="grid-item">
                        <div id="madridOffice" class="m-map-location-item<?php if ($_cnt == 1): ?> is-highlighted<?php endif; ?>" data-latlng='{"lat": <?php the_sub_field('latitude') ?>, "lng": <?php the_sub_field('longitude') ?>}'>
                            <?php if (get_sub_field('title')): ?>
                                <h3><?php the_sub_field('title') ?></h3>
                            <?php endif; ?>
                            <?php the_sub_field('text') ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
