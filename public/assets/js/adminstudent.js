$(document).ready(function()
{
    
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
});

$(".delete-student").click(function()
{
//alert('hello');
var item=$(this).attr('data-idstudent');
$.ajax({
    type:'GET',
    url:'/student/save', 
    data:
     {
         "id":$(this).attr('data-idstudent'),
    },
    success:function(data) {
       //alert(data.msg);
       $("[data-row='"+item+"']").fadeOut("slow");
       $(".delete-modal-body").html("Xóa học sinh "+data.msg+" thành công");
       $("#Modalstudent").modal('show');    
       setTimeout(function() {
        $("#Modalstudent").modal('hide');
      }, 2000);
    }
 });
});

$("#AddStudentBtnAjax").click(function(e){
         	e.preventDefault();
         	$(this).attr("disabled","disabled");
         	var ThisBtn = '#'+$(this).attr("id");
            var _token = $("input[name='_token']").val();
            var StudentName = $("#StudentName").val();
            var StudentClass = $("#StudentClass").val();
     
                   $.ajax({
						    type:'POST',
						    url:'/student/savestudentajax', 

						    data:
						     {
						         "StudentName":StudentName,
						         "StudentClass":StudentClass
						    },
						    success:function(data)
						     {			
						     	if(data.message=='success')		
						     	{
						     		swal({
										  title: "Done !",
										  text: "Create student successfully",
										  icon: "success",
										});
						     	}
						     	else
						     	{
						     		swal({
										  title: "Warning !",
										  text: data.error,
										  icon: "warning",
										});
						     	}			
						     	$(ThisBtn).removeAttr("disabled");			     								      			     
						    },
						     error: function(jqXHR, textStatus, errorThrown) {
							        // When AJAX call has failed
 							        console.log(jqXHR.responseText); 							        
							        console.log('AJAX call failed.');
							        console.log(textStatus + ': ' + errorThrown);
							    },
						 });
});
            
          