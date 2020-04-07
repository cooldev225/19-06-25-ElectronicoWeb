<script>
    var init_radio=new Array();i=1;
<?php 
    for($i=1;$i<6;$i++){?>
    init_radio[i]="<?php echo $sessiondata['quiz'.$i.'x'];?>";
    i++;
<?php }?>

</script>
<style>.box {margin-bottom:0px;}</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php echo "<font stype='font-weight:bold;'>".$_user_location."</font>";?> Daily Game Plan
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <form class="form-horizontal" method="post" action="index" id="refresh_frm">
                <input type="hidden" name="session_prev_id" id="session_prev_id" value="<?php echo $sessionprevid;?>"/>
				<input type="hidden" name="fixed_studentid" id="fixed_studentid"/>
				<input type="hidden" name="fixed_datex" id="fixed_datex"/>
                <input type="hidden" name="session_id" id="session_id" value="<?php echo $sessionid;?>"/>
                <input type="hidden" name="session_next_id" id="session_next_id" value="<?php echo $sessionnextid;?>"/>
                
            </form>
            <div class="modal modal-primary fade" id="modal-success">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">TODAY'S SESSION REPORT</h4>
                        <input type="hidden" id="instructor_name" value="<?php if(isset($sessiondata['instructorx']))echo $sessiondata['instructorx']?>"/>
                        <input type="hidden" id="reporting_name"/>
                        <input type="hidden" id="reporting_mail"/>
                        <input type="hidden" id="reporting_pnum"/>
						
						<input type="hidden" id="internal_email" value="<?php echo $internal_email;?>"/>
                        <input type="hidden" id="msg_session_body" value="<?php for($i=0;$i<count($templatedata);$i++)if($templatedata[$i]['typex']==4){echo $templatedata[$i]['textx'];break;}?>"/>
                        <input type="hidden" id="sms_session_body" value="<?php for($i=0;$i<count($templatedata);$i++)if($templatedata[$i]['typex']==1){echo $templatedata[$i]['textx'];break;}?>"/>
						<input type="hidden" id="msg_homework_body" value="<?php for($i=0;$i<count($templatedata);$i++)if($templatedata[$i]['typex']==5){echo $templatedata[$i]['textx'];break;}?>"/>
                        <input type="hidden" id="sms_homework_body" value="<?php for($i=0;$i<count($templatedata);$i++)if($templatedata[$i]['typex']==2){echo $templatedata[$i]['textx'];break;}?>"/>
						<input type="hidden" id="msg_internal_body" value="<?php for($i=0;$i<count($templatedata);$i++)if($templatedata[$i]['typex']==6){echo $templatedata[$i]['textx'];break;}?>"/>
                    </div>
                    <div class="modal-body" id="session_message_body">
                        <p>Please save courrent data.&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">CLOSE</button>
                        <div id="session_sending_btn"><button type="button" name="sendingBtn" class="btn btn-outline" onclick="sendingProcess(1);">SEND</button></div>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal modal-info fade" id="modal-center">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">INTERAL MAIL</h4>
						<?php
						$html="<select onchange=\"\" class=\"form-control select2\" style=\"width:400px;\" name=\"dropimtemp\" id=\"dropimtemp\">";
							foreach($templatedata as $r){
								if($r['typex']==7)$html.="<option>{$r['textx']}</option>";
							}
						$html.="</select>";
						$html.="<button type=\"button\" onclick=\"dropimtempadd();\" class=\"btn btn-outline pull-left\">add</button>";
						$html.="<button type=\"button\" onclick=\"dropimtempdelete();\" class=\"btn btn-outline pull-left\">delete</button>";
						echo $html;
					?>
                    </div>
                    <div class="modal-body" id="center_message_body">
                        <p>Please save courrent data.&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">CLOSE</button>
                        <div id="center_sending_btn"><button type="button" name="sendingBtn" class="btn btn-outline" onclick="sendingProcess(3);">SEND</button></div>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal modal-success fade" id="modal-homework">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">HOMEWORK</h4>
						
                    </div>
					
                    <div class="modal-body" id="homework_message_body">
                        <p>Please save courrent data.&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">CLOSE</button>
                        <div id="homework_sending_btn"><button type="button"  name="sendingBtn" class="btn btn-outline" onclick="sendingProcess(2);">SEND</button></div>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <form class="form-horizontal" method="post" id="save_frm">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button" onclick="$('#session_id').val($('#session_prev_id').val());$('#refresh_frm').submit();" class="btn btn-info pull-left" <?php if($sessionprevid<0)echo "disabled";?>><i class="fa fa-angle-double-left"></i> PREVIOUS </button>
                        </div>
                        <div class="col-sm-4">
                            <p class="text-aqua" style="width:100px; margin:auto;">SESSON <?php echo $currentsessionnum;//echo $sessionnumber;?></p>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" onclick="$('#session_id').val($('#session_next_id').val());$('#refresh_frm').submit();" class="btn btn-info pull-right" <?php if($sessionid<0&&$sessionnextid<0)echo "disabled";?>> NEXT <i class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Part1</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <!--button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button-->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Student Name<font style="color:red;">*</font></label>
                            <div class="col-sm-2">
                                <select id="part1_stdname" onchange="stdChangeAction();" class="form-control select2" style="width: 100%;">
                                <?php 
									$fff=0;$tt=0;
                                    foreach($studentdata as $row){
                                        if($fff==0&&$sessiondata['studentidx']==""){
											echo "<option selected=\"selected\"></option>";
											$fff=1;//$tt++;
										}
										
											if($sessiondata['studentidx']==$row['s_Id']){
												echo "<option selected=\"selected\">{$row['First_Name']}-{$row['Last_Name']}-{$row['s_Id']}";
												echo "</option>";//$tt++;
											}else{
												echo "<option>{$row['First_Name']}-{$row['Last_Name']}-{$row['s_Id']}";
												echo "</option>";$tt++;
											}
                                    }
                                ?>
                                </select>
                            </div>
                            
                            <label class="col-sm-2 control-label">Date<font style="color:red;">*</font></label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control pull-right" id="part1_date" value="<?php echo $sessiondata['datex'];?>">
							</div>
							<div class="col-sm-1">
                            	<button type="button" onclick="dateChangeAction();" class="btn btn-info pull-left" <?php if(!isset($sessiondata['studentidx']))echo "disabled";else if($sessiondata['studentidx']=='')echo "disabled";?>>New</button>
							</div>
                            <label class="col-sm-1 control-label">Time<font style="color:red;">*</font></label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control timepicker" style="    min-width: 88px;" id="part1_time" value="<?php echo $sessiondata['timex'];?>"><?php /*date_default_timezone_set('Africa/Lagos'); echo date("H:i a");*/?>
                            </div>
                        </div>
                        <div class="form-group" id="quiz1">
                            <label class="col-sm-4 control-label">DID YOU CHECK-IN / SCAN IN BAR CODE?<font style="color:red;">*</font></label>
                            <div class="col-sm-2" style="width: 140px;">
                                <label><?php //echo "<".$sessiondata['quiz1x'].",".$sessiondata['quiz2x'].",".$sessiondata['quiz3x'].",".$sessiondata['quiz4x'].",".$sessiondata['quiz5x'].">";?>
                                    YES<input type="radio" id="quiz1x1" name="r3" class="flat-red" <?php if($sessiondata['quiz1x']=="1")echo "value=\"on\" checked";else "value=\"off\"";?>>
                                </label>
                                <label>
                                    NO<input type="radio" id="quiz1x2" name="r3" class="flat-red" <?php if($sessiondata['quiz1x']=="0")echo "value=\"on\" checked";else "value=\"off\"";?>>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="quiz2">
                            <label class="col-sm-4 control-label">DO YOU NEED HELP FOR ANY UPCOMING TEST/QUIZ IN SCHOOL?<font style="color:red;">*</font></label>
                            <div class="col-sm-2" style="width: 140px;">
                                <label>
                                    YES<input type="radio" id="quiz2x1" name="r31" class="flat-red" <?php if($sessiondata['quiz2x']=="1")echo "value=\"on\" checked";else "value=\"off\"";?>>
                                </label>
                                <label>
                                    NO<input type="radio" id="quiz2x2" name="r31" class="flat-red" <?php if($sessiondata['quiz2x']=="0")echo "value=\"on\" checked";else "value=\"off\"";?>>
                                </label>
                            </div>
                            <label id="quiz2lab" class="col-sm-3 control-label" style=" <?php if(!$sessiondata['quiz2x'])echo "opacity:0.1;";?>">SCHOOL TEST/QUIZ TOPIC NAMES<font style="color:red;">*</font></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="quiz2txt" placeholder="TOPIC NAMES..." value="<?php echo $sessiondata['quiz1xx'];?>" style=" <?php if(!$sessiondata['quiz2x'])echo "opacity:0.1;";?>">
                            </div>
                        </div>
                        <div class="form-group" id="quiz3">
                            <label class="col-sm-4 control-label">DO YOU NEED HELP WITH ANY CURRENT SCHOOL TOPIC?<font style="color:red;">*</font></label>
                            <div class="col-sm-2" style="width: 140px;">
                                <label>
                                    YES<input type="radio" id="quiz3x1" name="r32" class="flat-red" <?php if($sessiondata['quiz3x']=="1")echo "checked";?>>
                                </label>
                                <label>
                                    NO<input type="radio" id="quiz3x2" name="r32" class="flat-red" <?php if($sessiondata['quiz3x']=="0")echo "checked";?>>
                                </label>
                            </div>
                            <label id="quiz3lab" class="col-sm-3 control-label" style=" <?php if(!$sessiondata['quiz3x'])echo "opacity:0.1;";?>">CURRENT SCHOOL TOPIC NAMES<font style="color:red;">*</font></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="quiz3txt" placeholder="TOPIC NAMES..."  value="<?php echo $sessiondata['quiz2xx'];?>" style=" <?php if(!$sessiondata['quiz3x'])echo "opacity:0.1;";?>">
                            </div>
                        </div>
                        <div class="form-group" id="quiz4">
                            <label class="col-sm-4 control-label">DID YOU BRING ANY HOMEWORK TO GET EXTRA HELP?<font style="color:red;">*</font></label>
                            <div class="col-sm-2" style="width: 140px;">
                                <label>
                                    YES<input type="radio" id="quiz4x1" name="r33" class="flat-red" <?php if($sessiondata['quiz4x']=="1")echo "checked";?>>
                                </label>
                                <label>
                                    NO<input type="radio" id="quiz4x2" name="r33" class="flat-red" <?php if($sessiondata['quiz4x']=="0")echo "checked";?>>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="quiz4lab1" class="col-sm-3 control-label" style=" <?php if(!$sessiondata['quiz4x'])echo "opacity:0.1;";?>">HOMEWORK START TIME<font style="color:red;">*</font></label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control timepicker" id="part1_starttime"  style=" min-width: 88px; <?php if(!$sessiondata['quiz4x'])echo "opacity:0.1;";?>"  value="<?php echo $sessiondata['quiz3xx'];?>"/>
                            </div>
                            <label id="quiz4lab2" class="col-sm-2 control-label" style="width: 140px;" style=" <?php if(!$sessiondata['quiz4x'])echo "opacity:0.1;";?>">END TIME<font style="color:red;">*</font></label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control timepicker" id="part1_endtime" style=" min-width: 88px;<?php if(!$sessiondata['quiz4x'])echo "opacity:0.1;";?>"  value="<?php echo $sessiondata['quiz4xx'];?>" />
                            </div>
                            <label id="quiz4lab3" class="col-sm-2 control-label" style=" <?php if(!$sessiondata['quiz4x'])echo "opacity:0.1;";?>">HOMEWORK TOPIC NAME<font style="color:red;">*</font></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="quiz4txt" style=" <?php if(!$sessiondata['quiz4x'])echo "opacity:0.1;";?>"  value="<?php echo $sessiondata['quiz5xx'];?>"  placeholder="TOPIC NAMES...">  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">CHECK-IN INSTRUCTOR NAME<font style="color:red;">*</font></label>
                            <div class="col-sm-1" style="width: 140px;">
                                <input type="text" class="form-control" id="part1_sign" placeholder="SIGN IN"  value="<?php echo $sessiondata['sign1x'];?>" >  
                            </div>
							<div class="col-sm-1" style="width: 140px;">
								<button type="button" class="btn btn-block btn-info" onclick="save_data(1);" >SAVE</button>
							</div>
						</div>
                    </div>
                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Part2</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <!--button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button-->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php for($i=0;$i<6;$i++){
                            $topic_arr=explode("@",$sessiondata['topic'.($i+1).'x']);    
                            if(count($topic_arr)<3)$topic_arr=array("","","");
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">WORKING ON TOPIC NUMBER(<?php echo $i+1;?>)<?php if(!$i)echo "<font style=\"color:red;\">*</font>";?></label>
                            <div class="col-sm-2">
                                <select id="part2_topic<?php echo $i+1;?>" class="form-control" style="width: 100%;">
                                    <?php 
                                        foreach($topickinddata as $row){
                                            if($topic_arr[0]=="")$topic_arr[0]=$row['kindx'];
                                            if($topic_arr[0]==$row['kindx']){
                                                echo "<option selected=\"selected\">{$row['kindx']}</option>";
                                            }else{
                                                echo "<option>{$row['kindx']}</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-1" style="width: 140px;">
                                <input type="text" onblur="part2_digit_blur_Action('<?php echo $i+1;?>')" class="form-control" id="part2_digit<?php echo $i+1;?>" value="<?php echo $topic_arr[1];?>" >   <!--data-inputmask="'mask': ['9999']" data-mask--> 
                            </div>
                            <label class="col-sm-2 control-label">COMPLETED PAGENUMBERS #</label>
                            <div class="col-sm-3">
                            <input type="text" onblur="part2_page_blur_Action('<?php echo $i+1;?>')" class="form-control" id="part2_page<?php echo $i+1;?>" value="<?php echo $topic_arr[2];?>">    
                            </div>
                        </div>
                        <?php }?>
                        <?php for($i=0;$i<6;$i++){?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php if(!$i)echo "COMMENTS BY INSTRUCTOR<font style=\"color:red;\">*</font>";?></label>
                            <div class="col-sm-8">
                                <select onchange="save_data(1);" id="comment<?php echo $i+1;?>" class="form-control select2" style="width: 100%;">
                                <?php 
                                    echo "<option></option>";
                                    foreach($templatedata as $row)if($row['typex']==0){
                                        //if($sessiondata['comment'.($i+1).'x']=="")$sessiondata['comment'.($i+1).'x']=$row['textx'];
                                        if($sessiondata['comment'.($i+1).'x']==$row['textx']){
                                            echo "<option selected=\"selected\">{$row['textx']}</option>";
                                        }else{
                                            echo "<option>{$row['textx']}</option>";
                                        }
                                    }
                                ?>
								</select>
							</div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Part3</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <!--button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button-->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="form-group">
                            <label class="col-sm-2 control-label">CHECK-OUT TIME<font style="color:red;">*</font></label>
                            <div class="col-sm-1">
								<input type="text" class="form-control timepicker" style="min-width: 88px;" id="part3_checktime" value="<?php echo $sessiondata['sign2x'];?>"/>
                            </div>
                            <label class="col-sm-7 control-label">REMINDER GIVEN TO STUDENT TO WAIT IN LOBBY & NOT TO GO OUTSIDE TILL YOU SEE YOUR GUARDIAN?<font style="color:red;">*</font></label>
                            <div class="col-sm-2">
                                <label>
                                    YES<input type="radio" id="quiz5x1" name="r34" class="flat-red" <?php if($sessiondata['quiz5x']=="1")echo "value=\"on\" checked";//else "value=\"off\"";?>>
                                </label>
                                <label>
                                    NO<input type="radio" id="quiz5x2" name="r34" class="flat-red" <?php if($sessiondata['quiz5x']=="0")echo "value=\"on\" checked";//else "value=\"off\"";?>>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">CHECK-OUT INSTRUCTOR NAME<font style="color:red;">*</font></label>
                            <div class="col-sm-2">
                            <input type="text" class="form-control timepicker" id="part3_sign"  placeholder="SIGN OUT" value="<?php echo $sessiondata['sign3x'];?>"/>
                            </div>
							<div class="col-sm-1" style="width: 140px;">
								<button type="button" class="btn btn-block btn-info" onclick="save_data(2);" >SAVE</button>
							</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-3">
                                <button type="button" onclick="sendSessionReportsAction();" data-toggle="modal" class="btn btn-block btn-primary " data-target="#modal-success">SEND TODAY'S SESSION REPORT</button>
                            </div>
                            <div class="col-sm-3">
                                <?php if($_user_sendable){?><button type="button" class="btn btn-block btn-success " onclick="sendHomeworkAction();" data-toggle="modal" data-target="#modal-homework">SEND HOMEWORK TO STUDENT</button><?php }?>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-block btn-info " onclick="sendCenterAction();" data-toggle="modal" data-target="#modal-center">SEND INTERNAL EMAIL TO CENTER</button>
                            </div>
							
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button" onclick="$('#session_id').val($('#session_prev_id').val());$('#refresh_frm').submit();" class="btn btn-info pull-left" <?php if($sessionprevid<0)echo "disabled";?>><i class="fa fa-angle-double-left"></i> PREVIOUS  </button>
                        </div>
                        <div class="col-sm-4">
                            <p class="text-aqua" style="width:100px; margin:auto;">SESSON <?php echo $currentsessionnum;?></p>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" onclick="$('#session_id').val($('#session_next_id').val());$('#refresh_frm').submit();" class="btn btn-info pull-right" <?php if($sessionid<0&&$sessionnextid<0)echo "disabled";?>> NEXT <i class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        
    </section>
</div>
<div id="ghostskin" style="    
    position: absolute;
    width: 449px;
    height: 60px;
    left: 924px;
    top: 313px;
    z-index: -10;
    background-color: white;
    opacity: 0.8;"></div>
<script src="<?php echo ASSET_PATH;?>pages/constants.js"></script>
<script src="<?php echo ASSET_PATH;?>pages/instructor/dailygame.js"></script>