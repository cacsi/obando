<?php   
require './template/top.php';
?>

<div class="container-fluid">


<h1 style="font-weight: bold">Articles</h1>

<div class="float-left mt-1 text-light">
    <button data-toggle="modal" data-target="#add_article_content" class="btn bg-primary"><i class="fas fa-plus"></i></button>
</div>
<br>

<table class="table table-stripe text-center table-responsive-lg" id="article-table">
<thead>
    <tr>
        <th style="width: 20px">ID</th>
        <th style="width: 120px">Image</th>
        <th style="width: 200px">Title</th>
        <th>Content</th>
        <th style="width: 80px">Action</th>
    </tr>
</thead>

<tbody></tbody>
</table>

<!-- Add Content Modal -->
<div class="modal fade" id="add_article_content" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="card">
        <div class="card-body">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                    <img src="source/images/logo.png" style="cursor:pointer" alt="" width="100%" height="100%" id="prev_image">
                    <input hidden type="file" name="" class="form-control" id="article_image">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-2">
                    <label>Article Title:</label>
                    </div>
                    <div class="col-lg-10">
                    <input type="text" name="" class="form-control" id="article_title">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-2">
                    <label>Article Content:</label>
                    </div>
                    <div class="col-lg-10">
                    <textarea name="" cols="30" rows="10" class="form-control" id="article_content"></textarea>
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
        <button type="button" class="btn btn-primary" onclick="add_article()">Add Article</button>
      </div>
    </div>
  </div>
</div>


<!-- ViewContent Modal -->
<div class="modal fade" id="view_article_content" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Article ID - <span id="art_id"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-4">
        <input hidden type="text" id="prev_image_article">
        <img src="source/images/logo.png" class="card-img p-4" alt="..." style="cursor:pointer" height="100%" width="100%" id="edit_article_img">
        <input  type="file" class="form-control" style="opacity:0%" id="edit_article_image">
        </div>

        <div class="col-md-8">
        <div class="card-body">
        <div class="container-fluid">
            <input hidden type="text" id="article_id">
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label>Article Title:</label>
                </div>
                <div class="col-lg-10">
                    <input type="text" name=""class="form-control" id="edit_article_title">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-2">
                    <label>Article Content:</label>
                </div>
                <div class="col-lg-10">
                   <textarea name="" cols="30" rows="10" class="form-control" id="edit_article_content"></textarea>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>




        
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="edit_article()">Save</button>
      </div>
    </div>
  </div>
</div>




<script>
get_article()


function add_article()
{
    let formdata = new FormData();

    let data = {
        article_title : article_title.value,
        article_content: article_content.value,
        id : getCookie('user_id'),
        token : getCookie('token'),
        action: 'add_article'
    }

    formdata.append('formdata',JSON.stringify(data))
    formdata.append('article_image',article_image.files[0])

    axios.post("/obando/API", formdata)
      .then(function (res) {
        $('.modal').modal('hide');
        article_table.clear();
        get_article();
        show_alert('alert', 'New Article Added.', 5000, 'alert-success');
        console.log(res.data)
      })
      .catch(function (err) {
        console.log(err);
    });
}

function view_article(id)
{
    Article.find(element => {
      if(element.article_id == id){
        $('#prev_image_article').val(element.article_prev);
        $('#article_id').val(element.article_id);
        $('#edit_article_title').val(element.article_title);
        $('#edit_article_content').val(element.article_content);
        $('#edit_article_img').attr('src',element.article_image);
      }
    })
}

function edit_article()
{
    let formdata = new FormData();

    let data = {
        article_id : article_id.value,
        article_title : edit_article_title.value,
        article_content: edit_article_content.value,
        article_prev: prev_image_article.value,
        id : getCookie('user_id'),
        token : getCookie('token'),
        action: 'edit_article'
    }
    formdata.append('formdata',JSON.stringify(data))
    formdata.append('article_image',edit_article_image.files[0])

    axios.post('/obando/API',formdata).then(res => {
      console.log(res)
      $('.modal').modal('hide');
      get_article();
      show_alert('alert', 'Article editing successful.', 5000, 'alert-success');
    }).catch(err => { 
      console.log(err)
    })


}

let Article = [];

function get_article()
{
  axios.get('/obando/API?action=list_article&token=public&id=public').then(res => {
      if(res.data.length != 0) {
        Article = res.data;
        article_table.clear();
          res.data.forEach(element => {
            article_table.row.add([
              `<td>${element.article_id}</td>`,
              `<td><img src="${element.article_image}" alt="" width="100px" height="70px"></td>`,
            `<td>${element.article_title}</td>`,
              `<td class="d-inline-block text-truncate" style="max-width: 250px">${element.article_content}</td>`,
              `<td>
                  <button data-toggle="modal" data-target="#view_article_content" class="btn btn-success bg-success" onclick="view_article('${element.article_id}')"><i class="fas fa-eye" title="view"></i></button>
                  <button class="btn btn-danger bg-danger"><i class="fas fa-trash" title="delete"></i></button>
              </td>`
            ]).draw(false);
          })
      }
  }).catch(err => {
      console.log(err)
  })
}



</script>
<?php
require './template/footer.php';
?>
