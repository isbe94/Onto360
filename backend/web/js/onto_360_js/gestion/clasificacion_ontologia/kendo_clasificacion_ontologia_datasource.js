/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/


	Clasificacion_ontologia.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/clasificacion_ontologia/list_json",
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
						idclasifonto:{type:"number"},
						id_ontologia:{type:"number"},
						id_clasificacion:{type:"number"},
						dominio:{type:"string"},
						clasificacion:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	n = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/clasificacion_ontologia/list_json",
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
						idclasifonto:{type:"number"},
						id_ontologia:{type:"number"},
						id_clasificacion:{type:"number"},
						dominio:{type:"string"},
						clasificacion:{type:"string"}
				}
			}
 		},
    });

