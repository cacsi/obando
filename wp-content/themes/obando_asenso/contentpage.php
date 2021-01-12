<?php


/*
Template Name: Content Page

*/

?>


<?php get_header(); ?>

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


    <main>
     <section class="content">
        <div class="content-vids-search">
            <div class="news">
                <div class="title-news">
                    <p>FEATURING</p>
                </div>
            <div class="img-date">
                <!--  -->
             
                <div class="article-news" id="content_con">
                    
                    <!--  -->
                    
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


    <script>
        setTimeout(() => {


            content_con.innerHTML = "";
            let content = localStorage.getItem('content');


            let contentdata = JSON.parse(content);
             
              content_con.innerHTML = `<div class="main-news">
                    <a href="#">${contentdata.Title}</a>
                    </div>
                    <div class="date-news">
                        <p>${contentdata.Date}</p>
                    </div>
                    <div class="content-news" style="margin-bottom:30px;">
                        <p>${contentdata.Content}</p>
                    </div> 
                    <div class="img-newsfeat" >
                        <img src="${contentdata.Image}" alt="">
                    </div>`



        }, 300)

       




    </script>
</body>
</html>