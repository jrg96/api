var mdata = [];
var fields = [];
var ids = [];
var size = 0;
var codigoUnicoCliente = [];
var codigoUnicoDeuda = [];
var pks=[];

//Metodo para cargar el archivo
function loadFile(evt) {
    var reader = new FileReader();
    const file = evt.target.files[0];
    reader.readAsText(file);
    reader.onload = function (event) {
        var csv = event.target.result;
        var csvArray = csv.split("\n");
        size = csvArray.length
        handleSelectedFile(file);
    };
}

//Metodo para manejar el archivo seleccionado
function handleSelectedFile(csv) {
    var firstChunkReady = false;
    Papa.parse(csv, {
        dynamicTyping: true,
        header: true,
        worker: true,
        skipEmptyLines: true,
        complete: function () {
            //console.log("finished");
        },
        error: error => console.error(error.message),
        chunk: function (results) {
            if (firstChunkReady) {
                Array.prototype.push.apply(mdata, results.data);
            } else {
                mdata = results.data;
                firstChunkReady = true;
                $.each(results.meta['fields'], function(i) {
                    fields = results.meta['fields'];
                    var pivote = results.meta['fields'][i].replace(/ /g,'_');
                    $('#molde').clone().insertBefore("#molde")
                        .attr('id',pivote).show()
                        .find('#nombreCampo')
                            .attr('value',pivote);
                });
            }
        },
    });
}

//Metodo para enviar los datos al php
function send(params) {
    var pathArray = window.location.pathname.split( '/' );
    var i = params.i;
    var alreadyEntered = false;

    var pkCliente = pks['cliente'];
    var base_url = window.location.origin;
    var pkDeuda = pks['deuda'];
    
    var urL = base_url+'/rygoservin/index.php/campopkclienteexiste/index/'+pathArray[5]+'/'+ids[pkCliente.replace(/ /g,'_')]+'/'+formato(params.data[pkCliente])+'';
    $.ajax({
        async: false,
        type: 'GET',
        url: urL,
        success: function(response) {
            var obj = jQuery.parseJSON( response );
            if(obj.id_campo_pk_cliente=='-1'){
                var postParams = {
                    id_cartera : pathArray[5],
                    id_campo_info_cliente : ids[pkCliente.replace(/ /g,'_')],
                    valor_campo_pk : params.data[pkCliente]
                };
                url = base_url + '/rygoservin/index.php/campopkclienteinsertar/post/';
                $.ajax({
                    async: false,
                    type: 'POST',
                    data : postParams,
                    url: url,
                    success: function(response) {
                        var obj = jQuery.parseJSON( response );
                        codigoUnicoCliente.push(obj.id_insertado);
                    }
                });
            }
            else {alreadyEntered = true; codigoUnicoCliente.push(obj.id_campo_pk_cliente)};
        }
    });

    urL = base_url+'/rygoservin/index.php/campopkdeudaexiste/index/'+pathArray[5]+'/'+codigoUnicoCliente[codigoUnicoCliente.length-1]+'/'+ids[pkCliente.replace(/ /g,'_')]+'/'+formato(params.data[pkDeuda])+'';
    $.ajax({
        async: false,
        type: 'GET',
        url: urL,
        success: function(response) {
            var obj = jQuery.parseJSON(response);
            if(obj.id_campo_pk_deuda=='-1'){
                var postParams = {
                    id_cartera : pathArray[5],
                    id_campo_pk_cliente : codigoUnicoCliente[codigoUnicoCliente.length-1],
                    id_campo_info_deuda : ids[pkCliente.replace(/ /g,'_')],
                    valor_campo_pk : params.data[pkDeuda]
                };
                urL = base_url + '/rygoservin/index.php/campopkdeudainsertar/post/';
                $.ajax({
                    async: false,
                    type: 'POST',
                    data: postParams,
                    url: urL,
                    success: function(response) {
                        var obj = jQuery.parseJSON( response );

                        codigoUnicoDeuda.push(obj.id_insertado);
                    }
                });
            }
            else codigoUnicoDeuda.push(obj.id_campo_pk_deuda);
        }
    });

    fields.forEach(function(field){
        var nombreCampo = field.replace(/ /g,'_');
        var nombreCampoEspacios = field;
        var elemento = $('#'+nombreCampo);
        var base_url = window.location.origin;
        var incluirTabla = elemento.find('#incluirTabla option:selected').text();
        var tipo = elemento.find('#tipo option:selected').text();
        var codigoUnico = elemento.find('#codigoUnico option:selected').text();

        if(incluirTabla=='si'){
            switch(tipo){
                case 'cliente':{
                    if(alreadyEntered) break;
                    if(codigoUnico!='si') {
                        var codigo = codigoUnicoCliente[codigoUnicoCliente.length-1];
                        var postParams = {
                            id_cartera : pathArray[5],
                            id_campo_pk_cliente : codigo,
                            id_campo_info_cliente : ids[nombreCampo],
                            valor : params.data[nombreCampoEspacios]
                        };
                        var url = base_url+'/rygoservin/index.php/campovalorclienteinsertar/post/';
                        $.ajax({
                            async: false,
                            type: 'POST',
                            data: postParams,
                            url: url,
                            success: function(data) {
                                //success!!
                            }
                       });
                    }
                    break;
                }
                case 'deuda':{
                    if(codigoUnico!='si') {
                        var codigo = codigoUnicoDeuda[codigoUnicoDeuda.length-1];
                        var postParams = {
                            id_cartera : pathArray[5],
                            id_campo_pk_deuda : codigo,
                            id_campo_info_deuda : ids[nombreCampo],
                            valor : params.data[nombreCampoEspacios]
                        };
                        var url = base_url+'/rygoservin/index.php/campovalordeudainsertar/post/';
                        $.ajax({
                            async: false,
                            type: 'POST',
                            data: postParams,
                            url: url,
                            success: function(response) {
                            }
                       });
                    }
                    break;
                }
            }
        }
        step(params.size,params.i+1);
    });
}

