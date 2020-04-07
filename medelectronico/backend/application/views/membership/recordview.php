<script>
    
</script>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ver Registros Página
      </h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php
                    if(count($record)==0)echo "Sorry, there is no records.";
                    else{
                        $fields="";
                        $showfields="idx,FECHA,NOMBRE,MEDICO,EDAD,FN,TEL";
                        $html= "<table id=\"retinatbl\" class=\"table table-bordered table-striped\">";
                        $html.=    "<thead><tr>";
                        $html.=         "<th></th>";
                        foreach($record as $field=>$val){
                            $html.=     "<th>{$field}</th>";
                            $fields.=($fields==""?"":",").$field;
                        }
                        $html.=    "<th>Acción</th></tr></thead>";
                        $html.=    "<tbody>";
                        
                        $html.=    "</tbody>";
                        $html.="</table>";
                        $html.="<input type=\"hidden\" id=\"fields\" name=\"fields\" value=\"{$fields}\"/>";
                        $html.="<input type=\"hidden\" id=\"showfields\" name=\"showfields\" value=\"{$showfields}\"/>";
                        echo $html;
                    }
                ?>
            </div>
        </div>
    </section>
<!--<div id="PDFcontent">
    <table width="100%"><tr><td align="center"><img src="<?php echo BASE_PATH."/uploads/image001.jpg";?>" style="width:50px;height:38px;"/></td></tr></table>
    
    <p>Content to be written in PDF can be placed in this DIV!</p>
</div>-->
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
</style><?php //https:cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
var tbl1;
var _cols=$('#fields').val().split(",");
var _showcols=$('#showfields').val().split(",");
var cols=[];
var i,j,visible,sortable,searchable;
cols.push({ "mData": null,'visible':true,'bSearchable':false,'bSortable':false,'sDefaultContent': '<div class="expand /">','sWidth': "30px"});
for(i=0;i<_cols.length;i++){
    visible=false;
    searchable=true;
    sortable=true;
    for(j=0;j<_showcols.length;j++)if(_cols[i]==_showcols[j]){visible=true;break;}
    cols.push({ "mData": _cols[i],'visible':visible,'bSearchable':searchable,'bSortable':sortable });
}
cols.push({ "mData": 'idx','visible':true,'bSearchable':false,'bSortable':false,"mRender": function ( data, type, full ) {
              return '<a href="addnew?idx='+data+'">Editar</a>&nbsp;|&nbsp;<a href="#" onclick="window.open(\'printrow?idx='+data+'\');">Impresión</a>';//onclick="printrow(\''+data+'\');
         },'sWidth': "30px"});
$(document).ready(function(){//alert(cols[0]['mData']+','+cols[0]['bSearchable']);
    var tblDef={
        "ajax": {
            url:'getrecordlist',
            dataSrc:"",
            "type" : "POST"
        },
        bJQueryUI: true,
        sPaginationType: 'full_numbers',
        aaSorting: [[1, 'asc']],
        aoColumns: cols,
        /*buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]*/
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: 'Data export'
            }
        ]
    };
    $('#retinatbl').DataTable(tblDef);
    function fnFormatDetails(oTable, nTr) {
        var aData = oTable.fnGetData(nTr);
        //var sOut = '<table bgcolor="yellow" cellpadding="8" border="0" style="padding-left:250px;margin-left: 10px;">';
        sOut="";
        for(i=0;i<_cols.length;i++){
            if(aData[_cols[i]]!='')if(_cols[i]!="LENTE_OD_NS_PSC_IOL_CORT"&&_cols[i]!="LENTE_OS_NS_PSC_IOL_CORT")sOut+='<font style="color:red;">'+_cols[i].replace(/_/g," ")+':&nbsp;</font>'+aData[_cols[i]]+'&nbsp;&nbsp;&nbsp;';    
            
        }
        return sOut;
    }
    $('#retinatbl tbody').on('click', 'tr', function () {
        var tbl1 = $('#retinatbl').dataTable();
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
});


function printrow(id){
    /*res = $.ajax({
        url: "getrow",
        type: 'post',
        data: {
            idx:id
        },
        dataType: "json",
        success: function( row ) {
            //alert(row['idx']);
            var blob = new Blob([byte], {type: "application/pdf"});
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = row.idx;
            link.click();
        },
        error: function(row) {
            //row=JSON.parse(row);
            //alert(row.idx+'->error');
        }
    });*/
    var specialElementHandlers = {
      '#bypassme': function(element, renderer) {
        return true;
       }
    };
    var margin = {
      top: 0,
      left: 0,
      right: 0,
      bottom: 0
    };
    
    var doc = new jsPDF();
    doc.fromHTML($('#PDFcontent').html(), 0, 0, {
    'width': 100, // max width of content on PDF
    'elementHandlers': specialElementHandlers
    },
    function(bla){doc.save('saveInCallback.pdf');},
    margin);
    /*
    var pdfdoc = new jsPDF();
    var req = new XMLHttpRequest();
    req.open("POST", "addnew?idx="+id, true);
    req.onload = function (event) {
        pdfdoc.fromHTML($('#PDFcontent').html(), 10, 10, {//req.response
            'width': 110
            //‘elementHandlers’: specialElementHandlers
        });
        pdfdoc.save('First.pdf');
    };
    req.send();
      /*  var req = new XMLHttpRequest();
      req.open("POST", "addnew?idx="+id, true);
      //req.responseType = "blob";
    
      req.onload = function (event) {
        var blob = req.response;
        console.log(blob.size);
        var link=document.createElement('a');
        link.href=window.URL.createObjectURL(blob);
        link.download="Dossier_" + new Date() + ".pdf";
        link.click();
      };
      req.send();*/
}
</script>