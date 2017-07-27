@extends('layouts.app')

@section('content')
  <div id="app" class="container">
    <h1>@{{ message }}</h1>
    <input type="text" name="" value="" v-model="message">
  </div>
@endsection

@section('customJs')
  <script src="{{ asset('js/vue.js') }}"></script>
  <script>
      var app = new Vue({
        el: "#app",
        data: {
          message:"Hello sun"
        }
      });
  </script>
@endsection
