<?php get_header();?>

    <?php
    $pagina_blog = get_option( 'page_for_posts' );
    $id_imagen = get_post_thumbnail_id( $pagina_blog );
    $imagen = wp_get_attachment_image_src( $id_imagen, 'full' );
    ?>

    <div class="hero" style="background-image: url(<?php echo $imagen[0]; ?>);">
      <div class="contenido-hero">
          <div class="texto-hero">
            <h1><?php echo get_the_title( $pagina_blog ); ?></h1>
          </div>
      </div>
    </div>

    <div class="principal contenedor">
      <div class="contenedor-grid">
        <main class="columnas2-3 contenido-paginas">

          <?php while( have_posts() ): the_post(); ?>
            
            <article class="entrada-blog">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'especialidades' ); ?>
              </a>
              <header class="informacion-entrada clear">
                <div class="fecha">
                  <time>
                    <?php the_time('d'); ?>
                    <span> <?php the_time('M'); ?> </span>
                  </time>
                </div>
                <div class="titulo-entrada">
                  <?php the_title('<h2>', '</h2>'); ?>
                  <p class="autor">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <?php the_author(); ?>
                  </p>
                </div>
                <div class="contenido-entrada">
                  <?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>" class="button rojo">Leer más</a>
                </div>
              </header>
            </article>
          
          <?php endwhile; ?>

          <div class="paginacion">
            <?php echo paginate_links(); ?>
          </div>
          
        </main>
        
        <?php get_sidebar(); ?>
      
      </div><!--Contenedor grid-->
    </div><!--Contenedor principal-->

<?php get_footer(); ?>
