<html>
  <body>
     
     <form action = "/upload" method="post" enctype="multipart/form-data" name="formName">
     	{{csrf_field()}}
     	<div class = "form-group">
     		<input type="file" name="userfile">
     		
     	</div>
     	<button class = "btn btn-default" type = "submit">Жмякнуть</button>
     </form>
  
  
     <? var_dump($path ?? ''); ?>
  </body>
</html>