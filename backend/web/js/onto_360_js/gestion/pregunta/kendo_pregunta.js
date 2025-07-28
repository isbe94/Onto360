/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


//Creando variables globales
////Definir controladora
var Pregunta={};
Pregunta.oldElement=null;
//Funcionalidades del Grid
Pregunta.change = function onChange(arg) {
};


Pregunta.change = function onDataBinding(arg) {
};


Pregunta.dataBound=function onDataBound(arg) {
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


Pregunta.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Pregunta.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidpregunta

Pregunta.findbyidpregunta=function(value){
	var dataItem=null;
	dataItem=$.map(Pregunta.gridDataSource._data,function(val,index){
		if(val.idpregunta==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Pregunta.list_pdf=function( elem ){	$("#tbody_table_pregunta").append(			"<tr>"+

			"<td nowrap=''>"+elem.pregunta+"</td>"+
			"</tr>"

	)
}

