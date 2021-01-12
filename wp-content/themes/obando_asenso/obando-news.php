<?php


/*
Template Name: News

*/

?>


<?php get_header(); ?>

<style>
    .img-news span {
 float: right;
 font-size: 12px;
}

.img-news a:hover {
  color: green;
}

.hello {
    display: flex;
    flex-direction: row;
    justify-content: center;
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
            <div class="news" id="news2">
                <div class="title-news">
                    <p>OBANDO NEWS</p>
                </div>



            <div class="img-date">
           
                    <div class="img-news"  id="imgcontent">
                            
                    </div>
                        
              
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
            window.addEventListener("scroll", function(){
                var header = document.querySelector("nav");
                header.classList.toggle("sticky", window.scrollY > 0);
            })
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
      
    function get_content(e)
     {
        console.log(e)
     }

      

    </script>
</body>
</html>