@extends('backend.layout.app')
@section('title', 'PERFECT TEN')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">All Camps</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                   autocomplete="off"/>
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            {{-- main content start from here --}}
            <div class="page-content">

                <!-- DYNAIC CONTENT FROM VIEWS -->


                <div class="widget-box">


                    <!-- header -->
                    <div class="widget-header">
                        <h4 class="widget-title"><i class="fa fa-info-circle"></i> Camp List
                        </h4>
                        <span class="widget-toolbar">
                            <!--------------- CREATE---------------->
                            <a href="{{ route('prm.camp.create') }}" class="">
                                <i class="fa fa-plus"></i> Add <span class="hide-in-sm">New</span>
                            </a>
                        </span>
                    </div>


                    <!-- body -->
                    <div class="widget-body">
                        <div class="widget-main">

                            <!-- Searching -->

                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="table-responsive" style="border: 1px #cdd9e8 solid;">
                                        <table id="dynamic-table"
                                               class="table table-striped table-bordered table-hover new-table">
                                            <thead>
                                            <tr>
                                                <th class="text-center" width="5%" class="hide-in-sm">Sl</th>
                                                <th width="30%">Name</th>
                                                <th class="text-center" width="20%">Capacity</th>
                                                <th class="text-center" width="10%">Store</th>
                                                <th class="text-center" width="10%">Status</th>
                                                <th width="5%" class="text-center" style="width: 120px">Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @php $serialNo = 1; @endphp
                                            @forelse($camps as $camp)
                                                <tr>
                                                    <td class="text-center" class="hide-in-sm"><span
                                                            class="span">@php echo $serialNo; @endphp</span></td>
                                                    <td><span class="span">{{$camp->name}}</span></td>
                                                    <td class="text-center"><span
                                                            class="span">{{$camp->capacity}}</span></td>
                                                    <td class="text-center">
                                                        <button
                                                            style="width: 70px; height: 25px; background-color: #00BE67; color: white; border: none; border-radius: 5px;"
                                                            id="storeId" onmouseover="this.style.backgroundColor='#009e53'" onmouseout="this.style.backgroundColor='#00BE67'" data-id="{{$camp->id}}" onclick="viewStore(this)">View
                                                        </button>
                                                        <!-- The Modal -->
                                                        <div id="myModal" class="modal">
                                                            <!-- Modal content -->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <span class="close">&times;</span>
                                                                    <div class="contuctUs">Stores</div>
                                                                </div>
                                                                <br>
                                                                <div class="modal-body">
                                                                    <div class="row"><div class="col-10">
                                                                            <table id="storeList">

                                                                            </table>
                                                                        </div></div>
                                                                </div>
                                                                <br>
                                                                <div class="modal-footer">
                                                                    <div align="center">
                                                                        <a href="{{ route('prm.store.create') }}" style="text-decoration: none;"><i class="fa fa-plus-circle"  style="color: #2ECEE7;"></i>Add More</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Call button work end-->
                                                    </td>
                                                    <td class="text-center">
                                                        <!--------------- STATUS EDIT---------------->
                                                        <div>
                                                            <label>
                                                                <span class="span">
                                                            <x-status status="{{ $camp->status }}" id="{{ $camp->id }}"
                                                                      table="{{ $table }}"/>
                                                        </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">

                                                        <!---------------  EDIT---------------->
                                                        <div class="btn-group btn-corner  action-span ">

                                                            <a href="{{ route('prm.camp.edit', $camp->id) }}"
                                                               role="button" class="btn btn-xs btn-success bs-tooltip"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>


                                                            <button type="button"
                                                                    onclick="delete_item(`{{ route('prm.camp.destroy', $camp->id) }}`)"
                                                                    class="btn btn-xs btn-danger bs-tooltip"
                                                                    title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>
                                                @php $serialNo++; @endphp
                                            @empty
                                                <tr>
                                                    <td colspan="30" class="text-center text-danger py-3"
                                                        style="background: #eaf4fa80 !important; font-size: 18px">
                                                        <strong>No records found!</strong>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                        @include('partials._paginate',['data'=> $camps])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            {{-- main content end  --}}
        </div>
    </div>


    <script>
        function viewStore(element) {
// Get the modal
            var modal = document.getElementById("myModal");

// Get the button that opens the modal
            var callButton = document.getElementById("storeId");

// Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
            /*callButton.onclick = function() {
                modal.style.display = "block";
            }*/
            modal.style.display = "block";

// When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

// When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            let camp_id = $(element).attr("data-id");

            let url = "/camp_store";
            let allData = {CampId:camp_id};

            axios.post(url, allData).then(
                function (response) {
                    $('#storeList').empty();
                    $('#storeList').append("" +
                        "<tr>\n" +
                        "                                                                                    <th width=\"5%\">SL</th>\n" +
                        "                                                                                    <th width=\"40%\">Store</th>\n" +
                        "                                                                                    <th width=\"40%\">Store Man</th>\n" +
                        "                                                                                </tr>");
                    for(let i=0; i<response.data.count; i++){
                    $('#storeList').append("" +
                        "<tr align=\"left\">\n" +
                        "                                                                                    <td>1</td>\n" +
                        "                                                                                    <td>"+response.data.storename+"</td>\n" +
                        "                                                                                    <td>"+response.data.storemanname+"</td>\n" +
                        "                                                                                </tr>");
                    }
                }
            ).catch(
                function (error) {
                    alert("Error...try again");
                }
            )
        }

    </script>
@endsection
