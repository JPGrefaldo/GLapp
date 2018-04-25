let data;
let table;
const plaintiff = {
    "Respondent":1,
    "Complainant":2,
    "Defendant":3
}

const busType ={
    "Corporate":1,
    "Infrastructure":2,
    "advertising":3,
    "Media broadcasting":4,
    "Contraction":5,
    "Consulting":6,
    "IT/Telco":7,
    "transportation":8,
    "Logistics":9,
    "Finance":10,
    "entertainment":11,
    "Clothing":12,
    "Cosmetics":13,
    "Agriculture":14,
    "Hospitality/Tourism":15,
    "NGO":16,
    "LGU":17,
    "Others":18
}

window.onload = fetchData();

function fetchData(){
    
    $.ajax({
        url: `${location.pathname}/list`,
        success: function(result){
            table.fnClearTable();
            
            if(result.length){
            table.fnAddData(result);
            data = result;}
        }
    });
}


function updateData(){
    post('client/update',);
}

function post(loc,tab){
    $.post(loc,
            `_token=${$("#_token").attr("value")}&${$("#tab-1 input, #client_id, [name=billing]").serialize()}`,
    ).done(function(data){
        console.log(data);
        if(data){
            fetchData();
            $("#myModal5 .close").click();
            clearInputs();
        }
    });
}


table = $('#client').dataTable( {
        "autoWidth": false,
        "dom": '<"html5buttons"B>lTfgitp',
            "buttons": [
                {"extend": 'copy'},
                {"extend": 'csv'},
                {"extend": 'excel', title: 'ExampleFile'},
                {"extend": 'pdf', title: 'ExampleFile'},

                {"extend": 'print',
                customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }],
        "data": data,
        "columnDefs": [{
            
            "targets": 0,
            "data": null,
            "render": function (row) {
                return row.fname + " " + row.lname;} },{

            "targets": 1,
            "data": "plaintiff"},{
            
            "targets": 2,
            "data": "business_nature"},{

            "targets": 3,
            "data": null,
            "render":function(row){
                return `${row.email}`
            }},{

            "targets": 4,
            "data": null,
            "className": "text-right",
            "render": function (row) {
                return  `<div class="btn-group">
                            <a class="btn-success btn btn-xs" href="contract-create/${row.id}">Contract</a>
                            <button class="btn-primary btn btn-xs" id="${row.id}" data-toggle="modal" data-target="#myModal5" onclick="getData(this)">
                            View</button>
                            <button class="btn-danger btn btn-xs" id=${row.id} onclick="destroy(this.id)">Delete</button>
                        </div>`;}}
            
        ]
    } );

function delClient(elem){
    
    tr = elem.parentElement.parentElement
    tr.addEventListener('click',function(event){ event.stopImmediatePropagation();
        event.stopPropagation();
        event.cancelBubble = true;
        event.preventDefault();
});

	tr.remove();

}

function clearInputs(field=".tab-content"){
    $( `${field} :input` ).val("");
    busTable._fnReDraw();
}
let bill_id;
function getData(elem){
    bill_id = table.fnGetData(elem.closest("tr")).billing;
    clearInputs(".tab-content");
    $("#client_id").val(elem.id);
    busTable._fnReDraw();
    for (component of data){

        let found; // Toggle if match found
        let address; 

        for(row in component){     
            if (component.id == elem.id){ found = 1;
                
                address = component.address;      
            inputText = document.querySelectorAll(`[name=${row}]`)[0];

            if (inputText){
                switch (row){
                    case 'plaintiff':
                        inputText.value = plaintiff[component[row]];
                        break;
                    case 'business_nature':

                        inputText.value = busType[component[row]];
                        break;
                    default:
                    inputText.value = component[row];
                }                
            }}
        }

        if (found) break;
    }}

function getElem(elem){
    return document.getElementsByClassName(elem)[0];
}

$("form").submit(function(){
    return false;
});

function destroy(id){
    
    $("#client_id").val(id);
    post("client/destroy");
}
var b;
busTable = $('#clientBus').dataTable( {
    "ajax":{
    "type":"POST",
    "url":"client",
    "data": {
        "client_id": () => $("#client_id").val().toString(),
        "_token":$("#_token").attr("value"),
        "request":"get",
        
    }
},
    "processing": true,
    "serverSide": true,
    "autoWidth": false,
    "paging":false,
    "searching": false,
    "ordering":  false,
    "info": false,

    "columnDefs": [{

        "targets": 0,
        "data": null,
        "render":function(row){
            let name, mark;
            name = row.name;
        
            if( row.name.length > 17) name = `${row.name.substr(0,18)}...`;
            if (row.id === bill_id) mark = "checked";
            
            return `
                <div class="radio no-margins text-center no-padding">
                    <input class="no-margins" type="radio" value="${row.id}" name="billing" aria-label="Single radio One" ${mark}>
                    <label></label>
                </div> ${name}` 
        }},{

        "targets": 1,
        "data": null,
        "className": "text-right",
        "render": function (row) {
            return `
                <div class="btn-group">
                    <button class="btn-mute btn btn-xs" onclick="popBus(this)">view</button>
                    <button class="btn-danger btn btn-xs" id="${row.id}" onclick="updateBus(this.id,'destroy')">Delete</button>
                </div>` }
       }
        
    ]
} );
var business;
function popBus(row){
    clearInputs("#tab-2");
    business = busTable.fnGetData(row.closest('tr'))
    for (column in business){
        $(`[name=${column}]`).val(business[column])}
}

function updateBus(id,request){
    $.post("client",
            `_token=${$("#_token").attr("value")}&request=${request}&id=${id}&${$("#tab-2 input, #client_id").not("[name=billing]").serialize()}`,
        ).done(function(data){
    console.log(data);
    if(data){
        busTable._fnReDraw();
        clearInputs("#tab-2");
    }
});
}