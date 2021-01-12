<?php


/*
Template Name: Covid Details

*/

?>


<?php get_header(); ?>
<?php $coviddetails = get_field('coviddetails');
?>





<style>


	
.tblresponsivedivcovid{
  overflow-x: auto;  
  padding: 20px;

}


.tablepress tbody td {
  text-align: center;
}
/*
.tablepress th {
    background-color: #4CAF50;
  color: white; 
}*/


/*.tablepress tfoot th, .tablepress thead th {
    background-color: green;
    font-weight: 700;
    vertical-align: middle;
    color: white;
}*/


.tablepress .row-1   td{
    background-color: #4CAF50;
    font-weight: 700;
    vertical-align: middle;
    color: white;
}


.tablepress .row-2   td{
    background-color: #4CAF50;
    font-weight: 700;
    vertical-align: middle;
    color: white;
}
.tablepress tr td {
  border: 1px solid #ddd;
      padding: 8px;
      font-size: 14px;
}


.tablepress tfoot th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 14px;
    text-align: center;
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
                    <p>Covid Details</p>
                </div>
   				
   				                   <div class="tblresponsivedivcovid" >
                                <?php echo $coviddetails; ?>
   				
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

