<?php
session_start();
require_once('../php/connection/connection.php');
if(!isLoggedIn()){
 header('Location: ../login.php'); 
}
$usuario = $_SESSION['user_name'];
$empresa = $_SESSION['user_emp'];
?>

<!DOCTYPE html>

<html>
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>Glamor Software - Gerencia de Pilates, Fisioterapia, SPA e Salão</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="Glamor Software - Sistema e programa especializado em gerenciar estabelecimentos de pilates, fisioterapia, salões e SPA.">
<meta name="author" content="infor Sistema">

<!-- Le styles -->
<link href="../../../css/bootstrap/bootstrap.css" rel="stylesheet">
<link href="../../../css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
<link href="../../../css/boo/boo-extension.css" rel="stylesheet">
<link href="../../../css/boo/boo.css" rel="stylesheet">
<link href="../../../css/boo/boo-coloring.css" rel="stylesheet">
<link href="../../../css/boo/boo-utility.css" rel="stylesheet">

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../../../images/glamor-software/ico/favicon.ico"> 
<link rel="icon" href="../../../images/glamor-software/ico/favicon.ico"> 
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../images/glamor-software/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../images/glamor-software/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../images/glamor-software/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../../../images/glamor-software/ico/apple-touch-icon-57-precomposed.png">
</head>

