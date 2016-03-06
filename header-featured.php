<!-- Head Meta Tags etc. !-->
<?php include 'inc/header/head.php'; ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Header Logo and buttons (Language Selector, Login, Contact) -->
<?php include 'inc/header/header.php'; ?>

</section>
    <div class="clear"></div>
    <div class="navclear"></div>
    <div id="featuredsubnav"><?php wp_nav_menu( array( 'theme_location' => 'featured-menu' ) ); ?></div>
</header>

<div id="container">
