/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Wed Jun 21 16:35:00 EDT 2017*/


	Respuesta.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/respuesta/list_json",
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
						idrespuesta:{type:"number"},
						respuesta:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Respuesta.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/respuesta/list_json",
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
						idrespuesta:{type:"number"},
						respuesta:{type:"string"}
				}
			}
 		},
    });

