toastr.options = {
    "closeButton": false,
    "debug": false,
    "progressBar": false,
    "preventDuplicates": true,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": "100",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }


let billing, client;
let business = [];
$.fn.dataTable.ext.errMode = 'throw';

tblBusiness = $('#business').DataTable({
    autoWidth: true,
    order:[1],
    columns: [
        {data: null, orderable: false},
        {data: "name"},
    ],    
    columnDefs: [{
        targets: 0,
        width: "5%",
        render: function(row,type,val,meta){
            return `<div class="i-checks">
                        <label><input name="radio1" type="radio" id="${row.id}"><i></i></label>
                    </div>`
        }
    },{
        targets: 2,
        width: "40%",
        data: function(row,type,val,meta){
            return `${row.street_number} ${row.route}, ${row.neighborhood}, ${row.locality}, ${row.administrative_area_level_1}, ${row.country} `
        }
    }]
});

function getBusiness(id){
    id ? tblBusiness.ajax.url(`/business?client=${id}`).load() : null;
}

function zapBusiness(elem){
    
}

function saveClient(){

}

function createClient(){
    client = $('.row .col-lg-12:first input').serializeAssoc(true);
    checkAddress() && sendPackage();
}

function sendPackage(){
    $.post('/clients',{"business":business ,"client":client , "_token":$('#_token').attr('value')});
}

function checkAddress(){
    return business.length || swal({
        title: "Business details are empty.",
        text: "Please add a business detail.",
        type: "warning"
    });
}

function saveAddress(){
   value = $('.modal-body input, .modal-body select').serializeAssoc(true,['route','street_number']);
   value && business.push(value);
}

function checkFields(){
    fields = ['administrative_area_level_1','contract','country','locality','name','oic','postal_code','neighborhood'];
}

tblBusiness.on('draw',function(){
    $('.i-checks').iCheck({
        radioClass: 'iradio_square-green',
    });
});