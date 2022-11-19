<?php
include 'php/motorPlantillas.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['Num'])) {
    $_SESSION['Num'] = 0;
    session_write_close();
}
switch ($_SESSION["Num"]) {
    case 0:
        ilustrarLogin();
        break;
    case 1:
        ilustrarHome();
        break;
    case 2:
        ilustrarClases();
        break;
    case 3:
        ilustrarSubClases();
        break;
    case 4:
        ilustrarResguardos();
        break;
    case 5:
        ilustrarReportesBaja();
        break;
    case 6:
        ilustrarReportesAlta();
        break;
    case 7:
        ilustrarReportesClase();
        break;
    case 401:
        ilustrar401();
        break;
    case 403:
        ilustrar403();
        break;
        // case 10: ilustrarReportes(); break;
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
function ilustrarReportesAlta()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('reportes_AltasVista.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrarReportesClase()
{
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('reportes_ClaseVista.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrar401()
{ // Error 401 cuando no tiene privilegios ante un modulo.
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('401_page.php');
    $plantilla->ilustrar('pFooter.php');
}
function ilustrar403()
{ // Error 403 cuando intentas acceder a una vista directamente, solo "catalogosVista.php" tiene esto funcionando.
    $plantilla = new Plantilla;
    $plantilla->ilustrar('pHeader.php');
    $plantilla->ilustrar('pNavBar.php');
    $plantilla->ilustrar('403_page.php');
    $plantilla->ilustrar('pFooter.php');
}
// function ilustrarReportes() { 
//     $plantilla = new Plantilla;
//     $plantilla->ilustrar('pHeader.php');
//     $plantilla->ilustrar('reportes/reportes.php');
// }