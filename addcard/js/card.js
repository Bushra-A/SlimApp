
  var apiUrl = "http://localhost/addcard/api/index.php";

  $(document).ready(function(){
   

   jQuery.support.cors = true;

   $.ajax(
   {
       type: "GET",
       url: apiUrl + '/getcard',
//        data: "{}",
       contentType: "application/json; charset=utf-8",
       dataType: "json",
       cache: false,
       success: function (result) {			
           
           var trHTML = '';			
           for(var r=0; r<result.data.length; r++){
               var item = result.data[r];
               var cardId = item.cardid;
               trHTML += '<tr>';
               trHTML += '<td>' + item.ccnumber + '</td>';
               trHTML += '<td>' + item.cccvs + '</td>'; 
               trHTML += '<td>' + item.ccexpyear+'/'+item.ccexpmonth + '</td>';
               trHTML += '<td>' + item.user_id + '</td>';
               trHTML += '<td><a href="http://localhost/addcard/edit.html" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
               trHTML += '<a  class="del" href="#" onclick="delMe(this,'+cardId+')" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
               trHTML += '</tr>';
           }

           //console.log(trHTML);
           $('.result-container').html(trHTML);		
       },        
       error: function (msg) {            
           alert("Whoops! Something went wrong. Please check logs");
       }
   });

});

            //  get  correct ajax code

   var apiUrl = "http://localhost/addcard/api/index.php";

  $(document).ready(function(){
   getCardsList(false)
   });

   // delete  correct ajax code 

$(document).on('click', '.delete', function(){
         var id = $(this).data("id");
          var tr = $('.tr-'+id);
         if(confirm("Are you sure you want to delete this?"))
         {
              $.ajax({
                   url: apiUrl + '/delete',
                   method:"POST",
                    cache: false,
                   dataType:'json',
                   data:{id:id},
                   success:function(data)
                   {
                        if(data.status){
                           $(tr).fadeOut('slow',function(){
                               $(tr).remove();
                           });
                        }
                      
                   }
              });
         }
         else
         {
              alert("can't delete the row")
         }
    });


    
     // searching ajax code
      
   
/*
   $("#search").keyup(function(){
       searchCards();
   });
*/

$("#frmSearch").submit(function(e){
   //console.log(e);
   e.preventDefault();
   //alert("search from posted");
   // validation
   var search = $("#search").val();
   // validation
   console.log(search); 
   getCardsList(search);
});



function getCardsList(searchQuery, pageNumber){
   
   jQuery.support.cors = true;
   $.ajax({
       type: "GET",
       url: apiUrl + '/getcard',
        data: {page:parseInt(pageNumber), query:searchQuery},
       contentType: "application/json; charset=utf-8",
       dataType: "json",
       cache: false,
       success: function (result) {			
           var paginationInfo = result.pagination;
           
           var trHTML = '';			
           for(var r=0; r<result.data.length; r++){
               var item = result.data[r];
               trHTML += '<tr class="tr-'+item.id+'">';
               trHTML += '<td>' + item.id + '</td>';
               trHTML += '<td>' + item.ccnumber + '</td>';
               trHTML += '<td>' + item.cccvs + '</td>'; 
               trHTML += '<td>' + item.ccexpyear+'/'+item.ccexpmonth + '</td>';
               trHTML += '<td>' + item.user_id + '</td>';
               trHTML += '<td><a href="http://localhost/addcard/edit.html" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a  class="delete" href="#" data-id="'+item.id+'" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
               //trHTML += '<td><a  class="del" href="#" onclick="delMe(this,'+item.Id+')" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
               trHTML += '</tr>';
           }
           //console.log(result.pagination);
            var pagination = "";
           for(var x=0; x<paginationInfo.pages; x++){
               var page = x+1;
               var activeMe = (paginationInfo.current === page)?'active':'';

                pagination += '<li class="page-item '+activeMe+'" ><a href="#" onclick="getCardsList('+searchQuery+','+page+')" class="page-link">'+page+'</a></li>';
           }
           
           $('#paginate').html(pagination);
           //console.log(trHTML);
           $('.result-container').html(trHTML);
           $('.hint-text').html('Showing From '+paginationInfo.offset+' to <b> '+paginationInfo.limit*paginationInfo.current+'</b> out of <b>'+paginationInfo.total+'</b> entries');		
       },        
       error: function (msg) {            
           alert("Whoops! Something went wrong. Please check logs");
       }
   });

}