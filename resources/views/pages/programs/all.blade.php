@extends('layouts.app')

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header">
          <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('program.create') }}"><i class="now-ui-icons ui-1_simple-add"></i> Program</a>
            <h5 class="title">Product Management</h5>
          </div>

          <div class="card-body">
            @if(!empty($data) && $data->count())

              <div class="table-responsive">
                <table class="table table-hover text-center" >
                  <thead class=" text-primary">
                    <th>#</th>
                    <th>Name</th>
                    <th>Page Link</th>
                    <th>Date</th>
                    <th class="text-right">Action</th>
                  </thead>

                  <tbody>
                  <!-- @php($i = 1) -->
                  <?php $i = ($data->currentpage()-1)* $data->perpage(); ?>
                      @foreach($data as $program)
                          <tr>
                            <th scope="row" style="text-align: center;">{{ $i += 1 }}</th>
                            <td style="text-transform:capitalize">{{ $program->program_name }}</td>
                            <td>
                              <a target="_blank" href="{{ $program->page_link }}">{{ $program->page_link }}</a>
                            </td>
                            <td>{{ date('d/m/Y', strtotime($program->date_start)) }} - {{ date('d/m/Y', strtotime($program->date_end)) }}</td>
                            <td class="td-actions ">
                              <div class="row text-right">
                              <a type="button" href="{{ route('program.edit', $program->program_id)}}" class="btn btn-success btn-sm btn-icon">
                                <i class="now-ui-icons ui-2_settings-90"></i>
                              </a>&nbsp;
                              <form action="{{ route('program.destroy', $program->program_id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm btn-icon">
                                  <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                              </form>
                              </div>
                            </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              
              <div class="float-right pt-3">{{$data->links('pagination::bootstrap-4')}}</div>
              
            @else
                <h7 class="text-center">There are no data.</h7>
            @endif

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection