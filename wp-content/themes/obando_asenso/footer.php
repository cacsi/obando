<?php $foot = get_field('hero');?>



<style>
/* footer */
.bm-footer {
    height: 85vh;
    background: linear-gradient(24.99deg, #236432 -87.27%, #3DF7AB 175.57%);
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 50px;
    color: white;
    overflow: hidden;
}

.content-info p {
    width: 80%;
    line-height: 26px;

}

.content-info {
    margin-left: 10px;
    margin-bottom: 10px;
}

.footer-content-title {
    margin: 50px 10px;
    font-size: 20px;
    font-weight: 400;
    letter-spacing: 2px;
}

.content-info h3 {
    margin-bottom: 10px;
}

.contact-form-title {
    font-size: 25px;
    margin-top: 30px;
}

.content-form input[type=text] {
    width: 100%;
    height: 50px;
    outline: none;
}

.contact-form {
    width: 500px;
}

.content-form textarea {
    width: 100%;
    height: 20%;
    outline: none;
}

.content-form input[type=submit] {
    width: 100px;
    border-radius: 15px;
    padding: 15px;
    border: none;
    text-transform: uppercase;
    font-weight: 800;
    color: #333333;
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
    outline: none;
    cursor: pointer;

}

.content-form input[type=submit]:hover {
    background: #427bc5;
    color: white;
}

.content-form input[type=submit]:active {
    background: #1C497C;
    transform: translateY(4px);
}





div.wpforms-container-full .wpforms-form button[type=submit] {

    border-radius: 15px;
    width: 100px;

}

/** WPFORMS SUBMITBUTTON Hover **/
button.wpforms-submit:hover {
    color: rgb(255, 255, 255) !important;
    background-color: rgb(8, 168, 191) !important;
}







@media only screen and (max-width: 1044px) {
    .bm-footer {
        height: 100%;
        background: linear-gradient(24.99deg, #236432 -87.27%, #3DF7AB 175.57%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 50px;
        color: white;
        overflow: hidden;
        text-align: center;
    }

    .content-info p {
        width: 100%;
        line-height: 26px;

    }

    .footer-content-title {
        margin: 50px 10px;
        font-size: 20px;
        font-weight: 400;
        letter-spacing: 2px;
    }

    .content-info h3 {
        margin-bottom: 10px;
    }

    .contact-form-title {
        font-size: 25px;
    }

    .content-form input[type=text] {
        width: 100%;
        height: 50px;
        outline: none;
    }

    .contact-form {
        width: 400px;
    }


    .content-form textarea {
        width: 100%;
        height: 20%;
        outline: none;
    }



    .content-form input[type=submit] {
        width: 100%;
        border-radius: 15px;
        padding: 15px;
        border: none;
        text-transform: uppercase;
        font-weight: 800;
        color: #333333;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
        outline: none;
        cursor: pointer;
        margin-bottom: 50px;

    }





    div.wpforms-container-full .wpforms-form button[type=submit] {

        border-radius: 15px;
        width: 100%;

    }

    .content-form input[type=submit]:hover {
        background: #427bc5;
        color: white;
    }

    .content-form input[type=submit]:active {
        background: #1C497C;
        transform: translateY(4px);
    }

}







@media only screen and (max-width: 414px) {

    /* footer */
    .bm-footer {
        height: 100%;
        background: linear-gradient(24.99deg, #236432 -87.27%, #3DF7AB 175.57%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 50px;
        color: white;
        overflow: hidden;
        text-align: center;
    }

    .content-info p {
        width: 100%;
        line-height: 26px;

    }

    .content-info a:hover {
        color: #1C497C;
    }



    .footer-content-title {
        margin: 50px 10px;
        font-size: 20px;
        font-weight: 400;
        letter-spacing: 2px;
    }

    .content-info h3 {
        margin-bottom: 10px;
    }

    .contact-form-title {
        font-size: 25px;
    }

    .content-form input[type=text] {
        width: 100%;
        height: 50px;
        outline: none;
    }

    .contact-form {
        width: 100%;
    }


    .content-form textarea {
        width: 100%;
        height: 20%;
        outline: none;
    }

    .content-form input[type=submit] {
        width: 100%;
        border-radius: 15px;
        padding: 15px;
        border: none;
        text-transform: uppercase;
        font-weight: 800;
        color: #333333;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
        outline: none;
        cursor: pointer;
        margin-bottom: 50px;

    }



    div.wpforms-container-full .wpforms-form button[type=submit] {

        border-radius: 15px;
        width: 100%;

    }

    .content-form input[type=submit]:hover {
        background: #427bc5;
        color: white;
    }

    .content-form input[type=submit]:active {
        background: #1C497C;
        transform: translateY(4px);
    }




}

/* footer */
</style>



<div class="bm-footer" id="sectionfoot">
    <div class="bm-info">
        <div class="footer-title">
            <h1>OBANDO INFO</h1>
        </div>

        <div class="footer-content">
            <div class="footer-content-title">
                <!-- <p>Contact Us</p> -->
            </div>
            <div class="content-info">
                <h3>Address</h3>
                <p>
                    <?php echo $foot['address_text']; ?></p>
            </div>
            <div class="content-info">
                <h3>Email Us</h3>
                <p>Website Admin


                    <a style="color:white; " href="<?php echo $foot['footer_emailus']; ?>"
                        target="_blank"><u><?php echo $foot['footer_emailustext']; ?></u></a>
                </p>
               
                <p>Municipal Mayor
                    <a style="color: white;" href="<?php echo $foot['footer_municipallink']; ?>"
                        target="_blank"><u><?php echo $foot['footer_municipaltext']; ?></u></a>
                </p>
            </div>

            <div class="content-info">
                <h3>Follow Us</h3>
                <p>Facebook Page
                    <a style="color:white; " href="<?php echo $foot['fbpage_link']; ?>"
                        target="_blank"><u><?php echo $foot['fb_pagetext']; ?></u></a>
                </p>
            
                <p>Twitter Page
                    <a style="color:white; " href="<?php echo $foot['twitter_pagelink']; ?>"
                        target="_blank"><u><?php echo $foot['twitter_pagetext']; ?></u></a>
                </p>
            </div>

            <div class="content-info">
                <h3>Call </h3>
                <p><?php echo $foot['call_number']; ?></p>
            </div>

        </div>

    </div>

    <div class="contact-form" id="contact">
        <div class="contact-form-title">
            <h4>Contact Us</h4>
            <br>
        </div>
        <div class="content-form">



            <?php echo do_shortcode('[wpforms id="571"]'); ?>

        </div>
    </div>
</div>
<section>
    <div style="height: auto;" class="footz">
        <div class="foot-img">
            <!-- <img src="image/logo.png" alt=""> -->
        </div>

        <div class="foot-content">
            <!-- <p>Municipal of Obando Bulacan</p> -->
            <p><?php echo $foot['copyrighttext']; ?></p>
            

        </div>
    </div>
</section>
<script src='<?php echo get_template_directory_uri(); ?>/js/app.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/gsap/gsap.js'>
// gsap
var tl = gsap.timeline({
    defaults: {
        duration: .1
    }
})


tl.from(".anim1", 1, {
        opacity: 0,
        y: "150%",
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
<script src='<?php echo get_template_directory_uri(); ?>/libraries/axios.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/libraries/global.js'></script>
<script>
get_article()
let samplearticle = [];

function get_article() {
    imgcontent.innerHTML = "";
    axios.get('<?php echo get_template_directory_uri(); ?>/getarticlecontent.php').then(res => {
        samplearticle = res.data;
        res.data.forEach(item => {
            imgcontent.innerHTML += `
            <p class="hello" style="text-align: left; margin-bottom:10px;"><img id="imgid" class="size-medium wp-image-174 alignleft" src="${item.Image}}" alt="" width="300" height="200" />
                <a class="newsid" style="cursor:pointer;" onclick="go_to_content3(${item.ID})">${item.Title}</a></p>
                <span style="color: #ff0000; margin-top: 20px; float:right; margin-bottom:10px;">${item.Date}</span>

        `
        })
    })
}
</script>




<script>
get_contentnews()
let samplenews = [];

function get_contentnews() {
    contentnews.innerHTML = "";
    axios.get('<?php echo get_template_directory_uri(); ?>/getarticlecontent.php').then(res => {
        samplenews = res.data;
        res.data.forEach(item => {
            contentnews.innerHTML += `
            
             
                         <div class="img-date">
                                    <div class="img-news" style="margin-bottom:10px;">
                                        <img src="${item.Image}" alt="">
                                        <a class="newslink" style="cursor: pointer" onclick="go_to_content2(${item.ID})">${item.Title}</a>
                                    </div>
                                    <div class="date-news">
                                        <p>${item.Date}</p>
                                    </div>
                        </div>

        `
        })
    })
}
</script>



<script>
get_contentevents()
let sample = [];

function get_contentevents() {
    contentevents.innerHTML = "";
    axios.get('<?php echo get_template_directory_uri(); ?>/geteventcontent.php').then(res => {
        sample = res.data;
        res.data.forEach(item => {
            contentevents.innerHTML += `
             <div class="img-date">
                        <div class="img-news" style="margin-bottom:10px;">
                            <img src="${item.Image}" alt="">
                            <a class="newslink" style="cursor: pointer;" onclick="go_to_content('${item.ID}')">${item.Title}</a>
                        </div>
                        <div class="date-news">
                            <p>${item.Date}</p>
                        </div>
            </div>

        `
        })
    })
}
</script>




<!-- for announcement -->
<script>
get_announcement()
let sampleannouncement = [];

function get_announcement() {
    imgannounce.innerHTML = "";
    axios.get('<?php echo get_template_directory_uri(); ?>/getannouncementcontent.php').then(res => {
        sampleannouncement = res.data;

        res.data.forEach(item => {
            imgannounce.innerHTML += `
            <p class="hello" style="text-align: left; margin-bottom:10px;"><img id="imgid" class="size-medium wp-image-174 alignleft" src="${item.Image}}" alt="" width="300" height="200" />
                <a class="newsid" style="cursor:pointer;" onclick="go_to_content4(${item.ID})">${item.Title}</a></p>
                <span style="color: #ff0000; margin-top: 20px; float:right; margin-bottom:10px;">${item.Date}</span>

        `
        })
    })
}
</script>



<script>
function go_to_content(a) {

    localStorage.clear();

    let xa = sample.find(res => {
        return res.ID == a ? res : false;
    })

    localStorage.setItem('content', JSON.stringify({
        ID: xa.ID,
        Title: xa.Title,
        Content: xa.Content,
        Date: xa.Date,
        Image: xa.Image
    }))
    window.location.href = '<?php echo get_site_url(); ?>/content-page';
}
</script>

<script>
function go_to_content2(a) {

    localStorage.clear();

    let xa = samplenews.find(res => {
        return res.ID == a ? res : false;
    })

    localStorage.setItem('content', JSON.stringify({
        ID: xa.ID,
        Title: xa.Title,
        Content: xa.Content,
        Date: xa.Date,
        Image: xa.Image
    }))
    window.location.href = '<?php echo get_site_url(); ?>/content-page';
}
</script>

<script>
function go_to_content3(a) {

    localStorage.clear();

    let xa = samplearticle.find(res => {
        return res.ID == a ? res : false;
    })

    localStorage.setItem('content', JSON.stringify({
        ID: xa.ID,
        Title: xa.Title,
        Content: xa.Content,
        Date: xa.Date,
        Image: xa.Image
    }))
    window.location.href = '<?php echo get_site_url(); ?>/content-page';
}
</script>



<script>
function go_to_content4(a) {

    localStorage.clear();

    let xa = sampleannouncement.find(res => {
        return res.ID == a ? res : false;
    })

    localStorage.setItem('content', JSON.stringify({
        ID: xa.ID,
        Title: xa.Title,
        Content: xa.Content,
        Date: xa.Date,
        Image: xa.Image
    }))
    window.location.href = '<?php echo get_site_url(); ?>/content-page';
}
</script>





</body>

</html>