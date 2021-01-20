
<?php $adverstisementdata = get_field('adverstisementdata');?>
<style>

.frame_container{
  align-self:center
}
iframe{
 
  margin-left:20px;
  align-self:center;
  width:auto;

}
@media only screen and (max-width: 587px) {
 iframe{
   margin-left:0px;
   padding:30px;
 } 
}
</style>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="20xLj6xK"></script>

<div class="advertisement" id="advertisement" style="height: 100%;">

                  <div class="ads1">
                    <?php echo $adverstisementdata; ?>
                 </div>

     <div class="frame_container">            
     <div class="fb-page" data-href="https://www.facebook.com/ObandoToday/" data-tabs="timeline" data-width="400">
    </div>
</div>