<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
	.btn{
		background-color:blue;
	}
	.example input[type=text] {
    padding: 10px;
    font-size: 10px;
    border: 1px solid grey;
    float: left;
	color: #131212;
    width: 60%;
    background: #f1f1f1;
}
.example button {
    float: left;
    width: 10%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 10px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

.example button:hover {
  background: #0b7dda;
}

</style>
<!-- <script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script> -->
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
			<div class="row">
                    <div class="col-sm-6 example" class="example">
						<form id="frmSearch">
						<input type="text" placeholder="Search.." id="search" name="search"  >
						<button type="submit"><i class="fa fa-search" id="search"  ></i></button>
						</form>
					    <!-- <div id="search1"></div> -->
					</div>
					<div class="col-sm-6">
						<a href="http://localhost/addcard/index.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>	
					</div>
                </div>
            </div>
			
			<table class="table table-striped table-hover" id="table-data">
                <thead>
                    <tr>
					    <th>id</th>
						<th>Card_number</th>
						<th>CVS</th>
						<th>Year/month</th>
						<th>User_id</th>
						<th>Actions</th>
                    </tr>
				</thead>			   
			   <tbody class="result-container"></tbody>
			</table> 

			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination" >
				<!-- <div id="results"></div> -->
                    <li class="page-item"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
	

	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>

//   var apiUrl = "http://localhost/addcard/api/index.php";

//    $(document).ready(function(){
	

//     jQuery.support.cors = true;

//     $.ajax(
//     {
//         type: "GET",
//         url: apiUrl + '/getcard',
// //        data: "{}",
//         contentType: "application/json; charset=utf-8",
//         dataType: "json",
//         cache: false,
//         success: function (result) {			
			
//         	var trHTML = '';			
// 			for(var r=0; r<result.data.length; r++){
// 				var item = result.data[r];
// 				var cardId = item.cardid;
// 				trHTML += '<tr>';
// 				trHTML += '<td>' + item.ccnumber + '</td>';
// 				trHTML += '<td>' + item.cccvs + '</td>'; 
// 				trHTML += '<td>' + item.ccexpyear+'/'+item.ccexpmonth + '</td>';
// 				trHTML += '<td>' + item.user_id + '</td>';
// 				trHTML += '<td><a href="http://localhost/addcard/edit.html" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
// 				trHTML += '<a  class="del" href="#" onclick="delMe(this,'+cardId+')" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
// 				trHTML += '</tr>';
// 			}

// 			//console.log(trHTML);
// 			$('.result-container').html(trHTML);		
//         },        
//         error: function (msg) {            
//             alert("Whoops! Something went wrong. Please check logs");
//         }
//     });

// });

               //get  correct ajax code

	var apiUrl = "http://localhost/addcard/api/index.php";

   $(document).ready(function(){
	//??????
    jQuery.support.cors = true;
    $.ajax({
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

			//console.log(trHTML);
			$('.result-container').html(trHTML);		
        },        
        error: function (msg) {            
            alert("Whoops! Something went wrong. Please check logs");
        }
    });
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
	$.ajax({  //GR ID Generation
		method: "GET",
		data: {query: search},
		url: apiUrl + '/getcard',
		dataType: "json",
	    success: function (result) {
			//alert(result.data.length)
			var trHTML = '';			
			for(var r=0; r<result.data.length; r++){
				var item = result.data[r];
				console.log(item);
				trHTML += '<tr class="tr-'+item.id+'">';
				trHTML += '<td>' + item.id + '</td>';
				trHTML += '<td>' + item.ccnumber + '</td>';
				trHTML += '<td>' + item.cccvs + '</td>'; 
				trHTML += '<td>' + item.ccexpyear+'/'+item.ccexpmonth + '</td>';
				trHTML += '<td>' + item.user_id + '</td></tr>';
				//trHTML += '<td><a href="http://localhost/addcard/edit.html" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a  class="delete" href="#" data-id="'+item.id+'" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
				//trHTML += '<td><a  class="del" href="#" onclick="delMe(this,'+item.Id+')" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
			}
			$('.result-container').html(trHTML);
			//console.log(JSON.stringify(result));
		},
		error: function (err){
			console.log(JSON.stringify(err));
		}
	});			

});

//alert()
// function searchCards() {
// 	var search = $('#search').val();
// 		$.ajax({  //GR ID Generation
// 		method: "get",
// 		data: "ccnumber="+search,
// 		url: apiUrl + 'searchcard',
// 		dataType: "json",
// 	    success: function (result) {			
//         	var trHTML = '';			
// 			for(var r=0; r<result.data.length; r++){
// 				var item = result.data[r];
// 				trHTML += '<tr class="tr-'+item.id+'">';
// 				trHTML += '<td>' + item.id + '</td>';
// 				trHTML += '<td>' + item.ccnumber + '</td>';
// 				trHTML += '<td>' + item.cccvs + '</td>'; 
// 				trHTML += '<td>' + item.ccexpyear+'/'+item.ccexpmonth + '</td>';
// 				trHTML += '<td>' + item.user_id + '</td>';
// 				//trHTML += '<td><a href="http://localhost/addcard/edit.html" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a  class="delete" href="#" data-id="'+item.id+'" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
// 				//trHTML += '<td><a  class="del" href="#" onclick="delMe(this,'+item.Id+')" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
// 				trHTML += '</tr>';
// 			}

// 			//console.log(trHTML);
// 			$('.result-container').html(trHTML);		
//         },   
//         // error: function (msg){            
//         //     alert("Whoops! Something went wrong. Please check logs");
//         // }
	

// });
// }
	  // pagination code ajax 
// 	  function getresult(url) {
// 	$.ajax({
// 		url: apiUrl + 'pagination',
// 		type: "get",
// 		data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
// 		beforeSend: function(){$("#overlay").show();},
// 		success: function(data){
// 		$("#pagination-result").html(data);
// 		setInterval(function() {$("#overlay").hide(); },500);
// 		},
// 		error: function() 
// 		{} 	        
//    });
// }
// function changePagination(option) {
// 	if(option!= "") {
// 		getresult("crud.php");
// 	}
// }

</script>
</body>
</html>                                		                            