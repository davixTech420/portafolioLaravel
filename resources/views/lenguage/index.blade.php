@extends('adminlte::page')

@section('template_title')
    Lenguage
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lenguage') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lenguages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Codigo</th>
                                        
										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lenguages as $lenguage)
                                        <tr>
                                            <td>{{ $lenguage->id }}</td>
                                            
											<td>{{ $lenguage->name }}</td>

                                            <td>
                                                <form action="{{ route('lenguages.destroy',$lenguage->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('lenguages.edit',$lenguage->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="elim btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $lenguages->links() !!}
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
    // Para los botones con la clase 'elim'
    const elimButtons = document.querySelectorAll('.elim');
    elimButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.form.submit();
                }
                else{
                    event.preventDefault();
                }
            });
        });
    });
}
    </script>
@endsection
