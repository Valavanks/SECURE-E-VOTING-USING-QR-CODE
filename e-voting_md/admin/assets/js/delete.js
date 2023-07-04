$(function(){
	$(".delete-item").click(function(){
		var send_href = "delete.php?tableName="+$(this).attr("table")+"&id="+$(this).attr("id")+"&image="+$(this).attr("image");
		$("#delete-item").attr("href","");
		$("#delete-item").attr("href",send_href);
	});
});