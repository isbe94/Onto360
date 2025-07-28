/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Aug 25 13:20:22 EDT 2017*/


	Tecnologia.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/tecnologia/list_json",
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
						idtecnologia:{type:"number"},
						tecnologia:{type:"string"},
						direccion:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Tecnologia.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/tecnologia/list_json",
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
						idtecnologia:{type:"number"},
						tecnologia:{type:"string"},
						direccion:{type:"string"}
				}
			}
 		},
    });

