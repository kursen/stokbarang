<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Administrator</title>
<!--bootstrap css-->
<link rel="stylesheet" type="text/css" href="../Content/bootstrap/css/bootstrap.min.css" />
<!--js = javascript-->
<script src="../Scripts/jquery/jquery-min.js" type="text/javascript"></script>
<script src="../Content/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../Scripts/jquery.battatech.excelexport.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('#btn-print').click(function(){
		
		$("#reporttbl").btechco_excelexport({
                containerid: "reporttbl"
               , datatype: $datatype.Table
            });
	});
});
</script>
</head>
