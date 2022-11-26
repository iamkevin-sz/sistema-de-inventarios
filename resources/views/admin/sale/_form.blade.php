
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select class="form-control" name="client_id" id="client_id">
             @foreach ($clients as $client)
                 <option value="{{$client->id}}">{{$client->name}}</option>
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
            <option value="" disabled selected>Seleccione un Producto</option>
             @foreach ($products as $product)
                 <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
             @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Stock Actual</label>
            <input type="text"
              class="form-control" name="stock" id="stock" value="stock" disabled>
          </div>

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number"
              class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="price">Precio de Venta</label>
            <input type="number"
              class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
          </div>

          <div class="form-group">
            <label for="descount">Porcentaje de Descuento</label>
            <input type="number"
              class="form-control" name="descount" id="descount" aria-describedby="helpId" value="0">
          </div>

          <div class="form-group">
            <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto </button>
          </div>

          <div class="form-group">

                <h4 class="card-title">Detalles de Venta</h4>
                <div class="table-responsive col-md-12">

                    <table id="detalles" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Producto</th>
                                <th>Precio de Venta (BS)</th>
                                <th>Descuento</th>
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

                            <tr>
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




