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
                <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <input type="text" name="municipio" class="form-control" required>
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
                <div class="form-group">
                    <label for="provincia">Provincia</label>
                    <input type="text" name="provincia" class="form-control" required>
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
                <div class="form-group">
                    <label for="sucursal">Pertenece a la Sucursal</label>
                    <input type="text" name="sucursal" class="form-control">
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
                    <input type="text" name="medio_pago" class="form-control">
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
                <div class="form-group full-width">
                    <label for="opciones">Opciones</label>
                    <textarea name="opciones" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="tarifas">Tarifas</label>
                    <input type="text" name="tarifas" class="form-control">
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
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    // Cambia entre las pestañas
    $('#myTab a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
