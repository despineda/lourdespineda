// alert("jQuery is working!");

$("ul").on("click", "li", function() {
// $("li").click(function() {
	// $(this).css("color", "grey");
	// $(this).css("text-decoration", "line-through");

	$(this).toggleClass("completed");
});

$().on("click", "span", function() {
// $("span").click(function(){
	$(this).parent().fadeOut(500, function(){
		$(this).remove();
	});
});


$("input[type='text']").keypress(function(event){
	// console.log(event.which);

	if (event.which === 13) { 
		var todoText = $(this).val();
		$(this).val("");
		$("ul").append("<li><span>x</span>" + todoText + "</li>");
	}
});


