<?
echo'
<script
  src="https://code.jquery.com/jquery-3.5.1.slim.js"
  integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
  crossorigin="anonymous"></script>
<script type="text/javascript">
var Answer = "";
</script>';


?>
<div class = "row">
	<div class="col-xs-12 col-sm-6 col-md-8">
		<input class="form-control " type="text" placeholder="Readonly input here..." aria-label="readonly input example"
		class = "MyInput">
	  </div>
	<div class="col-xs-6 col-md-4">
		<button type="button" class="btn btn-secondary"
		class = "btn">Отправить</button>
	  </div>
 </div>
<div>
	<h2>Ответы</h2>
	<div class = "Answer">

	</div>
</div>
<?
echo 'display: -webkit-inline-box;';
echo'
<script type="text/javascript">
    // Если нажали на кнопку
$(".btn").on("click", function() {
	    var URL =  $(".form-control").val();
	////Запрос
     $.ajax({
         url: URL,
         success: function(data){
         //alert("Sucees");
         	Answer = data;
         console.dir(data);
                   $(".Answer").append($("<div>", {
                            "text": Answer
                             }));


              }
           });


});

</script>';
?>