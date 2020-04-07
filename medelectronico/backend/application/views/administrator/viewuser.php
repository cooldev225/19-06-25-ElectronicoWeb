<script>
    function userAction(id,role){
        //alert(id+','+role);
        res = $.ajax({
            url: "setuser",
            type: 'post',
            data: {
                role:role,
                id:id
            },
            dataType: "json",
            success: function( data ) {
                
            },
            error: function(e) {
                
            }
        });
        location.href="index";
    }
</script>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php if($_user_name['role']>0) echo "<font stype='font-weight:bold;'>".$_user_name['center']."</font>";else echo "All Centers";?> View Users
 
      </h1>
      
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Instructors</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Parent</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Administrator</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Email</th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>State</th>
										<th>Register Date</th>
                                        <th>Action</th>
                                        <th>visited_count</th>
                                        <th>last_visited_time</th>
                                        <th>id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									foreach($instructordata as $row){
										echo "<tr>";
										echo "<td></td>";
										echo "<td>{$row['email']}</td>";
										echo "<td><input type='checkbox' onclick=\"iplockAction('{$row['id']}');\" " .($row['ip_lock']==1?"checked":""). "/></td>";
										echo "<td>{$row['name']}</td>";
										echo "<td>{$row['center']}</td>";
                                        echo "<td>{$state[$row['state']]}</td>";
										echo "<td>{$row['reg_date']}</td>";
                                        echo "<td>";
                                        if($row['state']==0||$row['state']==2){
                                            echo "<button onclick=\"userAction('{$row['id']}',1);\" type=\"button\" class=\"btn bg-success btn-xs\">{$state[1]}</button>";
                                        }else if($row['state']==1){
                                            echo "<button onclick=\"userAction('{$row['id']}',2);\" type=\"button\" class=\"btn bg-orange btn-xs\">{$state[2]}</button>";
                                        }
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick=\"userAction('{$row['id']}',3);\" type=\"button\" class=\"btn bg-maroon btn-xs\">delete</button></td>";
										echo "<td>{$row['visited_count']}</td>";
										echo "<td>{$row['last_visited_time']}</td>";
										echo "<td>{$row['id']}</td>";
										echo "</tr>";
									}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2">
                    <div class="box">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Email</th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Location</th>
										<th>State</th>
                                        <th>Register Date</th>
                                        <th>Action</th>
                                        <th>visited_count</th>
                                        <th>last_visited_time</th>
                                        <th>id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									foreach($parentdata as $row){
										echo "<tr>";
										echo "<td></td>";
										echo "<td>{$row['email']}</td>";
										echo "<td><input type='checkbox' onclick=\"iplockAction('{$row['id']}');\" " .($row['ip_lock']==1?"checked":""). "/></td>";
										echo "<td>{$row['name']}</td>";
										echo "<td>{$row['center']}</td>";
										echo "<td>{$state[$row['state']]}</td>";
                                        echo "<td>{$row['reg_date']}</td>";
                                        echo "<td>";
                                        if($row['state']==0||$row['state']==2){
                                            echo "<button onclick=\"userAction('{$row['id']}',1);\" type=\"button\" class=\"btn bg-success btn-xs\">{$state[1]}</button>";
                                        }else if($row['state']==1){
                                            echo "<button onclick=\"userAction('{$row['id']}',2);\" type=\"button\" class=\"btn bg-orange btn-xs\">{$state[2]}</button>";
                                        }
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick=\"userAction('{$row['id']}',3);\" type=\"button\" class=\"btn bg-maroon btn-xs\">delete</button></td>";
										echo "<td>{$row['visited_count']}</td>";
										echo "<td>{$row['last_visited_time']}</td>";
										echo "<td>{$row['id']}</td>";
										echo "</tr>";
									}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_3">
                    <div class="box">
                        <div class="box-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Email</th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>State</th>
                                        <th>Register Date</th>
                                        <th>Action</th>
                                        <th>visited_count</th>
                                        <th>last_visited_time</th>
                                        <th>id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $i=0;
									foreach($admindata as $row){
										echo "<tr id='{$i}'>";$i++;
										echo "<td></td>";
										echo "<td>{$row['email']}</td>";
										echo "<td><input type='checkbox' onclick=\"iplockAction('{$row['id']}');\" " .($row['ip_lock']==1?"checked":""). "/></td>";
										echo "<td>{$row['name']}</td>";
										echo "<td>{$row['center']}</td>";
										echo "<td>{$state[$row['state']]}</td>";
                                        echo "<td>{$row['reg_date']}</td>";
                                        echo "<td>";
                                        if($row['state']==0||$row['state']==2){
                                            echo "<button onclick=\"userAction('{$row['id']}',1);\" type=\"button\" class=\"btn bg-success btn-xs\">{$state[1]}</button>";
                                        }else if($row['state']==1){
                                            echo "<button onclick=\"userAction('{$row['id']}',2);\" type=\"button\" class=\"btn bg-orange btn-xs\">{$state[2]}</button>";
                                        }
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick=\"userAction('{$row['id']}',3);\" type=\"button\" class=\"btn bg-maroon btn-xs\">delete</button></td>";
										echo "<td>{$row['visited_count']}</td>";
										echo "<td>{$row['last_visited_time']}</td>";
										echo "<td>{$row['id']}</td>";
										echo "</tr>";
									}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>
<style>
tr div.expand {
  width: 20px;
  height: 20px;
  background-image: url('http://www.datatables.net/release-datatables/examples/examples_support/details_open.png');
}

