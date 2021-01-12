 <?php get_header(); ?>
 <?php $hero = get_field('hero');?>


<style>
    nav.sticky{

    margin-top: -200px;
}


.img-news a:hover {
    color: green;
}



</style>

 <section class="bg-container" >

            <div class="bg-white">
                <img src="<?php bloginfo('template_directory');?>/bg-image/bg-gsap.png" alt="heloo">
            </div>

            <div class="bg-header">
                <img src="<?php bloginfo('template_directory');?>/bg-image/obando-gsap.png" alt="heloo">
            </div>
            <div class="bg-text">
                <img src="<?php bloginfo('template_directory');?>/bg-image/ASENSO-gsap.png" alt="heloo">
            </div>

            <div class="bg-button">

                
               <?php echo $hero['link_text']; ?>

            
            </div>

            <div class="bg-mayor">
                <img src="<?php bloginfo('template_directory');?>/bg-image/mayor-gsap.png" alt="heloo">
            </div>


            <div class="bg-muni">
                <img src="<?php bloginfo('template_directory');?>/bg-image/muni-gsap.png" alt="heloo">
            </div>


            <div class="bg-logo">
                <img src="<?php bloginfo('template_directory');?>/bg-image/logo-gsap.png" alt="heloo">
            </div>

            <div class="bg-social">
            <img src="<?php bloginfo('template_directory');?>/bg-image/social-gsap.png" alt="heloo">
            </div>
            <div class="bg-footer"></div>

 </section>


    </div>

    <main>
        <section class="content">
            <div class="content-vids-search">
                <div class="videos">
                    <!-- <img src="image/paravids.gif" alt=""> -->
                </div>
                <div class="search">
                    <!-- <p>search: </p> -->
                    <!-- <input type="text" placeholder="search.."> -->
                </div>
                <div class="news-events">
                    <div class="news">

                                <div class="title-news">
                                    <p>EVENTS AND ACTIVITIES</p>
                                </div>


                                 <div id="contentevents">
                            

                                </div>
                                

                    </div>






                    <div class="events">
                       <div class="title-news">
                            <p>obando news</p>
                        </div>


                        <div id="contentnews">
                            

                        </div>

                        

                        
                    </div> 
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
        window.addEventListener("scroll", function () {
            var header = document.querySelector("nav");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
        // 

      

         // gsap
    var tl = gsap.timeline({ defaults: { duration: .1 } })

    tl.from(".anim1", 1, {
        opacity: 0,
        y: "500%",
        ease: Expo.easeInOut
    }, "-=.2")

    .to(".anim1", .5, {
        opacity: 0,
        y: -2,
        ease: Expo.easeInOut
    }) 
    .to(".overlay ", 1, {
        opacity: 0,
        top: "-200%",
        ease: Expo.ease
    })
    
    .from(".bg-header", 1, {
        opacity: 0,
        x: "-10%",
        ease: "power4.out"
    })

    .from(".bg-text ", .2, {
        opacity: 0,
        x: "-100%",
        ease: "power4.out"
    })

    .from(".bg-logo ", 1, {
        opacity: 0,
        top: "100%",
        ease: Expo.ease
    })



    </script>

    <script>
   