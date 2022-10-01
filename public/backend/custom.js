$(document).ready(function(){
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type:'post',
            url:'/admin/check-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                // alert(resp);
                if(resp=="false"){
                    $("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
                }else if(resp=="true"){
                    $("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    //common delete 
	$(".confirmDelete").click(function(){
		var record =$(this).attr('record');
		var recoedid =$(this).attr('recoedid');

		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to delete this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		    window.location.href="/admin/delete-"+record+"/"+recoedid;
		  }
		});
		
	});

    //skill status active or inactive
	$(".updateSkillStatus").click(function(){
		var status = $(this).text();
		var skill_id = $(this).attr("skill_id");

		$.ajax({
			type:"post",
			url:"/admin/update-skill-status",
			data:{status:status,skill_id:skill_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#skill-"+skill_id).html("<a class='updateSkillStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#skill-"+skill_id).html("<a class='updateSkillStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});
        //service status active or inactive
	$(".updateServiceStatus").click(function(){
		var status = $(this).text();
		var service_id = $(this).attr("service_id");

		$.ajax({
			type:"post",
			url:"/admin/update-service-status",
			data:{status:status,service_id:service_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#service-"+service_id).html("<a class='updateServiceStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#service-"+service_id).html("<a class='updateServiceStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});
    
     //portfolio status active or inactive
	$(".updatePorfolioStatus").click(function(){
		var status = $(this).text();
		var portfolio_id = $(this).attr("portfolio_id");

		$.ajax({
			type:"post",
			url:"/admin/update-portfolio-status",
			data:{status:status,portfolio_id:portfolio_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#portfolio-"+portfolio_id).html("<a class='updatePorfolioStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#portfolio-"+portfolio_id).html("<a class='updatePorfolioStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//testminial status active or inactive
	$(".updateTestmonialStatus").click(function(){
		var status = $(this).text();
		var testmonial_id = $(this).attr("testmonial_id");

		$.ajax({
			type:"post",
			url:"/admin/update-testmonial-status",
			data:{status:status,testmonial_id:testmonial_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#testmonial-"+testmonial_id).html("<a class='updateTestmonialStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#testmonial-"+testmonial_id).html("<a class='updateTestmonialStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});
	//logo status active or inactive
	$(".updateLogoStatus").click(function(){
		var status = $(this).text();
		var logo_id = $(this).attr("logo_id");

		$.ajax({
			type:"post",
			url:"/admin/update-logo-status",
			data:{status:status,logo_id:logo_id},
			success:function(resp){
				// alert(resp['status']);
				// alert(resp['section_id']);
				if (resp['status']==0) {
					$("#logo-"+logo_id).html("<a class='updateLogoStatus' href='javascript:void(0)'>Inactive</a>");
				}else if(resp['status']==1){
					$("#logo-"+logo_id).html("<a class='updateLogoStatus'   href='javascript:void(0)'>Active</a>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

});