/*Generado by Pro Generator */
/*@author Charlietyn  */ 
/*@Date: Fri Sep 01 16:07:28 EDT 2017*/


jQuery(document).ready(function() {
    ComponentsOntologia.init();
    $("#fichero").change(function () {
        var pos=this.value.lastIndexOf('.');
        var ext=this.value.substr(pos+1);
        $('#language').html(ext);
        $('#lenguaje').val(ext);

    });
});

