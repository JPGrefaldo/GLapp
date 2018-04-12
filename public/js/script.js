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
    post('/update');
}

function post(loc){
    $.post(location.pathname+loc,
            `_token=${$("#_token").attr("value")}&${$( ".tab-content :input" ).serialize()}`,
    ).done(function(data){
        if(data){
            fetchData();
            $("#myModal5 .close").click();
            clearInputs();
        }
    });
}


table = $('.table-striped').dataTable( {
        "autoWidth": false,//Disable autowidth for responsive table
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
                            <a class="btn-success btn btn-xs" href="contract/create?id=${row.id}">Contract</a>
                            <button class="btn-primary btn btn-xs" id="${row.id}" data-toggle="modal" data-target="#myModal5" onclick="getData(this.id)">
                            View</button>
                            <button class="btn-danger btn btn-xs" id=${row.id} onclick="destroy(this.id)">Delete</button>
                        </div>`;}}
            
        ]
    } );




function pasteAll(){
    for (component in componentForm){
        paste(component);
    }
}

function paste(elem){
	if(typeof elem === 'object'){
		for(item of elem){

		getElem(`${item}_acInput2`).value = getElem(`${item}_acInput1`).value}
    }else{
        getElem(`${elem}_acInput2`).value = getElem(`${elem}_acInput1`).value
    } 
}

function delClient(elem){
    
    tr = elem.parentElement.parentElement
    tr.addEventListener('click',function(event){ event.stopImmediatePropagation();
        event.stopPropagation();
        event.cancelBubble = true;
        event.preventDefault();
});

	tr.remove();

}

function clearInputs(){
    $( ".tab-content :input" ).val("");
}

function getData(id){
    clearInputs();
    $("#id").val(id);
    for (component of data){

        let found; // Toggle if match found
        let address; 

        for(row in component){     
            if (component.id == id){ found = 1;
                
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

        if (found) {fillAddress(address);break;} // prevent d' loop on going if the match is found early & call the function
    }}

function fillAddress(address){
    
    for (i = 0 ; i < address.length;i++){
    for(item in address[i]){
        inputText = document.getElementsByClassName(`${item}_acInput${address[i].address + 1}`)[0];
        if(inputText){
            inputText.value = address[i][item];
        }
    }
}
}


function getElem(elem){
    return document.getElementsByClassName(elem)[0];
}

$("form").submit(function(e){
    return false;
});

function destroy(id){
    $("#id").val(id);
    post("/destroy");
}