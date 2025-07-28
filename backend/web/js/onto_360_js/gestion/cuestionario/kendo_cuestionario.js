/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


//Creando variables globales
////Definir controladora
var Cuestionario={};
Cuestionario.oldElement=null;
//Funcionalidades del Grid
Cuestionario.change = function onChange(arg) {
};


Cuestionario.change = function onDataBinding(arg) {
};


Cuestionario.dataBound=function onDataBound(arg) {
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


Cuestionario.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Cuestionario.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidcuestionario

Cuestionario.findbyidcuestionario=function(value){
	var dataItem=null;
	dataItem=$.map(Cuestionario.gridDataSource._data,function(val,index){
		if(val.idcuestionario==value)
		{
			return val;
		}
	});
	return dataItem[0];
}



Cuestionario.list_pdf=function( elem ){	$("#tbody_table_cuestionario").append(			"<tr>"+

			"<td nowrap=''>"+elem.respuesta+"</td>"+

			"<td nowrap=''>"+elem.pregunta+"</td>"+
			"</tr>"

	)
}

