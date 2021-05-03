function Initialize(cve) {
    if(window.location.href.includes('home'))
        GetInicio(cve);
    if(window.location.href.includes('nosotros'))
        GetSomos(cve);
    if(window.location.href.includes('planes'))
        GetPlanes(cve);
    if(window.location.href.includes('eventos'))
        GetEventos(cve);
    if(window.location.href.includes('equipos'))
        GetEquipo(cve);
    if(window.location.href.includes('tabposicion'))
        GetTPosicion(cve);    
    if(window.location.href.includes('login'))
        GetLogin(cve);
    if(window.location.href.includes('registro'))
        GetRegistro(cve);
}

function GetInicio(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/inicio_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetInicio-");
            let lhome = [];
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetSomos(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/quienessomos_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetSomos-");
            let lsomos = [];
            let renglon = respuesta.split('\n'); 
            for(let i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lsomos.push(element[1]);
            }
            let x = 0;
            let lblSomos        = lsomos[x++];
            let pSomos          = lsomos[x++];
            let lblNosotros     = lsomos[x++];
            let lblGestion      = lsomos[x++];
            let pGestion        = lsomos[x++];
            let lblMision       = lsomos[x++];
            let pMision         = lsomos[x++];
            let lblVision       = lsomos[x++];
            let pVision         = lsomos[x++];
            let lblValores      = lsomos[x++];
            let lblInnovacion   = lsomos[x++];
            let pInnovacion     = lsomos[x++];
            let lblConocimiento = lsomos[x++];
            let pConocimiento   = lsomos[x++];
            let lblEquipo       = lsomos[x++];
            let pEquipo         = lsomos[x++];
           
            document.getElementById("lblSomos").innerText        = lblSomos;
            document.getElementById("pSomos").innerText          = pSomos;
            document.getElementById("lblNosotros").innerText     = lblNosotros;
            document.getElementById("lblGestion").innerText      = lblGestion;
            document.getElementById("pGestion").innerText        = pGestion;
            document.getElementById("lblMision").innerText       = lblMision;
            document.getElementById("pMision").innerText         = pMision;
            document.getElementById("lblVision").innerText       = lblVision;
            document.getElementById("pVision").innerText         = pVision;
            document.getElementById("lblValores").innerText      = lblValores;
            document.getElementById("lblInnovacion").innerText   = lblInnovacion;
            document.getElementById("pInnovacion").innerText     = pInnovacion;
            document.getElementById("lblConocimiento").innerText = lblConocimiento;
            document.getElementById("pConocimiento").innerText   = pConocimiento;
            document.getElementById("lblEquipo").innerText       = lblEquipo;
            document.getElementById("pEquipo").innerText         = pEquipo;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

var lplanes = [];
function GetPlanes(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/equipo_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lequipo.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lequipo[x++];
            var lblLogo          = lequipo[x++];
            var lblRequeridos    = lequipo[x++];
            var lblEquipo        = lequipo[x++];
            var lblManager       = lequipo[x++];
            var lblDiscord       = lequipo[x++];
            var lblWhats         = lequipo[x++];
            var lblCorreo        = lequipo[x++];
            var lblPais          = lequipo[x++];
            var lblParticipantes = lequipo[x++];
            var lblID            = lequipo[x++];
            var lblParticipante  = lequipo[x++];
            var lblTernimos      = lequipo[x++];
            var btnCrear         = lequipo[x++];
           
            document.getElementById("lblCrear").innerHTML          = '<i class="booked-icon ion-person-stalker"></i> &nbsp; ' + lblCrear;
            document.getElementById("lblLogo").innerText           = lblLogo;
            document.getElementById("lblRequeridos").innerText     = lblRequeridos;
            document.getElementById("lblEquipo").innerText         = lblEquipo;
            document.getElementById("lblManager").innerText        = lblManager;
            document.getElementById("lblDiscord").innerText        = lblDiscord;
            document.getElementById("lblWhats").innerText          = lblWhats;
            document.getElementById("lblCorreo").innerText         = lblCorreo;
            document.getElementById("lblPais").innerText           = lblPais;
            document.getElementById("lblParticipantes").innerHTML  = '<i class="booked-icon ion-person"></i> &nbsp; ' + lblParticipantes;
            document.getElementById("lblID").placeholder           = lblID;
            document.getElementById("lblParticipante").placeholder = lblParticipante;
            document.getElementById("lblTerminos").innerText       = lblTernimos;
            document.getElementById("btnCrear").value              = btnCrear;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

var leventos = [];
function GetEventos(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/equipo_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lequipo.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lequipo[x++];
            var lblLogo          = lequipo[x++];
            var lblRequeridos    = lequipo[x++];
            var lblEquipo        = lequipo[x++];
            var lblManager       = lequipo[x++];
            var lblDiscord       = lequipo[x++];
            var lblWhats         = lequipo[x++];
            var lblCorreo        = lequipo[x++];
            var lblPais          = lequipo[x++];
            var lblParticipantes = lequipo[x++];
            var lblID            = lequipo[x++];
            var lblParticipante  = lequipo[x++];
            var lblTernimos      = lequipo[x++];
            var btnCrear         = lequipo[x++];
           
            document.getElementById("lblCrear").innerHTML          = '<i class="booked-icon ion-person-stalker"></i> &nbsp; ' + lblCrear;
            document.getElementById("lblLogo").innerText           = lblLogo;
            document.getElementById("lblRequeridos").innerText     = lblRequeridos;
            document.getElementById("lblEquipo").innerText         = lblEquipo;
            document.getElementById("lblManager").innerText        = lblManager;
            document.getElementById("lblDiscord").innerText        = lblDiscord;
            document.getElementById("lblWhats").innerText          = lblWhats;
            document.getElementById("lblCorreo").innerText         = lblCorreo;
            document.getElementById("lblPais").innerText           = lblPais;
            document.getElementById("lblParticipantes").innerHTML  = '<i class="booked-icon ion-person"></i> &nbsp; ' + lblParticipantes;
            document.getElementById("lblID").placeholder           = lblID;
            document.getElementById("lblParticipante").placeholder = lblParticipante;
            document.getElementById("lblTerminos").innerText       = lblTernimos;
            document.getElementById("btnCrear").value              = btnCrear;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

var lequipo = [];
function GetEquipo(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/equipo_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lequipo.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lequipo[x++];
            var lblLogo          = lequipo[x++];
            var lblRequeridos    = lequipo[x++];
            var lblEquipo        = lequipo[x++];
            var lblManager       = lequipo[x++];
            var lblDiscord       = lequipo[x++];
            var lblWhats         = lequipo[x++];
            var lblCorreo        = lequipo[x++];
            var lblPais          = lequipo[x++];
            var lblParticipantes = lequipo[x++];
            var lblID            = lequipo[x++];
            var lblParticipante  = lequipo[x++];
            var lblTernimos      = lequipo[x++];
            var btnCrear         = lequipo[x++];
           
            document.getElementById("lblCrear").innerHTML          = '<i class="booked-icon ion-person-stalker"></i> &nbsp; ' + lblCrear;
            document.getElementById("lblLogo").innerText           = lblLogo;
            document.getElementById("lblRequeridos").innerText     = lblRequeridos;
            document.getElementById("lblEquipo").innerText         = lblEquipo;
            document.getElementById("lblManager").innerText        = lblManager;
            document.getElementById("lblDiscord").innerText        = lblDiscord;
            document.getElementById("lblWhats").innerText          = lblWhats;
            document.getElementById("lblCorreo").innerText         = lblCorreo;
            document.getElementById("lblPais").innerText           = lblPais;
            document.getElementById("lblParticipantes").innerHTML  = '<i class="booked-icon ion-person"></i> &nbsp; ' + lblParticipantes;
            document.getElementById("lblID").placeholder           = lblID;
            document.getElementById("lblParticipante").placeholder = lblParticipante;
            document.getElementById("lblTerminos").innerText       = lblTernimos;
            document.getElementById("btnCrear").value              = btnCrear;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

var ltposicion = [];
function GetTPosicion(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/equipo_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lequipo.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lequipo[x++];
            var lblLogo          = lequipo[x++];
            var lblRequeridos    = lequipo[x++];
            var lblEquipo        = lequipo[x++];
            var lblManager       = lequipo[x++];
            var lblDiscord       = lequipo[x++];
            var lblWhats         = lequipo[x++];
            var lblCorreo        = lequipo[x++];
            var lblPais          = lequipo[x++];
            var lblParticipantes = lequipo[x++];
            var lblID            = lequipo[x++];
            var lblParticipante  = lequipo[x++];
            var lblTernimos      = lequipo[x++];
            var btnCrear         = lequipo[x++];
           
            document.getElementById("lblCrear").innerHTML          = '<i class="booked-icon ion-person-stalker"></i> &nbsp; ' + lblCrear;
            document.getElementById("lblLogo").innerText           = lblLogo;
            document.getElementById("lblRequeridos").innerText     = lblRequeridos;
            document.getElementById("lblEquipo").innerText         = lblEquipo;
            document.getElementById("lblManager").innerText        = lblManager;
            document.getElementById("lblDiscord").innerText        = lblDiscord;
            document.getElementById("lblWhats").innerText          = lblWhats;
            document.getElementById("lblCorreo").innerText         = lblCorreo;
            document.getElementById("lblPais").innerText           = lblPais;
            document.getElementById("lblParticipantes").innerHTML  = '<i class="booked-icon ion-person"></i> &nbsp; ' + lblParticipantes;
            document.getElementById("lblID").placeholder           = lblID;
            document.getElementById("lblParticipante").placeholder = lblParticipante;
            document.getElementById("lblTerminos").innerText       = lblTernimos;
            document.getElementById("btnCrear").value              = btnCrear;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

var llogin = [];
function GetLogin(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/equipo_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lequipo.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lequipo[x++];
            var lblLogo          = lequipo[x++];
            var lblRequeridos    = lequipo[x++];
            var lblEquipo        = lequipo[x++];
            var lblManager       = lequipo[x++];
            var lblDiscord       = lequipo[x++];
            var lblWhats         = lequipo[x++];
            var lblCorreo        = lequipo[x++];
            var lblPais          = lequipo[x++];
            var lblParticipantes = lequipo[x++];
            var lblID            = lequipo[x++];
            var lblParticipante  = lequipo[x++];
            var lblTernimos      = lequipo[x++];
            var btnCrear         = lequipo[x++];
           
            document.getElementById("lblCrear").innerHTML          = '<i class="booked-icon ion-person-stalker"></i> &nbsp; ' + lblCrear;
            document.getElementById("lblLogo").innerText           = lblLogo;
            document.getElementById("lblRequeridos").innerText     = lblRequeridos;
            document.getElementById("lblEquipo").innerText         = lblEquipo;
            document.getElementById("lblManager").innerText        = lblManager;
            document.getElementById("lblDiscord").innerText        = lblDiscord;
            document.getElementById("lblWhats").innerText          = lblWhats;
            document.getElementById("lblCorreo").innerText         = lblCorreo;
            document.getElementById("lblPais").innerText           = lblPais;
            document.getElementById("lblParticipantes").innerHTML  = '<i class="booked-icon ion-person"></i> &nbsp; ' + lblParticipantes;
            document.getElementById("lblID").placeholder           = lblID;
            document.getElementById("lblParticipante").placeholder = lblParticipante;
            document.getElementById("lblTerminos").innerText       = lblTernimos;
            document.getElementById("btnCrear").value              = btnCrear;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

var lregistro = [];
function GetRegistro(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/registro_" + cve,
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lequipo.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lequipo[x++];
            var lblLogo          = lequipo[x++];
            var lblRequeridos    = lequipo[x++];
            var lblEquipo        = lequipo[x++];
            var lblManager       = lequipo[x++];
            var lblDiscord       = lequipo[x++];
            var lblWhats         = lequipo[x++];
            var lblCorreo        = lequipo[x++];
            var lblPais          = lequipo[x++];
            var lblParticipantes = lequipo[x++];
            var lblID            = lequipo[x++];
            var lblParticipante  = lequipo[x++];
            var lblTernimos      = lequipo[x++];
            var btnCrear         = lequipo[x++];
           
            document.getElementById("lblCrear").innerHTML          = '<i class="booked-icon ion-person-stalker"></i> &nbsp; ' + lblCrear;
            document.getElementById("lblLogo").innerText           = lblLogo;
            document.getElementById("lblRequeridos").innerText     = lblRequeridos;
            document.getElementById("lblEquipo").innerText         = lblEquipo;
            document.getElementById("lblManager").innerText        = lblManager;
            document.getElementById("lblDiscord").innerText        = lblDiscord;
            document.getElementById("lblWhats").innerText          = lblWhats;
            document.getElementById("lblCorreo").innerText         = lblCorreo;
            document.getElementById("lblPais").innerText           = lblPais;
            document.getElementById("lblParticipantes").innerHTML  = '<i class="booked-icon ion-person"></i> &nbsp; ' + lblParticipantes;
            document.getElementById("lblID").placeholder           = lblID;
            document.getElementById("lblParticipante").placeholder = lblParticipante;
            document.getElementById("lblTerminos").innerText       = lblTernimos;
            document.getElementById("btnCrear").value              = btnCrear;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

//Initialize();