
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
      <div class="form-group">
            <label class="col-sm-6 control-label" id="page_title" style="font-size: 26px;font-weight: 500;">
                    <?php if($record['idx']>0) echo"RECORD-<font style=\"color:red;\">{$record['idx']}</font> Editar Página";else echo "Agregar Nueva Registro Página";?>
            </label>
        	<div class="col-sm-3" style="text-align:right;">
                Agresión:&nbsp;
                <label>
                    SI<input type="radio" id="_AGRESS" name="r31" class="flat-red" <?php if($record['_AGRESS']=="true")echo " checked";?>>
                </label>
                <label>
                    NO<input type="radio" id="_AGRESS_no" name="r31" class="flat-red" <?php if($record['_AGRESS']=="false")echo " checked";?>>
                </label>
                
            </div>
            <div class="col-sm-3" style="text-align:right;">
                <button class="btn btn-block btn-info" style="width: 150px;" onclick="save_data(0);" ><?php if($record['idx']==-1)echo "Añadir nuevo";else echo "Añadir duplicación";?></button>
            </div>
            <form action="addnew" method="get" id="refreshfrm">
            <input type="hidden" id="idx" name="idx" value="<?php echo $record['idx'];?>"/>
            </form>
        </div>
        </div>
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">ENCABEZAMIENTO</a></li>
			  <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">EXAMEN</a></li>
			  <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">DIAGNOSTICO</a></li>
			  <li><a href="#tab_4" data-toggle="tab" aria-expanded="false">FONDO DE OJO</a></li>
			  <li><a href="#tab_5" data-toggle="tab" aria-expanded="false">PIE DE PÁGINA</a></li>
			</ul>
            <div class="tab-content">
                <?php 
					for($i=1;$i<=5;$i++){
						echo "<div class=\"tab-pane ".($i==1?"active":"")."\" id=\"tab_{$i}\">";                   
							echo "<form class=\"form-horizontal\" method=\"post\" id=\"save_frm\">";
								require_once("form_{$i}.php");
							echo "</form>";
						echo "</div>";
					}
				?>
            </div>
        </div>
        
    </section>
