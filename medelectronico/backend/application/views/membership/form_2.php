<style>
#areaForPaint {
border: 0px solid darkblue;
    height: 220px;
    background-color: #ecf0f5;
    width: 300px;
    position: relative;
}
#paint{
        margin-left: -16px;
    margin-top: 0px;
}
#tmp_canvas {
    position: absolute;
    left: 0px;
    right: 0;
    bottom: 0;
    top: 0;
    cursor: crosshair;
}
#text_tool {
    position: absolute;
    border: 1px dashed black;
    outline: 0;
    display: none;
    font-family: "Lucida Grande", sans-serif;
    font-size: 14px;
    overflow: hidden;
    white-space: nowrap;
}
.black, .white, .blue, .green, .yellow, .red {width: 20px;height: 20px;}
.black {background-color: #000000;}
.white {background-color: #FFFFFF;}
.blue {background-color: #0000FF;}
.green {background-color: #008000;}
.yellow {background-color: #FFFF00;}
.red {background-color: #FF0000;}
.purple {background-color: #800080;}
</style>
        <!--
		<div class="form-group">
			<label class="col-sm-8 control-label" style="text-align:left;">
				EXTERIORES&nbsp;
				<input type="checkbox" class="flat-red" id="EXTERIORES" name="EXTERIORES" <?php if($record['EXTERIORES']=="true")echo " checked";else "";?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				REACCION NORMAL - MED&nbsp;
				<input type="checkbox" class="flat-red" id="REACCION_NORMAL_MED" name="REACCION_NORMAL_MED" <?php if($record['REACCION_NORMAL_MED']=="true")echo " checked";?>>&nbsp;
				ULL PUPILAS
			</label>
			<label class="col-sm-4 control-label"></label>
		</div>
		-->
		<!--
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<label class="col-sm-2 control-label">OD</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="ULL_PUPILAS_OD" name="ULL_PUPILAS_OD" value="<?php echo $record['ULL_PUPILAS_OD'];?>">
			</div>
			<label class="col-sm-1 control-label">MM</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="ULL_PUPILAS_MM" name="ULL_PUPILAS_MM" value="<?php echo $record['ULL_PUPILAS_MM'];?>">
			</div>
			<label class="col-sm-1 control-label">OS</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="ULL_PUPILAS_OS" name="ULL_PUPILAS_OS" value="<?php echo $record['ULL_PUPILAS_OS'];?>">
			</div>
			<label class="col-sm-1 control-label">MM</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="ULL_PUPILAS_SMM" name="ULL_PUPILAS_SMM" value="<?php echo $record['ULL_PUPILAS_SMM'];?>">
			</div>
			<label class="col-sm-1 control-label">APD</label>
		</div>
		-->
		<div class="row">
		    <div class="col-sm-3">
        		<div class="form-group">
        			<!--
        			<div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_AM_PM" name="_AM_PM" value="<?php echo $record['_AM_PM'];?>">
        				<input type="checkbox" class="flat-red" id="_AM_PM" name="_AM_PM" <?php if($record['_AM_PM']=="true")echo " checked";else "";?>>AM/PM
        			</div>
        			-->
        			<div class="col-sm-6">
        				<input type="text" class="form-control pull-right" id="ADENEXA" name="ADENEXA" value="<?php echo $record['ADENEXA'];?>"/>
        			</div>
        			<label class="col-sm-6 control-label" style="text-align:left;">
        				ADENEXA
        			</label>
        			<!--<div class="col-sm-2">
        				<input type="text" class="form-control pull-right" id="L_DE_H_N_DE_E" name="L_DE_H_N_DE_E" value="<?php echo $record['L_DE_H_N_DE_E'];?>"/>
        			</div>
        			<label class="col-sm-8 control-label" style="text-align:left;">
        				LAMPARA DE HENDIDURA NORMAL DE EXAMEN
        			</label>-->
        			
        		</div>
        		<div class="form-group">
        			<!--div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_CM" name="_CM" value="<?php echo $record['_CM'];?>">--
        				<input type="checkbox" class="flat-red" id="_CM" name="_CM" <?php if($record['_CM']=="true")echo " checked";else "";?>/>CM
        			</div-->
        			<div class="col-sm-6">
        				<input type="text" class="form-control pull-right" id="CONJUNTIVA" name="CONJUNTIVA" value="<?php echo $record['CONJUNTIVA'];?>"/>
        			</div>
        			<label class="col-sm-6 control-label" style="text-align:left;">
        				CONJUNTIVA
        			</label>
        			<!--<div class="col-sm-2">
        				<input type="text" class="form-control pull-right" id="E_N_DE_L_DE_H" name="E_N_DE_L_DE_H" value="<?php echo $record['E_N_DE_L_DE_H'];?>"/>
        			</div>
        			<label class="col-sm-8 control-label" style="text-align:left;">
        				EXAMEN NORMAL DE LAMPARA DE HENDIDURA
        			</label>-->
        		</div>
        		<div class="form-group">
        			<!--div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_NEO" name="_NEO" value="<?php echo $record['_NEO'];?>">--
        				<input type="checkbox" class="flat-red" id="_NEO" name="_NEO" <?php if($record['_NEO']=="true")echo " checked";else "";?>/>NEO
        			</div-->
        			<div class="col-sm-6">
        				<input type="text" class="form-control pull-right" id="CORNEA" name="CORNEA" value="<?php echo $record['CORNEA'];?>"/>
        			</div>
        			<label class="col-sm-6 control-label" style="text-align:left;">
        				CORNEA
        			</label>
        		</div>
        		<div class="form-group">
        			<!--div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_C" name="_C" value="<?php echo $record['_C'];?>">--
        				<input type="checkbox" class="flat-red" id="_C" name="_C" <?php if($record['_C']=="true")echo " checked";else "";?>/>C
        			</div-->
        			<div class="col-sm-4">
        				<input type="text" class="form-control pull-right" id="CAMARA_ANTERIOR" name="CAMARA_ANTERIOR" value="<?php echo $record['CAMARA_ANTERIOR'];?>"/>
        			</div>
        			<label class="col-sm-8 control-label" style="text-align:left;">
        				CAMARA ANTERIOR                                                                                     
        			</label>
        		</div>
        		<div class="form-group">
        			<!--div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_M" name="_M" value="<?php echo $record['_M'];?>"/>--
        				<input type="checkbox" class="flat-red" id="_M" name="_M" <?php if($record['_M']=="true")echo " checked";else "";?>/>M
        			</div-->
        			<div class="col-sm-6">
        				<input type="text" class="form-control pull-right" id="IRIS" name="IRIS" value="<?php echo $record['IRIS'];?>"/>
        			</div>
        			<label class="col-sm-6 control-label" style="text-align:left;">
        				IRIS
        			</label>
        		</div>
        		<div class="form-group">
        			<!--div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_N_M" name="_N_M" value="<?php echo $record['_N_M'];?>"/>--
        				<input type="checkbox" class="flat-red" id="_N_M" name="_N_M" <?php if($record['_N_M']=="true")echo " checked";else "";?>/>N& M 
        			</div-->
        			
        		</div>
        		<div class="form-group">
        			<div class="col-sm-3">
        				<!--<input type="text" class="form-control pull-right" id="_IRIS" name="_IRIS" value="<?php echo $record['_IRIS'];?>"/>-->
        			</div>
        		</div>
		    </div>
		    <div class="col-sm-9">
		        <div class="form-group">
        			<label class="col-sm-3 control-label" style="text-align:left;">DILATACION</label>
        			<label class="col-sm-9 control-label" style="text-align:left;">
        				EXAMEN DE LAMPARA DE HENDIDURA - SEGMENTO ANTERIOR
        			</label>
        		</div>
		        <div class="form-group">
        			<label class="col-sm-2 control-label" style="text-align:left;">LENTE</label>
        			<div class="col-sm-10">
        				<input type="text" class="form-control pull-right" id="LENTE" name="LENTE" value="<?php echo $record['LENTE'];?>">
        			</div>
        		</div>
		        <div class="form-group">
    		        <div class="col-sm-6">
                		<!--<div class="form-group">	
                			<div class="col-sm-6">
                				<a href="#" onclick="window.open('paint?filename=<?php echo $record['idx'];?>-od');"><image src="<?php echo BASE_PATH."/uploads/OD-OS/{$record['idx']}-od.png";?>" style="width:128px;height:83px;"/></a>
                			</div>
                			<div class="col-sm-6">
                				<a href="#" onclick="window.open('paint?filename=<?php echo $record['idx'];?>-os');"><image src="<?php echo BASE_PATH."/uploads/OD-OS/{$record['idx']}-os.png";?>" style="width:128px;height:83px;"/></a>
                			</div>
                		</div>-->
                		<div class="form-group">
                		    <label class="col-sm-2 control-label" style="text-align:left;">OD</label>
                		    <label class="col-sm-3 control-label" style="text-align:left;">NS</label>
                			<label class="col-sm-2 control-label" style="text-align:left;">PSC</label>
                			<label class="col-sm-3 control-label" style="text-align:left;">IOL</label>
                			<label class="col-sm-2 control-label" style="text-align:left;">CORT</label>
                		</div>
                		<div class="form-group">
                		    <label class="col-sm-2 control-label" style="text-align:center;"></label>
                		    <div class="col-sm-3">
                				<select  class="form-control select2" id="OD_NS" name="OD_NS" onchange="save_data(1);">
                				    <?php $odarr=explode("@","1+@2+@3+@4+");foreach($odarr as $v)echo "<option ".($v==$record['OD_NS']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                			<div class="col-sm-2">
                				<select  class="form-control select2" id="OD_PSC" name="OD_PSC" onchange="save_data(1);">
                				    <?php $odarr=explode("@","1@2@3@4");foreach($odarr as $v)echo "<option ".($v==$record['OD_PSC']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                			<div class="col-sm-3">
                				<select  class="form-control select2" id="OD_IOL" name="OD_IOL" onchange="save_data(1);">
                				    <?php $odarr=explode("@","ok@_");foreach($odarr as $v)echo "<option ".($v==$record['OD_IOL']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                			<div class="col-sm-2">
                				<select  class="form-control select2" id="OD_COST" name="OD_COST" onchange="save_data(1);">
                				    <?php $odarr=explode("@","1@2@3@4");foreach($odarr as $v)echo "<option ".($v==$record['OD_COST']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                		</div>
                	</div>
                	
                	<div class="col-sm-6">
                		<div class="form-group">
                		    <label class="col-sm-2 control-label" style="text-align:left;">OD</label>
                		    <label class="col-sm-3 control-label" style="text-align:left;">NS</label>
                			<label class="col-sm-2 control-label" style="text-align:left;">PSC</label>
                			<label class="col-sm-3 control-label" style="text-align:left;">IOL</label>
                			<label class="col-sm-2 control-label" style="text-align:left;">CORT</label>
                		</div>
                		<div class="form-group">
                		    <label class="col-sm-2 control-label" style="text-align:center;"></label>
                		    <div class="col-sm-3">
                				<select  class="form-control select2" id="OS_NS" name="OS_NS" onchange="save_data(1);">
                				    <?php $odarr=explode("@","1+@2+@3+@4+");foreach($odarr as $v)echo "<option ".($v==$record['OS_NS']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                			<div class="col-sm-2">
                				<select  class="form-control select2" id="OS_PSC" name="OS_PSC" onchange="save_data(1);">
                				    <?php $odarr=explode("@","1@2@3@4");foreach($odarr as $v)echo "<option ".($v==$record['OS_PSC']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                			<div class="col-sm-3">
                				<select  class="form-control select2" id="OS_IOL" name="OS_IOL" onchange="save_data(1);">
                				    <?php $odarr=explode("@","ok@_");foreach($odarr as $v)echo "<option ".($v==$record['OS_IOL']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                			<div class="col-sm-2">
                				<select  class="form-control select2" id="OS_COST" name="OS_COST" onchange="save_data(1);">
                				    <?php $odarr=explode("@","1@2@3@4");foreach($odarr as $v)echo "<option ".($v==$record['OS_COST']?" selected":"").">{$v}</option>";?>
                				</select>
                			</div>
                		</div>
                	</div>
                </div>
                <div class="form-grou">
                    <div class="col-sm-12" id="tools">
                        <button type="button" id="brush">Temeraria</button>
                        <button type="button" id="line">Línea</button>
                        <button type="button" id="rectangle">Rectángulo</button>
                        <button type="button" id="circle">Circulo</button>
                        <button type="button" id="ellipse">Elipse</button>
                        <button type="button" id="spray">Rociar</button>
                        <button type="button" id="eraser">Borrador</button>
                        <button type="button" id="fill">Llenar</button>
                        Tamano
                        <input type="number" id="text-size" min="6" max="100" value="14">
                        <select id="font">
                            <option value="LucidaConsole">Lucida Console</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Arial">Arial</option>
                            <option value="ArialBlack">Arial Black</option>
                        </select>
                    </div>
                </div>
        	</div>	
        </div>
        <div class="row">
		    <div class="col-sm-2">
		        <div class="form-group">
		            <div class="col-sm-12">
                        <canvas id="brush_size" width="50" height="50"></canvas>
                        Tamaño<input type="range" id="width_range" value="10" min="1">
                        Opacidad <input type="range" id="opacity_range" value="100">
                    </div>
                </div>
                <div class="form-group">
                    <div id="colors" class="col-sm-12">
                        <button type="button" class="black" id="#000000"></button>
                        <button type="button" class="white" id='#FFFFFF'></button>
                        <button type="button" class="blue" id='#0000FF'></button>
                        <button type="button" class="red" id='#FF0000'></button>
                        <button type="button" class="yellow" id='#FFFF00'></button>
                        <button type="button" class="green" id='#008000'></button>
                        <input type="color" id="color" value="#0000FF">
                        <input type="hidden" id="color_value_form">
                    </div>
                </div>
                <div class="form-group">    
                    <div class="col-sm-12">
                        <button type="button" id="id_download">Descargar</button>
                        <button type="button" id="clear">Clara</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
        		<div class="form-group">
        		    <div id="areaForPaint" class="col-sm-4">
                        <canvas id="paint" name="paint"></canvas>
                    </div>
                    <div class="col-sm-4">
                        <i class='fas fa-arrow-alt-circle-left' id="img1left" style="position:absolute;font-size:25px;"></i>
                        <i class='fas fa-arrow-alt-circle-right' id="img1right" style="position:absolute;font-size:25px;"></i>
        				<image id="img1" src="<?php if($record['LENTE_OD_NS_PSC_IOL_CORT']=="")echo BASE_PATH."/uploads/OD-OS/-1-od.png";else echo $record['LENTE_OD_NS_PSC_IOL_CORT'];?>" style="width:300px;height:220px;"/>
        			</div>	 
        			<div class="col-sm-4">
        			    <i class='fas fa-arrow-alt-circle-left' id="img2left" style="position:absolute;font-size:25px;"></i>
                        <i class='fas fa-arrow-alt-circle-right' id="img2right" style="position:absolute;font-size:25px;"></i>
        				<image id="img2" src="<?php if($record['LENTE_OS_NS_PSC_IOL_CORT']=="")echo BASE_PATH."/uploads/OD-OS/-1-os.png";else echo $record['LENTE_OS_NS_PSC_IOL_CORT'];?>" style="width:300px;height:220px;"/>
        			</div>
    		    </div>
    		</div>    
		</div>
		
		<!--
		<div class="form-group">
			<label class="col-sm-3 control-label" style="text-align:right;">OD NS PSC IOL CORT</label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="LENTE_OD_NS_PSC_IOL_CORT" name="LENTE_OD_NS_PSC_IOL_CORT" value="<?php echo $record['LENTE_OD_NS_PSC_IOL_CORT'];?>">
			</div>
			<label class="col-sm-3 control-label" style="text-align:right;">OS NS PSC IOL CORT</label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="LENTE_OS_NS_PSC_IOL_CORT" name="LENTE_OS_NS_PSC_IOL_CORT" value="<?php echo $record['LENTE_OS_NS_PSC_IOL_CORT'];?>">
			</div>
		</div>
	    -->
		<div class="form-group">
			<label class="col-sm-1 control-label" style="text-align:left;">INICIALES</label>
			<div class="col-sm-6">
				<input type="text" class="form-control pull-right" id="INICIALES" name="INICIALES" value="<?php echo $record['INICIALES'];?>">
			</div>
			<label class="col-sm-5 control-label" style="text-align:left;"></label>
		</div>
	
	
		<div class="form-group">
			<div class="col-sm-5">
			    FONDO POR DIRECTO/INDIRECTO/90
				<!--<input type="text" class="form-control pull-right" id="INICIALES_FONDO" name="INICIALES_FONDO"  value="<?php if($record['INICIALES_FONDO']!="")echo $record['INICIALES_FONDO']; else echo "FONDO POR DIRECTO/INDIRECTO/90";?>" placeholder="">-->
			</div>
			<label class="col-sm-1 control-label" style="text-align:left;"></label>
			<div class="col-sm-6">
			    SEGMENTO POSTERIOR- RETINA  LOS VASOS SANGINEOS
				<!--<input type="text" class="form-control pull-right" id="INICIALES_SEGMENTO" name="INICIALES_SEGMENTO"  value="<?php if($record['INICIALES_SEGMENTO']!="")echo $record['INICIALES_SEGMENTO']; else echo "SEGMENTO POSTERIOR- RETINA  LOS VASOS SANGINEOS";?>" placeholder="">-->
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3">
				<input type="checkbox" class="flat-red" id="INICIALES_FONDO_C_D" name="INICIALES_FONDO_C_D" <?php if($record['INICIALES_FONDO_C_D']=="true")echo " checked";else "";?>/>INICIALES FONDO C/D
				<!--<input type="text" class="form-control pull-right" id="INICIALES_FONDO_C_D" name="INICIALES_FONDO_C_D" value="" placeholder="INICIALES_FONDO_C_D">-->
			</div>
			<!--
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="INICIALES_FONDO_ONH" name="INICIALES_FONDO_ONH" value="" placeholder="INICIALES_FONDO_ONH">
			</div>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="INICIALES_FONDO_NFL" name="INICIALES_FONDO_NFL" value="" placeholder="INICIALES_FONDO_NFL">
			</div>
			-->
			<div class="col-sm-3">
				<!--<input type="text" class="form-control pull-right" id="INICIALES_FONDO_VASOS" name="INICIALES_FONDO_VASOS" value="" placeholder="INICIALES_FONDO_VASOS">-->
				<input type="checkbox" class="flat-red" id="INICIALES_FONDO_VASOS" name="INICIALES_FONDO_VASOS" <?php if($record['INICIALES_FONDO_VASOS']=="true")echo " checked";else "";?>/>INICIALES FONDO VASOS
			</div>
			<div class="col-sm-3">
				<!--<input type="text" class="form-control pull-right" id="INICIALES_SEGMENTO_C_D" name="INICIALES_SEGMENTO_C_D" value="" placeholder="INICIALES_SEGMENTO_C_D">-->
				<input type="checkbox" class="flat-red" id="INICIALES_SEGMENTO_C_D" name="INICIALES_SEGMENTO_C_D" <?php if($record['INICIALES_SEGMENTO_C_D']=="true")echo " checked";else "";?>/>INICIALES SEGMENTO C/D
			</div>
			<!--
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="INICIALES_SEGMENTO_ONH" name="INICIALES_SEGMENTO_ONH" value="" placeholder="INICIALES_SEGMENTO_ONH">
			</div>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="INICIALES_SEGMENTO_NFL" name="INICIALES_SEGMENTO_NFL" value="" placeholder="INICIALES_SEGMENTO_NFL">
			</div>
			-->
			<div class="col-sm-3">
				<!--<input type="text" class="form-control pull-right" id="INICIALES_SEGMENTO_VASOS" name="INICIALES_SEGMENTO_VASOS" value="" placeholder="INICIALES_SEGMENTO_VASOS">-->
			    <input type="checkbox" class="flat-red" id="INICIALES_SEGMENTO_VASOS" name="INICIALES_SEGMENTO_VASOS" <?php if($record['INICIALES_SEGMENTO_VASOS']=="true")echo " checked";else "";?>/>INICIALES SEGMENTO VASOS
			</div>
		</div>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script>
$(document).ready(function(){
    $("#img1right").css("left",39);
    $("#img2right").css("left",39);
    var canvas = document.querySelector('#paint');
    var ctx = canvas.getContext('2d');
    //устанавливаем размеры для основной области, берем из div#areaForPaint
    var areaForPaint = document.querySelector('#areaForPaint');
    var areaForPaint_style = getComputedStyle(areaForPaint);
    canvas.width = parseInt(areaForPaint_style.getPropertyValue('width'));
    canvas.height = parseInt(areaForPaint_style.getPropertyValue('height'));

    //для отображения какой линией мы будем рисовать
    var canvas_small = document.getElementById('brush_size');
    var context_small = canvas_small.getContext('2d');
    var centerX = canvas_small.width / 2;
    var centerY = canvas_small.height / 2;
    var radius;


    //Создаем временную область рисования с нее будем переносить объекты
    var tmp_canvas = document.createElement('canvas');
    var tmp_ctx = tmp_canvas.getContext('2d');
    tmp_canvas.id = 'tmp_canvas';
    //ширина и высота как у основного
    tmp_canvas.width = canvas.width;
    tmp_canvas.height = canvas.height;
    //добавляем в DOM
    areaForPaint.appendChild(tmp_canvas);

    //область для текста
    var textarea = document.createElement('textarea');
    textarea.id = 'text_tool';
    areaForPaint.appendChild(textarea);

    // Вспомогательный контейнер для текста
    // в нем будут линии/символы
    var tmp_txt_ctn = document.createElement('div');
    tmp_txt_ctn.style.display = 'none';
    areaForPaint.appendChild(tmp_txt_ctn);

    //ВСПОМОГАТЕЛЬНЫЙ ПЕРЕМЕННЫЕ И МАССИВЫ
    //определяем объект мышь с координатами x,y
    var mouse = {x: 0, y: 0};
    var start_mouse = {x: 0, y: 0};
    //Для буферизации
    var imgData;
    var imgCopyRand;
    var imgCopyRandMain;
    //Массив точек для отрисовки линии
    var ppts = [];
    //Массив в котором хранятся элементы(используется для "Отменить" и "Вернуть")
    var undo_arr = [];
    var undo_count = 0;
    var empty_canv;
    //для копирования произвольной области
    var xcopy;
    var ycopy;
    var xForCopy;
    var yForCopy;
    var whatPaste;
    //сохраняем информацию о текущей линии
    var lastWidth;
    var lastColor;
    var lastAlpha;
    //для установки цвета заливки
    var r, g, b;
    //прозрачность цвета заливки
    var alpha;
    //БЕРЕМ НАСТРОЙКИ ИЗ HTML ФОРМЫ
    //Текущий инструмент по умолчанию
    var tool = 'brush';

    
    //Устанавливаем размер шрифта
    document.getElementById("text-size").addEventListener("change", function () {
        var size = document.getElementById("text-size").value;
        document.getElementById("text_tool").style.fontSize = parseInt(size) + "px";
    });
    document.getElementById("font").addEventListener("change", function () {
        var font = document.getElementById("font");
        var fontStraa = font.options[font.selectedIndex].text;
        console.log(fontStraa);
        document.getElementById("text_tool").style.fontFamily = fontStraa;
    });
    //По нажатию на кнопку устанавливаем цвет
    $("#colors").find(":button").on('click', function () {
        tmp_ctx.strokeStyle = $(this).attr('id');
        r = hexToRgb(tmp_ctx.strokeStyle).r;
        g = hexToRgb(tmp_ctx.strokeStyle).g;
        b = hexToRgb(tmp_ctx.strokeStyle).b;
        tmp_ctx.fillStyle = tmp_ctx.strokeStyle;
        console.log("color = ", tmp_ctx.strokeStyle);
        document.getElementById("color").value = $(this).attr('id');
        //Рисуем пример нашей линии
        drawBrush();
    });
    //детальная настройка цвета
    document.getElementById("color").addEventListener("change", function () {
        tmp_ctx.strokeStyle = document.getElementById("color").value;
        r = hexToRgb(tmp_ctx.strokeStyle).r;
        g = hexToRgb(tmp_ctx.strokeStyle).g;
        b = hexToRgb(tmp_ctx.strokeStyle).b;
        tmp_ctx.fillStyle = tmp_ctx.strokeStyle;
        console.log("color = ", tmp_ctx.strokeStyle);
        //Рисуем пример нашей линии
        drawBrush();
    });

    //При выборе толщины линии отрисовывать новую линию
    document.getElementById("width_range").addEventListener("change", function () {
        tmp_ctx.lineWidth = document.getElementById("width_range").value / 2;
        drawBrush();
    });
    //При выборе прозрачности линии отрисовывать новую линию
    document.getElementById("opacity_range").addEventListener("change", function () {
        tmp_ctx.globalAlpha = document.getElementById("opacity_range").value / 100;
        alpha = Math.round(tmp_ctx.globalAlpha * 255);
        console.log("opasity = ", alpha);
        drawBrush();
    });

    //Очистка области
    document.getElementById("clear").addEventListener("click", function () {
        ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);
    });
    //ЗАКАНЧИВАЕМ УСТАНАВЛИВАТЬ НАСТРОЙКИ ИЗ HTML


    //Пример линии
    var drawBrush = function () {
        context_small.clearRect(0, 0, canvas_small.width, canvas_small.height);

        radius = tmp_ctx.lineWidth;
        radius = radius / 2;
        context_small.beginPath();
        context_small.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
        context_small.fillStyle = tmp_ctx.strokeStyle;
        context_small.globalAlpha = tmp_ctx.globalAlpha;
        context_small.fill();
    };
    //значения по умолчанию
    //Толщина линии
    tmp_ctx.lineWidth = document.getElementById("width_range").value / 2;
    //Значения по умолчанию
    tmp_ctx.lineJoin = 'round';
    tmp_ctx.lineCap = 'round';
    tmp_ctx.strokeStyle = 'blue';
    tmp_ctx.fillStyle = 'blue';
    r = 0;
    g = 0;
    b = 255;
    alpha = 255;

    drawBrush();

    //Помещаем пустую область в наш массив для отмены
    empty_canv = canvas.toDataURL();
    undo_arr.push(empty_canv);

    //Устанавливаем координаты мыши на основной и доп. областях
    tmp_canvas.addEventListener('mousemove', function (e) {
        mouse.x = typeof e.offsetX !== 'undefined' ? e.offsetX : e.layerX;
        mouse.y = typeof e.offsetY !== 'undefined' ? e.offsetY : e.layerY;
    }, false);

    tmp_canvas.addEventListener('mousedown', function (e) {
        console.log("tool = ", tool);
        tmp_canvas.addEventListener('mousemove', onPaint, false);
        if (tool == "text") {
            var lines = textarea.value.split('\n');
            var processed_lines = [];

            for (var i = 0; i < lines.length; i++) {
                var chars = lines[i].length;

                for (var j = 0; j < chars; j++) {
                    var text_node = document.createTextNode(lines[i][j]);
                    tmp_txt_ctn.appendChild(text_node);

                    // Since tmp_txt_ctn is not taking any space
                    // in layout due to display: none, we gotta
                    // make it take some space, while keeping it
                    // hidden/invisible and then get dimensions
                    tmp_txt_ctn.style.position = 'absolute';
                    tmp_txt_ctn.style.visibility = 'hidden';
                    tmp_txt_ctn.style.display = 'block';

                    var width = tmp_txt_ctn.offsetWidth;

                    tmp_txt_ctn.style.position = '';
                    tmp_txt_ctn.style.visibility = '';
                    tmp_txt_ctn.style.display = 'none';

                    if (width > parseInt(textarea.style.width)) {
                        break;
                    }
                }

                processed_lines.push(tmp_txt_ctn.textContent);
                tmp_txt_ctn.innerHTML = '';
            }

            var ta_comp_style = getComputedStyle(textarea);
            var fs = ta_comp_style.getPropertyValue('font-size');
            var ff = ta_comp_style.getPropertyValue('font-family');

            tmp_ctx.font = fs + ' ' + ff;
            tmp_ctx.textBaseline = 'top';

            for (var n = 0; n < processed_lines.length; n++) {
                var processed_line = processed_lines[n];

                tmp_ctx.fillText(
                    processed_line,
                    parseInt(textarea.style.left),
                    parseInt(textarea.style.top) + n * parseInt(fs)
                );
            }

            textarea.style.display = 'none';
            textarea.value = '';
        }
        mouse.x = typeof e.offsetX !== 'undefined' ? e.offsetX : e.layerX;
        mouse.y = typeof e.offsetY !== 'undefined' ? e.offsetY : e.layerY;
        //если выбрана вставка, то по клику вставляем изображение

        if ((tool == "copy") || (tool == "copyrand")) {
            lastColor = tmp_ctx.strokeStyle;
            lastWidth = tmp_ctx.lineWidth;
            lastAlpha = tmp_ctx.globalAlpha;
        }

        start_mouse.x = mouse.x;
        start_mouse.y = mouse.y;

        ppts.push({x: mouse.x, y: mouse.y});

    }, false);

    //при отпускании мыши прекращаем двигать textarea
    textarea.addEventListener('mouseup', function () {
        tmp_canvas.removeEventListener('mousemove', onPaint, false);
    });

    tmp_canvas.addEventListener('mouseup', function () {
        tmp_canvas.removeEventListener('mousemove', onPaint, false);
        if (tool == "fill") {
            onPaint();
        }
        if (tool == "paste") {
            if (whatPaste == 2) {
                console.log("xForCopy,yForCopy = ", xForCopy, yForCopy);
                //создаем временный чтобы не затереть основной
                var imgCopyRandDop = ctx.createImageData(imgCopyRand);
                imgCopyRandDop.data.set(imgCopyRand.data);
                pasteRand(imgCopyRandDop);
            } else {
                ctx.putImageData(imgData, mouse.x, mouse.y);
            }
        }

        //отменяем дейсвие стерки
        ctx.globalCompositeOperation = 'source-over';

        // Рисуем на настоящий канвас
        if (tool == "copy") {
            tmp_ctx.setLineDash([0, 0]);
            tmp_ctx.strokeStyle = lastColor;
            tmp_ctx.lineWidth = lastWidth;
            tmp_ctx.globalAlpha = lastAlpha;
        }

        // Clearing tmp canvas
        if (tool == "copyrand") {
            tmp_ctx.beginPath();
            tmp_ctx.moveTo(start_mouse.x, start_mouse.y);
            tmp_ctx.lineTo(xcopy, ycopy);
            tmp_ctx.stroke();
            tmp_ctx.closePath();
            imgCopyRand = tmp_ctx.getImageData(0, 0, tmp_canvas.width, tmp_canvas.height);
            imgCopyRandMain = ctx.getImageData(0, 0, tmp_canvas.width, tmp_canvas.height);
            whatPaste = 2;
            tmp_ctx.strokeStyle = lastColor;
            tmp_ctx.lineWidth = lastWidth;
            tmp_ctx.globalAlpha = lastAlpha;
            tool = "no";
        } else if (tool == "no") {
            xForCopy = start_mouse.x;
            yForCopy = start_mouse.y;
            tool = "copyrand";
            console.log(imgCopyRand);
        }


        if (tool != "copyrand" && tool != "copy" && tool != "no") {
            ctx.drawImage(tmp_canvas, 0, 0);
        }

        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);
        // Emptying up Pencil Points
        ppts = [];

        //Помещаем в массив для отмены
        undo_arr.push(canvas.toDataURL());
        undo_count = 0;
    }, false);


    //СОХРАНЕНИЕ ИЗОБРАЖЕНИЯ
    //вызов функции загрузки
    var callDownload = function () {//alert(document.getElementById("id_download").value);
        //alert(canvas.toDataURL());
        //save_data(1);
        download(paint, 'test.png');
		//document.getElementById("frm").submit();
    };
    //по нажатию вызыем функцию callDownload
    document.getElementById("id_download").addEventListener("click", callDownload);
    //загрузка
    function download(canvas, filename) {
        var lnk = document.createElement('a'),e;
        lnk.download = filename;
        lnk.href = canvas.toDataURL();
        if (document.createEvent) {
            e = new MouseEvent("click", {});
            lnk.dispatchEvent(e);
        } else if (lnk.fireEvent) {
            lnk.fireEvent("onclick");
        }
    }

    var UndoFunc = function (count) {


        var number = undo_arr.length;
        var img_data = undo_arr[number - (count + 1)];
        var undo_img = new Image();

        undo_img.src = img_data.toString();

        ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);
        ctx.drawImage(undo_img, 0, 0);
    };


    //ОТРИСОВКА ЭЛЕМЕНТОВ
    //Рисуем карандашом
    var onPaintBrush = function () {
        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        //Сохраняем все координаты в массив
        ppts.push({x: mouse.x, y: mouse.y});

        if (ppts.length < 3) {
            var b = ppts[0];
            tmp_ctx.beginPath();
            tmp_ctx.arc(b.x, b.y, tmp_ctx.lineWidth / 2, 0, Math.PI * 2, !0);
            tmp_ctx.fill();
            tmp_ctx.closePath();

            return;
        }

        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        tmp_ctx.beginPath();
        tmp_ctx.moveTo(ppts[0].x, ppts[0].y);

        for (var i = 1; i < ppts.length - 2; i++) {
            var c = (ppts[i].x + ppts[i + 1].x) / 2;
            var d = (ppts[i].y + ppts[i + 1].y) / 2;

            tmp_ctx.quadraticCurveTo(ppts[i].x, ppts[i].y, c, d);
        }

        //Для последних двух точек
        tmp_ctx.quadraticCurveTo(
            ppts[i].x,
            ppts[i].y,
            ppts[i + 1].x,
            ppts[i + 1].y
        );
        tmp_ctx.stroke();
    };
    
    //По нажатию на кнопку устанавливаем инструмент
    $("#tools").find(":button").on('click', function () {
        tool = $(this).attr('id');
        console.log("tool = ", tool);
    });

    $("#img1left").on('click',function(){
        var img = document.getElementById("img1");
        ctx.drawImage(img, 0, 0);
    });
    $("#img1right").on('click',function(){
        $("#img1").attr('src',canvas.toDataURL());
        save_data(3);
    });
    $("#img2left").on('click',function(){
        var img = document.getElementById("img2");
        ctx.drawImage(img, 0, 0);
    });
    $("#img2right").on('click',function(){
        $("#img2").attr('src',canvas.toDataURL());    
        save_data(5);
    });

    //Рисуем круг
    var onPaintCircle = function () {

        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        var x = (mouse.x + start_mouse.x) / 2;
        var y = (mouse.y + start_mouse.y) / 2;

        var radius = Math.max(
                Math.abs(mouse.x - start_mouse.x),
                Math.abs(mouse.y - start_mouse.y)
            ) / 2;

        tmp_ctx.beginPath();
        tmp_ctx.arc(x, y, radius, 0, Math.PI * 2, false);
        tmp_ctx.stroke();
        tmp_ctx.closePath();
    };

    //Рисуем прямую линию
    var onPaintLine = function () {

        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        tmp_ctx.beginPath();
        tmp_ctx.moveTo(start_mouse.x, start_mouse.y);
        tmp_ctx.lineTo(mouse.x, mouse.y);
        tmp_ctx.stroke();
        tmp_ctx.closePath();


    };

    //Рисуем прямоугольник
    var onPaintRect = function () {

        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);


        var x = Math.min(mouse.x, start_mouse.x);
        var y = Math.min(mouse.y, start_mouse.y);
        var width = Math.abs(mouse.x - start_mouse.x);
        var height = Math.abs(mouse.y - start_mouse.y);
        tmp_ctx.strokeRect(x, y, width, height);
    };

    //Рисуем эллипс
    function drawEllipse(ctx) {


        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        var x = Math.min(mouse.x, start_mouse.x);
        var y = Math.min(mouse.y, start_mouse.y);

        var w = Math.abs(mouse.x - start_mouse.x);
        var h = Math.abs(mouse.y - start_mouse.y);


        var kappa = .5522848,
            ox = (w / 2) * kappa, // control point offset horizontal
            oy = (h / 2) * kappa, // control point offset vertical
            xe = x + w,           // x-end
            ye = y + h,           // y-end
            xm = x + w / 2,       // x-middle
            ym = y + h / 2;       // y-middle

        ctx.beginPath();
        ctx.moveTo(x, ym);
        ctx.bezierCurveTo(x, ym - oy, xm - ox, y, xm, y);
        ctx.bezierCurveTo(xm + ox, y, xe, ym - oy, xe, ym);
        ctx.bezierCurveTo(xe, ym + oy, xm + ox, ye, xm, ye);
        ctx.bezierCurveTo(xm - ox, ye, x, ym + oy, x, ym);
        ctx.closePath();
        ctx.stroke();
    }

    //Стерка
    var onErase = function () {

        //Сохраняем все точки в массив
        ppts.push({x: mouse.x, y: mouse.y});

        ctx.globalCompositeOperation = 'destination-out';
        ctx.fillStyle = 'rgba(0,0,0,1)';
        ctx.strokeStyle = 'rgba(0,0,0,1)';
        ctx.lineWidth = tmp_ctx.lineWidth;

        if (ppts.length < 3) {
            var b = ppts[0];
            ctx.beginPath();
            //ctx.moveTo(b.x, b.y);
            //ctx.lineTo(b.x+50, b.y+50);
            ctx.arc(b.x, b.y, ctx.lineWidth / 2, 0, Math.PI * 2, !0);
            ctx.fill();
            ctx.closePath();

            return;
        }

        ctx.beginPath();
        ctx.moveTo(ppts[0].x, ppts[0].y);

        for (var i = 1; i < ppts.length - 2; i++) {
            var c = (ppts[i].x + ppts[i + 1].x) / 2;
            var d = (ppts[i].y + ppts[i + 1].y) / 2;

            ctx.quadraticCurveTo(ppts[i].x, ppts[i].y, c, d);
        }

        // For the last 2 points
        ctx.quadraticCurveTo(
            ppts[i].x,
            ppts[i].y,
            ppts[i + 1].x,
            ppts[i + 1].y
        );
        ctx.stroke();
    };

    //Спрей
    var getRandomOffset = function (radius) {

        var random_angle = Math.random() * (2 * Math.PI);
        var random_radius = Math.random() * radius;

        return {
            x: Math.cos(random_angle) * random_radius,
            y: Math.sin(random_angle) * random_radius
        };
    };
    var generateSprayParticles = function () {
        // Particle count, or, density
        var density = tmp_ctx.lineWidth * 2;

        for (var i = 0; i < density; i++) {
            var offset = getRandomOffset(tmp_ctx.lineWidth);

            var x = mouse.x + offset.x;
            var y = mouse.y + offset.y;

            tmp_ctx.fillRect(x, y, 1, 1);
        }
    };

    //копировать
    var onCopy = function () {
        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);


        console.log(lastWidth);
        console.log(lastColor);

        tmp_ctx.globalAlpha = 1;
        tmp_ctx.strokeStyle = 'black';
        tmp_ctx.lineWidth = 2;
        tmp_ctx.setLineDash([3, 15]);
        var x = Math.min(mouse.x, start_mouse.x);
        var y = Math.min(mouse.y, start_mouse.y);
        var width = Math.abs(mouse.x - start_mouse.x) + 1;
        var height = Math.abs(mouse.y - start_mouse.y) + 1;
        tmp_ctx.strokeRect(x, y, width, height);
        imgData = ctx.getImageData(x, y, width, height);
        whatPaste = 1;
    };


    //рисуем текст
    var onText = function () {

        // Tmp canvas is always cleared up before drawing.
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        var x = Math.min(mouse.x, start_mouse.x);
        var y = Math.min(mouse.y, start_mouse.y);
        var width = Math.abs(mouse.x - start_mouse.x);
        var height = Math.abs(mouse.y - start_mouse.y);

        textarea.style.left = x + 'px';
        textarea.style.top = y + 'px';
        textarea.style.width = width + 'px';
        textarea.style.height = height + 'px';

        textarea.style.display = 'block';
    };

    //Заливка
    var onFill = function (opasity_alpha) {
        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        var width = imageData.width;
        var height = imageData.height;
        var stack = [[start_mouse.x, start_mouse.y]];
        var pixel = 0;
        var point = 0;

        while (stack.length > 0) {
            pixel = stack.pop();

            if (pixel[0] < 0 || pixel[0] >= width)
                continue;
            if (pixel[1] < 0 || pixel[1] >= height)
                continue;

            // Alpha
            point = pixel[1] * 4 * width + pixel[0] * 4 + 3;
            // Если это не рамка и ещё не закрасили
            if (imageData.data[point] != opasity_alpha && imageData.data[point] != 255 && (imageData.data[point] > 255 || imageData.data[point] < 5)) {
                // Закрашиваем
                imageData.data[point] = opasity_alpha;
                imageData.data[point - 3] = r;//Red
                imageData.data[point - 2] = g;//Green
                imageData.data[point - 1] = b;//Blue

                // Ставим соседей в стек на проверку
                stack.push([
                    pixel[0] - 1,
                    pixel[1]
                ]);
                stack.push([
                    pixel[0] + 1,
                    pixel[1]
                ]);
                stack.push([
                    pixel[0],
                    pixel[1] - 1
                ]);
                stack.push([
                    pixel[0],
                    pixel[1] + 1
                ]);
            }
        }
        ctx.putImageData(imageData, 0, 0);
    };

    var onCopyRand = function () {
        //Сохраняем все координаты в массив
        ppts.push({x: mouse.x, y: mouse.y});
        tmp_ctx.globalAlpha = 1;
        tmp_ctx.strokeStyle = 'black';
        tmp_ctx.lineWidth = 2;
        if (ppts.length < 3) {
            var b = ppts[0];
            tmp_ctx.beginPath();
            tmp_ctx.arc(b.x, b.y, tmp_ctx.lineWidth / 2, 0, Math.PI * 2, !0);
            tmp_ctx.fill();
            tmp_ctx.closePath();

            return;
        }

        //Всегда очищаем временную область перед отрисовкой
        tmp_ctx.clearRect(0, 0, tmp_canvas.width, tmp_canvas.height);

        tmp_ctx.beginPath();
        tmp_ctx.moveTo(ppts[0].x, ppts[0].y);

        for (var i = 1; i < ppts.length - 2; i++) {
            var c = (ppts[i].x + ppts[i + 1].x) / 2;
            var d = (ppts[i].y + ppts[i + 1].y) / 2;

            tmp_ctx.quadraticCurveTo(ppts[i].x, ppts[i].y, c, d);
        }

        //Для последних двух точек
        tmp_ctx.quadraticCurveTo(
            ppts[i].x,
            ppts[i].y,
            ppts[i + 1].x,
            ppts[i + 1].y
        );
        tmp_ctx.stroke();
        xcopy = ppts[i + 1].x;
        ycopy = ppts[i + 1].y;
    };

    var pasteRand = function (imgDataRand) {
        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        console.log("imgData = ", imgDataRand);
        var width = imageData.width;
        var height = imageData.height;
        var stack = [[xForCopy, yForCopy]];
        console.log("xForCopy = ", xForCopy);
        console.log("yForCopy = ", yForCopy);
        var dx = xForCopy - mouse.x;
        var dy = yForCopy - mouse.y;
        var point2 = yForCopy * 4 * width + xForCopy * 4 + 3;
        console.log("point2 = ", point2);
        console.log("data[point2] = ", imgDataRand.data[point2]);
        var pixel;
        var point = 0;
        var point1 = 0;

        while (stack.length > 0) {
            pixel = stack.pop();


            if (pixel[0] < 0 || pixel[0] >= width)
                continue;
            if (pixel[1] < 0 || pixel[1] >= height)
                continue;

            point = pixel[1] * 4 * width + pixel[0] * 4 + 3;
            point1 = (pixel[1] - dy) * 4 * width + (pixel[0] - dx) * 4 + 3;
            // Если это не рамка и ещё не закрасили
            if (imgDataRand.data[point] != 255 && imgDataRand.data[point] < 1) {
                // Устанасливаем какие уже проверили
                if (imgDataRand.data[point] == 0) {
                    imgDataRand.data[point] = 2;
                }
                //копируем данные на основной холст
                imageData.data[point1] = imgCopyRandMain.data[point];
                imageData.data[point1 - 1] = imgCopyRandMain.data[point - 1];
                imageData.data[point1 - 2] = imgCopyRandMain.data[point - 2];
                imageData.data[point1 - 3] = imgCopyRandMain.data[point - 3];

                // Ставим соседей в стек на проверку
                stack.push([
                    pixel[0] - 1,
                    pixel[1]
                ]);
                stack.push([
                    pixel[0] + 1,
                    pixel[1]
                ]);
                stack.push([
                    pixel[0],
                    pixel[1] - 1
                ]);
                stack.push([
                    pixel[0],
                    pixel[1] + 1
                ]);
            }
        }

        ctx.putImageData(imageData, 0, 0);
    };

    var hexToRgb = function (hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    };


    var onPaint = function () {

        if (tool == 'brush') {
            onPaintBrush();
        }

        else if (tool == 'circle') {
            onPaintCircle();
        }

        else if (tool == 'line') {
            onPaintLine();
        }

        else if (tool == 'rectangle') {
            onPaintRect();
        }

        else if (tool == 'ellipse') {
            drawEllipse(tmp_ctx);
        }


        else if (tool == 'eraser') {
            onErase();
        }

        else if (tool == 'spray') {
            generateSprayParticles();
        }
        else if (tool == 'copy') {
            onCopy();
        }
        else if (tool == 'text') {
            onText();
        }
        else if (tool == 'fill') {
            onFill(alpha);
        }
        else if (tool == 'copyrand') {
            onCopyRand();
        }
        else if (tool == 'no') {

        }

    };
});
</script>