<!doctype html>
<html lang="en">

<head>
    <title>Editar Usuario</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="modal fade" id="editUsersModal" tabindex="-1" aria-labelledby="editUsersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUsersModalLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUsersForm" action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="userId" />

                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="tipo_usuario">Rol</label>
                                        <select id="tipo_usuario2" name="tipo_usuario" class="form-control" required>
                                            @foreach (\App\Models\UserGroup::all() as $userGroup)
                                                <option value="{{ $userGroup->id }}">{{ $userGroup->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="tipoUsuarioError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="estado">Estado</label>
                                        <select id="estado" name="estado" class="form-control" required>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                        <span class="text-danger" id="estadoError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="name">Nombre</label>
                                        <input type="text" name="name" id="name2" class="form-control"
                                            required />
                                        <span class="text-danger" id="nameError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="apellido">Apellido</label>
                                        <input type="text" name="apellido" id="apellido2" class="form-control"
                                            required />
                                        <span class="text-danger" id="apellidoError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="tipo_documento">Tipo de Documento</label>
                                        <select id="tipo_documento2" name="tipo_documento" class="form-control"
                                            required>
                                            @foreach (\App\Models\tipoDocumento::all() as $tipoDocumento)
                                                <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="tipoDocumentoError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="numero_documento">Número de Documento</label>
                                        <input type="text" name="numero_documento" id="numero_documento2"
                                            class="form-control" required />
                                        <span class="text-danger" id="numeroDocumentoError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="numero_telefonico">Número Telefónico</label>
                                        <input type="text" name="numero_telefonico" id="numero_telefonico2"
                                            class="form-control" required />
                                        <span class="text-danger" id="numeroTelefonicoError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email2" class="form-control"
                                            required />
                                        <span class="text-danger" id="emailError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password2"
                                                class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text custom-toggle-password"
                                                    id="togglePassword3">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="passwordError"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="confirmPassword">Repetir Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="confirmPassword2"
                                                class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text custom-toggle-password"
                                                    id="togglePassword4">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="confirmPasswordError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/script-edit.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var editUsersModal = document.getElementById('editUsersModal');

            editUsersModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Botón que abrió el modal
                var userId = button.getAttribute('data-id');

                // Realiza una solicitud para obtener los datos del usuario
                fetch(`/users/data/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                        } else {
                            // Actualiza los elementos del formulario en el modal con los datos del usuario
                            document.getElementById('userId').value = data.id;
                            document.getElementById('tipo_usuario').value = data.tipo_usuario;
                            document.getElementById('name').value = data.name;
                            document.getElementById('apellido').value = data.apellido;
                            document.getElementById('tipo_documento').value = data.tipo_documento;
                            document.getElementById('numero_documento').value = data.numero_documento;
                            document.getElementById('numero_telefonico').value = data.numero_telefonico;
                            document.getElementById('email').value = data.email;

                            // Actualiza la acción del formulario para el ID del usuario actual
                            var form = document.getElementById('editUsersForm');
                            form.action =
                                `/users/${userId}`; // Asegúrate de que la ruta para la edición sea correcta
                        }
                    })
                    .catch(error => console.error('Error al obtener los datos del usuario:', error));
            });
        });
    </script>
</body>

</html>
