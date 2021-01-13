<?php


/*
Template Name: Tourism

*/

?>


 <?php get_header(); ?>
 <?php $tourism_data = get_field('tourism');?>
 
<style>

   .content{
display: flex;
flex-direction: row;
height: 100%;
background: #E5E5E5;
justify-content: center;
padding: 50px 20px;
margin-top: 100px;
} 

.content-vids-search{
display: flex;
flex-direction: column;
width: 100%;
margin-left: 5rem;

}


.title-news {
    border-radius: 5px 5px 0px 0px;
    text-transform: uppercase;
    color: white;
    padding: 15px 20px;
    text-align: left;
    background: linear-gradient(24.99deg, #236432 -87.27%, #3DF7AB 175.57%);
}


.title-news p {
    font-weight: 900;
    font-size: 30px;
}


.content-news p {
    margin-top: 10px;
    font-size: 17px;
    font-weight: 200;
    line-height: 26px;
    
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
</style>

  
    <main>
     <section class="content">
        <div class="content-vids-search">
            <div class="news">
                    <div class="title-news">
                        <p>TOURISM</p>
                    </div>
                    <div class="img-date">
              
                          <div class="content-news">
                        
                            <?php echo $tourism_data; ?>
                          </div>

                    </div>
                    
                </div>
                <!--  -->
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="advertisement" id="advertisement">
            </div>
        </section>


        <div class="adsection">
        <?php get_template_part('template/placeyouradds', 'content'); ?>
        </div>
        
       <?php get_template_part('template/hotline', 'content'); ?>
 <?php get_footer(); ?>
 <?php wp_footer(); ?>   
        </main>  
       
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