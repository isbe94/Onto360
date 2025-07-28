/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


//Creando variables globales
////Definir controladora
var Comentario={};
Comentario.oldElement=null;
//Funcionalidades del Grid
Comentario.change = function onChange(arg) {
};


Comentario.change = function onDataBinding(arg) {
};


Comentario.dataBound=function onDataBound(arg) {
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


Comentario.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Comentario.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidcomentario

Comentario.findbyidcomentario=function(value){
	var dataItem=null;
	dataItem=$.map(Comentario.gridDataSource._data,function(val,index){
		if(val.idcomentario==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Comentario.list_pdf=function( elem ){	$("#tbody_table_comentario").append(			"<tr>"+

			"<td nowrap=''>"+elem.comentario+"</td>"+

			"<td nowrap=''>"+elem.nombre+"</td>"+

			"<td nowrap=''>"+moment(elem.fecha).format('DD/MM/YYYY')+"</td>"+

			"<td nowrap=''>"+elem.usuario+"</td>"+
			"</tr>"

	)
}

