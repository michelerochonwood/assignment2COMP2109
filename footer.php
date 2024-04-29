    <footer>
      <section class="top-footer row">
        <div class="first widget-area col-sm-12 col-md-3 col-lg-3">
          <a href="<?php echo esc_url( home_url() );?>">
            <?php dynamic_sidebar( 'footer-widget-area-one' ); ?>
          </a>
        </div><!-- .first .widget-area -->

        <div class="second-widget-area col-sm-12 col-md-3 col-lg-6">
          <?php dynamic_sidebar( 'footer-widget-area-two' ); ?>
        </div><!-- .second .widget-area -->

        <div class="third-widget-area col-sm-12 col-md-3 col-lg-3">
          <?php dynamic_sidebar( 'footer-widget-area-three' ); ?>
        </div><!-- .third .widget-area -->

        <div class="fourth-widget-area col-sm-12 col-md-3 col-lg-3">
          <?php dynamic_sidebar( 'footer-widget-area-four' ); ?>
        </div><!-- .fourth .widget-area -->
      </section>
      <section class="bottom-footer">
        <p>Project One, COMP 2109 by Michele Rochon-Wood</p>
    </footer>
  </body>
</html>