@extends('layouts.app')

@section('content')
  <div id="app" class="container">
    <!-- <h1>@{{ message }}</h1> -->
    <ul class="list-group">
      <li class="list-group-item" v-for="step in steps">@{{ step.name }}</li>
      <input type="text" name="" value="" v-model="newStep" @keyup.enter="addStep" class="form-control">
    </ul>

    @{{ $data}}
  </div>
@endsection

@section('customJs')
  <script src="{{ asset('js/vue.js') }}"></script>
  <script>
      var app = new Vue({
        el: "#app",
        data: {
          // message:"Hello sun"
          steps:[
            {name:"fix bug",completed:false},
            {name:"meeting",completed:false},
          ],
          newStep:''
        },
        methods:{
          addStep:function(){
            //alert('输入');
            this.steps.push({name:this.newStep,completed:false});
            this.newStep = '';
          }
        }
      });
  </script>
@endsection
