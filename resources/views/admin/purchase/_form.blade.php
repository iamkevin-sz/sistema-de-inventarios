
        <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control" name="provider_id" id="provider_id">
             @foreach ($providers as $provider)
                 <option value="{{$provider->id}}">{{$provider->name}}</option>
             @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="tax">Impuesto</label>
          <input type="number"
            class="form-control" name="tax" id="tax" aria-describedby="helpId" placeholder="13%">
        </div>

        <div class="form-group">
            <label for="product_id">Productos</label>
            <select class="form-control" name="product_id" id="product_id">
             @foreach ($products as $product)
                 <option value="{{$product->id}}">{{$product->name}}</option>
             @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number"
              class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="price">Precio de Compra</label>
            <input type="number"
              class="form-control" name="price" id="price" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto </button>
          </div>

          <div class="form-group">

                <h4 class="card-title">Detalles de Compra</h4>
                <div class="table-responsive col-md-12">

                    <table id="detalles" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Producto</th>
                                <th>Precio (BS)</th>
                                <th>Cantidad</th>
                                <th>Subtotal(BS)</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th colspan="4">
                                    <p  align = "right">Total:</p>
                                </th>
                                <th>
                                    <p  align = "right"> <span id='total'>BOB 0.00</span></p>
                                </th>
                            </tr>

                            <tr id="dvOcultar">
                                <th colspan="4">
                                    <p  align = "right">Total Impuesto (13%):</p>
                                </th>
                                <th>
                                    <p  align = "right"> <span id='total_impuesto'>BOB 0.00</span></p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <p  align = "right">Total Pagar:</p>
                                </th>
                                <th>
                                    <p  align = "right"> <span align = "right" id='total_pagar_html'>BOB 0.00</span> <input type="hidden" name="total" id="total_pagar"></p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>

                        </tbody>

                    </table>
                </div>



                {{-- <tr class="selected" id="fila'+cont+'">
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times"></i></button></td>

                    <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td>

                    <td><input type="hidden" id="price[]" name="price[]" value="'+price+'">
                        <input class="form-control" type="number" id="price[]" value="'+price+'" disabled>
                    </td>

                    <td><input type="hidden" name="quantity[]" value="'+quantity+'">
                        <input class="form-control" type="number" value="'+quantity+'" disabled></td>

                    <td align="right">s/'+subtotal[cont]+'</td>
                </tr> --}}



                {{-- <tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td><td><input type="hidden" id="price[]" name="price[]" value="'+price+'"><input class="form-control" type="number" id="price[]" value="'+price+'" disabled></td> <td><input type="hidden" name="quantity[]" value="'+quantity+'"><input class="form-control" type="number" value="'+quantity+'" disabled></td><td align="right">s/'+subtotal[cont]+'</td></tr> --}}
