}

function computeExpression() {
	// console.log(expression);
	// console.log("expression = " + expression);
	var result = eval(expression);
	document.getElementById("display").innerHTML = result;
	expression = "";
}

function clearDisplay() {
	expression = "";
	document.getElementById("display").innerHTML = 0;
}

function deleteLastChar() {
	expression = expression.substr(0, expression.length-1);
	console.log(expression);
	
	if (expression == "") {
		document.getElementById("display").innerHTML = 0;
	} else {
		document.getElementById("display").innerHTML = expression;
	}
}