<body class="sidebar-left ">
<div class="page-container">
    <div id="header-container">
        <div id="header">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="brand" href="javascript:void(0);"><img src="../../../images/glamor-software/ico/logo-glamor-software.png" alt="glamor-software"></a>
                        <div class="search-global">
                            <input id="globalSearch" class="search search-query input-medium" type="search">
                            <a class="search-button" href="javascript:void(0);"><i class="fontello-icon-search-5"></i></a> </div>
                        <div class="nav-collapse collapse">
                            <ul class="nav user-menu visible-desktop">
                                <li><a class="btn-glyph fontello-icon-edit tip-bc" href="javascript:void(0);" title="Messages"><span class="badge badge-important">8</span></a></li>
                                <li><a class="btn-glyph fontello-icon-mail-1 tip-bc" href="javascript:void(0);" title="Emails"></a></li>
                                <li><a class="btn-glyph fontello-icon-lifebuoy tip-bc" href="javascript:void(0);" title="Support"><span class="badge badge-important">4</span></a></li>
                            </ul>
                            <ul class="nav">
                                <li class="active"> <a href="index.html">Inicio</a> </li>
                                <li> <a href="javascript:void(0);">Componentes</a> </li>
                                <li> <a href="component-fullcalendar-demo.html"><span class="fontello-icon-calendar"></span>Calendario</a> </li>
                                <li> <a href="javascript:void(0);"><span class="fontello-icon-users"></span>Contatos</a> </li>
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><span class="fontello-icon-list-1"></span>Customizar <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="component-form-demo.html">Demo Form</a></li>
                                        <li><a href="component-widgets-remember.html">Remember</a></li>
                                        <li><a href="component-widgets-users.html">User List</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header">Next Update</li>
                                        <li><a href="javascript:void(0);">Contacts</a></li>
                                        <li><a href="javascript:void(0);">Email</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // navbar -->
            
            <div class="header-drawer" style="height: 80%;">
                <div class="mobile-nav text-center visible-phone"> <a href="javascript:void(0);" class="mobile-btn" data-toggle="collapse" data-target=".sidebar"><i class="aweso-icon-chevron-down"></i> Componentes</a> </div>
                <!-- // Resposive navigation -->
                <!-- // breadcrumbs --> 
            </div>
            <!-- // drawer --> 
        </div>
    </div>
    <!-- // header-container -->
    
    <div id="main-container">
        <div id="main-sidebar" class="sidebar sidebar-inverse">
            <div class="sidebar-item">
                <div class="media profile">
                    <div class="media-thumb media-left thumb-bordereb">
                    <form id="formularioImage" method="post" enctype="multipart/form-data" action="../php/controllers/upload.php">
                        <input style="display:none" type="file" id="imageUpload" name="imageUpload" />
                    </form>
                    <a href="javascript:void(0)" class="img-shadow" id="imagePerfil"><img class="thumb" src="../../../images/glamor-software/perfil/emp_id_1.jpg"></a>
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading"><?php echo $usuario?><small>Administrator</small></h5>
                        <p class="data"><?php echo $empresa; ?></p>
                    </div>
                </div>
            </div>
            <!-- // sidebar item - profile -->
            
            <ul id="mainSideMenu" class="nav nav-list nav-side">
                <li class="accordion-group">
                    <div class="accordion-heading active"> <a href="index.html" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-monitor"></span> <i class="chevron fontello-icon-right-open-3"></i> Notificação </a> </div>
                </li>
                <!-- // item accordionMenu Dashboard -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accForms" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon aweso-icon-list-alt"></span><i class="chevron fontello-icon-right-open-3"></i> Cadastro </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accForms">
                        <li> <a href="components/cadastro/cadastro-cliente.php"> <i class="fontello-icon-right-dir"></i> Cadastro de clientes </a> </li>
                        <li> <a href="component-form-elements.html"> <i class="fontello-icon-right-dir"></i> Form Element </a> </li>
                        <li> <a href="component-form-extension.html"> <i class="fontello-icon-right-dir"></i> Form Extension</a> </li>
                        <li> <a href="component-form-wizard.html"> <i class="fontello-icon-right-dir"></i> Form Wizard</a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu Forms -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accComponents" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-align-justify"></span> <i class="chevron fontello-icon-right-open-3"></i> Components </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accComponents">
                        <li> <a href="elements-notification.html"> <i class="fontello-icon-right-dir"></i> Notification </a> </li>
                        <li> <a href="component-rangeslider.html"> <i class="fontello-icon-right-dir"></i> Rangeslider </a> </li>
                        <li> <a href="component-file-upload.html"> <i class="fontello-icon-right-dir"></i> File upload </a> </li>
                        <li> <a href="component-gallery.html"> <i class="fontello-icon-right-dir"></i> Gallery &amp; Image </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu Components -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accTables" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-align-justify"></span> <i class="chevron fontello-icon-right-open-3"></i> Tables </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accTables">
                        <li> <a href="component-table.html"> <i class="fontello-icon-right-dir"></i> Base Table </a> </li>
                        <li> <a href="component-table-boo.html"> <i class="fontello-icon-right-dir"></i> Boo Table </a> </li>
                        <li> <a href="component-table-datatable.html"> <i class="fontello-icon-right-dir"></i> DataTable </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu Tables -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accStatistics" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-chart"></span> <i class="chevron fontello-icon-right-open-3"></i> Statistics </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accStatistics">
                        <li> <a href="statistic-flot.html"> <i class="fontello-icon-right-dir"></i> Charts </a> </li>
                        <li> <a href="statistic-sparkline.html"> <i class="fontello-icon-right-dir"></i> Sparklines </a> </li>
                        <li> <a href="statistic-circle.html"> <i class="fontello-icon-right-dir"></i> Circle </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu Statistics -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accWidgets" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon  fontello-icon-window"></span> <i class="chevron fontello-icon-right-open-3"></i> Widgets </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accWidgets">
                        <li> <a href="component-widget-style.html"> <i class="fontello-icon-right-dir"></i> <span class="hidden-tablet">Widgets </span> Style </a> </li>
                        <li> <a href="component-widget-custom.html"> <i class="fontello-icon-right-dir"></i> <span class="hidden-tablet">Widgets </span> Custom </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu Widgets -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accButtons" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-puzzle"></span> <i class="chevron fontello-icon-right-open-3"></i> UI Elements </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accButtons">
                        <li> <a href="elements-button.html"> <i class="fontello-icon-right-dir"></i> Button </a> </li>
                        <li> <a href="elements-icon-font.html"> <i class="fontello-icon-right-dir"></i> Iconic fonts </a> </li>
                        <li> <a href="elements-icon-fugue-demo.html"> <i class="fontello-icon-right-dir"></i> Icon </a> </li>
                        <li> <a href="elements-wells.html"> <i class="fontello-icon-right-dir"></i> Wells </a> </li>
                        <li> <a href="elements-tabs.html"> <i class="fontello-icon-right-dir"></i> Tabs </a> </li>
                        <li> <a href="elements-modals.html"> <i class="fontello-icon-right-dir"></i> Modal </a> </li>
                        <li> <a href="elements-progressbar.html"> <i class="fontello-icon-right-dir"></i> Progressbar </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu UI Elements -->
                <li class="accordion-group">
                    <div class="accordion-heading"> <a href="#accCalendar" data-parent="#mainSideMenu" data-toggle="collapse" class="accordion-toggle"> <span class="item-icon fontello-icon-calendar"></span> <i class="chevron fontello-icon-right-open-3"></i> Calendar </a> </div>
                    <ul class="accordion-content nav nav-list collapse" id="accCalendar">
                        <li> <a href="component-fullcalendar-demo.html"> <i class="fontello-icon-right-dir"></i> <span class="hidden-tablet">Calendar </span> Demo </a> </li>
                        <li> <a href="component-fullcalendar.html"> <i class="fontello-icon-right-dir"></i> <span class="hidden-tablet">Calendar </span> Style </a> </li>
                    </ul>
                </li>
                <!-- // item accordionMenu Calendar -->
            </ul>
            <!-- // sidebar menu -->
            
            <div class="sidebar-item"></div>
            <!-- // sidebar item --> 
            
        </div>
        <!-- // sidebar -->
        
        <div id="main-content" class="main-content container-fluid">
            <div class="row-fluid page-head">
                <h2 class="page-title"><i class="fontello-icon-monitor"></i> Dashboard <small>demo dashboard 2</small></h2>
                <p class="pagedesc">Sample preparation dashboard Boo of Administrators - Demopage Two  </p>
                <div class="page-bar">
                    <div class="btn-toolbar"> </div>
                </div>
            </div>
            <!-- // page head -->
            
            <div id="page-content" class="page-content">
                <section>
                    <div class="row-fluid margin-top20">
                        <div class="span8 grider">
                            <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4 class="pull-left"><i class="fontello-icon-chart"></i> Statistic</h4>
                                    <ul class="nav nav-pills pull-right">
                                        <li class="active" id="orders-tab"> <a href="#TabOrders" data-toggle="tab">Orders</a> </li>
                                        <li class="" id="sales-tab"> <a href="#TabAmounts" data-toggle="tab">Amounts</a> </li>
                                    </ul>
                                    <!-- // widget tabs--> 
                                </div>
                                <!-- // widget-head-->
                                
                                <div class="widget-content">
                                    <div class="widget-body tab-content">
                                        <div class="tab-pane active" id="TabOrders">
                                            <h3 class="no-margin"><i class="fontello-icon-money"></i> Orders in 31/08/2012 <small>Timeline for sale</small></h3>
                                            <p class="pagedesc">The content below are loaded using inline data</p>
                                            <div id="ordersChart" style="width:100%; height:225px;"> </div>
                                        </div>
                                        <!-- // Chart Tabs - Orders chart -->
                                        
                                        <div class="tab-pane" id="TabAmounts">
                                            <h3 class="no-margin"><i class="fontello-icon-money"></i> Amounts in 31/08/2012 <small>Timeline for sale</small></h3>
                                            <p class="pagedesc">The content below are loaded using inline data</p>
                                            <div id="amountsChart" style="width:100%; height:225px"> </div>
                                        </div>
                                        <!-- // Chart Tabs - Amounts chart -->
                                        
                                        <div class="tab-pane" id="TabVisitors">
                                            <div id="ppplaceholder" style="width: 400px; height: 225px;"> </div>
                                        </div>
                                        <!-- // Chart Tabs - Amounts chart --> 
                                    </div>
                                </div>
                                
                                <!-- ? Content-inner - content without adding padding border - Adds padding content without border - for any content -->
                                <div class="widget-content">
                                    <div class="well well-impressed bg-green-light"> 
                                        <!-- Use Bootstrap list - thumbnails -->
                                        <ul class="thumbnails no-margin">
                                            <li class="span3">
                                                <h4 class="simple-header"><i class="fontello-icon-dollar"></i> Revenue</h4>
                                                <div class="well well-nice bg-green-strong no-padding">
                                                    <h2 class="text-center text-size">$1,983.43</h2>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <h4 class="simple-header"><i class="fontello-icon-back-in-time"></i> Tax</h4>
                                                <div class="well well-nice bg-green-strong no-padding">
                                                    <h2 class="text-center text-size">$396.69</h2>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <h4 class="simple-header"><i class="fontello-icon-road"></i> Shipping</h4>
                                                <div class="well well-nice bg-green-strong no-padding">
                                                    <h2 class="text-center text-size">$75.00</h2>
                                                </div>
                                            </li>
                                            <li class="span3">
                                                <h4 class="simple-header"><i class="fontello-icon-list-alt"></i> Quantity</h4>
                                                <div class="well well-nice bg-green-strong no-padding">
                                                    <h2 class="text-center text-size">18</h2>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- // Info to daily sales --> 
                                </div>
                            </div>
                            <!-- // Widget -->
                            
                            <div class="widget widget-box">
                                <div class="tabbable tabs-top">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#TabBestsellers" data-toggle="tab"><i class="fontello-icon-award-1"></i> <span class="hidden-phone">Bestsellers</span></a></li>
                                        <li><a href="#TabMostViewedProduct" data-toggle="tab"><i class="fontello-icon-eye-2"></i> <span class="hidden-phone">Most Viewed Product</span></a></li>
                                        <li><a href="#TabNewCustomers" data-toggle="tab"><i class="fontello-icon-user-add"></i> <span class="hidden-phone">New Customers</span></a></li>
                                        <li><a href="#TabCustomers" data-toggle="tab"><i class="fontello-icon-user"></i> <span class="hidden-phone">Customers</span></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="TabBestsellers">
                                            <table class="table table-condensed table-striped no-margin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="60%">Product Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity Ordered</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Kindle Fire, Full Color 7" Multi-touch Display, Wi-Fi</td>
                                                        <td class="text-right">$89.99</td>
                                                        <td class="text-right bold">264</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brother HL-2270DW Compact Laser Printer with Wireless Networking and Duplex</td>
                                                        <td class="text-right">$1,579.50</td>
                                                        <td class="text-right bold">215</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Apple TV MD199LL/A</td>
                                                        <td class="text-right">$96.99</td>
                                                        <td class="text-right bold">204</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Apple iPod touch 8GB (4th Generation)</td>
                                                        <td class="text-right">$174.99</td>
                                                        <td class="text-right bold">173</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Panasonic Lumix TS20 16.1 MP TOUGH Waterproof Digital Camera with 4x Optical Zoom</td>
                                                        <td class="text-right">$130.62</td>
                                                        <td class="text-right bold">157</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="TabMostViewedProduct">
                                            <table class="table table-condensed no-margin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="60%">Product Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Number of Views</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Doe</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$118.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Paula Gates</td>
                                                        <td class="text-right">2</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tony Rogers</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$26.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Leona Nulla</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$312.13</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Peter Johanson</td>
                                                        <td class="text-right">3</td>
                                                        <td class="text-right bold">$814.20</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="TabNewCustomers">
                                            <table class="table table-condensed no-margin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="60%"> Customer Name</th>
                                                        <th scope="col">Number of Orders</th>
                                                        <th scope="col">Average Order Amount</th>
                                                        <th scope="col">Total Order Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Doe</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$118.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Paula Gates</td>
                                                        <td class="text-right">2</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tony Rogers</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$26.00</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Leona Nulla</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$312.13</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Peter Johanson</td>
                                                        <td class="text-right">3</td>
                                                        <td class="text-right bold">$814.20</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="TabCustomers">
                                            <table class="table table-condensed no-margin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="60%"> Customer</th>
                                                        <th scope="col">Items</th>
                                                        <th scope="col">Grand Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Doe</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$118.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Paula Gates</td>
                                                        <td class="text-right">2</td>
                                                        <td class="text-right bold">$1,579.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tony Rogers</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$26.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Leona Nulla</td>
                                                        <td class="text-right">1</td>
                                                        <td class="text-right bold">$312.13</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Peter Johanson</td>
                                                        <td class="text-right">3</td>
                                                        <td class="text-right bold">$814.20</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- // tab content --> 
                                    
                                </div>
                                <!-- // Tabable --> 
                            </div>
                            <!-- // Widget --> 
                        </div>
                        <!-- // Column -->
                        
                        <div class="span4 grider">
                            <div class="statistic-box well well-black">
                                <div class="section-title">
                                    <h4><i class="fontello-icon-back-in-time"></i> Total Sales</h4>
                                </div>
                                <div class="section-content">
                                    <h2 class="statistic-values">$79,524.33 <span class="positive"><i class="fontello-icon-up-dir"></i> <sup>+10,966.08</sup></span></h2>
                                    <span class="info-block">Total Sales Previous 30 days: 68,558.25</span> </div>
                            </div>
                            <!-- // Statistic Box -->
                            
                            <div class="statistic-box well well-black">
                                <div class="section-title">
                                    <h6><i class="fontello-icon-back-in-time"></i> Average Orders</h6>
                                </div>
                                <div class="section-content">
                                    <h2 class="statistic-values">$2,644.42</h2>
                                </div>
                            </div>
                            <!-- // Statistic Box -->
                            
                            <div class="widget widget-simple">
                                <div class="widget-header header-small"> <a class="btn btn-mini btn-success pull-right" href="#">Show All</a>
                                    <h6><i class="fontello-icon-back-in-time"></i> Last 5 Orders</h6>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="60%"> Customer</th>
                                                    <th scope="col">Items</th>
                                                    <th scope="col">Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td class="text-right">1</td>
                                                    <td class="text-right bold">$118.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Paula Gates</td>
                                                    <td class="text-right">2</td>
                                                    <td class="text-right bold">$1,579.50</td>
                                                </tr>
                                                <tr>
                                                    <td>Tony Rogers</td>
                                                    <td class="text-right">1</td>
                                                    <td class="text-right bold">$26.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Leona Nulla</td>
                                                    <td class="text-right">1</td>
                                                    <td class="text-right bold">$312.13</td>
                                                </tr>
                                                <tr>
                                                    <td>Peter Johanson</td>
                                                    <td class="text-right">3</td>
                                                    <td class="text-right bold">$814.20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget -->
                            
                            <div class="widget widget-simple">
                                <div class="widget-header header-small"> <a class="btn btn-mini btn-success pull-right" href="#">Show All</a>
                                    <h6><i class="fontello-icon-back-in-time"></i> Last 5 Search Terms</h6>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="60%">Search Term</th>
                                                    <th scope="col">Results</th>
                                                    <th scope="col">Number of Uses</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Boo</td>
                                                    <td class="text-right">1</td>
                                                    <td class="text-right bold">18</td>
                                                </tr>
                                                <tr>
                                                    <td>iphone</td>
                                                    <td class="text-right">36</td>
                                                    <td class="text-right bold">2458</td>
                                                </tr>
                                                <tr>
                                                    <td>Jewellery</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right bold">0</td>
                                                </tr>
                                                <tr>
                                                    <td>shoe</td>
                                                    <td class="text-right">9</td>
                                                    <td class="text-right bold">6</td>
                                                </tr>
                                                <tr>
                                                    <td>blablabla</td>
                                                    <td class="text-right">0</td>
                                                    <td class="text-right bold">0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget -->
                            
                            <div class="widget widget-simple">
                                <div class="widget-header header-small"> <a class="btn btn-mini btn-success pull-right" href="#">Show All</a>
                                    <h6><i class="fontello-icon-search-2"></i> Top 5 Search Terms</h6>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="60%">Search Term</th>
                                                    <th scope="col">Results</th>
                                                    <th scope="col">Number of Uses</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>iPhone</td>
                                                    <td class="text-right">36</td>
                                                    <td class="text-right bold">2458</td>
                                                </tr>
                                                <tr>
                                                    <td>Apple</td>
                                                    <td class="text-right">265</td>
                                                    <td class="text-right bold">2165</td>
                                                </tr>
                                                <tr>
                                                    <td>Computer</td>
                                                    <td class="text-right">184</td>
                                                    <td class="text-right bold">1278</td>
                                                </tr>
                                                <tr>
                                                    <td>camera</td>
                                                    <td class="text-right">19</td>
                                                    <td class="text-right bold">1065</td>
                                                </tr>
                                                <tr>
                                                    <td>blue</td>
                                                    <td class="text-right">27</td>
                                                    <td class="text-right bold">865</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
                            
                        </div>
                    </div>
                    <!-- // Example row --> 
                    
                </section>
            </div>
            <!-- // page content --> 
            
        </div>
        <!-- // main-content --> 
        
    </div>
    <!-- // main-container  -->
    
    <footer id="footer-fix">
        <div id="footer-sidebar" class="footer-sidebar">
            <div class="navbar">
                <div class="btn-toolbar"> <a class="btn btn-glyph btn-link" href="javascript:void(0);"><i class="fontello-icon-up-open-1"></i></a> </div>
            </div>
        </div>
        <!-- // footer sidebar -->
        
        <div id="footer-content" class="footer-content">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <ul class="nav pull-left">
                        <li class="divider-vertical hidden-phone"></li>
                        <li><a id="btnToggleSidebar" class="btn-glyph fontello-icon-resize-full-2 tip hidden-phone" href="javascript:void(0);" title="show hide sidebar"></a></li>
                        <li class="divider-vertical hidden-phone"></li>
                        <li><a id="btnChangeSidebar" class="btn-glyph fontello-icon-login tip hidden-phone" href="javascript:void(0);" title="change sidebar position"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a id="btnChangeSidebarColor" class="btn-glyph fontello-icon-palette tip" href="javascript:void(0);" title="change sidebar color"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a class="btn-glyph fontello-icon-cw" href="javascript:void(0);"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a class="fontello-icon-home-3" href="dashboard-one.html"></a></li>
                        <li class="divider-vertical"></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="divider-vertical"></li>
                        <li><a class="btn-glyph fontello-icon-help-2 tip" href="javascript:void(0);" title="help to page"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a class="btn-glyph fontello-icon-cog-4 tip" href="javascript:void(0);" title="settings app"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a id="btnLogout" class="btn-glyph fontello-icon-logout-1 tip" href="components/comuns/logout.php" title="logout"></a></li>
                        <li class="divider-vertical"></li>
                        <li><a id="btnScrollup" class="scrollup btn-glyph fontello-icon-up-open-1" href="javascript:void(0);"><span class="hidden-phone">Scroll</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- // footer content --> 
        
    </footer>
    <!-- // footer-fix  --> 
    
