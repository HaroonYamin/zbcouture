<?php
    $editor = get_field('editor');

    if( !$editor ) {
        return;
    }
?>

<section class="lg:mt-[120px] mt-12 py-12" id="legal-page">
    <div class="max-w-[850px] mx-auto px-5">
        <?= $editor; ?>
    </div>
</section>

<style>
    #legal-page {
        color: #252525;
    }
    #legal-page h1 {
        font-size: 3rem;
        font-weight: 600;
        line-height: 1.2;
        margin: 2rem 0 1.5rem 0;
    }
    #legal-page h2 {
        font-size: 2rem;
        font-weight: 600;
        line-height: 1.2;
        margin: 1.5rem 0 1.5rem 0;
    }
    #legal-page h3 {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.4;
        margin: 1rem 0 0.5rem 0;
    }
    #legal-page p {
        font-size: 1.25rem;
        font-weight: 400;
        line-height: 1.4;
        margin: 1rem 0 0.5rem 0;
    }
    #legal-page a {
        text-decoration: underline;
        color: #0081ff;
        font-size: 1.25rem;
    }
    #legal-page a:hover {
        text-decoration: none;
    }
    @media screen and (max-width: 1024px) {
        #legal-page h1 {
            font-size: 2.5rem;
        }
        #legal-page h2 {
            font-size: 1.75rem;
        }
    }
</style>