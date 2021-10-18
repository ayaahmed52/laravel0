@extends('layouts.dashboard.app')
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active"> @lang('site.users')</li>
            </ol>


    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('site.users')</h3>
            </div>
        <div class="box-body">
          <form>

              <div class="row">
                  <div class='col-md-4'>
                      <input type='text' name="search" placeholder="@lang('site.search')" class="form-control" >
                  </div>

                  <div class='col-md-4'>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                 <a class="btn btn-primary" href="{{ route('dashboard.users.create') }}"><i class="fa fa-plus"></i>@lang('site.add')</a>
                  </div>

              </div>

          </form>


            <!-- /.card-header -->
            <div class="box-body">
                @if($users -> count() > 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.first_name')</th>
                            <th>@lang('site.last_name')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.action')</th>

                        </tr>
                        </thead>
                    <tbody>
                    @foreach($users as $index=>$user)
                        <tr>
                            <td>{{  $index +1  }}</td>
                            <td>{{  $user -> first_name  }}</td>
                            <td>{{  $user -> last_name  }}</td>
                            <td>{{  $user -> email  }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('dashboard.users.edit', $user->id ) }}">@lang('site.edit')</a>
                            <form method="post" style="display: inline-block" action="{{ route('dashboard.users.destroy', $user->id)  }}">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger"> @lang('site.delete') </button>
                            </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                @else
                    <h2>@lang('site.no_data_found')</h2>
                @endif
            </div>
        </div>
        </div>
    </section>
    </div>
@endsection
