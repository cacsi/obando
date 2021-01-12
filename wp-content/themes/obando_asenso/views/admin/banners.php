<?php   
require './template/top.php';
?>

<div class="container-fluid">

<h1 style="font-weight: bold">Banners</h1>

<div class="mt-1 text-light">
    <button data-toggle="modal" data-target="#add_banner" class="btn bg-primary"><i class="fas fa-plus"></i></button>
</div>
<br>

<div class="container-fluid">
    <div class="row" id="banner_list"></div>
</div>

<!-- Add Content Modal -->
<div class="modal fade" id="add_banner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input hidden type="text" id="banner_prev">
      <input hidden type="text" id="banner_id">


      <div class="card">
        <div class="card-body">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                    <img src="source/images/logo.png" style="cursor:pointer" alt="" width="100%" height="100%" id="prev_banner_image">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-2">
                    <label>Banner Image:</label>
                    </div>
                    <div class="col-lg-10">
                        <input type="file" name="" class="form-control" id="banner_image">
                    </div>
                </div>
               
                
            </div>
        </div>
    </div>

        </div>
      </div>

        </div>
        <br>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_banner()">Add Banner</button>
      </div>
    </div>
  </div>
</div>


<!-- Banner  Modal -->
<div class="modal fade" id="view_banner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="file" id="edit_banner_image">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="edit_banner()">Save</button>
      </div>
    </div>
  </div>
</div>


<script>

get_banner()

function add_banner()
{
 
  let formdata = new FormData();

  let data = {
    id : getCookie('user_id'),
    token : getCookie('token'),
    action: 'add_banner'
  }
   
  formdata.append('formdata',JSON.stringify(data))
  formdata.append('banner_image',banner_image.files[0])

  axios.post('/obando/API', formdata).then(res => {
    $('.modal').modal('hide');
    get_banner();
    show_alert('alert', 'New Banner added.', 5000, 'alert-success')
  }).catch(err => {
    console.log(err);
  });
}

let Banner = []

function get_banner()
{
    axios.get('/obando/API?action=list_banner&id=public&token=public').then(res => {
      if(res.data.length != 0){
        banner_list.innerHTML = '';
        res.data.forEach(element => {
          Banner = res.data;
          banner_list.innerHTML += 
          `<div class="m-2">
              <div class="col-lg-6">
                  <div class="card" style="width: 18rem;">
                      <img src="${element.banner_image}" class="card-img-top p-3" alt="...">
                      <div class="card-body">
                         <a href="#" data-toggle="modal" data-target="#view_banner" class="btn btn-primary bg-primary text-light" onclick="view_banner(${element.banner_id})">Change Image</a>
                      </div>
                  </div>
              </div>
          </div>`
        });
      }
    }).catch(err => {
      console.log(err)
    });
}

function edit_banner()
{
  let formdata = new FormData();

  let data = {
    banner_id : banner_id.value,
    banner_prev : banner_prev.value,
    id : getCookie('user_id'),
    token : getCookie('token'),
    action: 'edit_banner'
  }

  formdata.append('formdata',JSON.stringify(data))
  formdata.append('banner_image',edit_banner_image.files[0])

  axios.post('/obando/API', formdata).then(res => {
    $('.modal').modal('hide');
    get_banner();
    show_alert('alert', 'Banner image changed.', 5000, 'alert-success')
  }).catch(err => {
    console.log(err);
  });
}

function view_banner(id)
{
  Banner.find(element => {
    if(element.banner_id == id){
      $('#banner_prev').val(element.banner_prev)
      $('#banner_id').val(element.banner_id)
    }
  })
}
</script>

<?php
require './template/footer.php';
?>
