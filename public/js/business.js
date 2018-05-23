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

tblBusiness.on('draw',function(){
    $('.i-checks').iCheck({
        radioClass: 'iradio_square-green',
    });
});
