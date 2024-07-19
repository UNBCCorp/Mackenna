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
            <div class="modal-dialog modal-lg">
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="select_all_permissions"
                                                onclick="selectAllPermissions(this)">
                                            <label class="form-check-label" for="select_all_permissions">
                                                Seleccionar todos
                                            </label>
                                        </div>

                                        <script>
                                            function selectAllPermissions(checkbox) {
                                                var permissionCheckboxes = document.querySelectorAll('.permission-checkbox');
                                                permissionCheckboxes.forEach(function(permissionCheckbox) {
                                                    permissionCheckbox.checked = checkbox.checked;
                                                });
                                            }
                                        </script>
                                        <br />
                                        <div class="row g-3">
                                            @foreach ($tipospermisos as $permission)
                                                <div class="col-md-4">
                                                    <input class="form-check-input permission-checkbox" type="checkbox"
                                                        name="permissions[]" value="{{ $permission->id }}"
                                                        id="permission_{{ $permission->id }}">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectAllCheckbox = document.getElementById('select_all_permissions');
            var permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            function updateSelectAllCheckboxState() {
                // Verifica si todos los checkboxes están seleccionados
                selectAllCheckbox.checked = Array.from(permissionCheckboxes).every(cb => cb.checked);
            }

            // Maneja el evento de cambio del checkbox "Seleccionar todos"
            selectAllCheckbox.addEventListener('change', function() {
                permissionCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            // Maneja el evento de cambio de los checkboxes individuales
            permissionCheckboxes.forEach(function(permissionCheckbox) {
                permissionCheckbox.addEventListener('change', function() {
                    var allSelected = Array.prototype.every.call(permissionCheckboxes, function(
                        permissionCheckbox) {
                        return permissionCheckbox.checked;
                    });

                    document.getElementById('select_all_permissions').checked = allSelected;
                });
            })
            // Maneja el evento de mostrar el modal
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
                permissionCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectedPermissions.includes(parseInt(checkbox.value));
                });

                // Actualizar el estado del checkbox "Seleccionar todos"
                updateSelectAllCheckboxState();
            });
        });
    </script>
</body>

</html>
