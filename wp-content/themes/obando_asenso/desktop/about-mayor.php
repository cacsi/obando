<?php


/*
Template Name: About Mayor

*/

?>


<?php get_header(); ?>



<?php $aboutmayortext = get_field('aboutmayortext');?>
<?php $mayorimg = get_field('mayorimg');
$size = 'full'; // (thumbnail, medium, large, full or custom size); ?>
 

 <style>
     nav.sticky{
        margin-top: -200px;
     }


     .adsection{
         width: 100%;
         padding-left: 50px;
         padding-right: 50px;

     }

     @media only screen and (max-width: 1044px) {
        .adsection{
            width:95%;
            padding-left: 50px;
            margin-bottom: 30px;
        }
     }

     @media only screen and (max-width: 782px) {
        .adsection{
            width:100%;
            padding-left: 0px;
            margin-bottom: 30px;
        }
     }
 </style>  
    <main>
<section class="content">
    <div class="content-vids-search2">
        <div class="news">
            <div class="title-news">
                <p>about mayor</p>
            </div>
            <div class="img-date">
                <!--  -->
                <div class="article-news">
                    <div class="content-news">
                        <div class="officials">
                           
                           <!-- ============================= -->
                           <!-- mayor-image -->
                           <!-- ============================= -->
                           <div  class="mayor-photo">
                               <?php if( $mayorimg ) {

									echo wp_get_attachment_image( $mayorimg, $size );

								} ?>
                           </div>
                            <div class="mayor-detail" style="float: right;">
                                
                            	<?php echo $aboutmayortext; ?>





                            </div>

                        </div>
                    </div> 
                </div>
            </div>

            
        </div>

        <div class="adsection">
        <?php get_template_part('template/placeyouradds', 'content'); ?>
        </div>

       
    </div>

        
    
        </section>

       
        <?php get_template_part('template/hotline'); ?>
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