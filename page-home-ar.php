<?php get_header(); 

$pageID = get_the_ID();
?>
<div class="home-ar p-top">

<?php
 if (get_field('imagem_do_topo_ar', $pageID)) {
?>

<section class="container">
  <div class="row">
    <div class="col-12 text-center">
      <img class="img-highlight" src="<?php  echo get_field('imagem_do_topo_ar', $pageID) ?>" alt="Image highlight">
    </div>
  </div>
</section>

<?php } ?>

<section class="container hero">
  <div class="row bg-red-mobile">
    <div class="col-lg-10 offset-lg-1 col-12">

      <?php
        // $rows = get_field('carousel_principal_ar', $pageID);
        $posts_ultimos = new WP_Query( array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'order' => 'DESC',
          'posts_per_page' => 4,
        ) );

        if( $posts_ultimos ) {
      ?>
        <div class="carousel hero-slide" data-flickity='{ "autoPlay": true }'>
        <?php
          foreach( $posts_ultimos->posts as $post ) {
            $title = get_the_title( $post->ID );
            $link = get_permalink( $post->ID );
            $thumb = get_the_post_thumbnail_url( $post->ID, 'full');
            $categoria = get_the_category( $post->ID )[0]->name;
            $linha_fina = get_field('linha_fina', $post->ID);
            $category_id = get_cat_ID( $categoria );
            $category_link = get_category_link( $category_id );
        ?>
          <div class="carousel-cell">
              <div class="row">
                <div class="col-lg-8 col-12">
                  <a href="<?php echo $link ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
                    <div class="bg-img img-hero-slide" style="background-image: url(<?php echo $thumb ?>)"></div>
                  </a>
                </div>
                <div class="col-lg-4 col-12 p-15">
                  <div class="p-15">
                    <p class="name-categoria">
                      <a href="<?php echo $category_link ?>">
                        <?php echo $categoria ?>
                      </a>
                      <span class="float-left"><?php echo get_the_date('d/m/Y') ?></span>
                    </p>
                    <a href="<?php echo $link ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
                      <h2><?php echo $title ?></h2>
                      <p class="subtitle"><?php echo $linha_fina ?></p>
                      <a href="<?php echo $link ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>"><p class="d-block d-lg-none text-right small"><strong>Leia mais</strong></p></a>
                    </a>
                  </div>
                </div>
              </div>
          </div>

        <?php
        wp_reset_postdata();
          }
        ?>
        </div>
      <?php
        }
      ?>

    </div>
  </div>
</section>

<section class="container">
  <div class="row">
    <div class="offset-lg-1 col-lg-10">
      <div class="row">
        <?php

          $lastest_posts = new WP_Query( array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'order' => 'DESC',
          'posts_per_page' => 6,
          'lang', 'ar'
          ) );

          $numOfCols = 3;
          $rowCount = 0;

          foreach( $lastest_posts->posts as $post ) {
          $title = get_the_title( $post->ID );
          $link = get_permalink( $post->ID );
          $thumb = get_the_post_thumbnail_url( $post->ID, 'full');
          $categoria = get_the_category( $post->ID )[0]->name;
          $linha_fina = get_field('linha_fina', $post->ID);
          $category_id = get_cat_ID( $categoria );
          $category_link = get_category_link( $category_id );

        ?>
        <div class="col-lg-4">
          <div class="box-cats-home">
            <a href="<?php echo $link ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
              <div class="bg-img img-cats-home" style="background-image: url(<?php echo $thumb ?>)"></div>
            </a>
            <div class="name-categoria">
              <a href="<?php echo $category_link ?>">
                <span><?php echo $categoria ?></span>
              </a>
              <span class="float-left date"><?php echo get_the_date('d/m/Y') ?></span>
            </div>
            <a href="<?php echo $link ?>" alt="<?php echo $title ?>" title="<?php echo $title ?>">
              <h4><?php echo $title ?></h4>
              <p class="subtitle"><?php echo $linha_fina ?></p>
            </a>
          </div>
        </div>

        <?php wp_reset_postdata();?>
        <?php
            /* cria uma nova linha a cada 3 posts */
            $rowCount++;
            if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
          } //end foreach
        ?>
      </div>
    </div>
  </div>
</section>

<?php componente_newsletter() ?>

</div>
<?php get_footer(); ?>
