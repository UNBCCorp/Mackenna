<!doctype html>
<html lang="en">

<head>
    <title>Crear Cliente</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            flex: 0 0 48%;
            margin-bottom: 15px;
        }

        .form-group.full-width {
            flex: 0 0 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createClientModalLabel">Crear Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('clientes.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="tipo_cliente" class="form-label">Tipo de Cliente</label>
                                <select id="tipo_cliente" name="tipo_cliente" class="form-control"
                                    onchange="showClientForm()">
                                    <option value="">Seleccione</option>
                                    <option value="particular">Particular</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                            </div>

                            <div id="particular_form" style="display:none;">
                                <!-- Campos específicos para clientes particulares -->
                                @include('clientes.particular_form')
                            </div>

                            <div id="empresa_form" style="display:none;">
                                <!-- Campos específicos para clientes empresa -->
                                @include('clientes.empresa_form')
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
        function showClientForm() {
            var tipoCliente = document.getElementById('tipo_cliente').value;
            document.getElementById('particular_form').style.display = tipoCliente === 'particular' ? 'block' : 'none';
            document.getElementById('empresa_form').style.display = tipoCliente === 'empresa' ? 'block' : 'none';
        }
    </script>
</body>

</html>
