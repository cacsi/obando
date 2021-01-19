<?php


/*
Template Name: Ordinance

*/

?>


<?php get_header(); ?>
<?php $oridinances = get_field('ordinances');?>


<style>


.article-news {
    padding: 0px;
}

.title-ordinance h3 {
    margin-bottom: 20px;
}

.tablepress tbody td {
      border: 1px solid black;
}
tr {
    border: 1px solid black;
}

.adsection{
         width: 100%;
         padding-left: 90px;
         padding-right:90px;
         margin-bottom:30px;

     }

     @media only screen and (max-width: 1200px) {
        
     }

     @media only screen and (max-width: 1044px) {
        .adsection{
            width:100%;
            padding-left: 70px;
            padding-right: 70px;
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

</style>
   

    <main>
<section class="content">
    <div class="content-vids-search2">
        <div class="news">
            <div class="title-news">
                <p>Ordinances</p>
            </div>

            <div class="img-date">
                <!--  -->
                <div class="article-news">
                    <div class="content-news">
                    </div>
                        <div class="title-ordinance">
                         
                            <?php echo $oridinances; ?>
                          
                               
                       
                        </div>
                    </div> 
                </div>
            </div>
        </div>
   

    <!-- content -->
            <!-- <div class="advertisement">
                <div class="ads1">
                    <img src="image/grupo.png" alt="">
                </div>
                <div class="ads1">
                    <img src="image/white.png" alt="">
                </div>
                <div class="ads1">
                    <img src="image/blue.png" alt="">
                </div>
                <div class="ads1">
                    <img src="image/blue.png" alt="">
                </div>
            </div> -->
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