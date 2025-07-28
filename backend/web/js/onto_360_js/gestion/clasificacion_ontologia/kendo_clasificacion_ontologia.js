/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/


//Creando variables globales
////Definir controladora
var Clasificacion_ontologia={};
Clasificacion_ontologia.oldElement=null;
//Funcionalidades del Grid
Clasificacion_ontologia.change = function onChange(arg) {
};


Clasificacion_ontologia.change = function onDataBinding(arg) {
};


Clasificacion_ontologia.dataBound=function onDataBound(arg) {
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


Clasificacion_ontologia.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Clasificacion_ontologia.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}

Clasificacion_ontologia.finditemclasif=function(uid){
	var dataItem=null;
	dataItem=$.map(gridclas.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidclasifonto

Clasificacion_ontologia.findbyidclasifonto=function(value){
	var dataItem=null;
	dataItem=$.map(Clasificacion_ontologia.gridDataSource._data,function(val,index){
		if(val.idclasifonto==value)
		{
			return val;
		}
	});
	return dataItem[0];
}

Clasificacion_ontologia.findbyidontologia=function(value){
	var dataItem=null;
	dataItem=$.map(Clasificacion_ontologia.gridDataSource._data,function(val,index){
		if(val.id_ontologia==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Clasificacion_ontologia.list_pdf=function( elem ){	$("#tbody_table_clasificacion_ontologia").append(			"<tr>"+

			"<td nowrap=''>"+elem.dominio+"</td>"+

			"<td nowrap=''>"+elem.clasificacion+"</td>"+
			"</tr>"

	)
}

