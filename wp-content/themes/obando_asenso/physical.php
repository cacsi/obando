

<?php


/*
Template Name: Physical 

*/

?>




<?php get_header(); ?>

<?php $physicaldetails = get_field('physicaldetails');?>
<style>
.adsection{
         width: 100%;
         padding-left: 0px;

     }

     @media only screen and (max-width: 1044px) {
        .adsection{
            width:100%;
            
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



    <div class="bg-container ">
        <!-- <div class="bg-title"><h1> Tuloy and asenso sa obando</h1> -->
    </div>
        
    </div>     

    <main>
     <section class="content">
        <div class="content-vids-search">
            <div class="news">
                <div class="title-news">
                    <p>General Info</p>
                </div>
   
            <div class="img-date">
                <!--  -->
                <div class="article-news">
                    <div class="main-news">
                    <a href="#"></a>
                </div>
                <!--  -->
                <!--  -->
                    
                    <div class="content-news">
                        <?php echo $physicaldetails['physicaldata']; ?>
                    </div>
                    
                        
                </div>
                <!--  -->
            </div>
        </div>

        <div class="adsection">
        <?php get_template_part('template/placeyouradds', 'content'); ?>
        </div>

    </div>

    <!-- content -->
     <?php get_template_part('template/adverse', 'content'); ?>
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