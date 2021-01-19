
<?php $adverstisementdata = get_field('adverstisementdata');?>
<style>

.frame_con{
  display:flex; 
  justify-content:center;
  margin-left:20px;
  width:100%;

}
@media only screen and (max-width: 587px) {
  .frame_con{
    margin-right:20px;
    margin-left:20px;
  }
}
</style>


<div class="advertisement" id="advertisement" style="height: 100%;">

                  <div class="ads1">
                    <?php echo $adverstisementdata; ?>
                 </div>

     <div class="frame_con">            
     <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FObandoToday%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
</div>         

</div>