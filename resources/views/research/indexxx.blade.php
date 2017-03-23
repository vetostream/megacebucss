@extends('layouts.general')

@section('content')
  <main id="research_project" >
    <!-- CONTENT -->
    <div class="container">
      <div class="section">
        <h4 class="center">Research Projects</h4>
        <div class="row">
          <!-- Accepted -->

          <div id="accepted" class="col s12">
            @foreach($researches as $research)
                <a href="{{ url('research/detail') }}/{{ $research->id }}">
                <div class="card green lighten-3 black-text">
                  <div class="card-content">
                    <div class="row">
                    <!-- change usericon.png -->
                      <div class="col s12 card-title">
                        <img src="images/usericon.png" alt="user" class="usericon circle center vertical_align">
                        <!-- change project title --> {{$research->title}}
                        <small class="right">{{$research->created_at}}</small> <!-- change date -->
                      </div>
                      <div class="col s12">Posted by: {{$research->user_id}}</div>
                    </div>
                    <hr>
                    <p>Abstract:</p> <!-- change abstract content -->
                    <p>{{$research->research_abstract}}</p>
                  </div>
                </div>            
                </a>
<!--                 <li><a href="{{ url('research/detail') }}/{{ $research->id }}">{{$research->title}}</a></li> -->
            @endforeach          


          </div>  <!-- End of Accepted -->
        </div>
      </div> <!-- end of section -->
    </div> <!-- end of container -->
    <!-- END OF CONTENT -->
  </main>
@endsection