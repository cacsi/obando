
<?php


/*
Template Name: Hotline Numbers

*/

?>

<?php get_header(); ?>


<style>
    .adsection{
         width: 100%;
         padding-right:90px;
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
    
  

    <main style="background: #E5E5E5;">
       
       

       


        <?php get_template_part('template/brg-hotline', 'content'); ?>

        <div class="adsection">
        <?php get_template_part('template/placeyouradds', 'content'); ?>
        </div>

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
    </script>

    <script>
    let Article = [];

        axios.get('/obando/API?action=list_article&token=public&id=public').then(res => {
            if(res.data.length != 0) {
                let x = res.data;
                Article = x;
                news.innerHTML = `
                    <div class="title-news">
                        <p>EVENTS AND ACTIVITIES</p>
                    </div>
                `;
                x.forEach(element => {
                    news.innerHTML += `
                    <div class="img-date">
                        <div class="img-news">
                            <img src="${element.article_image}" alt="">
                            <a style="cursor: pointer" onclick="setStorage('${element.article_id}')">${element.article_title}</a>
                        </div>
                        <div class="date-news">
                            <p>${formatDate(element.article_created)}</p>
                        </div>
                    </div>
                    `
                })

                img_events.innerHTML = 
            `<img src="${x[0].article_image}" alt="">
            <a href="#">${x[0].article_title}</a>
            <div class="date-events">
                <p>${x[0].article_created}</p>
            </div>
            <div class="articles-events">
                <p>${x[0].article_content}</p>
            </div>`
            }
        }).catch(err => {
            console.log(err)
        })


        axios.get('/obando/API?action=list_hero&id=public&token=public').then(res => {
            hero_list.innerHTML = `<img src="${res.data.hero_image}" width="100%" height="100%" />`
        }).catch(err => {
            console.log(err)
        });

        function setStorage(id) {
            let x = Article.find(res => {return id == res.article_id ? res : false})
            localStorage.setItem('article_content',JSON.stringify(x))
            window.location.href = 'news-content';
        }

    </script>
</body>
</html>

