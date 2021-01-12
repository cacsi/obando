<?php   
require './template/top.php';
?>


<div style="position: relative;">
    <div id="hero_list">
        <img src="https://picsum.photos/200/300" alt="" height="350px" width="100%" id="hero_prev_image">
    </div>
    <input style="position: absolute; top:5px; left:5px; z-index: 1;" type="file" class="btn bg-primary text-light btn-xl" id="hero_image" onchange="add_hero_image()">
</div>


<script>

get_hero_image()

let condition = true;
let hero_prev = '';
let hero_id = '';

function add_hero_image(){
  let formdata = new FormData();
  let data = null; 

  if(condition) {
      data = {
        id : getCookie('user_id'),
        token : getCookie('token'),
        action: 'add_hero'
      }
  }else{
      data = {
        id : getCookie('user_id'),
        token : getCookie('token'),
        hero_id : hero_id,
        hero_prev: hero_prev,
        action: 'edit_hero'
      }
  }

  formdata.append('hero_image',document.getElementById('hero_image').files[0]);
  formdata.append('formdata',JSON.stringify(data));

  axios.post('/obando/API', formdata).then(res => {
    if(res.data.status){
      $('.modal').modal('hide');
      get_hero_image();
      show_alert('alert', 'Hero image added.', 5000, 'alert-success')
    }
  }).catch(err => {
    console.log(err);
  });

}


function get_hero_image()
{
    axios.get('/obando/API?action=list_hero&id=public&token=public').then(res => {
        if(res.data.status) {
          hero_list.innerHTML = '';
          hero_prev = res.data.hero_prev;
          hero_id = res.data.hero_id;
          hero_list.innerHTML = `
              <img src="${res.data.hero_image}"/>
          `
          condition = false;
        }
    }).catch(err => {
      console.log(err)
    });
}

</script>

<?php
require './template/footer.php';
?>
