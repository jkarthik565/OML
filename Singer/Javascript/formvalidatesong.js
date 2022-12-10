// JavaScript Document
$(document).ready(function(){
	$('.success').hide();
	$('.error').hide();
	$('#button1').click(function(){
		var error = false;
		var UploadFieldID = "txtsong";
		var MaxSizeInBytes = 10485760;
        var fld = document.getElementById(UploadFieldID);
		var audio = /^.*(([^\.][\.][wW][mM][aA])|([^\.][\.][mM][pP][3]))$/;
		$('.errors').remove();
		
		if($('#txtdesc').val()==""){
			$('#txtdesc').after('<span class="errors">This field is required</span>');	
			error = true
		}
		if($('#txtsong').val()==""){
			$('#txtsong').after('<span class="errors">This field is required</span>');	
			error = true
		}else if(!audio.test($('#txtsong').val())){
			$('#txtsong').after('<span class="errors">Invalid audio format</span>');	
			error = true
		}else if(fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes ){
			$('.error').slideDown('normal').html('Upload Size Exceeded').delay(2000).slideUp('normal');
			error = true
		}
			if(error == false){
				$('.success').slideDown('normal').html('Record added').delay(2000).slideUp('normal');
				return true;
			}else{
				return false;	
			}
	});
});