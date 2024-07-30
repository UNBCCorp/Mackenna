<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1"
                aria-selected="true">Datos Generales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2"
                aria-selected="false">Datos Especificos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3"
                aria-selected="false">Opciones</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <div class="form-row">
                <!-- Campos para Tab 1 -->
                <div class="form-group">
                    <label for="cuenta_contable">Cuenta Contable</label>
                    <input type="text" name="cuenta_contable" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Nombre Comercial</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="razon_social">Razón Social</label>
                    <input type="text" name="razon_social" class="form-control" required>
                </div>
                @php
                    $comerciales = \App\Models\SectorComercial::all();
                @endphp
                <div class="form-group">
                    <label for="tipo_documento">Sector Comercial</label>
                    @if (isset($comerciales) && $comerciales->isNotEmpty())
                        <select id="comercial" name="comercial" class="form-control" required>
                            <option value="">Seleccione un sector</option>
                            @foreach ($comerciales as $comercial)
                                <option value="{{ $comercial->id }}">
                                    {{ $comercial->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay comercial disponibles.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="codigo_postal">Código Postal</label>
                    <input type="text" name="codigo_postal" class="form-control" required>
                </div>
                @php
                    $provincias = \App\Models\Ciudad::all();
                @endphp
                <div class="form-group">
                    <label for="provincia">Ciudad</label>
                    @if (isset($provincias) && $provincias->isNotEmpty())
                        <select id="municipio" name="municipio" class="form-control" required>
                            <option value="">Seleccione una ciudad</option>
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}">
                                    {{ $provincia->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay provincias disponibles.</p>
                    @endif
                </div>
                @php
                    $pais = \App\Models\Pais::all();
                @endphp
                <div class="form-group">
                    <label for="tipo_documento">País</label>
                    @if (isset($pais) && $pais->isNotEmpty())
                        <select id="pais" name="pais" class="form-control" required>
                            <option value="">Seleccione un país</option>
                            @foreach ($pais as $pai)
                                <option value="{{ $pai->id }}">
                                    {{ $pai->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay pais disponibles.</p>
                    @endif

                </div>


                @php
                    $tipodocumentos = \App\Models\TipoDocumento::all();
                @endphp
                <div class="form-group">
                    <label for="tipo_documento">Tipo de Documento</label>
                    @if (isset($tipodocumentos) && $tipodocumentos->isNotEmpty())
                        <select id="tipo_documento" name="tipo_documento" class="form-control" required>
                            <option value="">Seleccione un tipo documento</option>
                            @foreach ($tipodocumentos as $tipodocumento)
                                <option value="{{ $tipodocumento->id }}">
                                    {{ $tipodocumento->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay documentos disponibles.</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="numero_documento">Número de Documento</label>
                    <input type="text" name="numero_documento" class="form-control" required>
                </div>
                @php
                    $paisdocumentos = \App\Models\Pais::all();
                @endphp
                <div class="form-group">
                    <label for="tipo_documento">País del Documento</label>
                    @if (isset($paisdocumentos) && $paisdocumentos->isNotEmpty())
                        <select id="pais_documento" name="pais_documento" class="form-control" required>
                            <option value="">Seleccione un país</option>
                            @foreach ($paisdocumentos as $paisdocumento)
                                <option value="{{ $paisdocumento->id }}">
                                    {{ $paisdocumento->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay pais disponibles.</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="persona_contacto">Persona de Contacto</label>
                    <input type="text" name="persona_contacto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="numero_contacto">Número de Contacto</label>
                    <input type="text" name="numero_contacto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="web">Página Web</label>
                    <input type="text" name="web" class="form-control">
                </div>
                @php
                    $sucursales = \App\Models\Sucursal::all();
                @endphp
                <div class="form-group">
                    <label for="tipo_documento">Pertenece a la Sucursal</label>
                    @if (isset($sucursales) && $sucursales->isNotEmpty())
                        <select id="sucursal" name="sucursal" class="form-control" required>
                            <option value="">Seleccione una sucursal</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">
                                    {{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay idiomas disponibles.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="vehiculo_propio">Vehículo Propio</label>
                    <select name="vehiculo_propio" class="form-control">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                @php
                    $idiomas = \App\Models\Idioma::all();
                @endphp
                <div class="form-group">
                    <label for="tipo_documento">Idiomas</label>
                    @if (isset($idiomas) && $idiomas->isNotEmpty())
                        <select id="idiomas" name="idiomas" class="form-control" required>
                            <option value="">Seleccione un idioma</option>
                            @foreach ($idiomas as $idioma)
                                <option value="{{ $idioma->id }}">
                                    {{ $idioma->nombre }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay idiomas disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="form-row">
                <!-- Campos para Tab 2 -->
                <div class="form-group full-width">
                    <label for="observaciones">Observaciones</label>
                    <textarea name="observaciones" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="medio_pago">Medio de Pago</label>
                    <select name="medio_pago" id="medio_pago" class="form-control">
                        <option value="">Seleccione un medio de pago</option>
                        <option value="tarjeta_credito">Tarjeta de Crédito</option>
                        <option value="tarjeta_debito">Tarjeta de Débito</option>
                        <option value="transferencia_bancaria">Transferencia Bancaria</option>
                        <option value="webpay">Webpay</option>
                        <option value="khipu">Khipu</option>
                        <option value="paypal">PayPal</option>
                        <option value="mercadopago">Mercado Pago</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dias_credito">Días de Crédito</label>
                    <input type="number" name="dias_credito" class="form-control">
                </div>
                <div class="form-group">
                    <label for="canal">Canal</label>
                    <input type="text" name="canal" class="form-control">
                </div>
                <div class="form-group">
                    <label for="vent_dia">Ventas del Día</label>
                    <input type="text" name="vent_dia" class="form-control">
                </div>
                <div class="form-group full-width">
                    <label for="acuerdos">Acuerdos</label>
                    <textarea name="acuerdos" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" name="documento" class="form-control">
                </div>
                <div class="form-group">
                    <label for="documento2">Documento 2</label>
                    <input type="text" name="documento2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="documento3">Documento 3</label>
                    <input type="text" name="documento3" class="form-control">
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            <div class="form-row">
                <div class="form-group full-width">
                    <label for="opciones">Opciones</label>
                    <textarea name="opciones" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="permissions" class="form-label">Tarifas</label>
                    @php
                        $tarifas = \App\Models\Tarifa::all();
                        $tipoVehiculoIds = $tarifas
                            ->flatMap(function ($tarifa) {
                                return $tarifa->tipo_vehiculo;
                            })
                            ->unique()
                            ->toArray(); // Convertir a array

                        $tipoVehiculos = \App\Models\TipoVehiculo::whereIn('id', $tipoVehiculoIds)
                            ->pluck('nombre', 'id')
                            ->toArray();

                        $tipotarifas = $tarifas->groupBy(function ($tarifa) use ($tipoVehiculos) {
                            return array_intersect($tarifa->tipo_vehiculo, array_keys($tipoVehiculos));
                        });
                    @endphp

                    @if (isset($tipotarifas) && $tipotarifas->isNotEmpty())
                        @foreach ($tipotarifas as $ids_tipo_vehiculo => $tarifas)
                            @php
                                // Asegurarse de que $ids_tipo_vehiculo sea un array
                                $ids_tipo_vehiculo = is_array($ids_tipo_vehiculo)
                                    ? $ids_tipo_vehiculo
                                    : [$ids_tipo_vehiculo];

                                $nombres_tipo_vehiculo = array_intersect_key(
                                    $tipoVehiculos,
                                    array_flip($ids_tipo_vehiculo),
                                );
                            @endphp
                            @foreach ($nombres_tipo_vehiculo as $tipo_vehiculo_id => $nombre)
                                <div class="mb-10">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check me-3">
                                            <input class="form-check-input select_all_module" type="checkbox"
                                                id="select_all_{{ $tipo_vehiculo_id }}"
                                                data-tipo_vehiculo="{{ $tipo_vehiculo_id }}">
                                            <label class="form-check-label" for="select_all_{{ $tipo_vehiculo_id }}">
                                                Grupo Vehículo {{ $nombre }}
                                            </label>
                                        </div>
                                        <div class="arrow ms-2" data-tipo_vehiculo="{{ $tipo_vehiculo_id }}">
                                            <i class="bi bi-chevron-down" id="chevron_{{ $tipo_vehiculo_id }}"></i>
                                        </div>
                                    </div>
                                    <div class="mt-2 hidden tarifa-list"
                                        data-tipo_vehiculo="{{ $tipo_vehiculo_id }}">
                                        <div class="row g-3">
                                            @foreach ($tarifas as $tarifa)
                                                @if (in_array($tipo_vehiculo_id, $tarifa->tipo_vehiculo))
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <input class="form-check-input tarifa-checkbox"
                                                                type="checkbox" name="tarifas[]"
                                                                value="{{ $tarifa->id }}"
                                                                data-tipo_vehiculo="{{ $tipo_vehiculo_id }}"
                                                                id="tarifa_{{ $tarifa->id }}">
                                                            <label class="form-check-label"
                                                                for="tarifa_{{ $tarifa->id }}">
                                                                {{ $tarifa->nombre }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @else
                        <p>No hay Tarifas disponibles.</p>
                    @endif
                </div>




            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectAllModuleCheckboxes = document.querySelectorAll('.select_all_module');

        selectAllModuleCheckboxes.forEach(function(moduleCheckbox) {
            moduleCheckbox.addEventListener('change', function() {
                var tipo_vehiculo = this.dataset.tipo_vehiculo;
                var isChecked = this.checked;
                document.querySelectorAll(
                        `.tarifa-checkbox[data-tipo_vehiculo='${tipo_vehiculo}']`)
                    .forEach(function(tarifaCheckbox) {
                        tarifaCheckbox.checked = isChecked;
                    });
            });
        });

        var tarifaCheckboxes = document.querySelectorAll('.tarifa-checkbox');

        tarifaCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var tipo_vehiculo = this.dataset.tipo_vehiculo;
                var moduleCheckbox = document.querySelector(
                    `.select_all_module[data-tipo_vehiculo='${tipo_vehiculo}']`);
                var allChecked = Array.from(document.querySelectorAll(
                    `.tarifa-checkbox[data-tipo_vehiculo='${tipo_vehiculo}']`)).every(
                    function(c) {
                        return c.checked;
                    });
                moduleCheckbox.checked = allChecked;
            });
        });

        const arrows = document.querySelectorAll('.arrow');

        arrows.forEach((arrow) => {
            arrow.addEventListener('click', function() {
                const tipo_vehiculo = arrow.getAttribute('data-tipo_vehiculo');
                const tarifaList = document.querySelector(
                    `.tarifa-list[data-tipo_vehiculo="${tipo_vehiculo}"]`);
                const chevronIcon = document.getElementById(`chevron_${tipo_vehiculo}`);

                if (tarifaList.classList.contains('hidden')) {
                    tarifaList.classList.remove('hidden');
                    chevronIcon.classList.add('bi-chevron-up');
                    chevronIcon.classList.remove('bi-chevron-down');
                } else {
                    tarifaList.classList.add('hidden');
                    chevronIcon.classList.add('bi-chevron-down');
                    chevronIcon.classList.remove('bi-chevron-up');
                }
            });
        });
    });
</script>
<script>
    // Cambia entre las pestañas
    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
