/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/


//Creando variables globales
////Definir controladora
var Clasificacion={};
Clasificacion.oldElement=null;
//Funcionalidades del Grid
Clasificacion.change = function onChange(arg) {
};


Clasificacion.change = function onDataBinding(arg) {
};


Clasificacion.dataBound=function onDataBound(arg) {
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


Clasificacion.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Clasificacion.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidclasificacion

Clasificacion.findbyidclasificacion=function(value){
	var dataItem=null;
	dataItem=$.map(Clasificacion.gridDataSource._data,function(val,index){
		if(val.idclasificacion==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

//Unique Findersclasificacion

Clasificacion.findbyclasificacion=function(value){
	var dataItem=null;
	dataItem=$.map(Clasificacion.gridDataSource._data,function(val,index){
		if(val.clasificacion.toUpperCase().trim()==value.toUpperCase().trim())
		{
			return val;
		}
	});
	return dataItem[0];
}
		
Clasificacion.list_pdf=function( elem ){	$("#tbody_table_clasificacion").append(			"<tr>"+

			"<td nowrap=''>"+elem.clasificacion+"</td>"+
			"</tr>"

	)
}

