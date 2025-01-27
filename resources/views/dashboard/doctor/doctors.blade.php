@extends('Layouts.parent1')
@section('title', 'Our Doctors')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Doctors</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of doctor</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Active</th>
                          <th>image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Show</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                        @foreach($doc as $doc)
                          <td>{{$doc->name}}</td>
                          <td>{{$doc->price}}</td>
                          <td>  @if($doc->active)
                                 Yes 
                             @else
                                  No
                                 @endif</td>
                                 <th><img src="{{ asset('assets/dashboard/images/'.$doc->image) }}" alt="doctor" width="100" height="100"></th>
                          <td><a href="doctor/edit/{{$doc->id}}" class="btn btn-outline-success m-1">Edit</a></td>
                          <td><a href="doctor/delete/{{$doc->id}}"  class="btn btn-outline-success m-1" onclick="return confirm('Are you sure you want to delete?')"  >Delete</a></td>
                          <td><a href="doctor/showcar/{{$doc->id}}" class="btn btn-outline-success m-1">Show</a></td>
                        </tr>
                        @endforeach
                     
                        
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection