<?php   
require './template/top.php';
?>

<h1 style="font-weight: bold">Gallery</h1>
<div class="mt-1 text-light">
    <button class="btn bg-primary" data-toggle="modal" data-target="#add_image"><i class="fas fa-plus"></i></button>
</div>
<br>

<div class="row" id="gallery_list">

    

</div>


<!-- Add Image Modal -->
<div class="modal fade" id="add_image" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-4">
                <label>Add Image:</label>
            </div>

            <div class="col-lg-8">
                <input type="file" class="form-control" id="gallery_image">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn bg-primary text-light" onclick="add_image()">Add Image</button>
      </div>
    </div>
  </div>
</div>

<!-- View Image Modal -->
<div class="modal fade" id="view_image" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <span class="text-xl">Are you sure you want to delete this image?</span>
            <input hidden type="text" id="gallery_id">
            <input hidden type="text" id="gallery_prev_image">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn bg-danger text-light" onclick="delete_image()">Delete</button>
      </div>
    </div>
  </div>
</div>


<script>
get_image()


function add_image()
{
  let formdata = new FormData();

  let data = {
    id : getCookie('user_id'),
    token : getCookie('token'),
    action: 'add_gallery'
  }
   
  formdata.append('formdata',JSON.stringify(data))
  formdata.append('gallery_image',gallery_image.files[0])

  axios.post('/obando/API', formdata).then(res => {
      console.log(res)
    $('.modal').modal('hide');
    show_alert('alert', 'New Banner added.', 5000, 'alert-success')
    get_image()
  }).catch(err => {
    console.log(err);
  });
}

let Gallery = []

function get_image()
{
    axios.get('/obando/API?action=list_gallery&id=public&token=public').then(res => {
      if(res.data != null){
        Gallery = res.data;
        gallery_list.innerHTML = '';
        res.data.forEach(element => {
            gallery_list.innerHTML += 
          `
          <div class="col-lg-3 col-md-4 col-sm-12 mb-2 mt-2">
            <div class="card">
                <div class="card-body" id="gallery_list">
                <img src="${element.gallery_image}" class="card-img-top" alt="...">
                    <button class="btn btn-danger mt-1" data-toggle="modal" data-target="#view_image" onclick="view_image('${element.gallery_id}')"><i class="fas fa-trash"></i> &nbsp;Delete</button>
                </div>
            </div>
        </div>
          
          `
        });
      }
    }).catch(err => {
      console.log(err)
    });
}


function view_image(id)
{
    Gallery.find(element => {
    if(element.gallery_id == id){
        $('#gallery_prev_image').val(element.gallery_prev)
        $('#gallery_id').val(element.gallery_id)
        }
    })
}

function delete_image()
{
    let data = {
        gallery_id : gallery_id.value,
        gallery_image : gallery_prev_image.value,
        id : getCookie('user_id'),
        token : getCookie('token'),
        action: 'delete_gallery'
    }

    axios.post('/obando/API',data).then(res =>{
      console.log(res)
      $('.modal').modal('hide');
      show_alert('alert', 'Banner Deleted.', 5000, 'alert-success')
      get_image();
    }).catch(err => {
      console.log(err)
    })

}

</script>

<?php
require './template/footer.php';
?>
