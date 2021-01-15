<?php


/*
Template Name: Our Province 

*/

?>


<!--  -->


 <?php get_header(); ?>
  <?php $about_our_city = get_field('about_our_city');?>

 <style>
  .adsection{
         width: 100%;
         padding-left: 0px;



     }


     .content-news{
         position:relative;
        
     }

     .bg-sketch{
         height:auto;
         width:100%;
         filter: opacity(15%);
         margin-top:20px;
        
     }

     .content-news .divcontent {
         position:absolute;
         bottom: 0;
         top:0;
         color:black;
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





   

    <main>
     <section class="content" style="margin-top: 100px;">
        <div class="content-vids-search">
            <div class="news">
                <div class="title-news">
                    <p>About Our Municipality</p>
                </div>
            <div class="img-date">

             
                <!--  -->
                <div class="article-news">
                    
                <!--  -->
                <!--  -->
                    
                    <div class="content-news" >

                        <img class="bg-sketch" src= "<?php bloginfo('template_directory');?>/image/sketch-logo.png" >
                       
                       <div class="divcontent">
                            <?php echo $about_our_city; ?>
    </div>
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

