<?php
include 'php/motorPlantillas.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['Num'])) {
    $_SESSION['Num'] = 0;
    session_write_close();
}
switch($_SESSION["Num"]){
    case 0: ilustrarLogin(); break;
    case 1: ilustrarHome(); break;
    case 2: ilustrarClases(); break;
    case 3: ilustrarSubClases(); break;
    case 4: ilustrarResguardos(); break;
    case 5: ilustrarReportesBaja(); break;
    case 6: ilustrarReportesClase(); break;
    case 7: ilustrarReportesFactura(); break;
    case 8: ilustrarReportesNoSerie(); break;
    case 9: ilustrarReportesCeCo(); break;
}


function ilustrarLogin()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('login.php');
}

function ilustrarHome()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('home.php');
    $plantilla->ilustrar('pFooter.php');
}

function ilustrarClases()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('catalogosVista.php');
    $plantilla->ilustrar('pFooter.php');
}

function ilustrarSubClases()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('catalogosVista2.php');
    $plantilla->ilustrar('pFooter.php');
}

function ilustrarResguardos()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('catalogosVista3.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrarReportesBaja()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('reportes_BajasVista.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrarReportesClase()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrarReportesFactura()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrarReportesNoSerie()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrarReportesCeCo()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('.php');
    $plantilla->ilustrar('pFooter.php');
}