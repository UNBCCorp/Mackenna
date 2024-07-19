<!doctype html>
<html lang="en">

<head>
    <title>Editar Rol</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="modal fade" id="editUserGroupModal" tabindex="-1" aria-labelledby="editUserGroupModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserGroupModalLabel">Editar Rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (isset($userGroup))
                            <form id="editUserGroupForm" action="{{ route('usergroups.update', 'usergroup_id') }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Nombre</label>
                                    <input type="text" name="name" id="edit_name" class="form-control" required />
                                    <div class="error-message text-danger" id="editNameError"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="permissions" class="form-label">Permisos</label>
                                    @php
                                        $tipospermisos = \App\Models\Permiso::all();
                                    @endphp
                                    @if ($tipospermisos->isNotEmpty())
                                        <div class="d-flex flex-wrap">
                                            @foreach ($tipospermisos as $permission)
                                                <div class="form-check me-3">
                                                    <!-- Agregamos 'me-3' para margen derecho -->
                                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        id="permission_{{ $permission->id }}"
                                                        @if (isset($selectedPermissions) && in_array($permission->id, $selectedPermissions)) checked @endif>
                                                    <label class="form-check-label"
                                                        for="permission_{{ $permission->id }}">
                                                        {{ $permission->nombre }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No hay permisos disponibles.</p>
                                    @endif
                                </div>



                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                                </div>
                            </form>
                        @endif
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
            var editUserGroupModal = document.getElementById('editUserGroupModal');

            editUserGroupModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Botón que abrió el modal
                var id = button.getAttribute('data-id'); // Obtener ID
                var name = button.getAttribute('data-name'); // Obtener nombre
                var permissions = button.getAttribute('data-permissions'); // Obtener permisos

                // Actualizar el formulario con los datos del grupo de usuarios
                var form = document.getElementById('editUserGroupForm');
                form.action = form.action.replace('usergroup_id', id); // Reemplaza el marcador por el ID
                document.getElementById('edit_name').value = name; // Llenar el input

                // Seleccionar los permisos asignados
                var selectedPermissions = JSON.parse(permissions || '[]').map(
                    Number); // Convertir a enteros
                console.log("Permisos seleccionados:",
                    selectedPermissions); // Para ver qué permisos se están pasando
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = selectedPermissions.includes(parseInt(checkbox.value));
                    console.log(
                        `Checkbox ${checkbox.value} checked: ${checkbox.checked}`
                    ); // Verificar qué checkboxes se marcan
                });
            });
        });
    </script>
</body>

</html>
