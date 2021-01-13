 <?php get_header(); ?>

 <?php $hero = get_field('hero');?>
 <?php $searchdata = get_field('searchdata');?>
 <?php $picanimation = get_field('homepagemovingpictures');?>
 
 


 <style>
/*  nav.sticky{

    margin-top: -200px;
}*/


.img-news a:hover {
    color: green;
}
 </style>

 <section class="bg-container">
    
     <div class="bg-white">
         <img src="<?php bloginfo('template_directory');?>/bg-image/bg-gsap.png" alt="heloo">
     </div>

     <div class="bg-header">
         <img src="<?php echo $picanimation['header_img']; ?>" alt="heloo">
     </div>
     <div class="bg-text">
         <img src="<?php echo $picanimation['text_img'];?>" alt="heloo">
     </div>

     <div class="bg-button">


         <?php echo $hero['link_text']; ?>


     </div>

     <div class="bg-mayor">
         <img src="<?php echo $picanimation['mayor_img']; ?>" alt="heloo">
     </div>


     <div class="bg-muni">
         <img src="<?php echo $picanimation['municipal_img']; ?>" alt="heloo">
     </div>


     <div class="bg-logo">
         <img src="<?php echo $picanimation['logo_img'];?>" alt="heloo">

     </div>

     <div class="bg-social">
         <a href="<?php echo $hero['fbpage_link']; ?>" target="_blank"> <img
                 src="<?php bloginfo('template_directory');?>/bg-image/fbcrop.png" alt="heloo">
         </a>



     </div>


     <div class="bg-social2">
         <a href="<?php echo $hero['twitter_pagelink']; ?>" target="_blank"> <img
                 src="<?php bloginfo('template_directory');?>/bg-image/twittercrop.png" alt="heloo">
         </a>



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
             <?php echo $searchdata; ?>
             <div class="news-events">

                 <div class="news-wrapper">
                     <!-- evenst -->
                     <div class="news">
                         <div class="title-news">
                             <p>EVENTS AND ACTIVITIES</p>
                         </div>
                         <div id="contentevents">
                         </div>
                     </div>
                     <!-- news -->
                     <div class="events">
                         <div class="title-news">
                             <p>obando news</p>
                         </div>
                         <div id="contentnews">
                         </div>
                     </div>
                 </div>

                 <?php get_template_part('template/placeyouradds', 'content'); ?>

             </div>
             <!-- paremt -->
         </div>
         <?php get_template_part('template/adverse', 'content'); ?>

     </section>

     <?php get_template_part('template/hotline', 'content'); ?>
     <?php get_footer(); ?>

 </main>


 <?php wp_footer(); ?>
 <script>
window.addEventListener("scroll", function() {
    var header = document.querySelector("nav");
    header.classList.toggle("sticky", window.scrollY > 0);
})
var tl = gsap.timeline({
    defaults: {
        duration: .1
    }
})

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