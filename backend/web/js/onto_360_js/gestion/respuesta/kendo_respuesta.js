/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


//Creando variables globales
////Definir controladora
var Respuesta={};
Respuesta.oldElement=null;
//Funcionalidades del Grid
Respuesta.change = function onChange(arg) {
};


Respuesta.change = function onDataBinding(arg) {
};


Respuesta.dataBound=function onDataBound(arg) {
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


Respuesta.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Respuesta.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidrespuesta

Respuesta.findbyidrespuesta=function(value){
	var dataItem=null;
	dataItem=$.map(Respuesta.gridDataSource._data,function(val,index){
		if(val.idrespuesta==value)
		{
			return val;
		}
	});
	return dataItem[0];
}

Respuesta.findbyrespuesta=function(value){
	var dataItem=null;
	dataItem=$.map(Respuesta.gridDataSource._data,function(val,index){
		if(val.respuesta.toUpperCase().trim()==value.toUpperCase().trim())
		{
			return val;
		}
	});
	return dataItem[0];
}

		

Respuesta.list_pdf=function( elem ){	$("#tbody_table_respuesta").append(			"<tr>"+

			"<td nowrap=''>"+elem.respuesta+"</td>"+
			"</tr>"

	)
}

