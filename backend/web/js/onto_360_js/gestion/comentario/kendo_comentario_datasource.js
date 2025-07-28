/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


	Comentario.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/comentario/list_json",
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
						idcomentario:{type:"number"},
						comentario:{type:"string"},
						id_ontologia:{type:"number"},
						fecha:{type:"date"},
						id_usuario:{type:"number"},
						nombre:{type:"string"},
						usuario:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Comentario.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"gestion/comentario/list_json",
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
						idcomentario:{type:"number"},
						comentario:{type:"string"},
						id_ontologia:{type:"number"},
						fecha:{type:"date"},
						id_usuario:{type:"number"},
						nombre:{type:"string"},
						usuario:{type:"string"}
				}
			}
 		},
    });

