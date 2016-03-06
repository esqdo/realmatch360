<!-- Head Meta Tags etc. !-->
<?php include 'inc/header/head.php'; ?>

<?php wp_head(); ?>
    <script type="text/javascript" src="http://login.traumhaus.realmatch360.com/js/facebook.js"></script>
</head>
<body class="whitebackground">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=333461446821615&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header id="header" role="banner" class="container">
<section id="branding" class="container">
<div id="site-title" class="grid_3 omega"><h1><a href="<?php echo get_home_url(); ?>" alt="Relmatch360">
    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img"></a>
    </h1></div>

</div>

</section>
</header>

<div id="container">
