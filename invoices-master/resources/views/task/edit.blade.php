<div class="page-content-body">
    <div class="row" style="margin-left:0; margin-right:10px;">
        <form class="form-horizontal ajaxform" method="POST" action="{{route('task.update',$task->id)}}" style="width:100%">
            {{csrf_field()}}
<div class="form-group">
    <label for="name" class="col-md-4 control-label">Task Name *</label>
    <div class="col-md-6">
        <input data-validation="name" data-name="Task Name" type="text" class="form-control" name="name" value="{{$task->name}}" autofocus="">
        <p class="testname" style="color:red"></p>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Po Number</label>
    <div class="col-md-6">
        <input data-validation="number"  data-name="Po Number" type="text" class="form-control" name="po_num" id="po_num" value="{{$task->po_number}}" autofocus="">
        <p class="testnumber" style="color:red"></p>
    </div>
</div>
<!-- service -->
<div class="form-group">
    <label for="name" class="col-md-4 control-label">Service</label>
    <div class="col-md-3 first_col">
    <select data-validation="select" name="service" class="form-control m-input m-input--solid" style="padding-top: 5px; display:block">
        <option value="">Select Service</option>
        @foreach ($services as $service)
            <option value="{{$service->id}}" id="{{$service->id}}"
                @if($task->service_id == $service->id)  selected @endif>
                    {{$service->name}}
            </option>
        @endforeach
        </select>
        <p class="testselect" style="color:red"></p>
            <input data-validation="addname"  type="text" class="form-control" name="service_name" id="service"
                           style="display:none;">
                           <p class="testaddname" style="color:red"></p>
                    <div style="display:none;" class="cancel">
                        <button type="button" class="btn btn-danger canceladd" style="margin-top:10px;">Cancel</button>
                        <button data-input="new_service" data-name="Service" type="button"
                                class="btn btn-success addrecord"  style="margin-top:10px;margin-left:20px;">Add
                        </button>
        </div>
    </div>
    <div class="col-md-3">
        <button style="display: block;" class="btn btn-warning addnew" type="button" value="add new">Add new</button>
    </div>
</div>
<!--end service -->
            <!-- client -->
<div class="form-group">
    <label for="name" class="col-md-4 control-label">Client Name *</label>
        <div class="col-md-3 first_col">
            <select  id="client" data-validation="select" name="client" class="form-control m-input m-input--solid select"
                     style="padding-top: 5px; display:block">
                <option value="">Select Client</option>
                @foreach ($clients as $client)
                    <option value="{{$client->id}}"  id="{{$client->id}}"
                            @if($task->client_id == $client->id)  selected @endif>
                        {{$client->name}}
                    </option>
                @endforeach
            </select>
            <p class="testselect" style="color:red"></p>
    </div>
</div>
            <!-- end client -->
<!-- invoice -->
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Invoice Number</label>
                <div class="col-md-3 first_col" id="selectedinvoice" style="display: none">
                    <select data-validation="select" name="invoice" class="form-control m-input m-input--solid" style="padding-top: 5px;">
            <option value="">Select Invoice</option>

                </select>
                <p class="testselect" style="color:red"></p>
                <input data-validation="addname"  type="text" class="form-control" name="invoice_name" id="invoice"
                       style="display:none;">
                <p class="testaddname" style="color:red"></p>
                <div style="display:none;" class="cancel">
                    <button type="button" class="btn btn-danger canceladd" style="margin-top:10px;">Cancel</button>
                    <button data-input="new_invoice" data-name="Invoice" type="button"
                            class="btn btn-success addrecord"  style="margin-top:10px;margin-left:20px;">Add
                    </button>
                </div>
    </div>
    <div class="col-md-3">
        <button style="display: block;" class="btn btn-warning addnew" type="button" value="add new">Add new</button>
    </div>
</div>
            <!-- end invoice -->
<!-- contact -->
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Contact Name</label>
                <div class="col-md-3 first_col" id="selectedcontact" style="display: none">
                    <select data-validation="select" name="contact" class="form-control m-input m-input--solid" style="padding-top: 5px;">
                        <option value="">Select Contact</option>

                    </select>
                    <p class="testselect" style="color:red"></p>
                    <input data-validation="addname"  type="text" class="form-control" name="contact_name" id="contact"
                           style="display:none;">
                    <p class="testaddname" style="color:red"></p>
                    <div style="display:none;" class="cancel">
                        <button type="button" class="btn btn-danger canceladd" style="margin-top:10px;">Cancel</button>
                        <button data-input="new_contact" data-name="Contact" type="button"
                                class="btn btn-success addrecord"  style="margin-top:10px;margin-left:20px;">Add
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <button style="display: block;" class="btn btn-warning addnew" type="button" value="add new">Add new</button>
                </div>
            </div>

            <!-- end contact -->
<!-- currency -->
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Currency</label>
                <div class="col-md-3 first_col">
                    <select data-validation="select" name="currency" class="form-control m-input m-input--solid select"
                             style="padding-top: 5px; display:block">
                        <option value="">Select Currency</option>
                        @foreach ($currencies as $currency)
                            <option value="{{$currency->id}}"  id="{{$currency->id}}"
                                    @if($task->currency_id == $currency->id)  selected @endif>
                                {{$currency->name}}
                            </option>
                        @endforeach
                    </select>
                    <p class="testselect" style="color:red"></p>
                    <input data-validation="addname"  type="text" class="form-control" name="currency_name" id="currency"
                           style="display:none;">
                    <p class="testaddname" style="color:red"></p>
                    <div style="display:none;" class="cancel">
                        <button type="button" class="btn btn-danger canceladd" style="margin-top:10px;">Cancel</button>
                        <button data-input="new_currency" data-name="Currency" type="button"
                                class="btn btn-success addrecord" style="margin-top:10px;margin-left:20px;">Add
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-warning addnew" type="button" value="add new">Add new</button>
                </div>
            </div>
<!-- end currency -->

            <!-- unit -->
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Unit</label>
                <div class="col-md-3 first_col">
                    <select data-validation="select" name="unit" class="form-control m-input m-input--solid select"
                             style="padding-top: 5px; display:block">
                        <option value="">Select Unit</option>
                        @foreach ($units as $unit)
                            <option value="{{$unit->id}}" id="{{$unit->id}}"
                                    @if($task->unit_id == $unit->id)  selected @endif>
                                {{$unit->name}}
                            </option>
                        @endforeach
                    </select>
                    <p class="testselect" style="color:red"></p>
                    <input data-validation="addname"  type="text" class="form-control" name="unit_name" id="unit"
                           style="display:none;">

                    <p class="testaddname" style="color:red"></p>
                    <div style="display:none;" class="cancel">
                        <button type="button" class="btn btn-danger canceladd" style="margin-top:10px;">Cancel</button>
                        <button data-input="new_unit" data-name="Unit" type="button"
                                class="btn btn-success addrecord" style="margin-top:10px;margin-left:20px;">Add
                        </button>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-warning addnew" type="button" value="add new">Add new</button>
                </div>
            </div>
            <!-- end unit -->


<div class="form-group">
    <label for="name" class="col-md-4 control-label">Unit Price</label>
    <div class="col-md-6">
        <input data-validation="number" data-name="Unit Price" type="text" class="form-control" name="unit_price" id="unit_price" value="{{$task->unit_price}}" autofocus="">
        <p class="testnumber" style="color:red"></p>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Amount</label>
    <div class="col-md-6">
        <input data-validation="number" data-name="Amount" type="text" class="form-control" name="amount" id="amount" value="{{$task->amount}}" autofocus="">
        <p class="testnumber" style="color:red"></p>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Fixed Price</label>
    <div class="col-md-6">
        <input data-validation="number" data-name="Fixed Price" type="text" class="form-control" name="fixed_price" id="fixed_price" value="{{$task->fixed_price}}" autofocus="">
        <p class="testnumber" style="color:red"></p>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Start Date</label>
    <div class="col-md-6">
        <input data-name="Start Date" type="text" class="form-control datePicker" name="start_date" id="start_date" value="{{$task->start_date}}" autofocus="">
        <p class="testdate" style="color:red"></p>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Delivery Date</label>
    <div class="col-md-6">
        <input  data-name="Delivery Date" type="text" class="form-control datePicker" name="delivery_date" id="delivery_date" value="{{$task->delivery_date}}" autofocus="">
        <p class="testdate" style="color:red"></p>
    </div>
</div>

    <div class="col-md-6 col-md-offset-4" style="margin-top:50px;">
        <button type="submit" class="btn btn-primary" id="save">save</button>
    </div>
        </form>
    </div>
</div>
