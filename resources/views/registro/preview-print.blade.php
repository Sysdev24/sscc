<html>
<head>

<style type="text/css">
.d { display: inline-block; width: 100px; height: 50px;}

.letras-derecha{
      text-align: right;
    }
    </style>
</head>


<body>
    <img src="{{ asset('img/banner_corpoelec.png') }}" style="max-width:100%;height:10%;">

    <table border=2 WIDTH= 920>
  
    <td colspan="3"> <h4>INTRUCCION DE LA PRESIDENCIA DE CORPOELEC</h4> 
    <td colspan="3"> <h4>NRO. CORRESPONDENCIA: </h4><right> <strong>{{$registro->nro_correspondencia}}</right></td>
    <td colspan="3"> <h4>FECHA: </h4><right> <strong>{{$registro->fecha}}</strong></right></td>
          
</table>

<table border=2 WIDTH= 920>
  
    <td> <b>ORGANISMO REMITENTE: </b><right> <strong><b>{{$registro->ente}}</b></td>
         
</table>

<table border=2 WIDTH= 920>
  
    <td> <b>NOMBRE DEL REMITENTE:</b><right> <strong><b>{{$registro->nombre}}</b>  </strong><strong><b>{{$registro->apellido}}</b></strong></right></p></td>
        
</table>

<table border=2 WIDTH= 920>
  
    <td> <b>ASUNTO:</b><right> <strong><b>{{$registro->asunto}}</b></td>
       
</table>

<p> 
    <table  border=2 WIDTH= 920>
        <tr>
            <th colspan="4" bgcolor="#cacfd2">ACCION(ES) A SEGUIR </th>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Cordinar acciones / Tramitar / procesar</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Para su informaciones y fines pendientes</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Emitir Opinion</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Para su revision</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>En cuenta / Archivar para su resguardo y custodia</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Preparar Punto de Cuenta</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Evaluar requerimiento y Proceder</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Preparar Punto de Cuenta al Ministro</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Conversemos sobre el tema</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Preparar Punto de Informacion</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Responder</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>Preparar Respuesta para mi Firma</td>
        </tr>
    </table>
    <br>
    <table  border=2 WIDTH= 920>
        <tr>
            <th colspan="4" bgcolor="#cacfd2">REMITIDO A LA GERENCIA(S) GENERAL(ES) </th>
        </tr>
        <tr>
            <td></td>
            <td>AMBIENTE, SEGURIDAD E HIGUIENE OCUPACIONAL</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>GENERACION</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>AUDITORIA INTERNA</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>OFICINA DE LA PRESIDENCIA DE CORPOELEC</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>GERENCIA NACIONAL DE PRESUPUESTO</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>DESPACHO DE LA PRESIDENCIA DE CORPOELEC</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>AUTOMATIZACION, TI, Y TELECOMUNICACIONES</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>OFICINA DE ATENCION AL CIUDADANO</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>BIENES Y SERVICIOS</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>PLANIFICACION</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>CENTRO NACIONAL DEL DESPACHO (CND)</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>PREVENCION Y PROTECCION</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>COMERCIALIZACION</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>PROCURA</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>COMUNICACIONES Y RELACIONES PUBLICAS</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>PROGRAMACION Y CONTROL DE VEGETACION</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>CONSULTORIA JURIDICA</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>PROYECTOS MAYORES</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>DESARROLLO SOCIAL</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>SERVICIOS AERONAUTICOS</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>DISTRIBUCION</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>TALENTO HUMANO</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>FINANZAS</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>TRANSMISION</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>FORMACION</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>VICEPRESIDENCIA DE CORPOELEC</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>CORPOELEC INDUSTRIAL</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>DESPACHO DEL MINISTRO</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>FUENTES ALTERNATIVAS Y UREE</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>FASMEE</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>ASOELEC</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>FUNSASEN.</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>ARACOI</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>OTROS.</td>
        </tr>
    </table>

    <table  border=2 WIDTH= 920>
        <tr>
            <th colspan="2" bgcolor="#cacfd2">REMITIDO A LA GERENCIA(S) TERRITORIAL(ES) </th>
        </tr>
         <tr>

            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>---Con Copia a:</td>
        </tr>
        <table border=2 WIDTH= 920>
  
            <td> <b>MANEJO DE LA INFORMACION:__ </b><right> <strong><b>URGENTE:__</b><strong><b>CONFIDENCIAL:__</b><strong><b>USO INTERNO:__</b><strong><b>SEGUIMIENT Y CONTROL:__</b></td>
                 
        </table>
        <table  border=2 WIDTH= 920>
           
            <tr>
                <td>TIEMPO DE RESPUESTA:</td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>INMEDIATA</td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>3 DIAS</td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>5 DIAS </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <table border=2 WIDTH= 920>
  
                <td style="width:100" height="100" VALIGN= TOP> <b>OBSERVACIONES: </b><right> </td>
                     
            </table>

</p>


    <div class="container">
    <br>

   
</div>

<header></header>
<img src="{{ asset('img/cintillo_reporte.png') }}" style="max-width:100%;height:5%;">

<footer>
    <table>
      <tr>
        <td>
            
        </td>
      </tr>
    </table>

  </footer>

 
    
    {{-- No Tocar --}}
   <center> <input type="button" value="Impirmir" id="print"></center>
    <script>
        const $impimirActa = document.querySelector('#print');


        $impimirActa.addEventListener('click', e => {
            window.print();
            window.close();
        });
    </script>
    {{--  --}}
</body>

</html>
