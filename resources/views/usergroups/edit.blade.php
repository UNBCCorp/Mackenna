<!doctype html>
<html lang="en">

<head>
    <title>Editar Rol</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .hidden {
            display: none;
        }
    </style>
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
                            <form id="editUserGroupForm" action="{{ route('usergroups.update', $userGroup->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Nombre</label>
                                    <input type="text" name="name" id="edit_name" class="form-control"
                                        value="{{ $userGroup->name }}" required />
                                    <div class="error-message text-danger" id="editNameError"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="permissions" class="form-label">Permisos</label>
                                    @php
                                        $tipospermisos = \App\Models\Permiso::all()->groupBy('modulo');
                                    @endphp
                                    @if ($tipospermisos->isNotEmpty())
                                        @foreach ($tipospermisos as $modulo => $permisos)
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input select_all_module" type="checkbox"
                                                        id="select_all_{{ $modulo }}"
                                                        onclick="selectAllPermissions(this)">
                                                    <label class="form-check-label"
                                                        for="select_all_{{ $modulo }}">
                                                        Módulo {{ $modulo }}
                                                    </label>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-secondary ms-2"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#permissions_{{ $modulo }}"
                                                    aria-expanded="false"
                                                    aria-controls="permissions_{{ $modulo }}">
                                                    <i class="bi bi-chevron-down"></i>
                                                </button>
                                            </div>

                                            <br />
                                            <div class="row g-3">
                                                @foreach ($permisos as $permission)
                                                    <div class="col-md-4">
                                                        <input class="form-check-input permission-checkbox"
                                                            type="checkbox" name="permissions[]"
                                                            value="{{ $permission->id }}"
                                                            data-module="{{ $modulo }}"
                                                            id="permission_{{ $permission->id }}"
                                                            @if (isset($selectedPermissions) && in_array($permission->id, $selectedPermissions)) checked @endif>
                                                        <label class="form-check-label"
                                                            for="permission_{{ $permission->id }}">
                                                            {{ $permission->nombre }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
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
            var selectAllCheckboxes = document.querySelectorAll('.select_all_module');
            var permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            function updateSelectAllCheckboxState(module) {
                var moduleCheckboxes = document.querySelectorAll(`.permission-checkbox[data-module="${module}"]`);
                var allChecked = Array.from(moduleCheckboxes).every(cb => cb.checked);
                var selectAllCheckbox = document.getElementById(`select_all_${module}`);
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = allChecked;
                }
            }

            selectAllCheckboxes.forEach(function(selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    var module = this.dataset.module;
                    var moduleCheckboxes = document.querySelectorAll(
                        `.permission-checkbox[data-module="${module}"]`);
                    moduleCheckboxes.forEach(function(checkbox) {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });
            });

            permissionCheckboxes.forEach(function(permissionCheckbox) {
                permissionCheckbox.addEventListener('change', function() {
                    var module = this.dataset.module;
                    updateSelectAllCheckboxState(module);
                });
            });

            var editUserGroupModal = document.getElementById('editUserGroupModal');

            editUserGroupModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var name = button.getAttribute('data-name');
                var permissions = button.getAttribute('data-permissions');

                var form = document.getElementById('editUserGroupForm');
                form.action = form.action.replace('usergroup_id', id);
                document.getElementById('edit_name').value = name;

                var selectedPermissions = JSON.parse(permissions || '[]').map(Number);
                permissionCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectedPermissions.includes(parseInt(checkbox.value));
                });

                var modules = Array.from(new Set(Array.from(permissionCheckboxes).map(cb => cb.dataset
                    .module)));
                modules.forEach(function(module) {
                    updateSelectAllCheckboxState(module);
                });
            });
        });
    </script>
</body>

</html>
