<!--div sstyle="border: thin solid red;">
    <div class="th-title-description">
        <a href="<?php //echo esc_url( home_url( '/' ) ); ?>" title="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a>
        <a class="site-description clear"><?php //bloginfo( 'description' ); ?></a>
        <?php //echo do_shortcode("[su_button url='/about/' background='#07345b' color='#fff' style='float: right;']Об Академии[/su_button]"); ?>
    </div>
</div-->
<div id="fp-header" sstyle="border: thin solid red;">
    <div class="fp-header-bg">
    </div>

<!--svg class="fp-header-bg-ie">
  <defs>
    <filter id="blur">
      <feGaussianBlur stdDeviation="12" />
    </filter>
  </defs>
  <image xlink:href="{url}" width="300" height="180" filter="url(#blur)"></image>
</svg-->

    <div class="fp-header-container">
        <h1><?php bloginfo( 'name' ); ?></h1>
        <h3><?php bloginfo( 'description' ); ?></h3>
        <?php //echo do_shortcode("[su_button url='/about/' background='#07345b' color='#fff' style='float: right;']Об Академии[/su_button]"); ?>
        <a href="/about/">Об Академии</a>
        <!--a href="/about/">Узнать больше</a-->

    </div>
    <script>

        jQuery(document).ready(function(){
            var $ = jQuery;

            var fp_header_bg_images = [
                //"https://acanud.ru/wp-content/uploads/2019/03/cys_17_participants-1024x438.png",
                "/wp-content/uploads/2019/03/cys_17_participants-1024x438.png",
                "http://www.elektropribor.spb.ru/upload/iblock/16f/79.jpg",
                "http://www.elektropribor.spb.ru/upload/iblock/fa2/86.jpg",
                "http://www.elektropribor.spb.ru/upload/iblock/09c/75.jpg",
                "http://www.elektropribor.spb.ru/upload/iblock/c1c/c1cf0aef3ba561d84e161dc471676b89.jpg",
                "http://www.elektropribor.spb.ru/upload/iblock/ec0/ec0cc4dbfe340c506228410648fee304.jpg"
            ];
            var fp_header_bg_images_cnt = 0;

            function shuffle(arr) {
                var ctr = arr.length, temp, index;
                while (ctr > 0) {
                    index = Math.floor(Math.random() * ctr);
                    ctr--;
                    temp = arr[ctr];
                    arr[ctr] = arr[index];
                    arr[index] = temp;
                }
                return arr;
            }
            fp_header_bg_images = shuffle( fp_header_bg_images );

            function preloadMyImages()
            {
                for(var i = 0; i < fp_header_bg_images.length; i++ ) 
                {
                    var imageObject = new Image();
                    imageObject.src = fp_header_bg_images[i];
                }
            }
            preloadMyImages();

            function fp_header_bg_swap(){
//                console.log(fp_header_bg_images[fp_header_bg_images_cnt]);
                $('#fp-header .fp-header-bg').css({
                    'background-image': 'url('+fp_header_bg_images[fp_header_bg_images_cnt]+')'
                });
//                $('#fp-header .fp-header-bg-ie image').attr(
//                    'xlink:href',
//                    'url('+fp_header_bg_images[fp_header_bg_images_cnt]+')'
//                );
                fp_header_bg_images_cnt++;
                if( fp_header_bg_images_cnt >= fp_header_bg_images.length )
                    fp_header_bg_images_cnt = 0;
            }
            fp_header_bg_swap();

            if( fp_header_bg_images.length > 0 )
//                setInterval('fp_header_bg_swap()', 5000);
                setInterval(fp_header_bg_swap, 5000);
        });


//$('#fp-header .fp-header-bg').animate({opacity: 0}, 0).css({'background-image': 'url(http://www.elektropribor.spb.ru/upload/iblock/fa2/86.jpg)'}).animate({opacity: 1}, 2500);

/*
$('#fp-header .fp-header-bg').fadeTo('slow', 1.5, function()
{
    $(this).css('background-image', 'url(' + fp_header_bg_images[0] + ')');
}).fadeTo('slow', 2);
*/
    </script>

</div>