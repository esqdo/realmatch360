<?php
add_action( 'init', 'create_post_type' );
function create_post_type() {
    $support = ['title', 'editor', 'thumbnail', 'excerpt','revisions' ];
    $posttypes = ['verwaltung','featured','advisory','mitarbeiter','sales'];
    $pluartexts = ['Verwaltung','Featured','Advisors','Mitarbeiter','Sales'];
    $singulartexts = ['Verwaltung','Featured','Advisor','Mitarbeiter','Sale'];
    /* For each Post-Type in Array register it */
    foreach ($posttypes as $key => $value) {
      register_post_type( $value ,
  		array(
  			'labels' => array(
  				'name' => __( $pluartexts[$key] ),
  				'singular_name' => __( $singulartexts[$key] )
  			),
  		'public' => true,
  		'has_archive' => true,
          'supports' => $support,
  		)
  	);
    }

  /* Offer Post-Type */
  register_post_type( 'offers',
	array(
			'labels' => array(
				'name' => __( 'Offers' ),
				'singular_name' => __( 'Offer' )
			),
		'public' => true,
		'has_archive' => false,
        'supports' => array( 'title','editor','revisions' ),
		)
	);

	/* Service Post-Type */
	register_post_type( 'services',
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'singular_name' => __( 'Service' )
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title','editor','revisions', 'thumbnail' ),
		)
	);

}
?>