$(document).ready(function () {
    $("#csv-file").change(loadFile);
    $("#btnInsertar").click(processRows); 
});

function processRows(){
    $("#btnInsertar").attr('disabled','disabled');
    ids = [];
    size = 0;
    codigoUnicoCliente = [];
    codigoUnicoDeuda = [];
    var conteoPKDeuda = 0;
    var conteoPKCliente = 0;
    $.each(fields,function(i){
        var elemento = $('#'+fields[i].replace(/ /g,'_'));
        if(elemento.find('#codigoUnico option:selected').text()=='si'&&elemento.find('#incluirTabla option:selected').text()=='si'){
            switch(elemento.find('#tipo option:selected').text()){
                case 'cliente':{
                    conteoPKCliente++;
                    break;
                }
                case 'deuda':{
                    conteoPKDeuda++;
                    break;
                }
            }
        }
    });
    if(conteoPKDeuda==0||conteoPKCliente==0){
        alert("Tiene que seleccionar por lo menos un codigo unico");
        $("#btnInsertar").removeAttr('disabled');
    }
    else if(conteoPKDeuda>1){
        alert("Tiene que tener solamente un codigo unico de deuda.");
        $("#btnInsertar").removeAttr('disabled');
    }
    else if(conteoPKCliente>1){
        alert("Tiene que tener solamente un codigo unico de cliente."+conteoPKCliente);
        $("#btnInsertar").removeAttr('disabled');
    }
    else{
        $.each(fields,function(i){
            var nombreCampo = fields[i].replace(/ /g,'_');
            var elemento = $('#'+nombreCampo);
            var base_url = window.location.origin;
            var incluirTabla = elemento.find('#incluirTabla option:selected').text();
            var tipo = elemento.find('#tipo option:selected').text();
            var codigoUnico = elemento.find('#codigoUnico option:selected').text();
            if(incluirTabla=='si'){
                var pathArray = window.location.pathname.split( '/' );
                var url = base_url+'/rygoservin/index.php/campoinfo'+tipo+'insertar/index/'+pathArray[5]+'/'+nombreCampo+'/'+codigoUnico;
                $.ajax({
                    async: false,
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        var obj = jQuery.parseJSON( response );
                        ids[nombreCampo] = obj.id_insertado;
                        if(codigoUnico=='si') pks[tipo] = fields[i];
                    }
                });   
            }
        });
        var params = {
            handler: send,
            callback : done,
            data : mdata,
            size : mdata.length
        };
        ProcessArray(params);
    }
}

//Metodo para procesar el array
function ProcessArray(params) {
    var maxtime = 5;
    var delay = 100;
    var queue = params.data.concat();
    var i = 0;
    setTimeout(function () {
        var endtime = +new Date() + maxtime;
        do {
            var handlerParams = {
                size : params.size,
                i : i,
                data : queue.shift()
            }
            params.handler(handlerParams);
            i++;
        } while (queue.length > 0 && endtime > +new Date());
        if (queue.length > 0) {
            setTimeout(arguments.callee, delay);
        } else {
            params.callback();
        }
    }, delay);
}

//Metodo para mostrar el progreso
function step(size, i) {
    var progress = Math.round(i / size * 100);
    //$("#status").text("Procesando datos: " + i + " de " + size + "(" + progress + "%)");
    $('#pbcsv').css('width', progress + '%').attr('aria-valuenow', progress).text(progress + "%");
}

function done() {
    $('#pbcsv').css('width', 100 + '%').attr('aria-valuenow', 100).text(100 + "%");
    registrar();
}

function registrar(){
    var base_url = window.location.origin;
    var pathArray = window.location.pathname.split( '/' );
    url = base_url + '/rygoservin/index.php/carterainformacion/import_success/'+pathArray[5];
    window.location.replace(url);
}
function formato(str){
    str = str.toString();
    str = str.replace(/\Ñ/gi, 'N');
    str = str.replace(/\Ü/g, 'U');
    str = str.replace(/\Á/g, 'A');
    str = str.replace(/\É/g, 'E');
    str = str.replace(/\Í/g, 'I');
    str = str.replace(/\Ó/g, 'O');
    str = str.replace(/\Ú/g, 'U');
    str = str.replace(/[^a-zA-Z 0-9]+/g, ' ');
    return str;
}