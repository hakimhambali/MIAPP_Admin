@extends('layouts.app')

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">

        @if(session('success'))          
          <div class="alert alert-success">
            <button type="button" aria-hidden="true" class="close">
                <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
            <span><strong>Successful!</strong> {{ session('success') }}</span>
          </div>
        @endif
        
        <div class="card">

          <div class="card-header">
            <h5 class="title" style="text-transform: capitalize">Edit - {{ $program->program_name }}</h5>
          </div>

          <div class="card-body">

            <form method="post" action="{{ route('program.update', $program->id) }}" autocomplete="off" enctype="multipart/form-data" >
              @csrf
              @include('alerts.success')
              
              <div class="col-md-12">

                <div class="row">
                  <div class="col-md-12 pb-3 text-center">
                    <img class="card-img-top" src="{{ asset($program->img_path) }}" style="max-width:50%">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>{{__(" Event ID")}}</label>
                        <input type="text" name="program_id" class="form-control" placeholder="Insert Program ID (Refer MIMS)" style="text-transform: uppercase" value="{{ $program->program_id }}" required>
                        @include('alerts.feedback', ['field' => 'program_id'])
                      </div>
                  </div>

                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__(" Event Name")}}</label>
                      <input type="text" name="program_name" class="form-control" placeholder="Insert Program Name" style="text-transform: capitalize" value="{{ $program->program_name }}" required>
                      @include('alerts.feedback', ['field' => 'program_name'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__(" Date Start")}}</label>
                      <input type="datetime-local" name="date_start" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($program->date_start)) }}" required>
                      @include('alerts.feedback', ['field' => 'date_start'])
                    </div>
                  </div>
    
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__(" Date End")}}</label>
                      <input type="datetime-local" name="date_end" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($program->date_end)) }}" required>
                      @include('alerts.feedback', ['field' => '	date_end'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 pr-1">
                    <div class="form-group">
                      <label>{{__(" Link Landing Page")}}</label>
                      <input type="text" name="page_link" class="form-control" placeholder="Insert Link of Program's Landing Page" value="{{ $program->page_link }}" required>
                      @include('alerts.feedback', ['field' => 'page_link'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__(" Poster Image")}}</label>
                      <input type="file" name="img_path" class="form-control" placeholder="Insert Program's Poster">
                      @include('alerts.feedback', ['field' => 'img_path'])
                    </div>
                  </div>
    
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>{{__(" Status")}}</label>
                      <select class="form-control" name="status">
                        <option value="Active" {{ $program->status == 'Active' ? 'selected' : '' }} >Active</option>
                        <option value="Deactive" {{ $program->status == 'Deactive' ? 'selected' : '' }} >Deactive</option>
                      </select>
                      @include('alerts.feedback', ['field' => '	status'])
                    </div>
                  </div>
                </div>

                <div class="card-footer text-right">
                  <a href="{{ route('programs') }}" class="btn btn-danger btn-round">{{__('Cancel')}}</a>
                  <button type="submit" class="btn btn-success btn-round">{{__('Save')}}</button>
                </div>
                <hr class="half-rule"/>

              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>

@endsection