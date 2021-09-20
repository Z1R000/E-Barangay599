$(document).ready(function()
{
	$('#search').keyup(function()
	{
		var Search = $('#search').val()
		if(Search!=""){
			$.ajax({
				url: 'includes/search.php',
				method: 'POST',
				data:{search:Search},
				success:function(data){
					
				}
			})
		}else{
			
		}
	})
})