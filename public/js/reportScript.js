$.fn.dataTable.ext.errMode = 'throw';

toastr.options = {
    "closeButton": true,
    "debug": false,
    "progressBar": false,
    "preventDuplicates": true,
    "positionClass": "toast-top-center",
    "onclick": null,
    "showDuration": "400",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

$('.slicker').slick({
    accessibility:false,
    draggable:true,
    cssEase:'ease',
    easing:'linear',
    arrows:false
});


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
                return `<a class="btn-success btn btn-xs" onclick="getFee(${row.id})">View</a>` 
            }
        }]
    });

tblFee = $('#fee').DataTable({
    autoWidth: false,
    columns: [
        {data: "fee.name"},
        {data: "charge_type"},
        {data: "amount"},
    ],
    columnDefs: [{
        targets: 2,
        data: null,
        render:function(row){
            return `<a class="btn-success btn btn-xs" onclick="getChargeable(${row.id})">View</a>` 
        }
    }]
});

tblChargeable = $('#chargeable').DataTable({
    autoWidth: false,
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

$('#fee, #chargeable').on('xhr.dt',function(e, settings, json, xhr){
    if(xhr.status === 200){
        $('.slicker').slick('slickNext');
    }else{
        toastr['error']("No records found!");
    }
});

function getFee(id){
    tblFee.ajax.url(`service-report?request=fee&id=${id}`).load();
}

function getChargeable(id){
    tblChargeable.ajax.url(`service-report?request=chargeable&id=${id}`).load();
}

function prev(){
    $('.slicker').slick('slickPrev');
}