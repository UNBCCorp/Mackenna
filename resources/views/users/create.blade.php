<!doctype html>
<html lang="en">

<head>
    <title>Crear Usuario</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="modal fade" id="createUsersModal" tabindex="-1" aria-labelledby="createUsersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUsersModalLabel">Crear Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        @php
                                            $usergroups = \App\Models\UserGroup::all();
                                        @endphp
                                        <label class="form-label" for="tipo_documento">Rol</label>
                                        <select id="tipo_usuario" name="tipo_usuario" class="form-control" required>
                                            @foreach ($usergroups as $usergroup)
                                                <option value="{{ $usergroup->id }}">
                                                    {{ $usergroup->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="tipoDocumentoError"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-4">

                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="nombre">Nombre</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Nombre" required />
                                        <span class="text-danger" id="nameError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="apellido">Apellido</label>
                                        <input type="text" id="apellido" name="apellido" class="form-control"
                                            placeholder="Apellido" required />
                                        <span class="text-danger" id="apellidoError"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        @php
                                            $tipoDocumentos = \App\Models\tipoDocumento::all();
                                        @endphp
                                        <label class="form-label" for="tipo_documento">Tipo de
                                            Documento</label>
                                        <select id="tipo_documento" name="tipo_documento" class="form-control" required>
                                            @foreach ($tipoDocumentos as $tipoDocumento)
                                                <option value="{{ $tipoDocumento->id }}">
                                                    {{ $tipoDocumento->nombre }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="tipoDocumentoError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="numero_documento">Número de
                                            Documento</label>
                                        <input type="text" id="numero_documento" name="numero_documento"
                                            class="form-control" placeholder="Número de Documento" required />
                                        <span class="text-danger" id="numeroDocumentoError"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="numero_telefonico">Número
                                            Telefónico</label>
                                        <input type="text" id="numero_telefonico" name="numero_telefonico"
                                            class="form-control" placeholder="Número Telefónico" required />
                                        <span class="text-danger" id="numeroTelefonicoError"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="email">Correo</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Correo Electrónico" required />
                                        <span class="text-danger" id="emailError"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="password"
                                                class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text custom-toggle-password"
                                                    id="togglePassword1">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="passwordError"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="confirmPassword">Repetir
                                            Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="confirmPassword"
                                                class="form-control" />
                                            <div class="input-group-append">
                                                <span class="input-group-text custom-toggle-password"
                                                    id="togglePassword2">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="confirmPasswordError"></span>
                                    </div>
                                </div>
                            </div>




                            <div class="text-center pt-1 mb-5 pb-1">
                                <button class="btn btn-primary btn-block fa-lg mb-3" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword1 = document.getElementById('togglePassword1');
            const togglePassword2 = document.getElementById('togglePassword2');
            const passwordInput1 = document.getElementById('password');
            const passwordInput2 = document.getElementById('confirmPassword');

            function togglePasswordVisibility(input, icon) {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    input.type = 'password';
                    icon.innerHTML = '<i class="fas fa-eye"></i>';
                }
            }

            togglePassword1.addEventListener('click', () => {
                togglePasswordVisibility(passwordInput1, togglePassword1);
            });

            togglePassword2.addEventListener('click', () => {
                togglePasswordVisibility(passwordInput2, togglePassword2);
            });
        });
    </script>
    <script src="{{ asset('assets/validation-script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
