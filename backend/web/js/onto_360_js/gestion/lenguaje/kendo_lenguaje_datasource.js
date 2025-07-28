Lenguaje.gridDataSource = new kendo.data.DataSource({
    transport: {
        read: {
            //type:'POST',
            url: urlhome+"gestion/lenguaje/list_json",
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
                idlenguaje:{type:"number"},
                lenguaje:{type:"string"}
            }
        }
    },
    pageSize: 8
});
Lenguaje.comboDataSource = new kendo.data.DataSource({
    transport: {
        read: {
            //type:'POST',
            url: urlhome+"gestion/lenguaje/list_json",
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
                idlenguaje:{type:"number"},
                lenguaje:{type:"string"}
            }
        }
    },
});

