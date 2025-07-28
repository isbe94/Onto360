/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


//Creando variables globales
////Definir controladora
var Usuario={};
Usuario.oldElement=null;
//Funcionalidades del Grid
Usuario.change = function onChange(arg) {
};


Usuario.change = function onDataBinding(arg) {
};


Usuario.dataBound=function onDataBound(arg) {
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


Usuario.finditem=function(uid){
	var dataItem=null;
	dataItem=$.map(Usuario.gridDataSource._data,function(val,index){
		if(val.uid==uid)
		{
			return val;
		}
	});
	return dataItem[0];
}
//Unique Findersidusuario

Usuario.findbyidusuario=function(value){
	var dataItem=null;
	dataItem=$.map(Usuario.gridDataSource._data,function(val,index){
		if(val.idusuario==value)
		{
			return val;
		}
	});
	return dataItem[0];
}
		

Usuario.list_pdf=function( elem ){	$("#tbody_table_usuario").append(			"<tr>"+

			"<td nowrap=''>"+elem.usuario+"</td>"+

			"<td nowrap=''>"+elem.nombre+"</td>"+

			"<td nowrap=''>"+elem.contrasena+"</td>"+

			"<td nowrap=''>"+elem.rol+"</td>"+

			"<td nowrap=''>"+elem.auth_key+"</td>"+

			"<td nowrap=''>"+moment(elem.created_at).format('DD/MM/YYYY')+"</td>"+

			"<td nowrap=''>"+moment(elem.updated_at).format('DD/MM/YYYY')+"</td>"+

			"<td nowrap=''>"+elem.avatar+"</td>"+

			"<td nowrap=''>"+elem.apellido1+"</td>"+

			"<td nowrap=''>"+elem.apellido2+"</td>"+

			"<td nowrap=''>"+elem.activo+"</td>"+

			"<td nowrap=''>"+elem.experto+"</td>"+

			"<td nowrap=''>"+elem.categcient+"</td>"+

			"<td nowrap=''>"+elem.grado_experiencia+"</td>"+

			"<td nowrap=''>"+elem.correo+"</td>"+
			"</tr>"

	)
}

