@props(['item'=>null, 'size'=>70, 'float'=>''])

<img src="{{$item->image ? Storage::url('public/'.$item->image->url) :  asset('no_imagen.png') }}" 
class="rounded {{$float}}" width="{{$size}}">