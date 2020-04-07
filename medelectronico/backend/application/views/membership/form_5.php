<div class="form-group">
	<label class="col-sm-12 control-label">
		<input type="checkbox" class="flat-red" id="O_FA" name="O_FA" <?php if($record['O_FA']=="true")echo " checked";?>>&nbsp;FA&nbsp;&nbsp;&nbsp;
        <input type="checkbox" class="flat-red" id="O_POTOS" name="O_POTOS" <?php if($record['O_POTOS']=="true")echo " checked";?>>&nbsp;FOTOS&nbsp;&nbsp;&nbsp;
		<input type="checkbox" class="flat-red" id="O_B_SCAN" name="O_B_SCAN" <?php if($record['O_B_SCAN']=="true")echo " checked";?>>&nbsp;B-SCAN&nbsp;&nbsp;&nbsp;
		<input type="checkbox" class="flat-red" id="O_HVF" name="O_HVF" <?php if($record['O_HVF']=="true")echo " checked";?>>&nbsp;HVF&nbsp;&nbsp;&nbsp;
		<input type="checkbox" class="flat-red" id="O_OCT" name="O_OCT" <?php if($record['O_OCT']=="true")echo " checked";?>>&nbsp;OCT&nbsp;&nbsp;&nbsp;
	</label>
</div>
<div class="form-group">
	<div class="col-sm-6">
		<input type="text" class="form-control pull-right" id="_DX_DEBATIDAS" name="_DX_DEBATIDAS" value="<?php echo $record['_DX_DEBATIDAS'];?>" placeholder="DX DEBATIDAS">
	</div>
	<div class="col-sm-6">
		<input type="text" class="form-control pull-right" id="_IMPORTANCIA_DEL_SEGIMIENTO" name="_IMPORTANCIA_DEL_SEGIMIENTO" value="<?php echo $record['_IMPORTANCIA_DEL_SEGIMIENTO'];?>" placeholder="IMPORTANCIA DEL SEGIMIENTO">
	</div>
</div>
<div class="form-group">
	<div class="col-sm-5">
		<input type="text" class="form-control pull-right" id="_RIESGO_FACTOR_DE_REDUCCCION" name="_RIESGO_FACTOR_DE_REDUCCCION" value="<?php echo $record['_RIESGO_FACTOR_DE_REDUCCCION'];?>" placeholder="RIESGO FACTOR DE REDUCCCION">
	</div>
	<div class="col-sm-3">
		<input type="text" class="form-control pull-right" id="_PT_FAM_EDU" name="_PT_FAM_EDU" value="<?php echo $record['_PT_FAM_EDU'];?>" placeholder="PT& FAM EDU">
	</div>
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_DIETA_RECOMENDADA" name="_DIETA_RECOMENDADA" value="<?php echo $record['_DIETA_RECOMENDADA'];?>" placeholder="DIETA RECOMENDADA">
	</div>
</div>
<div class="form-group">
	<div class="col-sm-6">
		<input type="text" class="form-control pull-right" id="_FOLLETO" name="_FOLLETO" value="<?php echo $record['_FOLLETO'];?>" placeholder="FOLLETO">
	</div>
	<div class="col-sm-6">
		<input type="text" class="form-control pull-right" id="_EXPLICACION_DE_MEDICAMENTOS" name="_EXPLICACION_DE_MEDICAMENTOS" value="<?php echo $record['_EXPLICACION_DE_MEDICAMENTOS'];?>" placeholder="EXPLICACION DE MEDICAMENTOS">
	</div>
</div>
<div class="form-group">
	<div class="col-sm-6">
		<input type="text" class="form-control pull-right" id="_HIGIENE_DE_PARPADOS" name="_HIGIENE_DE_PARPADOS" value="<?php echo $record['_HIGIENE_DE_PARPADOS'];?>" placeholder="HIGIENE DE PARPADOS">
	</div>
	<div class="col-sm-6">
		<input type="text" class="form-control pull-right" id="_RIESGO_BENEFICIO_ALTERNATIVA" name="_RIESGO_BENEFICIO_ALTERNATIVA" value="<?php echo $record['_RIESGO_BENEFICIO_ALTERNATIVA'];?>" placeholder="RIESGO BENEFICIO ALTERNATIVA">
	</div>
</div>
<div class="form-group">
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_PT" name="_PT" value="<?php echo $record['_PT'];?>" placeholder="PT">
	</div>
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_FAM" name="_FAM" value="<?php echo $record['_FAM'];?>" placeholder="FAM">
	</div>
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_PT_FAM" name="_PT_FAM" value="<?php echo $record['_PT_FAM'];?>" placeholder="PT/FAM">
	</div>
</div>
<div class="form-group">
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_RETORNO" name="_RETORNO" value="<?php echo $record['_RETORNO'];?>" placeholder="RETORNO">
	</div>
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_REVISION" name="_REVISION" value="<?php echo $record['_REVISION'];?>" placeholder="REVISION">
	</div>
	<div class="col-sm-4">
		<input type="text" class="form-control pull-right" id="_MOTIVO" name="_MOTIVO" value="<?php echo $record['_MOTIVO'];?>" placeholder="MOTIVO">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label">DICTADO&nbsp;&nbsp;&nbsp;
		<input type="checkbox" class="flat-red" id="_DICTADO_SI" name="_DICTADO_SI" <?php if($record['_DICTADO_SI']=="true")echo " checked";?>>&nbsp;SI&nbsp;&nbsp;&nbsp;
        <input type="checkbox" class="flat-red" id="_DICTADO_NO" name="_DICTADO_NO" <?php if($record['_DICTADO_NO']=="true")echo " checked";?>>&nbsp;NO&nbsp;&nbsp;&nbsp;
	</label>
	<div class="col-sm-8">
		<input type="text" class="form-control pull-right" id="_MEDICO_RESPONSABLE" name="_MEDICO_RESPONSABLE" value="<?php echo $record['_MEDICO_RESPONSABLE'];?>" placeholder="MEDICO RESPONSABLE">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" style="text-align:left;">expediente:<?php echo $record['_DICTADO_FILE'];?></label>
	<div class="col-sm-2">
		<input type="file" value="ff" class="form-control pull-right"/>
	</div>
	<label class="col-sm-8 control-label" style="text-align:left;"></label>	
</div>
<div class="form-group">
	<label class="col-sm-5 control-label"></label>
	<label class="col-sm-2 control-label">CED DE ESP</label>
	<div class="col-sm-5">
		<input type="text" class="form-control pull-right" id="_CED_DE_ESP" name="_CED_DE_ESP" value="<?php echo $record['_CED_DE_ESP'];?>" placeholder="MEDICO RESPONSABLE">
	</div>
</div>