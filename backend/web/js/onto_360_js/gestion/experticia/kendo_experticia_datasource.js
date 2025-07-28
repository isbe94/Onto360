/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


	Experticia.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/experticia/list_json",
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
						idexperticia:{type:"number"},
						grado_experiencia:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Experticia.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/experticia/list_json",
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
						idexperticia:{type:"number"},
						grado_experiencia:{type:"string"}
				}
			}
 		},
    });

