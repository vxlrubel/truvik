<div class="col-lg-6 res-991-mt-30 order-last order-lg-first">
    <div class="text-center text-lg-start">                            
        <div class="page-content">
            <h2><?php esc_html_e( 'Error', 'truvik' ); ?></h2>
            <h3><span><?php esc_html_e( 'Opps!', 'truvik' ); ?></span> <?php esc_html_e( 'Somethings gone missing', 'truvik' ); ?></h3>
            <p><?php esc_html_e( 'Sorry, This page may has been moved,deleted or maybe you just mis-typed the URL.', 'truvik' ); ?></p>
        </div>
        <div class="">
            <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor" href="<?php echo esc_url( home_url('/') );?>"><?php esc_html_e( 'Go To Home Pages', 'truvik' ); ?></a>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <?php Truvik\Post::error_image_404(); ?>
</div>