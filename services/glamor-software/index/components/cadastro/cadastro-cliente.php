<?php
require_once('../comuns/session.php');
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
<meta charset="utf-8">
<title>Glamor Software - Cadastro de clientes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="Cadastrar clientes para serem utilizados para pesquisas e vendas">
<meta name="author" content="Infor Sistema">

     <!-- Styles e Icons -->
<?php include_once '../comuns/style-icons.html';?>
    <!-- End Sytles e Icons -->

</head>

<body class="sidebar-left ">
<div class="page-container">
    
    <!-- Header Containner -->
<?php include_once '../comuns/header-container.html';?>
    <!-- // END header-container -->
    
    <div id="main-container">

<!-- Saidebar MAIN -->
<?php include_once '../comuns/sidebar-main.html';?>
     <!-- // END sidebar -->
        
        <div id="main-content" class="main-content container-fluid">
            <div style="text-align:center;" class="row-fluid page-head">
                <h2 class="page-title"><i class="aweso-icon-list-alt"></i> Clientes</h2>
                <div class="page-bar">
                    <div class="btn-toolbar">
                        <ul class="nav nav-tabs pull-left">
                            <li class="active" id="user-tab"> <a href="#TabTop1" data-toggle="tab">Cadastro de cliente</a> </li>
                            <li id="articles-tab"> <a href="#TabTop2" data-toggle="tab">Listar Clientes</a> </li>
                            <!--<li id="wizard-tab"> <a href="#TabTop3" data-toggle="tab">Wizard</a> </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- // page head -->
            
            <div id="page-content" class="page-content tab-content overflow-y">
                <div id="TabTop1" class="tab-pane padding-bottom30 active fade in">
                    <div class="page-header">
                        <h3><i class="aweso-icon-list-alt opaci35"></i> Formulario <small>Clientes.</small></h3>
                    </div>
                    <div class="row-fluid">
                        <div class="span8 grider">
                            <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-user"></i>Novo usuario</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">

                                        <!-- INICIO DO FORM CADASTRO CLIENTE-->
                                        <form id="accounForm" class="form-horizontal" >
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                        <ul class="form-list label-left list-bordered dotted">
                                                            <li class="section-form">
                                                                <h4>Dados pessoais</h4>
                                                            </li>
                                                            
                                                            <!-- // section form divider -->
                                                            <li class="control-group">
                                                                <label for="accountFirstName" class="control-label">Nome completo <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="accountFirstName" class="span11" type="text" name="accountFirstName" value="">
                                                                </div>
                                                            </li>

                                                            <!-- // form item -->
                                                            <!--genero -->
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountDob" class="control-label">Data de nascimento <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="accountDob" class="span6" type="text" name="accountDob" locate="pt-BR" value="" placeholder="00-00-0000">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="section-form">
                                                                <h4>Informação do contato</h4>
                                                            </li>
                                                            <!-- // section form divider -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountEmail" class="control-label">Email <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <div class="input-append block">
                                                                        <input id="accountEmail" class="span6" type="text" name="accountEmail" value="">
                                                                </div>
                                                            </li>

                                                            <li class="control-group">
                                                                <label for="accountPassword" class="control-label">Senha <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <div class="input-append block">
                                                                        <input id="accountPassword" class="span6" type="password" name="accountPassword" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountPhoneNumber" class="control-label">Celular <span class="required">*</span></label>
                                                                <div class="controls controls-row">
                                                                    <input id="accountPhoneNumber" class="span6 maskPhone margin-right5" type="text" name="accountPhoneNumber" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="accountFaxNumber" class="control-label">Fixo</label>
                                                                <div class="controls controls-row">
                                                                    <input id="accountFaxNumber" class="span6 maskPhoneFixo margin-right5" type="text" name="accountFaxNumber" value="">
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <div class="form-actions">
                                                        <button class="btn btn-blue">Submit & Validate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
                            
                        </div>
                        <!-- // Column -->
                        
                    </div>
                    <!-- // Example row --> 
                </div>
                <!-- // Example TAB 1 -->
                
                <div id="TabTop2" class="tab-pane fade padding-bottom30">
                    <div class="page-header">
                        <h3><i class="fontello-icon-doc-2 opaci35"></i> New Article <small>.form-horizontal</small></h3>
                    </div>
                    <div class="row-fluid">
                        <div class="span8 grider">
                            <div class="widget well well-nice">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-article-alt-1"></i> Articles <small>edit or new article</small></h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="itemForm" class="span12 form-horizontal" method="" action="" >
                                            <div class="row-fluid">
                                                <div class="span12 form-dark">
                                                    <fieldset>
                                                        <ul class="form-list list-bordered dotted">
                                                            <li class="control-group">
                                                                <label for="articleTitle" class="control-label">Title <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="articleTitle" class="input-block-level" type="text" value="" name="articleTitle">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleAlias" class="control-label">Alias <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="articleAlias" class="input-block-level " type="text" name="articleAlias" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleCategory" class="control-label">Category <span class="required">*</span></label>
                                                                <div class="controls clearfix">
                                                                    <select id="articleCategory" class="span6 selecttwo" data-class="btn-info" name="articleCategory">
                                                                        <option value=""></option>
                                                                        <option value="1">Catagory 1</option>
                                                                        <option value="2">Catagory 2</option>
                                                                        <option value="3">Catagory 3</option>
                                                                    </select>
                                                                    <div class="popover popover-error fade right in" style="top: 153px; left: -291px; display: block;">
                                                                        <div class="arrow"></div>
                                                                        <div class="popover-inner">
                                                                            <div class="popover-content">
                                                                                <p>Please select a Category</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleState" class="control-label">Status</label>
                                                                <div class="controls">
                                                                    <select id="articleStatus" class="selectpicker input-medium" data-style="btn-info" name="articleStatus">
                                                                        <option value="1">Published</option>
                                                                        <option value="2">Unpublished</option>
                                                                        <option value="3">Archived</option>
                                                                        <option value="4">Trashed</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleAccess" class="control-label">Access</label>
                                                                <div class="controls">
                                                                    <select id="articleAccess" class="selectpicker input-medium" data-style="btn-info" name="articleAccess">
                                                                        <option value="1">Public</option>
                                                                        <option value="2">Registred</option>
                                                                        <option value="3">Special</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleTags" class="control-label">Tags</label>
                                                                <div class="controls">
                                                                    <input id="articleTags" class="span6" type="text" name="articleTags" value="" />
                                                                    <span class="help-block">Write or select a tag and press "enter" or "comma" to add them.</span> </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="itemPublished" class="control-label">Articles </label>
                                                                <div class="controls">
                                                                    <div class="well well-nice well-small">
                                                                        <ul class="nav nav-pills no-margin">
                                                                            <li class="active"><a href="#TabContent" data-toggle="tab"><i class="fontello-icon-edit"></i> Content</a></li>
                                                                            <li><a href="#TabPicture" data-toggle="tab"><i class="fontello-icon-picture-1"></i> Picture</a></li>
                                                                            <li><a href="#TabGallery" data-toggle="tab"><i class="fontello-icon-picture"></i> Image Gallery</a></li>
                                                                            <li class="disabled"><a href="#TabAdditional" data-toggle="tab"><i class="fontello-icon-attach"></i> Additional Files</a></li>
                                                                        </ul>
                                                                        <div class="tab-content tab-content-visible">
                                                                            <div class="tab-pane active" id="TabContent">
                                                                                <textarea id="wysiBooEditorCustom" class="input-block-level" style="height: 200px" placeholder="Enter text ..."></textarea>
                                                                                <!-- // fieldset Input -->
                                                                                <div class="btn-toolbar pull-right"> <a class="btn btn-green" href="javascript:void(0);">Update</a> <a class="btn btn-red" href="javascript:void(0);">Clear</a> </div>
                                                                            </div>
                                                                            <!-- // tab 1 -->
                                                                            
                                                                            <div class="tab-pane" id="TabPicture"> </div>
                                                                            <!-- // tab 2 -->
                                                                            
                                                                            <div class="tab-pane" id="TabGallery"> </div>
                                                                            <!-- // tab 3 -->
                                                                            
                                                                            <div class="tab-pane" id="TabAdditional"> </div>
                                                                            <!-- // tab 4 --> 
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!-- // Tabs TOP - .tabbable-bordered --> 
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <fieldset>
                                                        <legend class="section-form">Publishing option </legend>
                                                        <ul class="form-list label-left list-bordered dotted">
                                                            <li class="control-group">
                                                                <label for="articlePostFromTo" class="control-label">Post from - to </label>
                                                                <div class="controls">
                                                                    <input id="articlePostFromTo" class="span3" type="text" name="articlePostFromTo" value="" >
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleAuthor" class="control-label">Author <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="articleAuthor" class="span6" type="text" value="" name="articleAuthor">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleAuthorAlias" class="control-label">Alias author <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="articleAuthorAlias" class="span6" type="text" value="" name="articleAuthorAlias">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleCreated" class="control-label">Date Creation</label>
                                                                <div class="controls">
                                                                    <input id="articleCreated" class="span3" type="text" name="articleCreated" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-blue">Submit</button>
                                                        <button class="btn">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
                            
                        </div>
                        <!-- // Column -->
                        
                        <div class="span4 grider">
                            <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-equalizer"></i> Options</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="formArticleSetting" class="span12 form-horizontal form-condensed form-dark label-left small-labels">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <fieldset>
                                                        <ul class="form-list list-bordered dotted">
                                                            <li class="section-form">
                                                                <h4>Publishing option</h4>
                                                            </li>
                                                            <!-- // section form divider -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleCreator" class="control-label">Created by <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="articleCreator" class="input-block-level margin-0s" type="text" value="" name="articleCreator">
                                                                    <a class="btn btn-mini btn-boo" href="javascript:void(0);">Select user</a> </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleCreatorAlias" class="control-label">Created by Alias <span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="articleCreatorAlias" class="input-block-level" type="text" value="" name="articleCreatorAlias">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleCreatedDate" class="control-label">Created Date</label>
                                                                <div class="controls">
                                                                    <input id="articleCreatedDate" class="input-block-level" type="text" name="articleCreatedDate" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articlePublishingStart" class="control-label">Start Publishing</label>
                                                                <div class="controls">
                                                                    <input id="articlePublishingStart" class="input-block-level" type="text" name="articlePublishingStart" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articlePublishingFinish" class="control-label">Finish Publishing</label>
                                                                <div class="controls">
                                                                    <input id="articlePublishingFinish" class="input-block-level" type="text" name="articlePublishingFinish" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleLanguage" class="control-label">Language</label>
                                                                <div class="controls">
                                                                    <select id="articleLanguage" class="selectpicker inp input-medium" data-style="btn-boo" name="articleLanguage">
                                                                        <option selected value="1">All Language</option>
                                                                        <option value="2">English</option>
                                                                        <option value="3">Poland</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input -->
                                                    <fieldset>
                                                        <ul class="form-list list-bordered dotted small-labels">
                                                            <li class="section-form">
                                                                <h4>Article option</h4>
                                                            </li>
                                                            <!-- // section form divider -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleShowTitle" class="control-label">Show Title</label>
                                                                <div class="controls">
                                                                    <select id="articleShowTitle" class="selectpicker input-small" data-style="btn-boo" name="articleShowTitle">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleShowCategory" class="control-label">Show Category</label>
                                                                <div class="controls">
                                                                    <select id="articleShowCategory" class="selectpicker input-small" data-style="btn-boo" name="articleShowCategory">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleShowAutor" class="control-label">Show Autor</label>
                                                                <div class="controls">
                                                                    <select id="articleShowAutor" class="selectpicker input-small" data-style="btn-boo" name="articleShowAutor">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleLinkAutor" class="control-label">Link Autor</label>
                                                                <div class="controls">
                                                                    <select id="articleLinkAutor" class="selectpicker input-small" data-style="btn-boo" name="articleLinkAutor">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleShowCreateDate" class="control-label">Show Create Date</label>
                                                                <div class="controls">
                                                                    <select id="articleShowCreateDate" class="selectpicker input-small" data-style="btn-yellow" name="articleShowCreateDate">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleShowModifyDate" class="control-label">Show Modify Date</label>
                                                                <div class="controls">
                                                                    <select id="articleShowModifyDate" class="selectpicker input-small" data-style="btn-yellow" name="articleShowModifyDate">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleShowPublishDate" class="control-label">Show Publish Date</label>
                                                                <div class="controls">
                                                                    <select id="articleShowPublishDate" class="selectpicker  input-small" data-style="btn-yellow" name="articleShowPublishDate">
                                                                        <option selected value="1">Global</option>
                                                                        <option value="2">Hide</option>
                                                                        <option value="3">Snow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input --> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget -->
                            
                            <div class="widget widget-simple">
                                <div class="widget-header">
                                    <h4><i class="fontello-icon-target-2"></i> Metadata Options </h4>
                                </div>
                                <div class="widget-content">
                                    <div class="widget-body">
                                        <form id="formA">
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <fieldset>
                                                        <ul class="form-list">
                                                            <li class="control-group">
                                                                <label for="metaArticleDescript" class="control-label">Article Descript</label>
                                                                <div class="controls">
                                                                    <textarea id="metaArticleDescript" class="input-block-level" rows="2" placeholder="Enter description for Article ..."></textarea>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="metaArticleKeywords" class="control-label">Meta Keywords</label>
                                                                <div class="controls">
                                                                    <input id="metaArticleKeywords" class="input-block-level" type="text" name="metaArticleKeywords" value="" />
                                                                    <span class="help-block">Write or select a tag and press "enter" or "comma" to add them.</span> </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="articleRobots" class="control-label">Robots</label>
                                                                <div class="controls">
                                                                    <select id="articleRobots" class="selectpicker input-block-level" data-style="btn-boo" name="articleRobots">
                                                                        <option selected value="1">Use Global</option>
                                                                        <option value="2">Index, Follow</option>
                                                                        <option value="3">No index, follow</option>
                                                                        <option value="4">Index, No follow</option>
                                                                        <option value="5">No index, No follow</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                            <li class="control-group">
                                                                <label for="metaArticleAuthor" class="control-label">Author</label>
                                                                <div class="controls">
                                                                    <input id="metaArticleAuthor" class="input-block-level" type="text" name="metaArticleAuthor" value="">
                                                                </div>
                                                            </li>
                                                            <!-- // form item -->
                                                            
                                                        </ul>
                                                    </fieldset>
                                                    <!-- // fieldset Input --> 
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- // Widget --> 
                            
                        </div>
                        <!-- // Column --> 
                        
                    </div>
                    <!-- // Example row --> 
                </div>
                <!-- // Example TAB 2 -->
                
                <div id="TabTop3" class="tab-pane fade">
                    <div class="page-header">
                        <h3><i class="aweso-icon-list-alt opaci35"></i> Text <small>here</small></h3>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 grider-item">
                        </div>
                        
                        <div class="span6 grider-item">
                        </div>
                    </div>
                    <!-- // Example row --> 
                   
                    <div class="row-fluid">
                        <div class="span12">
                        </div>
                    </div>
                    <!-- // Example row -->
                    
                    <div class="row-fluid">
                        <div class="span12">
                        </div>
                    </div>
                    <!-- // Example row -->
                    
                 </div>
                <!-- // Example TAB 3 --> 
                
            </div>
            <!-- // page content --> 
            
        </div>
        <!-- // main-content --> 
        
    </div>
    <!-- // main-container  -->
    
   <!-- footer -->
<?php include_once '../comuns/footer.html';?>
    <!-- // END footer-fix  --> 
    
</div>
<!-- // page-container  --> 

<!-- javascripts comuns --> 
<?php include_once '../comuns/javascript.html';?>
<!-- End javascript comuns -->

<!-- javascript da pagina -->
<script src="../../../../../js/bootstrap/bootstrap-wysihtml5/wysihtml5.js"></script>
<script src="../../../php/validate/cadastroClienteValidate/cadastroClienteValidate.js"></script>
<!-- end javascript -->

<!-- retira o active dos menus e adiciona nele -->
<script>
$(function($) {	    
    $('#cadastro').addClass('active');
    $('#notificacao').removeClass('active');
});
</script>

</body>
</html> 
