<!doctype html>
<html lang="en">

<head>
    <title>Crear Sucursal</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="modal fade" id="createSurcursalModal" tabindex="-1" aria-labelledby="createSurcursalModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSurcursalModalLabel">Crear Sucursal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('surcursales.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" id="name" class="form-control"
                                        placeholder="Ingresar Nombre" required />
                                    <div class="error-message text-danger" id="nameError"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control"
                                        placeholder="Ingresar Dirección" required />
                                    <div class="error-message text-danger" id="direccionError"></div>
                                </div>
                            </div>
                            @php
                                $provincias = \App\Models\Ciudad::all();
                            @endphp
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="provincia">Provincia</label>
                                    @if (isset($provincias) && $provincias->isNotEmpty())
                                        <select id="ciudad" name="ciudad" class="form-control" required>
                                            <option value="">Seleccione una Provincia</option>
                                            @foreach ($provincias as $provincia)
                                                <option value="{{ $provincia->id }}">
                                                    {{ $provincia->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay provincias disponibles.</p>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tipo_sucursal">Tipo de Sucursal</label>
                                    <select name="tipo_sucursal" id="tipo_sucursal" class="form-control">
                                        <option value="">Seleccione un Tipo</option>
                                        <option value="Taller">Taller</option>
                                        <option value="Bodega">Bodega</option>
                                        <option value="Sucursal">Sucursal</option>
                                        <option value="Estacionamiento">Estacionamiento</option>
                                    </select>
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
            var createSurcursalModalLabel = document.getElementById('createSurcursalModalLabel');

            createSurcursalModalLabel.addEventListener('submit', function(e) {
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
                                'createSurcursalModalLabel'));
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
