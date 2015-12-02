<div class="row sortable">
    @foreach($seccion -> items as $i)

        <div class="col-md-3">
            <div class="thumbnail">
            @if(Auth::check())
            <div class="iconos">
                    <span class="pull-left">
<!--                @if(!$i->destacado())
                    @if(Auth::user()->can("destacar_item"))
                        <i onclick="destacarItemSeccion('{{URL::to('admin/item/destacar')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack fa-lg"></i>
                    @endif
                @else
                    @if(Auth::user()->can("quitar_destacado_item"))
                        <i onclick="destacarItemSeccion('{{URL::to('admin/item/quitar-destacado')}}', '{{$seccion->id}}', '{{$i->id}}');" class="fa fa-thumb-tack prodDestacado fa-lg"></i>
                    @endif
                @endif-->
                <a href="{{URL::to('portfolio_completo/'.$i->lang()->url)}}"><i class="fa fa-eye fa-lg"></i></a>
                    </span>
                    <span class="pull-right">
                    @if(Auth::user()->can("editar_item"))
                            <a href="{{URL::to($prefijo.'/admin/'.$seccion->menuSeccion()->modulo()->nombre.'/editar/'.$i->id.'/seccion/'.$seccion->id)}}" data='{{$seccion->id}}'><i class="fa fa-pencil fa-lg"></i></a>
                    @endif
                    @if(Auth::user()->can("borrar_item"))
                        <i onclick="borrarData('{{URL::to('admin/item/borrar')}}', '{{$i->id}}');" class="fa fa-times fa-lg"></i>
                    @endif
                </span>
                    <div class="clearfix"></div>
            </div>
            @endif

            @if(!Auth::check())
                <a href="{{URL::to('portfolio_completo/'.$i->lang()->url)}}">
            @endif
                <div class="conEfectoHover">
                    <img class="lazy" data-original="@if(!is_null($i->imagen_destacada())){{ URL::to($i->imagen_destacada()->carpeta.$i->imagen_destacada()->nombre) }}@else{{URL::to('images/sinImg.gif')}}@endif" alt="{{$i->lang()->titulo}}">
                    <div class="efectoHover">
                        <p class="pull-left">{{ $i->lang()->titulo }}</p>
                    </div>
                </div>
            @if(!Auth::check())
                </a>
            @endif

            @if(Auth::check())
            <input type="hidden" name="orden[]" value="{{$i->id}}">
            @endif            		
            </div>
        </div>

    @endforeach
</div>
