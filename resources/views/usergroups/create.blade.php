<!doctype html>
<html lang="en">

<head>
    <title>Crear Rol</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="modal fade" id="createUserGroupModal" tabindex="-1" aria-labelledby="createUserGroupModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserGroupModalLabel">Crear Rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('usergroups.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Ingresar Nombre" required />
                                <div class="error-message text-danger" id="nameError"></div>
                            </div>

                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permisos</label>
                                @php
                                    $tipospermisos = \App\Models\Permiso::all();
                                @endphp
                                @if (isset($tipospermisos) && $tipospermisos->isNotEmpty())
                                    @foreach ($tipospermisos as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $permission->id }}" id="permission_{{ $permission->id }}"
                                                @if (isset($selectedPermissions) && in_array($permission->id, $selectedPermissions)) checked @endif>
                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                {{ $permission->nombre }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No hay permisos disponibles.</p>
                                @endif
                            </div>


                            <div class="text-center pt-1 mb-5 pb-1">
                                <button class="btn btn-primary btn-block fa-lg  mb-3" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script src="{{ asset('assets/nombre.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var createUserGroupModalLabel = document.getElementById('createUserGroupModalLabel');

            createUserGroupModalLabel.addEventListener('submit', function(e) {
                e.preventDefault();
                var form = this;
                var formData = new FormData(form);
                var request = new XMLHttpRequest();
                request.open(form.method, form.action, true);
                request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                request.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        if (response.success) {
                            form.reset();
                            var modal = bootstrap.Modal.getInstance(document.getElementById(
                                'createUserGroupModalLabel'));
                            modal.hide();
                        } else {
                            // Manejar errores
                            document.getElementById('nameError').textContent = response.errors.name;
                        }
                    }
                };
                request.send(formData);
            });
        });
    </script>

</body>

</html>
