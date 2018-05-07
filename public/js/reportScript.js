$(document).ready(function() {
    $('#Unpublished').DataTable({
        autoWidth: false,
    });
tblPublished = $('#Published').DataTable({
    autoWidth: false,
    ajax:{
        type:"POST",
        url:"service-report",
        data: {
            _token:$("#_token").attr("value"),
            request:"get",
        }
    },
    columns: [
        {data: "transaction.cases[0].docket"},
        {data: "transaction.cases[0].title"},
        {data: (data) => {return `${data.transaction.client.fname} ${data.transaction.client.lname}`} },
        {data: "transaction.contract.contract_number"},
        {data: "transaction.contract.status"},
    ],
    columnDefs: [{
        targets: 5,
        data: null,
        render:function(row){
            return `<a class="btn-success btn btn-xs" href="service-report/${row.id}">Edit</a>` 
        }
    }]
    });

    $('#Billed').DataTable({
        autoWidth: false,
    });

} );