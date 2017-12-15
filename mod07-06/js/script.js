function generateTable() {
	/*maximum number to be generated*/
	var num = parseInt(document.inputForm.num.value);
	/*console.log(num);*/

	var step = parseInt(document.inputForm.step.value);
	/*console.log(step);*/

	/*expected number of rows to be generated*/
	var row = num / step;
	
	/*placeholders*/
	var element = "";
	var boxClass = "";
	var classBox = "";

	/* calculation of cell height relative to number of rows*/
	var boxHeight = row / 4 /*responsive height relative to rows*/
	boxHeight = Math.round(boxHeight); /*removes decimal place*/
	boxHeight = 100 / boxHeight; 

	var z = step; 
	for (var x = 0; x <= (row / 4); x++) {
		for (var y = 0; y < 4; y++) {
			if (z <= num) {
				if ((x % 2 == 0) && (y % 2 ==0)) {
					boxClass = "black";
				}

				if ((x % 2 == 0) && (y % 2 == 1)) {
					boxClass = "white";
				}

				if ((x % 2 == 1) && (y % 2 == 0)) {
					boxClass = "white";
				}

				if ((x % 2 == 1) && (y % 2 == 1)) {
					boxClass = "black";
				}

				element += "<div class='box " + boxClass + "'><h2>" + z + "</h2></div>";

				z = z + step;
			}
		}
	} 

	document.getElementById("mainWrapper").innerHTML = element;
	classBox = document.getElementsByClassName("box"); /*array of elements*/

	for (var i = 0; i < classBox.length; i++) {
		classBox[i].style.height = boxHeight + "vh";
		classBox[i].style.lineHeight = boxHeight + "vh";
	}
}