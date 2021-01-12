
<?php $adverstisementdata = get_field('adverstisementdata');?>
<style>

iframe {
  height: 50vh;
  margin-left: 20px;
}

@media only screen and (max-width: 848px) {
  iframe {
  height: 70vh;
  margin-bottom:10px;
}
}
</style>


<div class="advertisement" id="advertisement" style="height: 100%;">

                  <div class="ads1">
                    <?php echo $adverstisementdata; ?>
                 </div>

                 <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FObandoToday%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

  </div>