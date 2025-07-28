/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/


//Creando variables globales
////Definir controladora
var Ontologia={};
Ontologia.oldElement=null;
//Funcionalidades del Grid
Ontologia.change = function onChange(arg) {
};


Ontologia.change = function onDataBinding(arg) {
};


Ontologia.dataBound=function onDataBound(arg) {
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


Ontologia.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Ontologia.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidontologia

Ontologia.findbyidontologia=function(value){
	var dataItem=null;
	dataItem=$.map(Ontologia.gridDataSource._data,function(val,index){
		if(val.idontologia==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

//Unique Findersnombre

Ontologia.findbynombre=function(value){
	var dataItem=null;
	dataItem=$.map(Ontologia.gridDataSource._data,function(val,index){
		if(val.nombre.toUpperCase().trim()==value.toUpperCase().trim())
		{
			return val;
		}
	});
	return dataItem[0];
}
		
Ontologia.list_pdf=function( elem ){	$("#tbody_table_ontologia").append(			"<tr>"+

			"<td nowrap=''>"+elem.dominio+"</td>"+

			"<td nowrap=''>"+elem.fichero+"</td>"+

			"<td nowrap=''>"+elem.nombre+"</td>"+

			"<td nowrap=''>"+elem.tecnologia+"</td>"+
			"</tr>"

	)
}

