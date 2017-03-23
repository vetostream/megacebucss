@extends('layouts.general')

@section('content')
<div class="container">
    <h3 class="center-align dboard-head">Ideas</h3>

  <!-- SEARCH BAR -->
    <div class="row dboard">
        <div class="col s6 m6 l6">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">search</i>
              <input type="text" id="autocomplete-input" class="autocomplete">
              <label for="autocomplete-input">Ideas tags</label>
            </div>
          </div>
        </div>    
<!--         <div class="col s6 m6 l6">
            <h3 class="left-align">Ideas</h3>            
        </div> -->
    </div>
        
    <!-- ROW1 -->       
    <div class="row dboard">
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-1.jpg">
                             <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p class="justify-align">I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively. <a href="#">Read more</a></p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">lake</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                    <div class="chip mini-chip more">+3 more</div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-2.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">lake</div>
                    <div class="chip mini-chip">nature</div>
                    <div class="chip mini-chip more">+2 more</div>
                </div>
            </div>
        </div>

        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-3.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW1 --> 
    <!-- ROW2 --> 
    <div class="row dboard">
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-1.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-2.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-3.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">trees</div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW2 --> 
    <!-- ROW3 --> 
    <div class="row dboard">
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-1.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-2.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-image">
                    <div class="fixed-action-btn horizontal dboard-like" style="position: relative">
                        <a class="" style="width: relative">
                            <img src="images/sample-3.jpg">
                            <span class="card-title">Card Title</span>
                        </a>    
                        <ul>
                            <li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                    <div class="chip mini-chip">tourism</div>
                    <div class="chip mini-chip">mountains</div>
                    <div class="chip mini-chip">nature</div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW3 --> 

    <!-- PAGINATION STARTS HERE -->
    <div class="row">
        <ul class="pagination center-align">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
    <!-- PAGINATION ENDS HERE -->

</div>
@endsection
