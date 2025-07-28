/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


//Creando variables globales
////Definir controladora
var Pregunta_respuestas={};
Pregunta_respuestas.oldElement=null;
//Funcionalidades del Grid
Pregunta_respuestas.change = function onChange(arg) {
};


Pregunta_respuestas.change = function onDataBinding(arg) {
};


Pregunta_respuestas.dataBound=function onDataBound(arg) {
	var dataarray=this._data;
	var i=0;
		$('#all_check').prop('checked',false);
		$('#all_check').iCheck('uncheck');
		$('.check_row').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%'
	});
}


Pregunta_respuestas.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Pregunta_respuestas.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidpregunta_respuestas

Pregunta_respuestas.findbyidpregunta_respuestas=function(value){
	var dataItem=null;
	dataItem=$.map(Pregunta_respuestas.gridDataSource._data,function(val,index){
		if(val.idpregunta_respuestas==value)
		{
			return val;
		}
	});
	return dataItem[0];
}



Pregunta_respuestas.list_pdf=function( elem ){	$("#tbody_table_pregunta_respuestas").append(			"<tr>"+

			"<td nowrap=''>"+elem.respuesta+"</td>"+

			"<td nowrap=''>"+elem.pregunta+"</td>"+
			"</tr>"

	)
}

