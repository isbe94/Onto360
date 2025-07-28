Clasificacion.gridDataSource = new kendo.data.DataSource({
	transport: {
		read: {
			//type:'POST',
			url: urlhome+"nomencladores/clasificacion/list_json",
			dataType: "json"
		}
	},
	change:function(data)
	{
		////console.clear();
	},
	schema:{
		model:{
			fields:{
				idclasificacion:{type:"number"},
				clasificacion:{type:"string"}
			}
		}
	},
	pageSize: 8
});
Clasificacion.comboDataSource = new kendo.data.DataSource({
	transport: {
		read: {
			//type:'POST',
			url: urlhome+"nomencladores/clasificacion/list_json",
			dataType: "json"
		}
	},
	change:function(data)
	{
		//console.clear();
	},
	schema:{
		model:{
			fields:{
				idclasificacion:{type:"number"},
				clasificacion:{type:"string"}
			}
		}
	},
});

