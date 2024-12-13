<x-modal modalId="modalProduct" modalTitle="Productos" modalSize="modal-lg">
    <form wire:submit.prevent="{{$Id==0 ? "store" : "update($Id)"}} ">
        <div class="form-row">
            {{--Input Name--}}
            <div class="form-group col-md-6">
                <label for="name">Nombre:</label>
                <input wire:model='name' type="text" class="form-control" id="name" placeholder="Nombre del Producto">
                @error('name')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            {{--Select category--}}
            <div class="form-group col-md-6">
                <label for="category_id">Categoria:</label>
                <select wire:model='category_id' id="category_id" class="form-control">
                    <option value="0">Seleccionar </option>
                    @foreach ($this->categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    
                </select>

                @error('category_id')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            {{--Textarea Descripción--}}
            <div class="form-group col-md-12">
                <label for="category_id">Descripción:</label>

                <textarea wire:model='descripcion' id="descripcion" class="form-control" cols="30" rows="3">
                </textarea>
                

                @error('descripcion')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            {{--Input precio de compra--}}
            <div class="form-group col-md-4">
                <label for="precio_compra">Precio de Compra:</label>
                <input wire:model='precio_compra' min="0" type="number" step="any" class="form-control" id="precio_compra" 
                placeholder="Precio de compra">
                @error('precio_compra')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            {{--Input precio de venta--}}
            <div class="form-group col-md-4">
                <label for="precio_venta">Precio de Venta:</label>
                <input wire:model='precio_venta' step="any" type="number" min="0" class="form-control" id="precio_venta" 
                placeholder="Precio de venta">
                @error('precio_venta')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            {{--Input codigo de barras--}}
            <div class="form-group col-md-4">
                <label for="codigo_barras">Codigo de barras:</label>
                <input wire:model='codigo_barras' type="number" class="form-control" id="codigo_barras" 
                placeholder="Codigo de barras">
                @error('codigo_barras')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>            
            {{--Input stock--}}
            <div class="form-group col-md-4">
                <label for="stock">Stock:</label>
                <input wire:model='stock' type="number" class="form-control" id="stock" 
                placeholder="Stock del producto">
                @error('stock')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>
            {{--Input stock minimo--}}
            <div class="form-group col-md-4">
                <label for="stock_minimo">Stock minimo:</label>
                <input wire:model='stock_minimo' type="number" class="form-control" id="stock_minimo" 
                placeholder="Stock minimo">
                @error('stock_minimo')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>           
            {{--Input fecha de vencimiento--}}
            <div class="form-group col-md-4">
                <label for="fecha_vencimiento">Fecha de vencimiento:</label>
                <input wire:model='fecha_vencimiento' type="date" class="form-control" id="fecha_vencimiento" 
                >
                @error('fecha_vencimiento')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div> 
            {{--Checkbox active--}}
            <div class="form-group col-md-4">
                <div class="icheck-primary">
                    <input wire:model='active' type="checkbox" id="active" checked>
                    <label for="active">¿Está activo?</label>
                </div>
                @error('active')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div> 
            {{--Input imagen--}}
            <div class="form-group col-md-3">

                <label for="image">Imagen</label>
                <input wire:model='image' type="file" id="image" accept="image/">
                
                @error('image')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div> 
            {{--Imagen--}}
            <div class="form-group col-md-6">
                @if($Id>0)
                    <x-image :item="$product=App\Models\Product::find($Id)" float="float-right" size="150"/>
                @endif

                @if ($this->image)
                       <img src="{{$image->temporaryURL()}}" width="200" alt="" class="rounded float right">    
                @endif 
            </div> 
        </div>
        <hr>
        <button wire:loading.attr='disabled' class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
    </form>
</x-modal>