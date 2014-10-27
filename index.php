<?php
include('db.php');
$limit = 5; 
$query2=" SELECT * FROM data_author";
$count=$dbo->prepare($query2);
$count->execute();
$nume=$count->rowCount();
$pages = ceil($nume/$limit)
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script src="bootstrap-3.0.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	function Display_Load()
	{
	    $("#load").fadeIn(1000,0);
		$("#load").html("<img src='load.gif' />");
	}
	function Hide_Load()
	{
		$("#load").fadeOut('slow');
	};

	Display_Load();
	$("#content").load("pagination.php?page=1", Hide_Load());
	$("#paginate li").click(function(){
		Display_Load();
		
		var pageNum = this.id;
		$("#content").load("pagination.php?page=" + pageNum, Hide_Load());
	});
});
	</script>
    
    
<style type="text/css">


#content{ 
margin:0 auto; 
border:0px green dashed; 
width:800px; 
min-height:150px; 
margin-top:100px;
 }

</style>
</head>
<body>
<div id="content" ></div>
<div class="link" align="center">
                             <div class="pagination pagination-sm span4 offset1" > 
                                <ul class="pagination pagination-sm" id="paginate">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
                                       echo '<li   id="'.$i.'"><a>'.$i.'</a></li>';
				}
				?>
	</ul>	
	</div>
</div>
    <div style="clear:both"> </div>
<div id="load" align="center" ></div>

</body>
</html>