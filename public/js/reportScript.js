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
        {data: "name"},
        {data: "charge_type"},
        {data: "amount"},
    ],
    columnDefs: [{
        targets:0,
        data:null,
        render:function(a,b,row){
        return `<div class="radio radio-success">
                    <input type="radio" name="radio1" value="transaction_fee_detail_id=${row.id}" >
                    <label for="radio1">
                        ${row.fee.name}
                    </label>
                </div>`
        }
    },{
        targets: 3,
        data: null,
        render:function(a,b,row){
            console.log(row.chargeables.lenght ? true : false);
            if(row.chargeables.length){
                return `<a class="btn-success btn btn-xs" onclick="getChargeable(${row.fee.id})">View</a>`;
            }else{
                return `<a  class="btn-primary btn btn-xs" onclick="addChargeableId(${row.fee.id})" data-toggle="modal" data-target="#chargeableModal">Add</a>`;
            }
        }
    }]
});

tblChargeable = $('#chargeable').DataTable({
    autoWidth: false,
    dom: 'frBtip',
    buttons: [
        'csv','print'
    ],
    columns: [
        {data: "name"},
        {data: "description"},
        {data: "amount"}
    ],
    columnDefs: [{
        targets: 3,
        data: null,
        render:function(row){
            return `<a class="btn-danger btn btn-xs">Delete</a>` 
        }
    }]
});

$('#fee, #chargeable').on('xhr.dt',function(e, settings, json, xhr){
    let slicker = $('.slicker');
    if(xhr.status === 200){
        slicker.slick('slickCurrentSlide') < 2 ? slicker.slick('slickNext'): null ;
        console.log(settings);
    }else{
        toastr['error']("No records found!");
    }
});

let chargeableData;

function clearChargebles(){
    chargeableData = {'transaction_fee_detail_id':'','_token':$("#_token").attr('value')}
}

function addChargeableId(id){
    clearChargebles();
    chargeableData.transaction_fee_detail_id = id;
}

function sendChargeable(){
    $.post('service-report', $.param(chargeableData) + '&' + $('.modal-content input').serialize()).fail(function(){
        toastr['error'](`Oops! something went wrong, call CHARLIE PUTH!`);}).done(function(){
            getChargeable(chargeableData.transaction_fee_detail_id);
            tblFee.ajax.reload();
            });
}

function getFee(id){
    tblFee.ajax.url(`service-report?request=fee&id=${id}`).load();
}

function getChargeable(id){
    tblChargeable.ajax.url(`service-report?request=chargeable&id=${id}`).load();
    addChargeableId(id);
}

function prev(){
    $('.slicker').slick('slickPrev');
}

function saveSR(){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $("#_token").attr('value')},
        method: "PUT",
        url: "/service-report/test",
        data:$('input[name=radio1]:checked').val()
    }).done(response=>console.log(response)).fail(response=>toastr['error'](`Please Select Fee Details`))
}

