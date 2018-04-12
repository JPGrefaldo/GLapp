<div class="row">
    <div class="col-lg-12">
        <div id="app">
            
    <div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated fadeInUp">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Modal title</h4>
                        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                    </div>
    
                            <div class="tabs-container no-margins">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Personal Info</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Office Address</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Billing Info</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Billing Address</a></li>
                                    <modal title="Hello World"></modal>
                                </ul>
                                <div class="tab-content" >
                                    <input id="id" name="id" type="text" hidden>
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <form class="" onsubmit="updateData()">
                                            <div class=" form-group">
                                            <div class="col-lg-6">
                                                <div class="input-group m-b"><span class="input-group-addon bg-primary" >First Name</span>
                                                    <input name="fname" type="text" class="form-control" required>
                                                </div>
                                                <div class="input-group m-b"><span class="input-group-addon bg-primary">Middle Name</span>
                                                    <input name="mname" type="text" class="form-control" required>
                                                </div>
                                                <div class="input-group m-b"><span class="input-group-addon bg-primary">Last Name</span>
                                                    <input name="lname" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            </div>
                                        
                                            <div class=" col-lg-6">
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Email</span>
                                                    <input name="email" type="text" class="form-control" required>
                                                </div>
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Plaintiff Type</span>
                                                    <select name="plaintiff" type="text"  class="form-control"> 
                                                        <option disabled selected></option>                                   
                                                        <option value="1">Respondent</option>
                                                        <option value="2">Complainant</option>
                                                        <option value="3">Defendant</option>
                                                    </select>
                                                </div>
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Business Type</span>
                                                    <select name="business_nature" type="text" class="form-control">
                                                        <option disabled selected></option>
                                                        <option value="1">Corporate</option>
                                                        <option value="2">Infrastructure</option>
                                                        <option value="3">advertising</option>
                                                        <option value="4">Media broadcasting</option>
                                                        <option value="5">Contraction</option>
                                                        <option value="6">Consulting</option>
                                                        <option value="7">IT/Telco</option>
                                                        <option value="8">transportation</option>
                                                        <option value="9">Logistics</option>
                                                        <option value="10">Finance</option>
                                                        <option value="11">entertainment</option>
                                                        <option value="12">Clothing</option>
                                                        <option value="13">Cosmetics</option>
                                                        <option value="14">Agriculture</option>
                                                        <option value="15">Hospitality/Tourism</option>
                                                        <option value="16">NGO</option>
                                                        <option value="17">LGU</option>
                                                        <option value="18">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
    
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <div class=" col-lg-12">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Search</span>
                                                <input id="acInput1" placeholder="Enter your address" onfocus="" type="text" class="form-control autocomplete" autocomplete="off">
    
                                            </div>
                                        
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Street Address</span>
                                                <div class="row">
                                                    <div class="col-lg-3"><input name="street_number[0]" type="text" class="form-control street_number_acInput1" required></div>
                                                    <div class="rmlt col-lg-9"><input name="route[0]" type="text" class="form-control route_acInput1" required></div>
                                                </div>
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Barangay/Town</span>
                                                <input type="text"  name="neighborhood[0]" class="form-control neighborhood_acInput1 administrative_area_level_5_acInput1" required>
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Municipality/City</span>
                                                <input name="locality[0]" type="text" class="form-control locality_acInput1" required>
                                            </div>
                                            <div class="input-group m-b">
                                                <span class="input-group-addon bg-primary">Province/Conurbation</span>
                                                <input name="administrative_area_level_1[0]" type="text" class="form-control administrative_area_level_1_acInput1 administrative_area_level_2_acInput1" required>
                                            </div>
                                            
                                            <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="input-group m-b">
                                                            <span class="input-group-addon bg-primary">Country</span>
                                                            <input name="country[0]"  type="text" class="form-control  country_acInput1" required></div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                            <div class="input-group m-b">
                                                                <span class="input-group-addon bg-primary">Zip Code</span>
                                                                <input name="postal_code[0]" type="text" class="form-control  postal_code_acInput1" required></div>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div id="tab-3" class="tab-pane">
                                        <div class="panel-body">
                                            <div class="col-lg-6">
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Contact No.</span>
                                                    <input type="text" class="form-control">
                                                </div>
                
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">O.I.C.</span>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group m-b">
                                                        <span class="input-group-addon bg-primary">Contract</span>
                                                        <input type="text" class="form-control" >
                                                </div>
                                                
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Type</span>
                                                    <input type="text" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div id="tab-4" class="tab-pane">
                                        <div class="panel-body">
                                            <div class=" col-lg-12">
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon bg-primary">Search</span>
                                                    <input id="acInput2" placeholder="Enter your address" onfocus="" type="text" class="form-control autocomplete" autocomplete="off">
                                                    <span class="input-group-btn"><button type="button" class="btn btn-primary" onclick="pasteAll()"><i class="fa fa-paste"></i></button></span>
                                                </div>
                                                <div class="input-group m-b">
                                                    <span class="input-group-btn bg-primary">
                                                        <button  type="button" class="btn btn-primary" onclick="paste(['street_number', 'route'])">Street Address</button>
                                                    </span>
                                                    <div class="row">
                                                        <div  class="col-lg-3">
                                                            <input name="street_number[1]" type="text" class="form-control street_number_acInput2" required></div>
                                                        <div  class="rmlt col-lg-9">
                                                            <input name="route[1]" type="text" class="form-control route_acInput2" required></div>
                                                    </div>
                                                </div>
                                                <div class="input-group m-b">
                                                    <span class="input-group-btn bg-primary">
                                                        <button type="button" class="btn btn-primary" onclick="paste('neighborhood')">Barangay/Town</button>
                                                    </span>
                                                    <input name="neighborhood[1]" type="text" class="form-control neighborhood_acInput2 administrative_area_level_5_acInput2" required>
                                                </div>
                                                <div class="input-group m-b">
                                                    <span class="input-group-btn bg-primary">
                                                        <button type="button" class="btn btn-primary" onclick="paste('locality')">Municipality/City</button>
                                                    </span>
                                                    <input name="locality[1]" type="text" class="form-control locality_acInput2" required>
                                                </div>
                                                <div class="input-group m-b">
                                                    <span class="input-group-btn bg-primary">
                                                        <button type="button" class="btn btn-primary" onclick="paste('administrative_area_level_1')">Province/Conurbation</button>
                                                    </span>
                                                    <input name="administrative_area_level_1[1]" type="text" class="form-control administrative_area_level_1_acInput2 administrative_area_level_2_acInput2" required>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="input-group m-b">
                                                            <span class="input-group-btn bg-primary">
                                                                <button type="button" class="btn btn-primary" onclick="paste('country')">Country</button> 
                                                            </span>
                                                            <input name="country[1]" type="text" class="form-control  country_acInput2"required >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="input-group m-b">
                                                            <span class="input-group-btn bg-primary">
                                                                <button type="button" class="btn btn-primary" onclick="paste('postal_code')">Zip Code</button>
                                                            </span>
                                                            <input name="postal_code[1]" type="text" class="form-control  postal_code_acInput2" required>
                                                        </div>
                                                    </div>
                                                </div>
    
                                        </div>
                                    </div>
                                    </div>
                                </div>
        
        
                            </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
    
            </div>
        </div>
    </div>
    </div>
</div>