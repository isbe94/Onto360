/*Generado by Pro Generator */
/*@author isbel  */ 
/*@Date: Sat Jun 03 19:40:22 EDT 2017*/


	Usuario.gridDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"seguridad/usuario/list_json",
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
						usuario:{type:"string"},
						nombre:{type:"string"},
						contrasena:{type:"string"},
						idusuario:{type:"number"},
						id_rol:{type:"number"},
						auth_key:{type:"string"},
						created_at:{type:"date"},
						updated_at:{type:"date"},
						avatar:{type:"string"},
						apellido1:{type:"string"},
						apellido2:{type:"string"},
						activo:{type:"number"},
						experto:{type:"number"},
						id_catcientifica:{type:"number"},
						id_experticia:{type:"number"},
						correo:{type:"string"},
						rol:{type:"string"},
						categcient:{type:"string"},
						grado_experiencia:{type:"string"}
				}
			}
 		},
        pageSize: 8
    });
	Usuario.comboDataSource = new kendo.data.DataSource({
        transport: {
            read: {
                //type:'POST',
                url: urlhome+"seguridad/usuario/list_json",
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
						usuario:{type:"string"},
						nombre:{type:"string"},
						contrasena:{type:"string"},
						idusuario:{type:"number"},
						id_rol:{type:"number"},
						auth_key:{type:"string"},
						created_at:{type:"date"},
						updated_at:{type:"date"},
						avatar:{type:"string"},
						apellido1:{type:"string"},
						apellido2:{type:"string"},
						activo:{type:"number"},
						experto:{type:"number"},
						id_catcientifica:{type:"number"},
						id_experticia:{type:"number"},
						correo:{type:"string"},
						rol:{type:"string"},
						categcient:{type:"string"},
						grado_experiencia:{type:"string"}
				}
			}
 		},
    });

