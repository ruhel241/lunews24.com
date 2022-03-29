@extends('layouts.index')
@section('content')
        <!-- page content -->
        <div class="right_col" role="main">

        
          <div class="col-md-4 col-sm-12 col-xs-12">
             <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Organization </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">

                    <!-- start form for validation -->
                    <form action="{{route('UpdateOrganization', $EditOrganization->id)}}" method="post">
                     	{{csrf_field()}}
                      <label for="fullname">Name :</label>
                      <input value="{{$EditOrganization->title}}" type="text" id="fullname" class="form-control" name="title" required />
                        
                      <label for="fullname">Slug Name :</label>
                      <input value="{{$EditOrganization->slug}}" type="text" id="slug" class="form-control" name="slug" required />
                        <br/>
                      <button type="submit" class="btn btn-primary">Update Category </button>

                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>

          </div>


          <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="x_content">
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          
                          <th class="column-title">Organization Category</th>
                          <th class="column-title">Organization Slug </th>
                          <th class="column-title">Date/Time </th>
                          <!-- <th class="column-title no-link last"><span class="nobr">Action</span> -->
                          </th>

                          <th class="bulk-actions" colspan="7">
                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                        
                       <tr class="even pointer">
                          <td class="a-center ">
                            <input type="checkbox" class="flat" name="table_records">
                          </td>
                          <td class=" ">{{$EditOrganization->title}} </td>
                          <td class=" ">{{$EditOrganization->slug}} </td>
                          <td class=" ">{{$EditOrganization->created_at }} </td>
                          <!-- <td class=" last"><a href="">Edit</a> / <a href="#hjg">Delete</a> </td> -->
                        </tr>

                      </tbody>
                    </table>
                  </div>
                
                 </div>
    </div>
 </div>
        <!-- /page content -->

@endsection