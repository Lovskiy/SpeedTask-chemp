<body <?php body_class(); ?>>
    <header>
        <nav>
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </nav>
    </header>
    <div class="site-content">
        <?php if ( get_header_image() ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>"
                height="<?php echo absint( get_custom_header()->height ); ?>"
                alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
        <?php endif; ?>
        <?php if ( is_front_page() ) : ?>
        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
        <?php $description = get_bloginfo( 'description', 'display' ); ?>
        <?php if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo $description; ?></p>
        <?php endif; ?>
    </div><!-- .site-content -->
    <footer>
        <p><?php echo htmlentities( get_theme_mod( 'copyright' ) ); ?>
            <a href="<?php echo htmlentities( get_theme_mod( 'social_links' ) ); ?>"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </p>
    </footer>
    <?php wp_footer(); ?>
</body>