</div>
<!-- // page-container  --> 

<!-- Le javascript --> 
<!-- ALL OK Placed at the end of the document so the pages load faster --> 
<script src="../../../js/jquery/jquery.js"></script> 
<script src="../../../js/jquery/jquery-ui.js"></script>
<script src="../../../js/jquery/jquery.cookie.js"></script> 
<script src="../../../js/jquery/jquery.date.min.js"></script> 
<script src="../../../js/jquery/jquery.mousewheel.js"></script> 
<script src="../../../js/jquery/jquery.load-image.min.js"></script>
<script src="../../../js/bootstrap/bootstrap.js"></script> 

<!-- ALL OK Plugins Bootstrap -->
<script src="../../../js/bootstrap/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script> 
<script src="../../../js/bootstrap/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="../../../js/bootstrap/bootstrap-fuelux/all-fuelux.min.js"></script> 
<script src="../../../js/bootstrap/bootstrap-datepicker/bootstrap-datepicker.js"></script> 
<script src="../../../js/bootstrap/bootstrap-timepicker/bootstrap-timepicker.js"></script> 
<script src="../../../js/bootstrap/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="../../../js/bootstrap/bootstrap-colorpicker/bootstrap-colorpicker.js"></script>
<script src="../../../js/bootstrap/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script> 
<script src="../../../js/bootstrap/bootstrap-toggle-button/bootstrap-toggle-button.js"></script> 
<script src="../../../js/bootstrap/bootstrap-fileupload/bootstrap-fileupload.js"></script> 
<script src="../../../js/bootstrap/bootstrap-rowlink/bootstrap-rowlink.js"></script> 
<script src="../../../js/bootstrap/bootstrap-progressbar/bootstrap-progressbar.js"></script> 
<script src="../../../js/bootstrap/bootstrap-select/bootstrap-select.js"></script> 
<script src="../../../js/bootstrap/bootstrap-multiselect/bootstrap-multiselect.js"></script> 
<script src="../../../js/bootstrap/bootstrap-bootbox/bootbox.min.js"></script> 
<script src="../../../js/bootstrap/bootstrap-modal/bootstrap-modalmanager.js"></script> 
<script src="../../../js/bootstrap/bootstrap-modal/bootstrap-modal.js"></script> 
<script src="../../../js/bootstrap/bootstrap-wizard/bootstrap-wizard.min.js"></script>
<script src="../../../js/bootstrap/bootstrap-wizard-2/bwizard-only.min.js"></script>
<script src="../../../js/bootstrap/bootstrap-image-gallery/bootstrap-image-gallery.min.js"></script>
 

