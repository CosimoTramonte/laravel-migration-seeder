<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel 9 + Bootstrap Template</title>

        {{-- Includiamo gli assets con la direttiva @vite --}}
        @vite('resources/js/app.js')
    </head>
    <body>

        <main class="bg-light">
            <div class="container vh-100 py-5">
              <h1 class="mb-4">Treni</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Agency</th>
                    <th scope="col">Departure station</th>
                    <th scope="col">Arrival station</th>
                    <th scope="col">Departure time</th>
                    <th scope="col">Arrival time</th>
                    <th scope="col">Train code</th>
                    <th scope="col">Number of carriage</th>
                    <th scope="col">In time</th>
                    <th scope="col">Deleted</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($trains as $train)
                  <tr>
                    <th scope="row">{{$train->id}}</th>
                    <td>{{$train->agency}}</td>
                    <td>{{$train->departure_station}}</td>
                    <td>{{$train->arrival_station}}</td>
                    <td>{{$train->departure_time}}</td>
                    <td>{{$train->arrival_time}}</td>
                    <td>{{$train->train_code}}</td>
                    <td>{{$train->number_of_carriages}}</td>

                    @if ($train->in_time === 1 && $train->deleted === 0)
                        <td class="text-success"><strong>IN ORARIO</strong></td>
                        <td class="text-success"><strong>IN SERVIZIO</strong></td>
                    @elseif ($train->in_time === 0 && $train->deleted === 0)
                        <td class="text-danger"><strong>IN RITARDO</strong></td>
                        <td class="text-success"><strong>IN SERVIZIO</strong></td>
                    @else
                        <td></td>
                        <td class="text-danger"><strong>CANCELLATO</strong></td>
                    @endif


                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </main>


    </body>
</html>
