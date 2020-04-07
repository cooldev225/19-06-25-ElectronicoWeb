
<div class="form-group">
	<div class="col-sm-6">
		<div><image src="<?php if($record['LENTE_OD_NS_PSC_IOL_CORT']=="")echo BASE_PATH."/uploads/OD-OS/-1-od.png";else echo $record['LENTE_OD_NS_PSC_IOL_CORT'];?>" style="width:380px;height:250px;"></div>
	</div>
	<div class="col-sm-6">
		<textarea placeholder="OD DESCRIPTION" class="form-control pull-right" style="height: 250px;" id="FONDO_DE_OJO_OD_DETAIL" name="FONDO_DE_OJO_OD_DETAIL"><?php echo $record['FONDO_DE_OJO_OD_DETAIL'];?></textarea>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-6">
		<div><image src="<?php if($record['LENTE_OS_NS_PSC_IOL_CORT']=="")echo BASE_PATH."/uploads/OD-OS/-1-os.png";else echo $record['LENTE_OS_NS_PSC_IOL_CORT'];?>" style="width:380px;height:250px;"></div>
	</div>
	<div class="col-sm-6">
		<textarea placeholder="OS DESCRIPTION" class="form-control pull-right" style="height: 250px;" id="FONDO_DE_OJO_OS_DETAIL" name="FONDO_DE_OJO_OS_DETAIL"><?php echo $record['FONDO_DE_OJO_OS_DETAIL'];?></textarea>
	</div>
</div>