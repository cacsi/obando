<?php


/*
Template Name: Citizen

*/

?>


<?php get_header(); ?>

<?php $citizendata = get_field('citizendata');?>


<style>
	

.content-news p {
	margin-bottom: 20px;
}

.content-news h3 {
	margin-bottom: 20px;
}


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

    <main>
     <section class="content">
        <div class="content-vids-search">
            <div class="news">
                <div class="title-news">
                    <p> Obando Citizen’s Charter</p>
                </div>
   
            <div class="img-date">
                <!--  -->
                <div class="article-news">
                    <div class="main-news">
    
                </div>
                <!--  -->
                <!--  -->
               <!--  <div class="search"> -->
                    <!-- <input type="text" placeholder="Search" id="searchid"> -->

                    <!-- <button>search</button> -->
                <!-- </div> -->
                    
                <div class="content-news">
                    
                  <?php echo $citizendata; ?>
                </div>


               
                    
                </div>
                <!--  -->
            </div>
        </div>

        <div class="adsection">
        <?php get_template_part('template/placeyouradds', 'content'); ?>
        </div>
    </div>

      <?php get_template_part('template/adverse', 'content'); ?>
        </section>
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