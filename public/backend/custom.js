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
});