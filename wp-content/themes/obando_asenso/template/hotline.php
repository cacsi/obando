



<?php $hotlinenumbers = get_field('hotlinenumbers'); ?>

<section class="hotline">
    <div class="hotline-title">
        <h2>OBANDO HOTLINE NUMBERS</h2>
    </div>
    <div class="hotline-wrapper">
    <div class="hotline2-container">    
        <div class="hotline1">
            <p>Public Information Office:</p><span><?php echo $hotlinenumbers['publicinformationoffice']; ?></span>
        </div>
        <div class="hotline1">
            <p>Mayors Complain and Action Team: </p><span> <?php echo $hotlinenumbers['mayorscomplain']; ?></span>
        </div>
        <div class="hotline1">
            <p>Mayors Office:</p><span><?php echo $hotlinenumbers['mayorsoffice']; ?></span>
        </div>
        <div class="hotline1" style="padding-bottom: 20px;">   
            <p>Disaster:</p><span><?php echo $hotlinenumbers['disaster']; ?></span>
        </div>
    </div>
        <!-- HOTLINE -->
    <div class="hotline2-container">
        
        <div class="hotline2">
            <p>Police: </p><span><?php echo $hotlinenumbers['police']; ?></span>
        </div>
        <div class="hotline2">
            <p>Fire:</p><span><?php echo $hotlinenumbers['fire']; ?></span>
        </div>
        <div class="hotline2">   
            <p>Health:</p><span><?php echo $hotlinenumbers['health']; ?></span>
        </div>
    </div>
    </div>
</section>


