@extends('layouts.appadmin')

@section('title')
    Sliders
@endsection
{{Form::hidden('', $increment=1)}}

@section('contenu')



      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sliders</h4>
          @if(Session::has('status'))
          <div class="alert alert-success">
            {{Session::get('status')}}
          </div>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Description one</th>
                        <th>Description two</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

              @foreach($sliders as $slider)

                    <tr>

                      <td>{{$increment}}</td>
                      <td><img src="/storage/slider_images/{{$slider->slider_image}}" alt=""></td>
                      <td>{{$slider->description1}}</td>
                      <td>{{$slider->description2}}</td>
                      
                      
                   <td>
              @if($slider->status == 1)

                    <label class="badge badge-success">Activé</label>
                        
              @else

                    <label class="badge badge-danger">Desactivé</label>
                        
              @endif
                        
                      </td>
                      <td>
                        <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_slider/'.$slider->id)}}'">Edit</button>
                        <button class="btn btn-outline-danger"><a href="{{url('/supprimerslider/'.$slider->id)}}" id="delete">Delete</a></button>

                        @if($slider->status == 1)
                        <button class="btn btn-outline-warning" onclick="window.location='{{url('/desactiver_slider/'.$slider->id)}}'">Desactiver</button>

                        @else 
                        <button class="btn btn-outline-success" onclick="window.location='{{url('/activer_slider/'.$slider->id)}}'">Activer</button>
                        @endif

                      </td>
                  </tr>
                  {{Form::hidden('', $increment= $increment + 1)}}
              @endforeach
                    

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



      
    @endsection

    @section('scripts')

    <script src="backend/js/data-table.js"></script>

    @endsection