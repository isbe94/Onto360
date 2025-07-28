/*Generado by Pro Generator */
/*@author Charlietyn  */
/*@Date: Fri Sep 01 16:07:27 EDT 2017*/


//Creando variables globales
////Definir controladora
var Lenguaje={};
Lenguaje.oldElement=null;
//Funcionalidades del Grid
Lenguaje.change = function onChange(arg) {
};


Lenguaje.change = function onDataBinding(arg) {
};


Lenguaje.dataBound=function onDataBound(arg) {
    var dataarray=this._data;
    var i=0;
    $('#all_check').prop('checked',false);
    $('#all_check').iCheck('uncheck');
    $('.check_row').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
    });
}


Lenguaje.finditem=function(uid){
    var dataItem=null;
    dataItem=$.map(Lenguaje.gridDataSource._data,function(val,index){
        if(val.uid==uid)
        {
            return val;
        }
    });
    return dataItem[0];
}
//Unique FindersidLenguaje

Lenguaje.findbyidLenguaje=function(value){
    var dataItem=null;
    dataItem=$.map(Lenguaje.gridDataSource._data,function(val,index){
        if(val.idLenguaje==value)
        {
            return val;
        }
    });
    return dataItem[0];
}


//Unique FindersLenguaje

Lenguaje.findbyLenguaje=function(value){
    var dataItem=null;
    dataItem=$.map(Lenguaje.gridDataSource._data,function(val,index){
        if(val.Lenguaje.toUpperCase().trim()==value.toUpperCase().trim())
        {
            return val;
        }
    });
    return dataItem[0];
}

Lenguaje.list_pdf=function( elem ){	$("#tbody_table_Lenguaje").append(			"<tr>"+

    "<td nowrap=''>"+elem.Lenguaje+"</td>"+
    "</tr>"

)
}

