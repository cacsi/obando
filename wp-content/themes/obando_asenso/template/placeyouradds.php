<?php $place_your_ads = get_field('place_your_ads_data');?>
<style>
	.place-ads{
	height: auto;
    width: 100%;
    padding: 20px;
    background: grey;
    margin-top: 20px;
    border-radius: 10px;

}


.box{
	
	background: #aaaaaa;
	height: auto;
	border: 3px solid white;

}

.place-title {
	font-family: Roboto;
	color: #cf1b1b;
	font-size: 36px;
	text-align: center;
	font-weight: 400;
	padding: 10px;


}
.div_ads {
	width: 100%;
}

.div_ads p{

	display: flex;
	flex-direction: row;
	justify-content:space-evenly;
	background-color: white;
	flex-flow: row wrap;
	width:100%;
	height:auto;

}

.div_ads p img{
	margin-bottom: 10px;
	padding:10px;
}

.div_ads img {

	object-fit: contain;

}
.place-subtitle{
	color: white;
	font-family: Roboto;
	font-size: 11px;
	text-align: center;
	padding-bottom:5px;
}





@media screen and (max-width: 443px) {
    .place-ads {
		height: auto;
    	width: auto;
    }
}
</style>


  <div class="place-ads">
      <div class="box">
	  <div class="div_title">
      	<h1 class="place-title">Place Your Ads Here!</h1>
      	<p class="place-subtitle">Please Email Municipality.Obando@gmail.com or Call (02) 8-2771356 and look for Bernard or Danreb</p>
	</div>
		<div class="div_ads">
				<?php echo $place_your_ads; ?>

		</div>
      </div>   
  </div>