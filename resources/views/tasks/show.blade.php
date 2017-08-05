@extends('layouts.app')

@section('content')
  <div id="app" class="container">
    <!-- <h1>@{{ message }}</h1> -->
    <ul class="list-group">
      <li class="list-group-item" v-for="step in steps">
        @{{ step.name }}
        <i class="fa fa-check pull-right" @click="complete(step)"></i>
      </li>
    </ul>
    <form class="form-inline" @submit.prevent="addStep">
      <!-- <input type="text" name="" value="" v-model="newStep" @keyup.enter="addStep" class="form-control"> -->
      <input type="text" name="" value="" v-model="newStep" class="form-control">
      <button type="submit" name="button" class="btn btn-primary">添加步奏</button>
    </form>
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
          },
          complete: function(step){
            step.completed = true;
          }
        }
      });
  </script>
@endsection
