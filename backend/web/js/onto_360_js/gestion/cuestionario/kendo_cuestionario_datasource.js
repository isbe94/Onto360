/*Generado by Pro Generator */
/*@author isbel  */
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


Cuestionario.gridDataSource = new kendo.data.DataSource({
	transport: {
		read: {
			//type:'POST',
			url: urlhome+"gestion/cuestionario/list_json",
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
				idcuestionario:{type:"number"},
				id_respuesta:{type:"number"},
				id_pregunta:{type:"number"},
				resp_correcta:{type:"number"},
				respuesta:{type:"string"},
				pregunta:{type:"string"}
			}
		}
	},
	pageSize: 8
});
Cuestionario.comboDataSource = new kendo.data.DataSource({
	transport: {
		read: {
			//type:'POST',
			url: urlhome+"gestion/cuestionario/list_json",
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
				idcuestionario:{type:"number"},
				id_respuesta:{type:"number"},
				id_pregunta:{type:"number"},
				resp_correcta:{type:"number"},
				respuesta:{type:"string"},
				pregunta:{type:"string"}
			}
		}
	},
});

