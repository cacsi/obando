<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>Municipal of Obando - HOME</title>

    <?php  wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

 

  
</head>


<style>
    .mobmenul-container img {
    max-height: 35px !important;
    float: left;
}
</style>
<body>





<?php echo get_post_meta(get_the_ID(),'hero',true); ?>

<?php $hero = get_field('hero');?>



<header>


        <div class="overlay" style="top: -200%;">
            <img class="anim1" src="<?php bloginfo('template_directory');?>/image/logo.png" alt="">
        </div>


        <div class="contact-container">

            <img class="bm-icon" src="<?php bloginfo('template_directory');?>/image/logoobando.png" alt="" style="margin-left: 20px;">

            <div class="contact-email">


                <div class="contact" style="text-align: center;">
                   
                    <h1 class="serif" style="text-transform: uppercase;"><?php echo $hero['small_title']; ?> <br> <?php echo $hero['sub_small_title']; ?> 
                        <HR style="margin-top: 5px; color:white ; text-transform: uppercase;"><span class=" serif contactmuni"><?php echo $hero['main_title']; ?></span>
                    </h1>
                    

                </div>

                
                 
            </div>
        
        </div>

       
<nav>

     <?php wp_nav_menu(

        array('theme_location' => 'top-menu',
              'menu_id' =>  'main-menu',
              'container' => 'ul',
              'menu_class' => 'menu',


        )


    ); ?>







</nav>













           
       






        <!-- nav-bar -->

      
           

           
         
</header>