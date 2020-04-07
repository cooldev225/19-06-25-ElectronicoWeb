<!DOCTYPE HTML>

<html>
<head>
    <title>RETINA-PAINT</title>
    <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH;?>paint_master/style.css"/>
    <meta charset="utf-8">
</head>
<body>
<h1>PAINT</h1>
<div id="content">
    <div id="tools">
        <button id="brush">Temeraria</button>
        <button id="line">Línea</button>
        <button id="rectangle">Rectángulo</button>
        <button id="circle">Circulo</button>
        <button id="ellipse">Elipse</button>
        <button id="spray">Rociar</button>
        <button id="eraser">Borrador</button>
        <button id="fill">Llenar</button>
        <br>
        <button id="copy">Dupdo</button>
        <button id="copyrand">Copiar área aleatoria</button>
        <button id="paste">Pegar</button>
        <button id="text">Texto</button>
        <br><div style="margin-left: 70px">
        Tamano del texto
        <input type="number" id="text-size" min="6" max="100" value="14">
        <br>Fuente
        <select id="font">
            <option value="LucidaConsole">Lucida Console</option>
            <option value="Courier New">Courier New</option>
            <option value="Arial">Arial</option>
            <option value="ArialBlack">Arial Black</option>
        </select></div>
    </div>
    <div id="manage">
        <canvas id="brush_size" width="50" height="50"></canvas>
        Tamaño descarado <input type="range" id="width_range" value="10" min="1">
        Opacidad <input type="range" id="opacity_range" value="100">
    </div>
    <div id="colors">
        <button class="black" id="#000000"></button>
        <button class="white" id='#FFFFFF'></button>
        <button class="blue" id='#0000FF'></button>
        <button class="red" id='#FF0000'></button>
        <button class="yellow" id='#FFFF00'></button>
        <button class="green" id='#008000'></button>
        <input type="color" id="color" value="#0000FF">
        <input type="hidden" id="color_value_form">
    </div>
    <div id="functions">
        <button id="undo">Deshacer</button>
        <button id="redo">Rehacer</button>
        <button id="id_download">Descargar</button>
        <button id="clear">Clara</button>
    </div>
<form method="post" id="frm" action="imagesave"  enctype="multipart/form-data">
	<div id="areaForPaint">
        <canvas id="paint" name="paint"></canvas>
    </div>
    <p>
	<input type="file" id="file" name="file" src="C:\Users\Timon\Downloads\-1-od.png"/>
	<input type="hidden" id="rfilename" name="rfilename" value="<?php echo $filename;?>"/>
	<button type="submit">Salvar</button>
	</p>
</FORM>
</div>


<script src="<?php echo ASSET_PATH;?>paint_master/jquery.min.js"></script>
<script src="<?php echo ASSET_PATH;?>paint_master/script.js"></script>

</body>
</html>