<!-- ALL ok Plugins Custom - Only example --> 
<script src="../../../js/pl-extension//prettify.js"></script>

<!-- ALL ok Plugins Custom - System --> 
<script src="../../../js/pl-system/jquery.nicescroll.min.js"></script> 
<script src="../../../js/pl-system/xbreadcrumbs.js"></script> 

<!-- ALL ok Plugins Custom - System info -->
<script src="../../../js/pl-system-info/jquery.qtip.min.js"></script> 
<script src="../../../js/pl-system-info/jquery.gritter.min.js"></script> 
<script src="../../../js/pl-system-info/jquery.notyfy.js"></script>

<!-- ALL ok Plugins Custom - Content -->
<script src="../../../js/pl-content/list.min.js"></script> 
<script src="../../../js/pl-content/list.paging.min.js"></script>
<script src="../../../js/pl-content/jPages.js"></script> 

<!-- ALL ok Plugins Custom - Component -->
<script src=".../../../../../js/pl-component/fullcalendar.min.js"></script> 
<script src=".../../../../../js/pl-component/jqallrangesliders.min.js"></script>

<!-- ALL ok Plugins Custom - Form -->
<script src=".../../../../../js/pl-form/jquery.uniform.min.js"></script>
<script src=".../../../../../js/pl-form/jquery.form.min.js"></script>
<script src=".../../../../../js/pl-form/select2.min.js"></script>
<script src=".../../../../../js/pl-form/jquery.counter.js"></script> 
<script src=".../../../../../js/pl-form/jquery.elastic.js"></script> 
<script src=".../../../../../js/pl-form/jquery.inputmask.js"></script> 
<script src=".../../../../../js/pl-form/jquery.inputmask.extensions.js"></script> 
<script src=".../../../../../js/pl-form/jquery.validate.min.js"></script> 
<script src=".../../../../../js/pl-form/jquery.duallistbox.min.js"></script>

