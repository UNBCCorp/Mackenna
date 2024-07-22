<!doctype html>
<html lang="en">

<head>
    <title>Editar Tarifa</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="modal fade" id="editTarifaModal" tabindex="-1" aria-labelledby="editTarifaModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTarifaModalLabel">Editar Tarifa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editTarifaForm" action="{{ route('tarifas.update', 'tarifa_id') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="edit_nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="edit_nombre" class="form-control"
                                    placeholder="Ingresar Nombre" required />
                                <div class="error-message text-danger" id="editNameError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_porcentaje" class="form-label">Porcentaje %</label>
                                <input type="number" name="porcentaje" id="edit_porcentaje" class="form-control"
                                    placeholder="Ingresar porcentaje" step="0.01" min="0" required />
                                <div class="error-message text-danger" id="editPorcentajeError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_tipo_vehiculo" class="form-label">Grupos Vehículos</label>
                                @php
                                    $tipovehiculos = \App\Models\TipoVehiculo::all();
                                @endphp
                                @if (isset($tipovehiculos) && $tipovehiculos->isNotEmpty())
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="select_all_tipovehiculos"
                                            onclick="selectAllTipovehiculos(this)">
                                        <label class="form-check-label" for="select_all_tipovehiculos">
                                            Seleccionar todos
                                        </label>
                                    </div>
                                    <br />
                                    <div class="row g-3">
                                        @foreach ($tipovehiculos as $tipovehiculo)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input tipovehiculos-checkbox"
                                                        type="checkbox" name="tipo_vehiculo[]"
                                                        value="{{ $tipovehiculo->id }}"
                                                        id="tipovehiculo_{{ $tipovehiculo->id }}">
                                                    <label class="form-check-label"
                                                        for="tipovehiculo_{{ $tipovehiculo->id }}">
                                                        {{ $tipovehiculo->nombre }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No hay grupos disponibles.</p>
                                @endif
                            </div>
                            <div class="text-center pt-1 mb-5 pb-1">
                                <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        function selectAllTipovehiculos(checkbox) {
            var tipovehiculosCheckboxes = document.querySelectorAll('.tipovehiculos-checkbox');
            tipovehiculosCheckboxes.forEach(function(tipovehiculoCheckbox) {
                tipovehiculoCheckbox.checked = checkbox.checked;
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var selectAllCheckbox = document.getElementById('select_all_tipovehiculos');
            var tipovehiculosCheckboxes = document.querySelectorAll('.tipovehiculos-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                tipovehiculosCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            tipovehiculosCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (!checkbox.checked) {
                        selectAllCheckbox.checked = false;
                    }
                });
            });

            var editTarifaModal = document.getElementById('editTarifaModal');
            editTarifaModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Botón que abrió el modal
                var id = button.getAttribute('data-id'); // Obtener ID
                var name = button.getAttribute('data-name'); // Obtener nombre
                var porcentaje = button.getAttribute('data-porcentaje'); // Obtener porcentaje
                var tipoVehiculo = button.getAttribute('data-tipo_vehiculo'); // Obtener tipo de vehículo

                console.log('ID:', id); // Depuración
                console.log('Nombre:', name); // Depuración
                console.log('Porcentaje:', porcentaje); // Depuración
                console.log('Tipo Vehículo:', tipoVehiculo); // Depuración

                var form = document.getElementById('editTarifaForm');
                form.action = form.action.replace('tarifa_id', id); // Reemplaza el marcador por el ID
                document.getElementById('edit_nombre').value = name; // Llenar el input nombre
                document.getElementById('edit_porcentaje').value = porcentaje; // Llenar el input porcentaje

                // Seleccionar los grupos de vehículos asignados
                var selectedTipoVehiculo = JSON.parse(tipoVehiculo || '[]'); // Convertir a array de strings
                tipovehiculosCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectedTipoVehiculo.includes(checkbox.value);
                });

                // Actualizar el estado del checkbox "Seleccionar todos"
                selectAllCheckbox.checked = selectedTipoVehiculo.length === tipovehiculosCheckboxes.length;
            });
        });
    </script>
</body>

</html>