</div>
<script>
    var _ids=new Array(5);
    var ids_str="_AGRESS,";
    _ids[0]="FECHA,NOMBRE,MEDICO,EDAD,FN,TEL,MOTIVO_DE_CONSULTA,DIABETES,DURACION,"
                +"IDDM,PEEA,FBS,HIPERTENCION,DURACION1,APN,CARDIOLOGIA,PULMONAR,APP,"
                +"ALERGIAS_A_MEDIC,MEDICAMENTOS_ACTUALES,OTROS,SUGERENCIAS,"
                +"AVCC_SC_OD,AVCC_SC_PH,PIO_OD_TIEMO,AVCC_SC_OS,AVCC_SC_SPH,PIO_OS_TIEMO";//,PIO_OS_CVF,PIO_OD_CVF
                ids_str+=_ids[0];
    _ids[1]="EXTERIORES,REACCION_NORMAL_MED,ULL_PUPILAS_OD,ULL_PUPILAS_MM,ULL_PUPILAS_OS,ULL_PUPILAS_SMM,"
                +"OD_NS,OD_PSC,OD_IOL,OD_COST,OS_NS,OS_PSC,OS_IOL,OS_COST,"
                +"_AM_PM,_CM,_NEO,ADENEXA,_C,CONJUNTIVA,_M,CORNEA,_N_M,CAMARA_ANTERIOR,"//,L_DE_H_N_DE_E,E_N_DE_L_DE_H
                +"IRIS,LENTE,INICIALES,"//_IRIS,LENTE_OD_NS_PSC_IOL_CORT,LENTE_OS_NS_PSC_IOL_CORT
                +"INICIALES_FONDO_C_D,"//INICIALES_FONDO,INICIALES_SEGMENTO,INICIALES_FONDO_ONH
                +"INICIALES_SEGMENTO_C_D,INICIALES_FONDO_VASOS,"//INICIALES_FONDO_NFL,INICIALES_SEGMENTO_ONH
                +"INICIALES_SEGMENTO_VASOS";//INICIALES_SEGMENTO_NFL
                ids_str+=","+_ids[1];
    _ids[2]="DIAGNOSTICO,PLAN";ids_str+=","+_ids[2];
    _ids[3]="FONDO_DE_OJO_OD_DETAIL,FONDO_DE_OJO_OS_DETAIL";ids_str+=","+_ids[3];
    _ids[4]="O_FA,O_POTOS,O_B_SCAN,O_HVF,O_OCT,_DX_DEBATIDAS,_IMPORTANCIA_DEL_SEGIMIENTO,_RIESGO_FACTOR_DE_REDUCCCION,"
                +"_PT_FAM_EDU,_DIETA_RECOMENDADA,_FOLLETO,_EXPLICACION_DE_MEDICAMENTOS,_HIGIENE_DE_PARPADOS,"
                +"_RIESGO_BENEFICIO_ALTERNATIVA,_PT,_FAM,_PT_FAM,_RETORNO,_REVISION,_MOTIVO,_DICTADO_SI,"
                +"_DICTADO_NO,_MEDICO_RESPONSABLE,_CED_DE_ESP";
                ids_str+=","+_ids[4];
    var controls=ids_str.split(",");
    var controls_val=new Array(controls.length);
    function save_data(f){//alert();
        var data=new Object();
        for(var i=0;i<controls.length;i++){
            if($("#"+controls[i]).attr('type')=='text')
                data[controls[i]]=$("#"+controls[i]).val();
            else if($("#"+controls[i]).attr('type')=='textarea')
                data[controls[i]]=$("#"+controls[i]).html();
            else if($("#"+controls[i]).attr('type')=='checkbox'||$("#"+controls[i]).attr('type')=='radio')
                {data[controls[i]]=$("#"+controls[i]).is(':checked');}
            else
                data[controls[i]]=$("#"+controls[i]).val();
        }
        data['idx']=$("#idx").val();
        data['flag']=f%2;
        if(f/2>0){
            var canvas=document.querySelector('#paint');
            //var ctx = canvas.getContext("2d");//LENTE_OS_NS_PSC_IOL_CORT
            //data['LENTE_OD_NS_PSC_IOL_CORT']=ctx.getImageData(0, 0,10,10);
            if(f==3)data['LENTE_OD_NS_PSC_IOL_CORT']=canvas.toDataURL();
            else    data['LENTE_OS_NS_PSC_IOL_CORT']=canvas.toDataURL();
            //alert(data['LENTE_OD_NS_PSC_IOL_CORT']);
        }
        res = $.ajax({
            url: "saverecord",
            type: 'post',
            data: data,
            dataType: "json",
            success: function( idx ) {
                if(f==0){
                    $('#idx').val(idx);
                    $('#refreshfrm').submit();
                }
            },
            error: function(idx) {
                if(f==0){
                    $('#idx').val(idx);
                    $('#refreshfrm').submit();
                }
            }
        });
    }
    var focusObjId="";
	$(document).ready(function(){
	                /*$("input").keyup(function (event) {
                            if (event.keyCode==13) {
                              if ($(this).length)
                                  $(this).next('input').focus();
                                  
                              else
                                  $(this).blur();
                            }
                        });*/
        $('#FECHA').datepicker({
          autoclose: true,
          timePicker: true,
          format: 'yyyy-mm-dd' 
        });
        $('#AVCC_SC_OD').select2();
        $('#AVCC_SC_PH').select2();
        $('#PIO_OD_TIEMO').select2();
        $('#AVCC_SC_OS').select2();
        $('#AVCC_SC_SPH').select2();
        $('#PIO_OS_TIEMO').select2();
        $('#OD_NS').select2();
        $('#OD_PSC').select2();
        $('#OD_IOL').select2();
        $('#OD_COST').select2();
        $('#OS_NS').select2();
        $('#OS_PSC').select2();
        $('#OS_IOL').select2();
        $('#OS_COST').select2();
	    var obj,tys;
	    for(var i=0;i<controls.length;i++){
    	    obj=$("#"+controls[i]); 
    	    controls_val[i]=obj.val();
    	    obj.keyup(function (event,i) {
                if (event.keyCode==13) {
                  if($(this).val()!=""&&$(this).attr('type')=='text'){
                     for(var i=0;i<controls.length;i++){
                        if($(this).attr('id')==controls[i]){
                            $("#"+controls[(i+1)%controls.length]).focus();
                            break;
                        }
                     }
                  }
                }
            });
            //tys=obj.attr('type');
            //if(tys=='text'){
                
            //}
	    }
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })
    });
    
    
    for(var i=0;i<controls.length;i++){
    if($('#'+controls[i]).attr('type')=='text'||$('#'+controls[i]).attr('type')=='textarea'){
    $(document).on('blur','#'+controls[i],function() {
        for(var i=0;i<controls.length;i++){
            if($(this).attr('id')==controls[i]){//alert($(this).attr('type'));
                if($(this).attr('type')=='text'){
                    if($(this).val()!=controls_val[i]){
                        save_data(1);
                        controls_val[i]=$(this).val();
                    }  
                }else if($(this).attr('type')=='textarea'){
                    if($(this).html()!=controls_val[i]){
                        save_data(1);
                        controls_val[i]=$(this).html();
                    }  
                }else{
                    if($(this).val()!=controls_val[i]){
                        //alert('>>>'+controls_val[i]+","+$(this).val());
                        save_data(1);
                        controls_val[i]=$(this).val();
                    }
                } 
                break;
            }
        }
    });
    }else if($('#'+controls[i]).attr('type')=='checkbox'||$('#'+controls[i]).attr('type')=='radio'){
    $('#'+controls[i]).on('ifChecked', function(event){
        //alert($(this).is(':checked'));
        save_data(1);
    });
    $('#'+controls[i]).on('ifUnchecked', function(event){
        //alert($(this).is(':checked'));
        save_data(1);
    });
    }else if($('#'+controls[i]).attr('type')=='select'){
    $('#'+controls[i]).on('change', function(event){
        alert($(this).val());
        save_data(1);
    });
    }
    }
</script>