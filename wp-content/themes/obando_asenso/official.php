<?php


/*
Template Name: City Official
*/

?>




<?php get_header(); ?>

<?php $mayorname = get_field('mayorname');?>
<?php $cityofficial = get_field('cityofficial');?>
<?php $mayorphoto = get_field('mayorphoto');
$size = 'full'; // (thumbnail, medium, large, full or custom size); ?>

    <style>

nav.sticky {
    margin-top: -200px;
}


   
    .off-des img{
        height: auto;
        width: 400px;
        object-fit: cover;
        margin-bottom: 10px;
     }




     #gallery-1 .gallery-caption {
    margin-top: 30px;
    margin-bottom: 30px;
    margin-left: 40px;
    font-size: 14px;
    text-align: center;
}



       


#gallery-1 img {
    border:none;
}

.adsection{
         width: 70%;
         padding-left: 90px;
         margin-bottom:30px;

     }

     @media only screen and (max-width: 1200px) {
        
     }

     @media only screen and (max-width: 1044px) {
        .adsection{
            width:93%;
            padding-left: 70px;
            margin-bottom: 50px;
        }
     }

     @media only screen and (max-width: 782px) {
        .adsection{
            width:100%;
            padding-left: 15px;
            padding-right: 15px;
            margin-bottom: 30px;
        }
     }
     @media only screen and (max-width: 414px) {
        .off-des img{
        height: auto;
        width: 100%;
        object-fit: cover;
     }
 }


     


    </style>




    <main>
<section class="content">
    <div class="content-vids-search">
        <div class="news">
            <div class="title-news">
                <p>Obando Officials</p>
            </div>

            <div class="img-date">
                <!--  -->
                <div class="article-news">
                    <div class="content-news">
                        <div class="officials">
                            <h1>Municipal Officials</h1>
                        </div>
                        <div class="photo-obando">
                            
                            <div class="official-photo">
                                <div class="off-des">
                                     <?php if( $mayorphoto ) {

                                            echo wp_get_attachment_image( $mayorphoto, $size );

                                        } ?>
                                    <p><?php echo $mayorname; ?></p>
                                </div>
                               <div class="logo"></div>
                            </div>
                            
                            <!-- <div class="sub-photo"> -->
                                 <div class="councilor">
                                    <style>
                                        #gallery-1 .gallery-caption {
                                        margin-left: 40px;
                                    }
                                    </style>
                                <?php echo $cityofficial; ?>
                            </div>
                           <!--  </div> -->


                           

                           



                          


                           


                            

                           

                           
                       
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

        </section>

        <div class="adsection">
        <?php get_template_part('template/placeyouradds', 'content'); ?>
        </div>


         <?php get_template_part('template/hotline', 'content'); ?>
 <?php get_footer(); ?>

        </main>  
         <?php wp_footer(); ?> 
        <script>
            // hamburger
            window.addEventListener("scroll", function(){
                var header = document.querySelector("nav");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
            // 

            // sticky nav bar
            function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
            }
            // 

            // gsap
            var tl = gsap.timeline({defaults:{duration: .1}})

       
            tl.from(".anim1",1,{
                opacity: 0,
                y: "150%",
                ease:Expo.easeInOut
            }, "-=.2")

            .to(".anim1",.5,{
                opacity: 0,
                y:-2,
                ease:Expo.easeInOut
            })
            .to(".overlay ",1,{
                opacity: 0,
                top: "-200%",
                ease:Expo.ease
            })

    </script>
</body>
</html>