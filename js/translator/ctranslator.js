function Initialize(cve) {
    remplaceImg(cve);

    GetMenu(cve);
    GetFooter(cve);

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

let lengimg = document.getElementsByClassName("dropbtn");
function remplaceImg(cve) {
    if(cve == "es")
    {
        lengimg[0].childNodes[0].src = "../images/es.png"; 
        lengimg[0].childNodes[1].data = " es ";        
    }  
    else    
    {
        lengimg[0].childNodes[0].src = "../images/en.png";  
        lengimg[0].childNodes[1].data = " en ";
    }                       
}

function GetMenu(cve) {
$.ajax({
        type: "GET",
        cache: false,
        url: "../language/menu_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetMenu");
            let lmenu = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lmenu.push(element[1]);
            }
            var x = 0;
            var lminicio   = lmenu[x++];
            var lmsomos    = lmenu[x++];
            var lmplan     = lmenu[x++];
            var lmevento   = lmenu[x++];
            var lmequipo   = lmenu[x++];
            var lmposicion = lmenu[x++];
            var lmsesion   = lmenu[x++];
            var lmregistro = lmenu[x++];
           
            document.getElementById("lminicio").innerText   = lminicio;
            document.getElementById("lmsomos").innerText    = lmsomos;
            document.getElementById("lmplan").innerText     = lmplan;
            document.getElementById("lmevento").innerText   = lmevento;
            document.getElementById("lmequipo").innerText   = lmequipo;
            document.getElementById("lmposicion").innerText = lmposicion;
            document.getElementById("lmsesion").innerText   = lmsesion;
            document.getElementById("lmregistro").innerText = lmregistro;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetFooter(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/footer_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetFooter");
            let lfooter = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lfooter.push(element[1]);
            }
            var x = 0;
            var lfmapa      = lfooter[x++];
            var lfinicio    = lfooter[x++];
            var lfsesion    = lfooter[x++];
            var lfregistro  = lfooter[x++];
            var lftorneos   = lfooter[x++];
            var lfeventos   = lfooter[x++];
            var lfmas       = lfooter[x++];
            var lfequipo    = lfooter[x++];
            var lfposicion  = lfooter[x++];
            var lfayuda     = lfooter[x++];
            var lfcontacto  = lfooter[x++];
            var lfterminos  = lfooter[x++];
           
            document.getElementById("lfmapa").innerText     = lfmapa;
            document.getElementById("lfinicio").innerText   = lfinicio;
            document.getElementById("lfsesion").innerText   = lfsesion;
            document.getElementById("lfregistro").innerText = lfregistro;
            document.getElementById("lftorneos").innerText  = lftorneos;
            document.getElementById("lfeventos").innerText  = lfeventos;
            document.getElementById("lfmas").innerText      = lfmas;
            document.getElementById("lfequipo").innerText   = lfequipo;
            document.getElementById("lfposicion").innerText = lfposicion;
            document.getElementById("lfayuda").innerText    = lfayuda;
            document.getElementById("lfcontacto").innerText = lfcontacto;
            document.getElementById("lfterminos").innerText = lfterminos;
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
        url: "../language/quienessomos_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetSomos");
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

function GetPlanes(cve) {

    if(cve == "es")
        document.getElementById("lbtitle").innerText = "PRECIO ENTRADA BÁSICA, COLABORADORES Y EQUIPOS PATROCINADOS";
    else
        document.getElementById("lbtitle").innerText = "BASIC TICKET PRICE, PARTNERS AND SPONSORED TEAMS";

    GetBasica(cve);
    GetColaborador(cve);
    GetPlus(cve);
    GetGold(cve);
    GetDouble(cve);
}

function GetBasica(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/plan_basica_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetBasica");
            let lbasica = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lbasica.push(element[1]);
            }
            var x = 0;
            var ltbasica = lbasica[x++];
            var lbincluye = lbasica[x++];
            var lbi1 = lbasica[x++];
            var lbi2 = lbasica[x++];
            var lbdescribe = lbasica[x++];
            var lbd1 = lbasica[x++];
            var lbd2 = lbasica[x++];
            var lbd3 = lbasica[x++];
            var lbd4 = lbasica[x++];
            var lbd5 = lbasica[x++];
           
            document.getElementById("lbasica").innerText    = ltbasica;
            document.getElementById("lbincluye").innerText  = lbincluye;
            document.getElementById("lbi1").innerText       = lbi1;
            document.getElementById("lbi2").innerText       = lbi2;
            document.getElementById("lbdescribe").innerText = lbdescribe;
            document.getElementById("lbd1").innerText       = lbd1;
            document.getElementById("lbd2").innerText       = lbd2;
            document.getElementById("lbd3").innerText       = lbd3;
            document.getElementById("lbd4").innerText       = lbd4;
            document.getElementById("lbd5").innerText       = lbd5;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetColaborador(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/plan_colaborador_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetColaborador");
            let lcolaborador = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lcolaborador.push(element[1]);
            }
            var x = 0;
            var ltcolaborador = lcolaborador[x++];
            var lcincluye = lcolaborador[x++];
            var lci1 = lcolaborador[x++];
            var lci2 = lcolaborador[x++];
            var lci3 = lcolaborador[x++];
            var lci4 = lcolaborador[x++];
            var lci5 = lcolaborador[x++];
            var lci6 = lcolaborador[x++];
            var lci7 = lcolaborador[x++];
            var lci8 = lcolaborador[x++];
            var lcdescribe = lcolaborador[x++];
            var lcd1 = lcolaborador[x++];
            var lcd2 = lcolaborador[x++];
            var lcd3 = lcolaborador[x++];
           
            document.getElementById("lcolaborador").innerText = ltcolaborador;
            document.getElementById("lcincluye").innerText    = lcincluye;
            document.getElementById("lci1").innerText         = lci1;
            document.getElementById("lci2").innerText         = lci2;
            document.getElementById("lci3").innerText         = lci3;
            document.getElementById("lci4").innerText         = lci4;
            document.getElementById("lci5").innerText         = lci5;
            document.getElementById("lci6").innerText         = lci6;
            document.getElementById("lci7").innerText         = lci7;
            document.getElementById("lci8").innerText         = lci8;
            document.getElementById("lcdescribe").innerText   = lcdescribe;
            document.getElementById("lcd1").innerText         = lcd1;
            document.getElementById("lcd2").innerText         = lcd2;
            document.getElementById("lcd3").innerText         = lcd3;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetPlus(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/plan_plus_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetPlus");
            let lplus = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lplus.push(element[1]);
            }
            var x = 0;
            var ltplus = lplus[x++];
            var lpincluye = lplus[x++];
            var lpi1 = lplus[x++];
            var lpi2 = lplus[x++];
            var lpi3 = lplus[x++];
            var lpi4 = lplus[x++];
            var lpi5 = lplus[x++];
            var lpi6 = lplus[x++];
            var lpi7 = lplus[x++];
            var lpi8 = lplus[x++];
            var lpdescribe = lplus[x++];
            var lpd1 = lplus[x++];
            var lpd2 = lplus[x++];
            var lpd3 = lplus[x++];
           
            document.getElementById("lplus").innerText      = ltplus;
            document.getElementById("lpincluye").innerText  = lpincluye;
            document.getElementById("lpi1").innerText       = lpi1;
            document.getElementById("lpi2").innerText       = lpi2;
            document.getElementById("lpi3").innerText       = lpi3;
            document.getElementById("lpi4").innerText       = lpi4;
            document.getElementById("lpi5").innerText       = lpi5;
            document.getElementById("lpi6").innerText       = lpi6;
            document.getElementById("lpi7").innerText       = lpi7;
            document.getElementById("lpi8").innerText       = lpi8;
            document.getElementById("lpdescribe").innerText = lpdescribe;
            document.getElementById("lpd1").innerText       = lpd1;
            document.getElementById("lpd2").innerText       = lpd2;
            document.getElementById("lpd3").innerText       = lpd3;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetGold(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/plan_gold_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetGold");
            let lgold = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                lgold.push(element[1]);
            }
            var x = 0;
            var ltgold = lgold[x++];
            var lgincluye = lgold[x++];
            var lgi1  = lgold[x++];
            var lgi2  = lgold[x++];
            var lgi3  = lgold[x++];
            var lgi4  = lgold[x++];
            var lgi5  = lgold[x++];
            var lgi6  = lgold[x++];
            var lgi7  = lgold[x++];
            var lgi8  = lgold[x++];
            var lgi9  = lgold[x++];
            var lgi10 = lgold[x++];
            var lgi11 = lgold[x++];
            var lgdescribe = lgold[x++];
            var lgd1  = lgold[x++];
            var lgd2  = lgold[x++];
            var lgd3  = lgold[x++];
           
            document.getElementById("lgold").innerText      = ltgold;
            document.getElementById("lgincluye").innerText  = lgincluye;
            document.getElementById("lgi1").innerText       = lgi1;
            document.getElementById("lgi2").innerText       = lgi2;
            document.getElementById("lgi3").innerText       = lgi3;
            document.getElementById("lgi4").innerText       = lgi4;
            document.getElementById("lgi5").innerText       = lgi5;
            document.getElementById("lgi6").innerText       = lgi6;
            document.getElementById("lgi7").innerText       = lgi7;
            document.getElementById("lgi8").innerText       = lgi8;
            document.getElementById("lgi9").innerText       = lgi9;
            document.getElementById("lgi10").innerText      = lgi10;
            document.getElementById("lgi11").innerText      = lgi11;
            document.getElementById("lgdescribe").innerText = lgdescribe;
            document.getElementById("lgd1").innerText       = lgd1;
            document.getElementById("lgd2").innerText       = lgd2;
            document.getElementById("lgd3").innerText       = lgd3;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetDouble(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/plan_double_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLabels-");
            let ldouble = [];
            let renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                ldouble.push(element[1]);
            }
            var x = 0;
            var ltdouble = ldouble[x++];
            var ldincluye = ldouble[x++];
            var ldi1  = ldouble[x++];
            var ldi2  = ldouble[x++];
            var ldi3  = ldouble[x++];
            var ldi4  = ldouble[x++];
            var ldi5  = ldouble[x++];
            var ldi6  = ldouble[x++];
            var ldi7  = ldouble[x++];
            var ldi8  = ldouble[x++];
            var ldi9  = ldouble[x++];
            var ldi10 = ldouble[x++];
            var ldi11 = ldouble[x++];
            var lddescribe = ldouble[x++];
            var ldd1  = ldouble[x++];
            var ldd2  = ldouble[x++];
            var ldd3  = ldouble[x++];
           
            document.getElementById("ldouble").innerText    = ltdouble;
            document.getElementById("ldincluye").innerText  = ldincluye;
            document.getElementById("ldi1").innerText       = ldi1;
            document.getElementById("ldi2").innerText       = ldi1;
            document.getElementById("ldi3").innerText       = ldi1;
            document.getElementById("ldi4").innerText       = ldi4;
            document.getElementById("ldi5").innerText       = ldi5;
            document.getElementById("ldi6").innerText       = ldi6;
            document.getElementById("ldi7").innerText       = ldi7;
            document.getElementById("ldi8").innerText       = ldi8;
            document.getElementById("ldi9").innerText       = ldi9;
            document.getElementById("ldi10").innerText      = ldi10;
            document.getElementById("ldi11").innerText      = ldi11;
            document.getElementById("lddescribe").innerText = lddescribe;
            document.getElementById("ldd1").innerText       = ldd1;
            document.getElementById("ldd2").innerText       = ldd2;
            document.getElementById("ldd3").innerText       = ldd3;
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
        url: "../language/equipo_" + cve + ".txt",
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
        url: "../language/equipo_" + cve + ".txt",
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
        url: "../language/equipo_" + cve + ".txt",
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

function GetLogin(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/sesion_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetLogin");
            let llogin = [];
            let renglon = respuesta.split('\n'); 
            for(let i = 0; i < renglon.length; i++)
            {
                let element = renglon[i].split(':');
                llogin.push(element[1]);
            }
            let x = 0;
            let login       = llogin[x++];
            let forgot      = llogin[x++];
            let email       = llogin[x++];
            let password    = llogin[x++];
            let rememberme  = llogin[x++];
            let wp_submit   = llogin[x++];
            let user_forgot = llogin[x++];
            let user_submit = llogin[x++];
           
            document.getElementById("profile-login-tab").innerHTML  = '<i class="booked-icon ion-locked"></i> &nbsp; ' + login;
            document.getElementById("profile-forgot-tab").innerHTML = '<i class="booked-icon ion-help-buoy"></i> &nbsp; ' + forgot;
            document.getElementById("email").placeholder = email;
            document.getElementById("password").placeholder = password;
            document.getElementById("lblrememberme").innerText  = rememberme;
            document.getElementById("wp-submit").value = wp_submit;
            document.getElementById("user_login_forgot").placeholder = user_forgot;
            document.getElementById("user-submit").value = user_submit;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest.responseText);
        }
    });
}

function GetRegistro(cve) {
    $.ajax({
        type: "GET",
        cache: false,
        url: "../language/registro_" + cve + ".txt",
        data: "{}",
        contentType: "application/text; charset=utf-8",
        success: function (respuesta, textStatus) {
            console.log(textStatus + "-GetRegistro");
            let lregistro = [];
            var renglon = respuesta.split('\n'); 
            for(var i = 0; i < renglon.length; i++)
            {
                var element = renglon[i].split(':');
                lregistro.push(element[1]);
            }
            var x = 0;
            var lblCrear         = lregistro[x++];
            var lblLogo          = lregistro[x++];
            var lblRequeridos    = lregistro[x++];
            var lblEquipo        = lregistro[x++];
            var lblManager       = lregistro[x++];
            var lblDiscord       = lregistro[x++];
            var lblWhats         = lregistro[x++];
            var lblCorreo        = lregistro[x++];
            var lblPais          = lregistro[x++];
            var lblParticipantes = lregistro[x++];
            var lblID            = lregistro[x++];
            var lblParticipante  = lregistro[x++];
            var lblTernimos      = lregistro[x++];
            var btnCrear         = lregistro[x++];
           
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