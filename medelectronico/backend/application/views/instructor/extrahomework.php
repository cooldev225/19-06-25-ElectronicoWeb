<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php echo "<font stype='font-weight:bold;'>".$_user_location."</font>";?> Extra HomeWork 
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box box-info">
            <div class="row">
                <div class="col-sm-7">
					<div class="box-header">
                    <div class="box">
					</div>
                        <div class="box-body">
                            <table id="example1" width="100%" class="table table-bordered table">
                                <thead>
                                    <tr>
                                        <th>PK</th>
                                        <th>Description</th>
										<th>Hints</th>
                                        <th>Code</th>
										<th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
										$row="";
										foreach($ixldata as $r){
											$row.="<tr>";
											$row.="<td>{$r['pk']}</td>";
											$row.="<td>{$r['pk_descrip']}</td>";
											$row.="<td>{$r['Hints']}</td>";
											$row.="<td>{$r['ixl_pretty_code']}</td>";
											$row.="<td>{$r['ixl_URL']}</td>";
											$row.="</tr>";
										}
										
										echo $row;
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
                <div class="col-sm-5" style="border-left: 1px dashed" id="previewpanel">
					<div class="box">
						<div class="box-header">
							  <h3 class="box-title">EXTRA HOMEWORK
								<!--small>Simple and fast</small-->
							  </h3>
								
							<!--button type="button" data-toggle="modal" class="btn btn-block btn-primary " data-target="#modal-success">SEND TODAY'S SESSION REPORT</button-->
						
						  <!-- tools box -->
						  <div class="pull-right box-tools">
							<!--button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
									title="Remove">
							  <i class="fa fa-times"></i></button-->
							<DIV>
								<select class="form-control pull-right select2" name="student" id="student" style="width:160px;">
								    <option></option>
								<?php foreach($studentdata as $r){
										echo "<option  value=\"{$r['s_Id']}\">{$r['First_Name']}-{$r['Last_Name']}</option>";
								}?>
							</select>
							</div>
							
							</div>
						</div>
						<!-- /.box-header -->
							  
				  <div class="box-body pad"  style="min-height:400px;">
					  <form>
						<textarea id="body" class="textarea" placeholder="Place some text here" style="width: 100%; height:400px;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php
							foreach($templatedata as $r){
								if($r['typex']==8){
									echo str_replace("<br>","\n",$r['textx']);
									break;
								}
							}
						?>
						</textarea>
						<input type="text" id="checkoutname"/>
					  </form>
					</div>
					<button type="button" onclick="sendAction();" data-toggle="modal" class="btn btn-block btn-primary " data-target="#modal-success">SEND NOW</button>
				</div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo ASSET_PATH;?>pages/instructor/extrahomework.js"></script>