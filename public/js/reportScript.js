$(document).ready(function() {
tblUnpublished = $('#Unpublished').DataTable({
        autoWidth: false,
        ajax:{
            type:"POST",
            url:"service-report",
            data: {
                _token:$("#_token").attr("value"),
                request:"unpublished",
            }
        },
        columns: [
            {data: "cases[0].docket"},
            {data: "cases[0].title"},
            {data: (data) => {return `${data.client.fname} ${data.client.lname}`} },
            {data: "contract.contract_number"},
            {data: "contract.status"},
        ],
        columnDefs: [{
            targets: 5,
            data: null,
            render:function(row){
                return `<a class="btn-success btn btn-xs" href="service-report/create?transaction_id=${row.id}">Create</a>` 
            }
        }]
    });
    
tblPublished = $('#Published').DataTable({
    autoWidth: false,
    ajax:{
        type:"POST",
        url:"service-report",
        data: {
            _token:$("#_token").attr("value"),
            request:"published",
        }
    },
    columns: [
        {data: "cases[0].docket"},
        {data: "cases[0].title"},
        {data: (data) => {return `${data.client.fname} ${data.client.lname}`} },
        {data: "contract.contract_number"},
        {data: "contract.status"},
    ],
    columnDefs: [{
        targets: 5,
        data: null,
        render:function(data){
            return `<a class="btn-success btn btn-xs" href="service-report/${data.report.id}">Edit</a>` 
        }
    }]
    });

    $('#Billed').DataTable({
        autoWidth: false,
    });

} );