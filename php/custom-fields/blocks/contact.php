<?php
    $heading = get_field('heading');
    $editor = get_field('editor');
    $location = get_field('location');
    $address = $location['address'];
    $email = $location['email'];
    $phone = $location['phone'];

    $map = get_field('map');
    $stocklist = get_field('stocklist');
?>

<section class="my-24">
    <div class="max-w-[1300px] mx-auto px-5">
        <?php if( $heading ) : ?>
            <h2 class="font-primary text-center text-4xl italic font-medium text-[#27221E] mb-12"><?= $heading; ?></h2>
        <?php endif; ?>

        <div class="flex">
            <?php if( $address) : ?>
                <div class="w-1/3 px-5">
                    <div class="shadow w-full px-5 py-7">
                        <h3 class="text-2xl mb-5 font-medium text-center">Our Address</h3>
                        <p class="text-lg text-center"><?= $address; ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if( $email) : ?>
                <div class="w-1/3 px-5">
                    <div class="shadow w-full px-5 py-7">
                        <h3 class="text-2xl mb-5 font-medium text-center">Our Email</h3>
                        <p class="text-lg text-center"><?= $email; ?></p>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if( $phone) : ?>
                <div class="w-1/3 px-5">
                    <div class="shadow w-full px-5 py-7">
                        <h3 class="text-2xl mb-5 font-medium text-center">Our Phone</h3>
                        <p class="text-lg text-center"><?= $phone; ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if( $map ) : ?>
            <div class="mt-12 px-5" id="hy-contact-map">
                <?= $map; ?>
            </div>
        <?php endif; ?>

        <?php if( $stocklist) : ?>
            <div class="flex mt-24" id="hy-contact-stock">
                <?php foreach( $stocklist as $i => $place ) :
                    if( $place['editor'] ) : ?>
                        <div class="w-1/3 <?= $i !== 0 ? 'border-l border-[#D1D1D1]' : ''; ?>">
                            <div class="">
                                <?= $place['editor']; ?>
                            </div>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>