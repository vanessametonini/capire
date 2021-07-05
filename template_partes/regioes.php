<?php function componente_regioes() { 
  
  $lang = get_bloginfo("language");

  if ( $lang === 'en-US' ) {
      $page = get_page_by_path( 'home-en' );
      $title_regiao = get_field('titulo_regioes_en');

  } elseif ( $lang === 'es' ) {
      $page = get_page_by_path( 'home-es' );
      $title_regiao = get_field('titulo_regioes_es');

  } elseif ( $lang === 'fr-FR' ) {
      $page = get_page_by_path( 'home-fr' );
      $title_regiao = get_field('titulo_regioes_fr');

  } elseif ( $lang === 'pt-BR' ) {
      $page = get_page_by_path( 'home' );
      $title_regiao = get_field('titulo_regioes');

  } elseif ( $lang === 'ar' ) {
    $page = get_page_by_path( 'home-ar' );
    $title_regiao = get_field('titulo_regioes_ar');
}

?>

<section class="container-fluid bg-grey home-regions">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2><?php echo $title_regiao ?></h2>
      </div>

      <div class="carousel slider-regioes" data-flickity='{ "freeScroll": true, "contain": true, "groupCells": true }'>

        <?php
        function getByRegion($region) {
            return get_posts(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'numberposts' => 5,
                'orderby' => 'date',
                'order' => 'DESC',
                'hide_empty' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'regioes',
                        'field' => 'slug',
                        'terms' => [$region],
                    )
                )
            ));
        }

        $posts_africa = getByRegion('africa');
        $posts_americas = getByRegion('americas');
        $posts_asia = getByRegion('asia-oceania');
        $posts_europa = getByRegion('europa');
        $posts_mundo = getByRegion('mundo-arabe');
        $posts_internacional = getByRegion('internacional');

        $posts_regs = [];

        for ($i = 0; $i < 5; $i++) {
            $posts_regs[] = $posts_africa[$i];
            $posts_regs[] = $posts_americas[$i];
            $posts_regs[] = $posts_asia[$i];
            $posts_regs[] = $posts_europa[$i];
            $posts_regs[] = $posts_mundo[$i];
            $posts_regs[] = $posts_internacional[$i];
        }

        foreach ( $posts_regs as $post  ) {
          $regs = get_the_terms( $post->ID, 'regioes' )[0];
          $categoria = get_the_terms( $post->ID, 'category' )[0];
          $link = get_permalink( $post->ID );
          $thumb = get_the_post_thumbnail_url( $post->ID, 'medium');
          $date = get_the_date('d/m/Y', $post->ID);
        ?>
          <div class="carousel-cell slide-regiao">
            <div class="col-reg">
                <a href="<?php echo $link ?>">
                    <div class="box-reg">
                        <div class="bg-img img-reg-home" style="background-image: url(<?php echo $thumb ?>)">
                            <span class="cat-reg"><?php echo $regs->name ?></span>
                        </div>
                        <div class="name-categoria small">
                          <span><?php echo $categoria->name ?></span>
                          <span class="float-right"><?php echo $date ?></span>
                        </div>
                        <h4><?php echo get_the_title( $post->ID ); ?></h4>
                    </div>
                </a>
            </div>
          </div>
        <?php } ?>

      </div>

    </div>
  </div>
</section>

<?php
}
