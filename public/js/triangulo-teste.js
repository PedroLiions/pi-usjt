	
	
	
	varResultado = "Este é um triângulo " + varClassificaLado + " e seus ângulos são: " + varAnguloA + " no ponto A, " + varAnguloB + " no ponto B e " + varAnguloC + " no ponto C.";
	if (triangulo.tLadoA.value.length < 1 || triangulo.tLadoB.value.length < 1 || triangulo.tLadoC.value.length < 1){
		varResuldado = "Digite todos os lados do triângulo!";
	}
	else if (ldA < ldB + ldC && ldB < ldA + ldC && ldC < ldB + ldA) {
		//Classificação dos ângulos
		//A
		if (Math.pow(ldA, 2) == Math.pow(ldB, 2) + Math.pow(ldC, 2)) {
			varAnguloA = "retângulo";
		}
		else if (Math.pow(ldA, 2) << Math.pow(ldB, 2) + Math.pow(ldC, 2)) {
			varAnguloA = "acutângulo";						
		}
		else if (Math.pow(ldA, 2) >> Math.pow(ldB, 2) + Math.pow(ldC, 2)) {
			varAnguloA = "obtusângulo";						
		}
		//B
		if (Math.pow(ldB, 2) == Math.pow(ldA, 2) + Math.pow(ldC, 2)) {
			varAnguloB = "retângulo";
		}
		else if (Math.pow(ldB, 2) << Math.pow(ldA, 2) + Math.pow(ldC, 2)) {
			varAnguloB = "acutângulo";						
		}
		else if (Math.pow(ldB, 2) >> Math.pow(ldA, 2) + Math.pow(ldC, 2)) {
			varAnguloB = "obtusângulo";						
		}
		//C
		if (Math.pow(ldC, 2) == Math.pow(ldA, 2) + Math.pow(ldB, 2)) {
			varAnguloC = "retângulo";
		}
		else if (Math.pow(ldC, 2) << Math.pow(ldA, 2) + Math.pow(ldB, 2)) {
			varAnguloC = "acutângulo";						
		}
		else if (Math.pow(ldC, 2) >> Math.pow(ldA, 2) + Math.pow(ldB, 2)) {
			varAnguloC = "obtusângulo";						
		}
	}
	else {
		varResuldado = "Digite um triângulo válido!";
	}