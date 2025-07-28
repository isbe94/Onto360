/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/


//Creando variables globales
////Definir controladora
var Categoriacientifica={};
Categoriacientifica.oldElement=null;
//Funcionalidades del Grid
Categoriacientifica.change = function onChange(arg) {
};


Categoriacientifica.change = function onDataBinding(arg) {
};


Categoriacientifica.dataBound=function onDataBound(arg) {
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


Categoriacientifica.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Categoriacientifica.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidcatcientifica

Categoriacientifica.findbyidcatcientifica=function(value){
	var dataItem=null;
	dataItem=$.map(Categoriacientifica.gridDataSource._data,function(val,index){
		if(val.idcatcientifica==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Categoriacientifica.list_pdf=function( elem ){	$("#tbody_table_categoriacientifica").append(			"<tr>"+

			"<td nowrap=''>"+elem.categcient+"</td>"+
			"</tr>"

	)
}

