<?php
    header("Content-type: text/css; charset: UTF-8");
    include_once 'identidad-corporativa.inc.php';
    /* las lineas estan corridas algunas casillas hacia abajo porque este codigo no se muestra en el navegador*/
?>


.media-scroller, .media-scroller-m{
  --_spacer: var(--size-3);
  display: grid;
  gap: var(--_spacer);
  grid-auto-flow: column;
  grid-auto-columns: 15rem;

  padding: 0 var(--_spacer) var(--_spacer);
  border-radius: 1em;
  overflow-x: auto;
  overscroll-behavior-inline: contain;

}

/*barra de scroll*/
.media-scroller::-webkit-scrollbar {background: <?php echo $colorMarca4;?>;height: .5em;}
.media-scroller::-webkit-scrollbar-thumb {
  background: <?php echo $colorMarca;?>;border-radius: 1em;border-right: 2px solid <?php echo $colorMarca;?>;}
/*barra de scroll*/

.media-scroller--with-groups {
  grid-auto-columns: 80%;
}





/*barra de scroll*/
.media-scroller-m::-webkit-scrollbar {background: <?php echo $colorMarca4;?>;height: .001em;}
.media-scroller-m::-webkit-scrollbar-thumb {
  background: <?php echo $colorMarca;?>;border-right: 2px solid <?php echo $colorMarca;?>;}
/*barra de scroll*/

.media-scroller-m--with-groups {
  grid-auto-columns: 80%;
}








.media-group {
  display: grid;
  gap: var(--_spacer);
  grid-auto-flow: column;
}

.media-element {
  display: grid;
  grid-template-rows: -webkit-min-content;
  grid-template-rows: min-content;
  gap: var(--_spacer);
  padding: 1em .5em;
}

.media-element button {
  border: 0;
  background-color: white;
}

.media-element > img {
  inline-size: 100%;
  aspect-ratio: 1 / 1;
  -o-object-fit: cover;
     object-fit: cover;
}

.snaps-inline {
  -ms-scroll-snap-type: inline mandatory;
      scroll-snap-type: inline mandatory;
  scroll-padding-inline: var(--_spacer, 1rem);
}

.snaps-inline > * {
  scroll-snap-align: start;
}

/* general styling */

.container {
  inline-size: min(100% - 4rem, 70rem);
  margin-inline: auto;
}

.flow {
  display: grid;
  gap: var(--size-3);
}

.page-header {
  padding-block: var(--size-9);
  -webkit-margin-after: var(--size-9);
          margin-block-end: var(--size-9);
  background: var(--gradient-16);
  color: var(--gray-0);
  box-shadow: var(--shadow-2);
}

.page-title {
  font-size: var(--font-size-fluid-3);
}

.page-subtitle {
  font-size: var(--font-size-fluid-1);
}

.section-title {
  -webkit-padding-start: var(--size-6);
          padding-inline-start: var(--size-6);
  margin-block: var(--size-9) var(--size-3);
}