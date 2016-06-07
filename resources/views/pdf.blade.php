<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Solicitec</title>
    <style>
      table#one td { text-align: center; }
      table#two {
          font-family: Arial, Helvetica, sans-serif;
          position: static;
          margin-top: 65px;
      }
      table#two tr:nth-child(even) { background-color: #eee; }
      table#two tr:nth-child(odd) { background-color:#fff; }
      table#two th {
          background-color: black;
          color: white;
          padding: 10px;
          font-size: 25px;
      }
      table#two td {
          text-align: center;
          padding: 10px;
      }
      table#three {
          font-family: Arial, Helvetica, sans-serif;
          text-align: center;
          position: static;
          margin-top: 140px !important;
      }
      table.four {
          font-family: Arial, Helvetica, sans-serif;
          text-align: center;
          position: static;
          margin-top: 150px !important;
      }
      table.six th {
          background-color: #616161;
          color: white;
          padding: 5px;
          font-family: Arial, Helvetica, sans-serif;
          text-align: center;
          position: static;
          margin-top: 50px !important;
      }
      table.six tr:nth-child(even) { background-color: #eee; }
      table.six tr:nth-child(odd) { background-color: #eee; }
      table.seven td { text-align: center; }
      table.seven2 { 
        text-align: center;
        font-size: 15px;
      }
      .imgs {
        display: block;
        width: 4000% !important;
        height: 4000% !important;
      }
      #desc { font-size: 10px; }
      #quejas {
        text-align: center;
        font-size: 20px;
      }
      #an {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        position: static;
        background-color: black;
        color: white;
        padding: 10px;
        font-size: 25px;
      }
      .img {
          max-width: 230px;
          height: 175px;
      }
    </style>
  </head>

  <body>
    <table id="one" style="width:100%">
      <tr>
        <td>
          <img class="imgs" src="imagenes/banner.png">
        </td> 
      </tr>
    </table>

    <table id="two" style="width:100%">
      <tr>
        <th colspan="3" id="two">SOLICITUD DE MANTENIMIENTO</th>
      </tr>
      <tr>
        <td><b>Fecha</b></td>
        <td></td>
        <td><b>Folio</b></td>
      </tr>
      <tr>
        <td><?=$insert['fechaCaptura']?></td>
        <td></td>
        <td><?=$insert['folio']?></td>
      </tr>
      <tr>
        <td colspan="3"><b>Nombre del Empleado</b></td>
      </tr>
      <tr>
        <td colspan="3">{{ session()->get('jefe')->nombre }}</td>
      </tr>
      <tr>
        <td><b>Problema</b></td>
        <td></td>
        <td><b>Urgencia</b></td>
      </tr>
      <tr>
        <?php 
          if($insert['problema']=='1') {
            $var='Vehículares';
          } else if($insert['problema']=='2') {
            $var=' Infraestructura';
          } else if($insert['problema']=='3') {
            $var='Áreas Verdes';
          } else {
            $var='Mantenimiento';
          }
        ?>
        <?php 
          if($insert['urgencia']=='1') {
            $var1='Baja';
          } else if($insert['urgencia']=='2') {
            $var1=' Media';
          } else {
            $var1='Alta';
          }
        ?>

        <td><?=$var?></td>
        <td></td>
        <td><?=$var1?></td>
      </tr>
      <tr>
        <td><b>Departamento Origen</b></td>
        <td></td>
        <td><b>Departamento Destino</b></td>
      </tr>
      <tr>
          <td>{{$nombre->nombre}}</td>
          <td></td>
          <td>{{$nom->nombre}}</td>
      </tr>
    </table>

<br><br><br>

    <table class="seven" style="width:100%">
      <tr>
        <td>
          <b>*ANEXOS: </b> Ver quejas relacionadas con la solicitud.
        </td>
      </tr>
    </table>

    <table id="three" style="width:100%">
      <tr>
        <td>_____________________________</td> 
        <td>_____________________________</td>
      </tr>
      <tr>
        <td><b>Firma del Solicitante</b></td> 
        <td><b>Firma del Receptor</b></td>
      </tr>
    </table>

    <table class="four" style="width:100%">
      <tr id="sep">
        <td id="desc" colspan="3">Instituto Tecnologico de Colima</td> 
      </tr>
      <tr>
        <td id="desc" colspan="3">Av. Tecnológico No. 1, Villa de Alvarez, Col. C.P. 28976, Colonia Liberación </td> 
      </tr>
      <tr>
        <td id="desc" colspan="3">www.itcolima.edu.mx</td> 
      </tr>
    </table>

<!--Pagina 2////////////////////////////////////////////////-->

    <table  style="width:100%">
      <tr>
        <td id="an" colspan="3">ANEXOS</td> 
      </tr>
    </table>
    <br>
    <table class="seven3" style="width:100%">
      <tr>
        <td align=center>
          Información de quejas relacionadas con la solicitud #<?=$insert['folio']?>
        </td>
      </tr>
    </table>
      <?php
         $anexos=\DB::table('esAtendido')
              ->join('queja','esAtendido.queja_folio','=','queja.folio')
              ->where('esAtendido.solicitudes_folio','=',$insert->folio)
              ->select('queja.descripcion','queja.imagen')
              ->get();
      ?>
      <table class="six" style="width:100%">
        <tr>
          <th>IMAGEN</th>
          <th>DESCRIPCIÓN</th>
        </tr>
        @foreach($anexos as $anexo)
        <tr>
          <td><center><img class="img" src=".{{$anexo->imagen}}"></center></td> 
          <td>{{$anexo->descripcion}}</td> 
        </tr>
        @endforeach
      </table>
  </body>
</html>