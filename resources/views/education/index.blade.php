@extends('adminlte::page')

@section('template_title')
    Education
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Education') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('education.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Title</th>
										<th>Address</th>
										<th>Enterprise</th>
										<th>Description</th>
										<th>Dates</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($education as $education)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $education->title }}</td>
											<td>{{ $education->address }}</td>
											<td>{{ $education->enterprise }}</td>
											<td>{{ $education->description }}</td>
											<td>{{ $education->dates }}</td>

                                            <td>
                                                <form action="{{ route('education.destroy',$education->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('education.edit',$education->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
              {{--    {!! $education->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