tr div.open {
  background-image: url('http://www.datatables.net/release-datatables/examples/examples_support/details_close.png');  
}
</style>
<script>
var tbls=new Array(3);
function iplockAction(id){
    res = $.ajax({
        url: "setiplock",
        type: 'post',
        data: {
            id:id
        },
        dataType: "json",
        success: function( data ) {
            
        },
        error: function(e) {
            
        }
    });
}
    $(document).ready(function(){
        //$('#example1').DataTable();
        //$('#example2').DataTable();
        var colDef=[
                        {mData: null,bSearchable: false,bSortable: false,sDefaultContent: '<div class="expand /">',sWidth: "30px"},
                        { mData: 'Email', bSearchable: true,  bSortable: true },
                        { mData: 'ip_lock',        bSearchable: false, bSortable: false },
                        { mData: 'Name',       bSearchable: false, bSortable: true },
                        { mData: 'Location',           bSearchable: false, bSortable: true },
                        { mData: 'State',           bSearchable: false, bSortable: true },
                        { mData: 'Register Date',           bSearchable: false, bSortable: true },
                        { mData: 'Action',           bSearchable: false, bSortable: true },
                        { mData: 'visited_count',      visible:false,     bSearchable: false, bSortable: true },
                        { mData: 'last_visited_time',   visible:false,         bSearchable: false, bSortable: true },
                        { mData: 'id',   visible:false,         bSearchable: false, bSortable: true }
                    ];
        var tblDef={
            bJQueryUI: true,
            sPaginationType: 'full_numbers',            //aaData: data,
            aaSorting: [[5, 'asc']],
            aoColumns: colDef
        };
        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table bgcolor="yellow" cellpadding="8" border="0" style="padding-left:250px;margin-left: 10px;">';
            //sOut += '<tr><td>Email:</td><td>' + "" + '</td></tr>';
            //sOut += '<tr><td>Name:</td><td>' + "" + '</td></tr>';
            sOut += '<tr><td width="200px">Visited Count:</td><td>' + aData['visited_count'] + '</td></tr>';
            sOut += '<tr><td>last visited time:</td><td>' + aData['last_visited_time'] + '</td></tr>';
            sOut += '<tr><td>IP Interlock:</td><td>' + "<input type='checkbox' onclick=\"iplockAction('"+aData['id']+"');\" "  +(aData['ip_lock']==1?"checked":"")+ "/>" + '</td></tr>';
            sOut += '<tr><td>Session Count(Day/Month/Year):</td><td>' + "1/10/10" + '</td></tr>';
            sOut += '<tr><td>Sending(SendingCount/TotalCount):</td><td>' + "44/100" + '</td></tr>';
            sOut += '</table>';
            return sOut;
        }
        
        //for(var i=1;i<4;i++){
        tbl1= $('#example1').dataTable(tblDef);
        tbl2= $('#example2').dataTable(tblDef);
        tbl3= $('#example3').dataTable(tblDef);
        
        //$('#example1 tbody').on('click', 'td div.expand', function () {
        $('#example1 tbody').on('click', 'tr', function () {
            var nTr = $(this);
            if(tbl1.fnIsOpen($(this))){
                tbl1.fnClose(nTr);
                $(this).find('td div.open').removeClass('open');
            }else{
                $(this).parent().find('tr').each(function (i, el) {
                    $(this).find('td div.open').removeClass('open');
                    tbl1.fnClose($(this));
                });
            
                $.fn.dataTableExt.sErrMode = 'throw' ;
                $(this).find('td div.expand').addClass('open');
                tbl1.fnOpen(nTr, fnFormatDetails(tbl1, nTr), 'details');
            }
        });
        
        /*$('#example1 tbody').on('click', 'td div.expand', function () {
            var nTr = $(this).parents('tr')[0];
            if (tbl1.fnIsOpen(nTr)) {
                $(this).removeClass('open');
                tbl1.fnClose(nTr);
            } else {
                $.fn.dataTableExt.sErrMode = 'throw' ;
                $(this).addClass('open');
                tbl1.fnOpen(nTr, fnFormatDetails(tbl1, nTr), 'details');
            }
        });*/
        
        $('#example2 tbody').on('click', 'tr', function () {
            var nTr = $(this);
            if(tbl2.fnIsOpen($(this))){
                tbl2.fnClose(nTr);
                $(this).find('td div.open').removeClass('open');
            }else{
                $(this).parent().find('tr').each(function (i, el) {
                    $(this).find('td div.open').removeClass('open');
                    tbl2.fnClose($(this));
                });
            
                $.fn.dataTableExt.sErrMode = 'throw' ;
                $(this).find('td div.expand').addClass('open');
                tbl2.fnOpen(nTr, fnFormatDetails(tbl2, nTr), 'details');
            }
        });
        $('#example3 tbody').on('click', 'tr', function () {
            var nTr = $(this);
            if(tbl3.fnIsOpen($(this))){
                tbl3.fnClose(nTr);
                $(this).find('td div.open').removeClass('open');
            }else{
                $(this).parent().find('tr').each(function (i, el) {
                    $(this).find('td div.open').removeClass('open');
                    tbl3.fnClose($(this));
                });
            
                $.fn.dataTableExt.sErrMode = 'throw' ;
                $(this).find('td div.expand').addClass('open');
                tbl3.fnOpen(nTr, fnFormatDetails(tbl3, nTr), 'details');
            }
        });
    });
</script>