<!-- ALL ok Plugins Custom - Gallery --> 
<script src=".../../../../../js/pl-gallery/jquery.nailthumb.1.1.min.js"></script> 
<script src=".../../../../../js/pl-gallery/jquery.showLoading.min.js"></script>
<script src=".../../../../../js/pl-gallery/jquery.imagesloaded.js"></script>
<script src=".../../../../../js/pl-gallery/jquery.wookmark.min.js"></script>
 
<!-- ALL ok Plugins Tables --> 
<script src=".../../../../../js/pl-table/jquery.dataTables.js"></script> 
<script src=".../../../../../js/pl-table/jquery.dataTables.plugins.js"></script> 
<script src=".../../../../../js/pl-table/jquery.dataTables.columnFilter.js"></script> 

<!-- ALL ok Plugins data visualization --> 
<script src=".../../../../../js/pl-visualization/jquery.sparkline.min.js"></script> 
<script src=".../../../../../js/pl-visualization//easy-pie-chart.js"></script> 
<script src=".../../../../../js/pl-visualization/percentageloader.min.js"></script>
<script src=".../../../../../js/pl-visualization/knob.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.categories.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.grow.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.orderBars.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.pie.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.resize.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.selection.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.stack.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.stackpercent.js"></script> 
<script src=".../../../../../js/pl-visualization/jquery.flot.time.js"></script> 

<!-- ALL ok main js --> 
<script src=".../../../../../js/glamor-software/core.js"></script> 
<script src=".../../../../../js/glamor-software/application.js"></script> 
<script src=".../../../../../js/glamor-software/fileupload.js"></script> 

<!-- Only This Demo Page --> 
<script src=".../../../../../js/glamor-software/chartIndex.js"></script>

</body>
</html>
