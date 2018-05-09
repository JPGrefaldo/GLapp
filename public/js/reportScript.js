$(document).ready(function() {
var feeid;
$.fn.dataTable.ext.errMode = 'throw';

tblCase = $('#case').DataTable({
        autoWidth: false,
        ajax:{
            url:"service-report",
            data: {
                request:"case",
            }
        },
        columns: [
            {data: "docket"},
            {data: "title"},
        ],
        columnDefs: [{
            targets: 2,
            data: null,
            render:function(row){
                return `<a class="btn-success btn btn-xs" >View</a>` 
            }
        }]
    });

tblFee = $('#fee').DataTable({
    autoWidth: false,
    ajax:{
        url:"service-report",
        data: {
            request:"fee",
            id:feeid
        }
    },
    columns: [
        {data: "docket"},
        {data: "title"},
    ],
    columnDefs: [{
        targets: 2,
        data: null,
        render:function(row){
            return `<a class="btn-success btn btn-xs">View</a>` 
        }
    }]
});
} );