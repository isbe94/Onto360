/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/


	Ontologia.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/ontologia/list_json",
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
						idontologia:{type:"number"},
						dominio:{type:"string"},
						fichero:{type:"string"},
						nombre:{type:"string"},
						id_tecnologia:{type:"number"},
						tecnologia:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Ontologia.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/ontologia/list_json",
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
						idontologia:{type:"number"},
						dominio:{type:"string"},
						fichero:{type:"string"},
						nombre:{type:"string"},
						id_tecnologia:{type:"number"},
						tecnologia:{type:"string"}
				}
			}
 		},
    });

