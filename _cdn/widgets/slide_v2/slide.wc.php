<?php

echo '<link rel="stylesheet" href="' . BASE . '/_cdn/widgets/slide_v2/slick.css"/>';
echo '<link rel="stylesheet" href="' . BASE . '/_cdn/widgets/slide_v2/slick-theme.min.css"/>';
echo '<script src="' . BASE . '/_cdn/widgets/slide_v2/slick.min.js"></script>';
echo '<script src="' . BASE . '/_cdn/widgets/slide_v2/slide.wc.js"></script>';

$Read = new Read;
$Read->ExeRead(DB_SLIDES, "WHERE slide_status = 1 AND slide_start <= NOW() AND (slide_end >= NOW() OR slide_end IS NULL) ORDER BY slide_date DESC");
if ($Read->getResult()):
    echo "<section class='homebanner'>";
    foreach ($Read->getResult() as $Slide):
        extract($Slide);
        $SlideLink = (strstr($slide_link, 'http') ? $slide_link : BASE ."/{$slide_link}");
        $SlideTarget = (strstr($slide_link, 'http') ? ("target='_blank'") : null);
        echo " <div> 
                <div class='banner-content' style='background-image: url(" . BASE . "/uploads/{$slide_image}); height: 550px; background-repeat: no-repeat; background-size: cover; background-position: center;'>                     
                  <div class='box box-1 text-center' style='margin-top: 386px;'>
                    <div class='box-banner'>
                    <h2>{$slide_title}</h2>                         
                    <p>{$slide_desc}</p>                    
                    <a href='{$SlideLink}' title='{$slide_title}' class='btn'>Veja mais</a> 
                        </div>
                    </div>
                    <div class='transparent-banner'></div>
                </div>
           </div>";
    endforeach;
    echo "</section>";
endif;