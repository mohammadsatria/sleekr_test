@extends('master')

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>To Do List</h3>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
              <form class="formStore" action="{{ route('store') }}" method="post">
                  <div class="form-group">
                      {{ csrf_field() }}
                        <label class="control-label col-md-1">To Do</label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" id="todo" placeholder="" maxlength="100">
                        </div>
                    </div>
                    <button type="button" onclick="store()" class="btn btn-primary">Save</button>
              </form>

            <div class="clearfix"></div>
          </div>
          {{-- link --}}
          <input type="hidden" id="urlDelete" value="{{ route('delete') }}">
          <input type="hidden" id="urlSave" value="{{ route('save') }}">

          <div class="x_content">
            <div class="table-responsive">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
