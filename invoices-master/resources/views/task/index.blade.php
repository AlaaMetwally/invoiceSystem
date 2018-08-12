<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <!-- start advanced search -->
        <form>
            {{csrf_field()}}
            <div class="row">
                <div id="filters" style="display:none">
                <span id="tasks">
                    <div id="yadcf-filter-wrapper--tasks">
                        <div id="yadcf-filter-wrapp er--tasks_table-0" class="yadcf-filter-wrapper">
                            <div class="chosen-container chosen-container-multi" title="" id="yadcf_filter__tasks_table_0_chosen">
                                <input data-input="searchtask"  placeholder="search by tasks" class="element" autocomplete="off" type="text" name="searchtask">
                            </div>
                        <br>
                        </div>
                    </div>
                </span>

                    <br>
                    From :
                    <input name="searchdatefrom" data-input="searchdatefrom" id="start_date" class="datepicker element" data-column-index="10" type="text">
                    To :
                    <input name="searchdateto" data-input="searchdateto" id="end_date" class="datepicker element" data-column-index="10" type="text">
                    <br>
                    <br>
                    <input name="unitpricefrom" data-input="unitpricefrom" id="unit_min" placeholder="unit min price" type="text" class="element">
                    <input name="unitpriceto" data-input="unitpriceto" id="unit_max" placeholder="unit max price" type="text" class="element">
                </div>
                <div style="float:right; margin:10px;">
                    <button id="advanced_search" class="btn btn-warning" style="display: block;">advanced search</button>
                    <input type="button" value="Search" id="search-form" class="btn btn-warning" style="display:none">
                    <button id="cancel_search" class="btn btn-warning" style="display:none">cancel</button>
                </div>
            </div>
        </form>
        <!-- end advanced search form -->
        <div class="row">
            <div style="display:block; float:left; padding:10px; height:50px;">
                toggle column:  <a href="" class="toggle-vis" data-column="0">task</a> -
                <a href="" class="toggle-vis" data-column="1">client</a> -
                <a href="" class="toggle-vis" data-column="2">service</a> -
                <a href="" class="toggle-vis" data-column="3">invoice number</a> -
                <a href="" class="toggle-vis" data-column="4">po #</a> -
                <a href="" class="toggle-vis" data-column="5">unit</a> -
                <a href="" class="toggle-vis" data-column="8">total</a> -
                <a href="" class="toggle-vis" data-column="9">fixed price</a>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-4" align="left">
            <a type="submit" class="btn btn-primary pjax-link" href="{{route('task.init')}}">add new</a>
        </div>
        <!--begin: datatable -->
        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded m-datatable--scroll"
             id="m_datatable_latest_orders">
            <table class="table table-bordered table-striped dt-responsive nowrap" id="tasks-table" style="width:100%">
                <thead>
                <tr>
                    <th>task</th>
                    <th>client</th>
                    <th>service</th>
                    <th>invoice no</th>
                    <th>po no</th>
                    <th>unit</th>
                    <th>unit price</th>
                    <th>amount</th>
                    <th>total</th>
                    <th>fixed price</th>
                    <th>start date</th>
                    <th>finished</th>
                    <th>invoiced</th>
                    <th>actions</th>
                </tr>
                </thead>

            </table>
        </div>
        <!--end: datatable -->
    </div>
</div>


