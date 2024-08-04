<!doctype html>
<html lang="en">

<head>
    <title>Crear Modelo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="modal fade" id="createModeloModal" tabindex="-1" aria-labelledby="createModeloModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModeloModalLabel">Crear Modelo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('modelovehiculo.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" id="name" class="form-control"
                                        placeholder="Ingresar Nombre" required maxlength="20" />
                                    <div class="error-message text-danger" id="nameError"></div>
                                </div>
                                @php
                                    $marcas = \App\Models\MarcaVehiculo::all();
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Marca</label>
                                    @if (isset($marcas) && $marcas->isNotEmpty())
                                        <select id="marca" name="marca" class="form-control" required>
                                            <option value="">Seleccione una marca</option>
                                            @foreach ($marcas as $marca)
                                                <option value="{{ $marca->id }}">
                                                    {{ $marca->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay marcas disponibles.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                @php
                                    $tipos = \App\Models\TipoVehiculo::all();
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Grupo de Vehículo</label>
                                    @if (isset($tipos) && $tipos->isNotEmpty())
                                        <select id="grupo" name="grupo" class="form-control" required>
                                            <option value="">Seleccione un grupo de vehículo</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">
                                                    {{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay tipo vehiculo disponibles.</p>
                                    @endif
                                </div>
                                @php
                                    $cajas = \App\Models\TipoCaja::all();
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Tipo de Transmisión</label>
                                    @if (isset($cajas) && $cajas->isNotEmpty())
                                        <select id="tipo_caja" name="tipo_caja" class="form-control" required>
                                            <option value="">Seleccione un tipo de caja</option>
                                            @foreach ($cajas as $caja)
                                                <option value="{{ $caja->id }}">
                                                    {{ $caja->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay tipo caja disponibles.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                @php
                                    $combustibles = \App\Models\TipoCombustible::all();
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Tipo Combustible</label>

                                    @if (isset($combustibles) && $combustibles->isNotEmpty())

                                        <select id="tipo_combustible" name="tipo_combustible" class="form-control"
                                            required>
                                            <option value="">Seleccione un tipo de combustible</option>
                                            @foreach ($combustibles as $combustible)
                                                <option value="{{ $combustible->id }}">
                                                    {{ $combustible->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay combustibles disponibles.</p>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Capacidad</label>
                                    <input type="number" name="capacidad_combustible" id="capacidad_combustible"
                                        class="form-control" placeholder="Ingresar Capacidad" required
                                        oninput="formatNumber(this)" />
                                    <div class="error-message text-danger" id="nameError"></div>
                                    <script>
                                        function formatNumber(input) {
                                            let value = input.value;
                                            value = value.replace(/[\.,]/g, '');
                                            value = Math.abs(value);
                                            input.value = value;
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="row">

                                @php
                                    $graficos = \App\Models\GraficoVehiculo::all();
                                @endphp

                                <div class="col-md-6 mb-3">
                                    <label for="grafico">Referencia vehículo</label>
                                    @if (isset($graficos) && $graficos->isNotEmpty())
                                        <select id="grafico" name="grafico_vehiculo_id" class="form-control" required>
                                            <option value="">Seleccione una referencia</option>
                                            @foreach ($graficos as $grafico)
                                                <option value="{{ $grafico->id }}"
                                                    data-ruta="{{ asset('storage/graficos/' . $grafico->ruta_archivo) }}">
                                                    {{ $grafico->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay tipo gráfico disponibles.</p>
                                    @endif
                                </div>
                                @php
                                    $itvs = \App\Models\TipoItv::all();
                                @endphp
                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Tipo de Revisión Tecnomecánica</label>
                                    @if (isset($itvs) && $itvs->isNotEmpty())
                                        <select id="tipo_itv" name="tipo_itv" class="form-control" required>
                                            <option value="">Seleccione un tipo de revisión</option>
                                            @foreach ($itvs as $itv)
                                                <option value="{{ $itv->id }}">
                                                    {{ $itv->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay tipo itv disponibles.</p>
                                    @endif
                                </div>

                            </div>
                            <div class="row">


                                <div class="col-md-6 mb-3">
                                    <img id="grafico_imagen" src="" alt="Imagen del gráfico"
                                        style="max-width: 250px; height: auto; display: none;">
                                    <div id="error-message" style="display: none;">Error al cargar la imagen.</div>
                                </div>

                                <script>
                                    document.getElementById('grafico').addEventListener('change', function() {
                                        var selectedOption = this.options[this.selectedIndex];
                                        var rutaArchivo = selectedOption.getAttribute('data-ruta');
                                        var imgElement = document.getElementById('grafico_imagen');
                                        var errorMessage = document.getElementById('error-message');

                                        console.log("Selected image path: ", rutaArchivo); // Para depuración

                                        if (rutaArchivo) {
                                            imgElement.src = rutaArchivo;
                                            imgElement.style.display = 'block';
                                            errorMessage.style.display = 'none';
                                        } else {
                                            imgElement.src = '';
                                            imgElement.style.display = 'none';
                                            errorMessage.style.display = 'block';
                                        }
                                    });
                                </script>

                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Tipo de Vehículo</label>
                                    <select id="tipo_vehiculo" name="tipo_vehiculo" class="form-control" required>
                                        <option value="">Seleccione un tipo de vehículo</option>
                                        <option value="automovil">Automóvil</option>
                                        <option value="camion">Camión</option>
                                        <option value="camioneta">Camioneta</option>
                                        <option value="turismo">Turismo</option>
                                        <option value="minibus">Minibús</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="accesorios" class="form-label">Accesorios</label>
                                    @php
                                        $accesorios = \App\Models\AccesorioVehiculo::all();
                                    @endphp
                                    @if (isset($accesorios) && $accesorios->isNotEmpty())
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="select_all_accesorios">
                                            <label class="form-check-label" for="select_all_accesorios">
                                                Seleccionar todos
                                            </label>
                                        </div>
                                        <br />
                                        <div class="row g-3">
                                            @foreach ($accesorios as $accesorio)
                                                <div class="col-md-6">
                                                    <!-- Ajusta el tamaño de la columna según necesites -->
                                                    <div class="form-check">
                                                        <input class="form-check-input accesorios-checkbox"
                                                            type="checkbox" name="accesorio_vehiculo[]"
                                                            value="{{ $accesorio->id }}"
                                                            id="accesorios_{{ $accesorio->id }}">
                                                        <label class="form-check-label"
                                                            for="accesorios_{{ $accesorio->id }}">
                                                            {{ $accesorio->nombre }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No hay accesorio disponibles.</p>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tipo_vehiculo" class="form-label">Equipamentos</label>
                                    @php
                                        $equipamientos = \App\Models\EquipamientoVehiculo::all();
                                    @endphp
                                    @if (isset($equipamientos) && $equipamientos->isNotEmpty())
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="select_all_equipamiento">
                                            <label class="form-check-label" for="select_all_equipamiento">
                                                Seleccionar todos
                                            </label>
                                        </div>
                                        <br />
                                        <div class="row g-3">
                                            @foreach ($equipamientos as $equipamiento)
                                                <div class="col-md-6">
                                                    <!-- Ajusta el tamaño de la columna según necesites -->
                                                    <div class="form-check">
                                                        <input class="form-check-input equipamiento-checkbox"
                                                            type="checkbox" name="equipamiento_vehiculo[]"
                                                            value="{{ $equipamiento->id }}"
                                                            id="equipamiento_{{ $equipamiento->id }}">
                                                        <label class="form-check-label"
                                                            for="equipamiento_{{ $equipamiento->id }}">
                                                            {{ $equipamiento->nombre }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>No hay equipamiento disponibles.</p>
                                    @endif
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectAllCheckbox = document.getElementById('select_all_equipamiento');
            var tipovehiculosCheckboxes = document.querySelectorAll('.equipamiento-checkbox');
            var selectAllCheckbox2 = document.getElementById('select_all_accesorios');
            var accesoriosCheckboxes = document.querySelectorAll('.accesorios-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                tipovehiculosCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
            selectAllCheckbox2.addEventListener('change', function() {
                accesoriosCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox2.checked;
                });
            });

            tipovehiculosCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (!checkbox.checked) {
                        selectAllCheckbox.checked = false;
                    }
                });
            });
            accesoriosCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (!checkbox.checked) {
                        selectAllCheckbox2.checked = false;
                    }
                });
            });



            var createModeloModalLabel = document.getElementById(
                'createModeloModalLabel');

            createModeloModalLabel.addEventListener('submit', function(e) {
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
                                'createModeloModalLabel'));
                            modal.hide();
                        } else {
                            // Manejar errores
                            document.getElementById('nameError').textContent = response.errors.name;
                        }
                    }
                };
                request.send(formData);
            });
            $('#grafico').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var rutaArchivo = selectedOption.data('ruta');
                var imgElement = $('#grafico_imagen');
                var errorMessage = $('#error-message');

                console.log("Selected image path: ", rutaArchivo); // Para depuración

                if (rutaArchivo) {
                    imgElement.attr('src', rutaArchivo);
                    imgElement.show();
                    errorMessage.hide();
                } else {
                    imgElement.attr('src', '');
                    imgElement.hide();
                    errorMessage.show();
                }
            });
        });
    </script>

</body>

</html>
