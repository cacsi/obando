// get_article()
// get_banner()

// function show_alert(w,x,y,z)
// {
//   document.getElementById(w).innerHTML = `<div class="alert ${z} text-center" role="alert">${x}</div>`;
//   setTimeout(() => {document.getElementById(w).innerHTML = '';}, y);
// }

// let article_table = 
//     $('#article-table').DataTable( {
//       "lengthChange": false,
//     } );


// function add_article()
// {
//     let formdata = new FormData();

//     let data = {
//         article_title : article_title.value,
//         article_content: article_content.value,
//         id : getCookie('user_id'),
//         token : getCookie('token'),
//         action: 'add_article'
//     }

//     formdata.append('formdata',JSON.stringify(data))
//     formdata.append('article_image',article_image.files[0])

//     axios.post("/obando/API", formdata)
//       .then(function (res) {
//         $('.modal').modal('hide');
//         article_table.clear();
//         get_article();
//         show_alert('alert', 'New Article Added.', 5000, 'alert-success');
//         console.log(res.data)
//       })
//       .catch(function (err) {
//         console.log(err);
//     });
// }

// function view_article(id)
// {
//     Article.find(element => {
//       if(element.article_id == id){
//         console.log(element.article_image)
//         $('#edit_article_title').val(element.article_title);
//         $('#edit_article_content').val(element.article_content);
//         $('#edit_article_image').attr('src',element.article_image);
//         $('#edit_prev_image').attr('src',element.article_image);
//         $('#prev_image_article').val(element.article_image);
//         $('#art_id').text(element.article_id);
//         $('#article_id').val(element.article_id);
//       }
//     })
// }

// function edit_article()
// {
//     let formdata = new FormData();

//     let data = {
//         article_id : article_id.value,
//         article_title : edit_article_title.value,
//         article_content: edit_article_content.value,
//         article_prev: prev_image_article.value,
//         id : getCookie('user_id'),
//         token : getCookie('token'),
//         action: 'edit_article'
//     }
    
//     formdata.append('formdata',JSON.stringify(data))
//     formdata.append('article_image',edit_article_image.files[0])

//     axios.post('/obando/API',formdata).then(res => {
//       get_article();
//       $('.modal').modal('hide');
//       show_alert('alert', 'Article editing successful.', 5000, 'alert-success');
//     })
// }

// let Article = [];

// function get_article()
// {
//   axios.get('/obando/API?action=list_article&token=public&id=public').then(res => {
//       if(res.data.length != 0) {
//         Article = res.data;
//           res.data.forEach(element => {
//             article_table.row.add([
//               `<td>${element.article_id}</td>`,
//               `<td><img src="${element.article_image}" alt="" width="100px" height="70px"></td>`,
//             `<td>This is a Sample Article Title</td>`,
//               `<td class="d-inline-block text-truncate" style="max-width: 250px">${element.article_title}</td>`,
//               `<td>
//                   <button data-toggle="modal" data-target="#view_article_content" class="btn btn-success bg-success" onclick="view_article('${element.article_id}')"><i class="fas fa-eye" title="view"></i></button>
//                   <button class="btn btn-danger bg-danger"><i class="fas fa-trash" title="delete"></i></button>
//               </td>`
//             ]).draw(false);
//           })
//       }
//   }).catch(err => {
//       console.log(err)
//   })
// }



// function add_banner()
// {
 
//   let formdata = new FormData();

//   let data = {
//     id : getCookie('user_id'),
//     token : getCookie('token'),
//     action: 'add_banner'
//   }
   
//   formdata.append('formdata',JSON.stringify(data))
//   formdata.append('banner_image',banner_image.files[0])

//   axios.post('/obando/API', formdata).then(res => {
//     $('.modal').modal('hide');
//     get_banner();
//     show_alert('alert', 'New Banner added.', 5000, 'alert-success')
//   }).catch(err => {
//     console.log(err);
//   });
// }

// let Banner = []

// function get_banner()
// {
//   axios.get('/obando/API?action=list_banner&id=public&token=public').then(res => {
//     let banner = res.data
//     if(banner.length != 0){
//       banner_list.innerHTML = '';
//       banner.forEach(element => {
//         console.log(element.banner_id)
//         Banner = res.data;
//         banner_list.innerHTML += 
//         `<div class="m-2">
//             <div class="col-lg-6">
//                 <div class="card" style="width: 18rem;">
//                     <img src="${element.banner_image}" class="card-img-top p-3" alt="...">
//                     <div class="card-body">
//                        <a href="#" data-toggle="modal" data-target="#view_banner" class="btn btn-primary bg-primary text-light" onclick="view_banner(${element.banner_id})">Change Image</a>
//                     </div>
//                 </div>
//             </div>
//         </div>`
//       });
//     }
   
//   }).catch(err => {
//     console.log(err)
//   });
// }

// function edit_banner()
// {
//   let formdata = new FormData();

//   let data = {
//     banner_id : banner_id.value,
//     banner_prev : banner_prev.value,
//     id : getCookie('user_id'),
//     token : getCookie('token'),
//     action: 'edit_banner'
//   }

//   formdata.append('formdata',JSON.stringify(data))
//   formdata.append('banner_image',edit_banner_image.files[0])

//   axios.post('/obando/API', formdata).then(res => {
//     $('.modal').modal('hide');
//     get_banner();
//     show_alert('alert', 'Banner image changed.', 5000, 'alert-success')
//   }).catch(err => {
//     console.log(err);
//   });
// }

// function view_banner(id)
// {
//   Banner.find(element => {
//     if(element.banner_id == id){
//       $('#banner_prev').val(element.banner_image)
//       $('#banner_id').val(element.banner_id)
//     }
//   })
// }
