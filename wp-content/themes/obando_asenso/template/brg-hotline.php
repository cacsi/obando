<style>
     .hotline2-container-brgy p {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    text-align: left;
    margin-bottom: 10px;
    margin: 20px;
}


@media only screen and (max-width: 790px) {
         .hotline2-container-brgy p{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        text-align: center;
        margin-bottom: 10px;
        margin: 20px
          }
}
</style>



<br>
<br>

<?php $hotlinedata = get_field('hotlinedata');?>
<?php $hotlinedata2 = get_field('hotlinedata2');?>

<section class="hotline-brgy" style="margin-top: 150px;">
    <div class="hotline-title-brgy">
        <h2>OBANDO  BRGY HOTLINE NUMBERS</h2>
    </div>
    <div class="hotline-wrapper-brgy">
        <div class="hotline2-container-brgy">    
            
            <?php echo $hotlinedata; ?>
        </div>
        <div class="hotline2-container-brgy">    
             <?php echo $hotlinedata2; ?>
        </div>
    </div>
    <br>
        <!-- HOTLINE -->
   
   
</section>

