<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<style>
div{
    background-color: lightgrey;
	margin:auto;
    width: 200px;
    hight: 10px;
   
}
</style>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<html>
<body>
<form>
<div class="numberInWords">
  Number1:
  <input id="firstNum" type="text" name="Number1">
  <div id="firstInWord"></div>
  <br>
  Number2:
  <input id="secondNum" type="text" name="Number2">
  <div id="secondInWord"></div>
  <br>
  <input type="button" name="Submit" value="find sum" onclick="addNumbers();"/>
  <br>
  Answer:
  <input id="answer" type="text" name="answer">
  <div id="answerWord"></div>
  <br>
  </div>
</form>
<script>
$('#firstNum').change(function(){
$.ajax({ url: '/server.php',
		 dataType:'text',
         data: {"convertNum": $(this).val() },
         type: 'POST',
         success: function(output) {
					// alert(output);
					$('#firstInWord').empty();
					$('#firstInWord').after("("+output+")");
                  }
});
});

$('#secondNum').change(function(){
$.ajax({ url: '/server.php',
		 dataType:'text',
         data: {"convertNum": $(this).val() },
         type: 'POST',
         success: function(output) {
					//alert(output);
					$('#secondInWord').empty();
					$('#secondInWord').html("("+output+")");
                  }
});
});

function addNumbers()
                {
                        var val1 = parseInt(document.getElementById("firstNum").value);
                        var val2 = parseInt(document.getElementById("secondNum").value);
                        var ansD = document.getElementById("answer");
                        var ans =  val1 + val2;
						$('#answer').val(ans+"");
						
		$.ajax({ url: '/server.php',
		 dataType:'text',
         data: {"convertNum":ans},
         type: 'POST',
         success: function(output) {
					$('#answerWord').empty();
					$('#answerWord').html("("+output+")");
                  }
				});
						
					
                }

</script>
</body>
</html>

