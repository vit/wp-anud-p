<?php
	$lang = 'en';
	if( isset( $_GET['l'] ) ) {
		$lang = $_GET['l'];
	}

    header('Content-Type: image/svg+xml');
    echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
?>


<!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN"
    "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">



<svg version="1.1"
     baseProfile="full"
     xmlns="http://www.w3.org/2000/svg"
     xmlns:xlink="http://www.w3.org/1999/xlink"
     xmlns:ev="http://www.w3.org/2001/xml-events"
     wwidth="100%" hheight="100%"
     viewBox="1 1 1000 250"
     ppreserveAspectRatio="x250Y250 meet"
sstyle="height: 70px;"
>


  <!--defs>
    <filter id="dropshadow" hheight="130%" ccolor-interpolation-filters="sRGB">
      <feGaussianBlur in="SourceAlpha" stdDeviation="10"/> 
      <feOffset dx="12" dy="12" result="shadow"/>
      <feMerge> 
        <feMergeNode/>
        <feMergeNode in="SourceGraphic"/> 
      </feMerge>
    </filter>
  </defs-->



	<style type="text/css">

svg {
  -filter: url('#dropshadow');
  ffilter: drop-shadow( 0 2px 1px red );
  f-webkit-filter: drop-shadow( 0 2px 1px red );
}
svg:hover #compass {
	transform-origin: 126px 126px;
  -transform: rotate(10deg);
}
svg:hover #wheel{
	transform-origin: 126px 126px;
	-transform: rotate(10deg);
	-transition: all 0.5s;
	-fill: #FFF;
}

	</style>


  <path id="compass" d="M25 126
           A 130 130 0 0 1 126 227
           A 130 130 0 0 1 227 126
           A 130 130 0 0 1 126 25
           A 130 130 0 0 1 25 126

           M50 126
           L 110 110
           L 126 50
           L 142 110
           L 202 126
           L 142 142
           L 126 202
           L 110 142
           L 50 126
"
           stroke="#07345b" fill="#07345b" stroke-width="1" ffill-opacity="0.9"
  />

  <path id="wheel" d="M 126 1
           A 125 125 0 1 0 126.001 1
           M 126 6
           A 112 112 0 1 1 126 230
           l 0 16
           A 111 111 0 1 1 126 22
           l 0 -16
"
           fill="#07345b" stroke-width="1" ffill-opacity="0.9"
  />



<style>

<!--
@import url('https://fonts.googleapis.com/css?family=Russo+One&amp;subset=cyrillic');
-->

<!--
@font-face {
    font-family: "Russo One";
    src: url("https://fonts.googleapis.com/css?family=Russo+One&subset=cyrillic");
}
-->
<!--
@import url('https://fonts.googleapis.com/css?family=Russo+One&subset=cyrillic');
@import url('https://fonts.googleapis.com/css?family=Caveat&subset=cyrillic');
@import url('https://fonts.googleapis.com/css?family=Rubik+Mono+One&subset=cyrillic');
-->

    text {
        fill: #07345b;
        -text-transform: uppercase;
        letter-spacing: 0.01em;
    }
    text.text-main {
        -fill: #d02030;
        fill: #07345b;
        -font: 500 40px Arial,sans-serif;
        -font: 500 40px Arial,sans-serif;
        -font: 900 36px Arial,sans-serif;
        -font: 900 36px 'Russo One', Arial, sans-serif;
        -font: 900 35px 'Russo One', Arial, sans-serif;

        -font: 900 40px 'Russo One', Arial, sans-serif;
        -font: 900 43px 'Russo One', Arial, sans-serif;
        font: 900 40px Arial, sans-serif;
        -font: 900 36px 'Rubik Mono One', Arial, sans-serif;
        -font: 900 40px 'Arial Black', Arial, sans-serif;


        -font: 900 36px Arial,sans-serif;
        -font: 900 38px 'Roboto', sans-serif;
        -letter-spacing: 0.1em;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
    text.text-subtitle {
        -fill: #d02030;
        -fill: #ed8a93;
        -fill: #787878;
        -fill: #888;
        fill: #07345b;
        -font: 900 64px Caveat, cursive;
        -font: 900 68px Caveat, cursive;
        -font: 200 40px Arial;
        -font: 200 44px Arial;
        -font: 400 44px Roboto;
        -font: 400 45px Roboto;
        -font: 200 44px Arial;

        font: 200 40px Georgia;
        letter-spacing: 0.175em;



        -font: 200 66px Caveat, cursive;
        font-style: italic;
        -letter-spacing: 0.1em;
        text-transform: lowercase;
        -text-transform: uppercase;
    }
    text.text-subtitle-2 {
        fill: #07345b;

        font: 200 40px Georgia;
        letter-spacing: 0.175em;

        -font-style: italic;
        text-transform: lowercase;
        -text-transform: uppercase;
    }
    svg {
        -border: thin dashed gray;
        -background-color: white;
        -padding: 50px;
    }
  </style>


<?php if ($lang == 'ru') { ?>
    <text x="1000" y="65" class="text-subtitle" style="" text-anchor="end">
        Международная
    </text>
    <text x="1000" y="105" class="text-subtitle-2" style="" text-anchor="end">
        общественная организация
    </text>
    
    <path d="M 1000 126 l -735 0" stroke="#07345b" stroke-width="2px" />
    
    <text x="1000" y="190" class="text-main" style="" text-anchor="end" >
        Академия навигации
    </text>
    <text x="1000" y="240" class="text-main" style="" text-anchor="end" >
        и управления движением
    </text>
<?php } else { ?>
    <text x="1000" y="65" class="text-subtitle" style="" text-anchor="end">
        International
    </text>
    <text x="1000" y="105" class="text-subtitle-2" style="" text-anchor="end">
        Public Association
    </text>
    
    <path d="M 1000 126 l -735 0" stroke="#07345b" stroke-width="2px" />
    
    <text x="1000" y="190" class="text-main" style="" text-anchor="end" >
        Academy of Navigation
    </text>
    <text x="1000" y="240" class="text-main" style="" text-anchor="end" >
        and Motion Control
    </text>
<?php } ?>



</svg>



