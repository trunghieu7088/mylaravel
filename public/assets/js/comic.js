$(document).ready(function()
{
    
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


        $("#createcomicform").validate({
          rules: {
            title: "required",
            author: {
              required: true,
              
            },
            password: {
              required: true,
              minlength: 6,
              maxlength: 15
            },
            checkbox: "required",

          },
          messages: {
            title: "Vui lòng nhập tên truyện!",
            author: {
              required: "Vui lòng nhập vào tên tác giả",              
            },
            password: {
              required: "Vui lòng nhập mật khẩu!",
              minlength: "Độ dài tối thiểu 6 kí tự",
              maxlength: "Độ tài tối đa 15 kí tự"
            },
            checkbox: "Xác nhận Admin đẹp zai"
          },
            errorClass:'text-danger border-danger',
            submitHandler: function(form) {
                form.submit();
            }
        });

});

$(".delete-comic").click(function()
{
	
	//console.log('hello');
	var item=$(this).attr('data-comic');
$.ajax({
    type:'GET',
    url:'/comic/deleteajax', 
    data:
     {
         "id":$(this).attr('data-comic')
    },
    success:function(data) {
       //alert(data.msg);
       console.log(data);
       $("[data-row='"+item+"']").fadeOut("slow");
       swal({
										  title: "Done !",
										  text: "Delete Comic successfully",
										  icon: "success",
										});
       
    }
 });
});    


//$("#AddComicbtnAjax").click(function(e){
	$("#comicjaxform").submit(function(e){
         	e.preventDefault();
         	//alert('hello');
         	$(this).attr("disabled","disabled");
         	var ThisBtn = '#'+$(this).attr("id");
            var _token = $("input[name='_token']").val();
            var title = $("#title").val();
            var author= $("#author").val();
            var category = $("#category_list option:selected").val();
     		
     		var formdata = new FormData(this);

     		//console.log(imageupload);
     		//console.log(formdata);
                   $.ajax({
						    type:'POST',
						    url:'/comic/savecomicajax', 

						 /*   data:
						     {
						         "title": title,
						         "author":author,
						         "category": category,
						         "imageupload": imageupload
						    }, */
						      dataType:'JSON',
							  contentType: false,
							  cache: false,
							  processData: false,
						      data: formdata,
						    success:function(data)
						     {			
						     	if(data.message=='success')		
						     	{
						     		swal({
										  title: "Done !",
										  text: "Create student successfully",
										  icon: "success",
										});

						     		
						     		 $(document).Toasts('create', {
								        class: 'bg-success',
								        title: 'Toast Title',
								        subtitle: 'Subtitle',
								        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
								      });
						     	}
						     	else
						     	{
						     		var textAlert='';						     		
						     		//console.log(data);
						     		for(item in data)
						     		{
						     			//console.log(data[item]);
						     			//alert(data[item]);
						     			textAlert+=data[item]+"\n";
						     		}
						     		swal({
										  title: "Error !",
										  text: textAlert,
										  icon: "error",
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