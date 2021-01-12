$(document).ready(function(){

    

    
    $('#prev_image').click(function(){
        $('#article_image').click();
    })


    $('#edit_article_img').click(function(){
        $('#edit_article_image').click();
    })
});

function show_alert(w,x,y,z)
{
  document.getElementById(w).innerHTML = `<div class="alert ${z} text-center" role="alert">${x}</div>`;
  setTimeout(() => {document.getElementById(w).innerHTML = '';}, y);
}


let article_table = 
$('#article-table').DataTable( {
    "lengthChange": false,
} );

