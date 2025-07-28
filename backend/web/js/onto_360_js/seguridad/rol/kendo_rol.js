/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/


//Creando variables globales
////Definir controladora
var Rol={};
Rol.oldElement=null;
//Funcionalidades del Grid
Rol.change = function onChange(arg) {
};


Rol.change = function onDataBinding(arg) {
};


Rol.dataBound=function onDataBound(arg) {
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


Rol.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Rol.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidrol

Rol.findbyidrol=function(value){
	var dataItem=null;
	dataItem=$.map(Rol.gridDataSource._data,function(val,index){
		if(val.idrol==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Rol.list_pdf=function( elem ){	$("#tbody_table_rol").append(			"<tr>"+

			"<td nowrap=''>"+elem.rol+"</td>"+
			"</tr>"

	)
}

