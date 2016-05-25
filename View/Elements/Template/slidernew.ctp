<?  
    $data_slide = "";
    $item       = "";
    $active     = "";
    $is_single  = "";

    foreach ($sliders as $index => $slider) {

      if ($index == 0) {
        $active     = "active";
      }else{
        $active     = "";
      }

      if (count($slider['Cabecera']['inicio']) == 1) {
        $is_single = "single";
      }else{
        $is_single = "";
      }

      $data_slide .= "<li data-target='#carousel' data-slide-to='".$index."' class='".$active."'></li>";
      
      $item .= "<div class='item ".$active."'>";
      $item .= $this->Html->image($slider['Cabecera']['imagen_fondo']['path'], array('class' => 'img-responsive'));
      $item .= "<div class='view-title'><h3>".$slider['Cabecera']['nombre']."</h3>";
      

      if( !empty($modelo['Modelo']['ficha_tecnica']) ) {

        $item .= "<div class='ficha-tecnica'>".$this->Html->link(
                '<span class="fa fa-download"></span>Descarga la ficha técnica',
                sprintf('/img/%s',$modelo['Modelo']['ficha_tecnica']['path']),
                array(
                  'class' => 'btn btn-ficha',
                  'target' => '_blank', 
                  'fullbase' => true,
                  'escape' => false,
                  'download' => 'ficha-tecnica-' . $modelo['Modelo']['nombre_corto']
                )
              ) . "</div>";
      }
      $item .= "</div>";
      $item .= "<div class='carousel-caption'>";
      $item .= "<h3>".$slider['Cabecera']['nombre']."</h3>";
      $item .= "<h1>".$slider['Cabecera']['titulo']."</h1>";
      $item .= "<p>".$slider['Cabecera']['descripcion']."</p>";
      $item .= "</div>";//end caption
      $item .= "</div>";//end item
    } ?>


<!-- Corusel -->
<div id="carousel" class="carousel slide <?=$is_single." ".$ishome;?>" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?= $data_slide; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?=$item; ?>
  </div>
</div>