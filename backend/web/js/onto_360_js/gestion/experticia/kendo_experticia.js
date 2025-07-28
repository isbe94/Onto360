/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


//Creando variables globales
////Definir controladora
var Experticia={};
Experticia.oldElement=null;
//Funcionalidades del Grid
Experticia.change = function onChange(arg) {
};


Experticia.change = function onDataBinding(arg) {
};


Experticia.dataBound=function onDataBound(arg) {
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


Experticia.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Experticia.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidexperticia

Experticia.findbyidexperticia=function(value){
	var dataItem=null;
	dataItem=$.map(Experticia.gridDataSource._data,function(val,index){
		if(val.idexperticia==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Experticia.list_pdf=function( elem ){	$("#tbody_table_experticia").append(			"<tr>"+

			"<td nowrap=''>"+elem.grado_experiencia+"</td>"+
			"</tr>"

	)
}

