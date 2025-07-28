/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:21 EDT 2017*/


	Categoriacientifica.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"nomencladores/categoriacientifica/list_json",
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
						idcatcientifica:{type:"number"},
						categcient:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Categoriacientifica.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"nomencladores/categoriacientifica/list_json",
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
						idcatcientifica:{type:"number"},
						categcient:{type:"string"}
				}
			}
 		},
    });

