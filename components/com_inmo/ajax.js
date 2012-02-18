//	Vamos a presuponer que el usuario es una persona inteligente...
var isIE = false;

//	Creamos una variable para el objeto XMLHttpRequest
var req;
var url="http://localhost:8888/privilege/components/com_inmo/prueba/pruebaAjax.html"
//	Creamos una funcion para cargar los datos en nuestro objeto.
//	Logicamente, antes tenemos que crear el objeto.
//	Vease que la sintaxis varia dependiendo de si usamos un navegador decente
//	o Internet Explorer
function cargaXML() {
	if(url==''){
		return;
	}
	//	Usuario inteligente...
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		req.onreadystatechange = processReqChange;
		req.open("GET", url, true);
		req.send(null);
	//	...y usuario de Internet Explorer Windows
	} else if (window.ActiveXObject) {
		isIE = true;
		req = new ActiveXObject("Microsoft.XMLHTTP");
		if (req) {
			req.onreadystatechange = processReqChange;
			req.open("GET", url, true);
			req.send();
		}
	}
}

//	Funcion que se llama cada vez que se dispara el evento onreadystatechange
//	del objeto XMLHttpRequest
function processReqChange(){
	var detalles = document.getElementById("cuerpoBuscador");
	if(req.readyState == 4){
		detalles.innerHTML = req.responseText;
	} else {
		detalles.innerHTML = '<img src="loading.gif" align="middle" /> Loading...';
	}
}