
		<div class="form-group">
			<label class="col-sm-9 control-label"></label>
			<label class="col-sm-1 control-label">FECHA:<font style="color:red;">*</font></label>
			<div class="col-sm-2">
				<input type="text" class="form-control pull-right" id="FECHA" name="FECHA" value="<?php echo $record['FECHA'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">NOMBRE<font style="color:red;">*</font></label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="NOMBRE" name="NOMBRE" value="<?php echo $record['NOMBRE'];?>">
			</div>
			<label class="col-sm-2 control-label">MEDICO<font style="color:red;">*</font></label>
			<div class="col-sm-5">
				<input type="text" class="form-control pull-right" id="MEDICO" name="MEDICO" value="<?php echo $record['MEDICO'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<label class="col-sm-1 control-label">EDAD</label>
			<div class="col-sm-2">
				<input type="text" class="form-control pull-right" id="EDAD" name="EDAD" value="<?php echo $record['EDAD'];?>">
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-1 control-label">FN</label>
			<div class="col-sm-2">
				<input type="text" class="form-control pull-right" id="FN" name="FN" value="<?php echo $record['FN'];?>">
			</div>
			<label class="col-sm-1 control-label">TEL</label>
			<div class="col-sm-2">
				<input type="text" class="form-control pull-right" id="TEL" name="TEL" value="<?php echo $record['TEL'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">MOTIVO DE CONSULTA</label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="MOTIVO_DE_CONSULTA" name="MOTIVO_DE_CONSULTA" value="<?php echo $record['MOTIVO_DE_CONSULTA'];?>">
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-1 control-label">DIABETES</label>
			<div class="col-sm-1">
				<!--input type="text" class="form-control pull-right" id="DIABETES" name="DIABETES" value="<?php echo $record['DIABETES'];?>"-->
				<input type="checkbox" class="flat-red" id="DIABETES" name="DIABETES" <?php if($record['DIABETES']=="true")echo " checked";else "";?>>
			</div>
			<label class="col-sm-1 control-label">DURACION</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="DURACION" name="DURACION" value="<?php echo $record['DURACION'];?>">
			</div>
			<label class="col-sm-1 control-label">IDDM</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="IDDM" name="IDDM" value="<?php echo $record['IDDM'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">PEEA</label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="PEEA" name="PEEA" value="<?php echo $record['PEEA'];?>">
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-1 control-label">FBS</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="FBS" name="FBS" value="<?php echo $record['FBS'];?>">
			</div>
			<label class="col-sm-1 control-label">HIPERTENCION</label>
			<div class="col-sm-1">
				<!--input type="text" class="form-control pull-right" id="HIPERTENCION" name="HIPERTENCION" value="<?php echo $record['HIPERTENCION'];?>"-->
				<input type="checkbox" class="flat-red" id="HIPERTENCION" name="HIPERTENCION" <?php if($record['HIPERTENCION']=="true")echo " checked";else "";?>>
			</div>
			<label class="col-sm-1 control-label">DURACION</label>
			<div class="col-sm-1">
				<input type="text" class="form-control pull-right" id="DURACION1" name="DURACION1" value="<?php echo $record['DURACION1'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">APN</label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="APN" name="APN" value="<?php echo $record['APN'];?>">
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-2 control-label">CARDIOLOGIA</label>
			<div class="col-sm-1">
				<!--input type="text" class="form-control pull-right" id="CARDIOLOGIA" name="CARDIOLOGIA" value="<?php echo $record['CARDIOLOGIA'];?>"-->
				<input type="checkbox" class="flat-red" id="CARDIOLOGIA" name="CARDIOLOGIA" <?php if($record['CARDIOLOGIA']=="true")echo " checked";else "";?>>
			</div>
			<label class="col-sm-2 control-label">PULMONAR</label>
			<div class="col-sm-1">
				<!--input type="text" class="form-control pull-right" id="PULMONAR" name="PULMONAR" value="<?php echo $record['PULMONAR'];?>"-->
				<input type="checkbox" class="flat-red" id="PULMONAR" name="PULMONAR" <?php if($record['PULMONAR']=="true")echo " checked";else "";?>>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">APP</label>
			<div class="col-sm-3">
				<input type="text" class="form-control pull-right" id="APP" name="APP" value="<?php echo $record['APP'];?>">
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-2 control-label">ALERGIAS A MEDIC</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-right" id="ALERGIAS_A_MEDIC" name="ALERGIAS_A_MEDIC" value="<?php echo $record['ALERGIAS_A_MEDIC'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-5 control-label">MEDICAMENTOS ACTUALES</label>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-2 control-label">OTROS</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-right" id="OTROS" name="OTROS" value="<?php echo $record['OTROS'];?>">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-5">
				<input type="text" class="form-control pull-right" id="MEDICAMENTOS_ACTUALES" name="MEDICAMENTOS_ACTUALES" value="<?php echo $record['MEDICAMENTOS_ACTUALES'];?>">
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-2 control-label">SUGERENCIAS</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-right" id="SUGERENCIAS" name="SUGERENCIAS" value="<?php echo $record['SUGERENCIAS'];?>">
			</div>
		</div>
		<?php $arr1234=explode("@","N.P.L@P.L@M.M@C.D.30cms,C.D.1mt@C.D.2mts@C.D.3mts@20/400@20/200@20/100@20/80@20/70@20/60@20/50@20/40@20/30@20/25@20/20");?>
		<div class="form-group">
			<label class="col-sm-2 control-label">AVCC, SC OD</label>
			<div class="col-sm-2">
				<!--input type="text" class="form-control pull-right" id="AVCC_SC_OD" name="AVCC_SC_OD" value="<?php echo $record['AVCC_SC_OD'];?>"-->
				<select  class="form-control select2" id="AVCC_SC_OD" name="AVCC_SC_OD" onchange="save_data(1);">
				    <?php foreach($arr1234 as $v)echo "<option ".($v==$record['AVCC_SC_OD']?" selected":"").">{$v}</option>";?>
				</select>
			</div>
			<label class="col-sm-1 control-label">PH</label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="AVCC_SC_PH" name="AVCC_SC_PH" value="<?php echo $record['AVCC_SC_PH'];?>">-->
				<select  class="form-control select2" id="AVCC_SC_PH" name="AVCC_SC_PH" onchange="save_data(1);">
				    <?php foreach($arr1234 as $v)echo "<option ".($v==$record['AVCC_SC_PH']?" selected":"").">{$v}</option>";?>
				</select>
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-1 control-label">PIO OD</label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="PIO_OD_TIEMO" name="PIO_OD_TIEMO" value="<?php echo $record['PIO_OD_TIEMO'];?>">-->
				<select  class="form-control select2" id="PIO_OD_TIEMO" name="PIO_OD_TIEMO" onchange="save_data(1);">
				    <?php for($vi=0;$vi<61;$vi++){$v="Del {$vi} mmHg";echo "<option ".($v==$record['PIO_OD_TIEMO']?" selected":"").">{$v}</option>";}?>
				</select>
			</div>
			<!--<label class="col-sm-1 control-label"><!--TIEMO></label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="PIO_OD_CVF" name="PIO_OD_CVF" value="<?php echo $record['PIO_OD_CVF'];?>">
			</div>-->
			<label class="col-sm-1 control-label"><!--CVF--></label>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">OS</label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="AVCC_SC_OS" name="AVCC_SC_OS" value="<?php echo $record['AVCC_SC_OS'];?>">-->
				<select  class="form-control select2" id="AVCC_SC_OS" name="AVCC_SC_OS" onchange="save_data(1);">
				    <?php foreach($arr1234 as $v)echo "<option ".($v==$record['AVCC_SC_OS']?" selected":"").">{$v}</option>";?>
				</select>
			</div>
			<label class="col-sm-1 control-label">PH</label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="AVCC_SC_SPH" name="AVCC_SC_SPH" value="<?php echo $record['AVCC_SC_SPH'];?>">-->
				<select  class="form-control select2" id="AVCC_SC_SPH" name="AVCC_SC_SPH" onchange="save_data(1);">
				    <?php foreach($arr1234 as $v)echo "<option ".($v==$record['AVCC_SC_SPH']?" selected":"").">{$v}</option>";?>
				</select>
			</div>
			<label class="col-sm-1 control-label"></label>
			<label class="col-sm-1 control-label">OS</label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="PIO_OS_TIEMO" name="PIO_OS_TIEMO" value="<?php echo $record['PIO_OS_TIEMO'];?>">-->
				<select  class="form-control select2" id="PIO_OS_TIEMO" name="PIO_OS_TIEMO" onchange="save_data(1);">
				    <?php for($vi=0;$vi<61;$vi++){$v="Del {$vi} mmHg";echo "<option ".($v==$record['PIO_OS_TIEMO']?" selected":"").">{$v}</option>";}?>
				</select>
			</div>
			<!--<label class="col-sm-1 control-label"><!--TIEMO-</label>
			<div class="col-sm-2">
				<!--<input type="text" class="form-control pull-right" id="PIO_OS_CVF" name="PIO_OS_CVF" value="<?php echo $record['PIO_OS_CVF'];?>">-
			</div>-->
			<label class="col-sm-1 control-label"><!--CVF--></label>
		</div>
