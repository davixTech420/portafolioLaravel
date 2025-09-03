@extends('adminlte::page')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Email</th>
										<th>Profile Photo Path</th>
										<th>Description</th>
										<th>Facebook Url</th>
										<th>Twitter Url</th>
										<th>Dribbble Url</th>
										<th>Linkedin Url</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Url Cv</th>
                                        <th>Password</th>
									
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td><img src="{{ asset($user->profile_photo_path) }}" width="60" height="60"></td>
											<td>{{ $user->description }}</td>
											<td>{{ $user->facebook_url }}</td>
											<td>{{ $user->twitter_url }}</td>
											<td>{{ $user->dribbble_url }}</td>
											<td>{{ $user->linkedin_url }}</td>
											<td>{{ $user->phone }}</td>
											<td>{{ $user->address }}</td>
											<td>{{ $user->url_cv }}</td>
                                            <td>{{ Str::limit($user->password,5,'...') }}</td>
                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="deleteRecord({{ $user->id }}); event.preventDefault();" ><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
   
@endsection
