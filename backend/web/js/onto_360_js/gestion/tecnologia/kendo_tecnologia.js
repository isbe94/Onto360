/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/


//Creando variables globales
////Definir controladora
var Tecnologia={};
Tecnologia.oldElement=null;
//Funcionalidades del Grid
Tecnologia.change = function onChange(arg) {
};


Tecnologia.change = function onDataBinding(arg) {
};


Tecnologia.dataBound=function onDataBound(arg) {
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


Tecnologia.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Tecnologia.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidtecnologia

Tecnologia.findbyidtecnologia=function(value){
	var dataItem=null;
	dataItem=$.map(Tecnologia.gridDataSource._data,function(val,index){
		if(val.idtecnologia==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

//Unique Finderstecnologia

Tecnologia.findbytecnologia=function(value){
	var dataItem=null;
	dataItem=$.map(Tecnologia.gridDataSource._data,function(val,index){
		if(val.tecnologia.toUpperCase().trim()==value.toUpperCase().trim())
		{
			return val;
		}
	});
	return dataItem[0];
}
		
Tecnologia.list_pdf=function( elem ){	$("#tbody_table_tecnologia").append(			"<tr>"+

			"<td nowrap=''>"+elem.tecnologia+"</td>"+

			"<td nowrap=''>"+elem.direccion+"</td>"+
			"</tr>"

	)
}

