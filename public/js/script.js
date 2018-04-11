let data;
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
            popData(result);
            data = result;
        }
    });
}

function buildForm() {
        return [
          $('input[name=fname]').val(),
          $('input[name=lname]').val(),
          $('input[name=mname]').val(),
          $('input[name=plaintiff]').val(),
          $('input[name=business_nature]').val(),
          $('input[name=email]').val(),
        ];
      }


function post(){
    $.post(`${location.pathname}/update`,{
        "_token": $("#_token").attr("value"),
        "fname" : "John Paul",
        "lname" : "Grefaldo",
        "mname" : "L",
        "plaintiff" : "1",
        "business_nature" : "Under Nature",
        "email" : "fake@email.com",
}).done(function(data){console.log(data);fetchData();});
}

function popData(data){

const dataTable = $('.table-striped').dataTable( {
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
                            <button class="btn-danger btn btn-xs" id=${row.id}>Delete</button>
                        </div>`;}}
            
        ]
    } );

}


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
for (i=1; i < 3; i++){
    for (var component in componentForm){
        document.getElementsByClassName(`${component}_acInput${i}`)[0].value = "";
        document.getElementsByClassName('autocomplete')[i-1].value = "";
    }
}}

function getData(id){
    clearInputs();
    for (component of data){

        let found; // Toggle if match found
        let address; 

        for(row in component){     
            if (component.id == id){ found = 1;
                address = {...component.address[0]};      
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
    
    for(item in address){
        inputText = document.getElementsByClassName(`${item}_acInput${address.address + 1}`)[0];
        if(inputText){
            inputText.value = address[item];
        }
    }
}


function getElem(elem){
    return document.getElementsByClassName(elem)[0];
}
