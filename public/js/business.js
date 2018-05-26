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
    },{
        targets: 3,
        width: "5%",
        data: function(row,type,val,meta){
            return `<button class="btn btn-primary btn-xs">View</button>`
        }
    },{
        targets: 4,
        width: "5%",
        data: function(row,type,val,meta){
            return `<div class="checkbox checkbox-danger no-padding">
                        <input id="${row.id}" type="checkbox" onchange="">
                        <label>{{ message }}</label>
                    </div>`
        }
    }]
});

function getBusiness(id){
    id ? tblBusiness.ajax.url(`/business?client=${id}`).load() : null;
}

var app = new Vue({
    el: '#business',
    data: {
      message: 'Hello Vue!'
    }
  });