@extends('adminlte::page')

@section('template_title')
    Job
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
										<th>Description</th>
										
                                        <th>Title</th>
										<th>Logo Url</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="{{ asset($job->photo) }}" width="60px" heigh="60px" alt=""></td>

											<td>{{ $job->description }}</td>
											<td>{{ $job->title }}</td>
											<td>{{ $job->logo_url }}</td>

                                            <td>
                                                <form action="{{ route('jobs.destroy',$job->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('jobs.edit',$job->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $jobs->links() !!}
            </div>
        </div>
    </div>
@endsection
