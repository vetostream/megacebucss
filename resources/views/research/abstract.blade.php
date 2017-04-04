@extends('layouts.general')

@section('content')
<div class="container">
	<div class="row" id="post-title">
		<div class="col s12">
				<h3>Research Title: {{ $research->title }}</h3>
				<p>Posted by <a href="{{ url('profile/profileid') }}/{{ $research->user[0]->id }}">{{ $research->user[0]->first_name.' '.$research->user[0]->last_name }}</a> on <span id="post-date">{{ $research->created_at }}</span></p>      				
			</div>
	</div>

	<div class="row" id="post-progress">
		<p>Funding progress: PHP <span id="post-progressamount">{{ $research->fund_total }}</span> / <span>{{ $research->fund_goal }}</span></p>
		<div id="post-progressbar" style="position: relative; width: 100%; height: 30px; background-color: #bdbdbd">
		  <div id="post-progressstatus" style="position: absolute; width:{{ $research->fund_percent }}%; height: 100%; background-color: #00c853;">
		  	<div id="post-progresslabel" style="text-align: center; line-height: 30px; color: white;">{{ $research->fund_percent }} %</div>
		  </div>
		</div>		
	</div>
	
	<div class="row" id="post-content">

			<div class="col s12">		

  			<ul class="collapsible" data-collapsible="accordion">
		    
		    <li>
		      <div class="collapsible-header active"><i class="material-icons">book</i>Abstract</div>
		      <div class="collapsible-body">
		      <p>
		      	{{ $research->research_abstract }}
		      </p>
		      </div>
		    </li>
		    
		    <li>
		      <div class="collapsible-header"><i class="material-icons">comments</i>Comments</div>
		      <div class="collapsible-body">		      		
			      <div class="row">
			      @if(empty($comments))
		            <div class="col s12 m12 l12">
		            	<p>No comments yet.</p>
				    </div>
			      @else
				      @foreach($comments as $c)
				            <div class="col s12 m12 l12">
						        <div class="card-panel grey lighten-5 z-depth-1">
						          <div class="row valign-wrapper">
						            <div class="col s1">
						              <img src="{{ asset('images/usericon.png') }}" width='70px' alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
						            </div>
						            <div class="col s11">
						              <span class="black-text">
						              	<p><b>{{ $c->name }}</b> says:<br>{{$c->content}}</p>
	<!-- 					                <p>{{$c->content}}</p> -->
						              </span>
						            </div>
						          </div>
						        </div>
						    </div>
					  @endforeach
					@endif
			      	<div class="col s12 m12 l12">
					    <form class="col s12 m12 l12" name="comment-form" method="POST" action="{{ url('research/postcomment') }}">
					    {{ csrf_field() }}
					        <div class="input-field col s12 m12 l12">
					          <input type="text" name="research_id" value="{{ $research->id }}" hidden="true">
					          <textarea id="textarea1" class="materialize-textarea" name="comment_content"></textarea>
					          <label for="textarea1">Leave a comment</label>
					        </div>
			      		<div class="col s12 m12 l12">
				      		<button class="btn waves-effect waves-light" type="submit" name="post-comment">Submit<i class="material-icons right">send</i></button>
				      	</div>				        
					    </form>			      		
			      	</div>
	
			      </div>
		      </div>
		    </li>

		  	</ul>		
	        	
				
			</div>    
			
  			
	</div>

	<!-- TAGS -->
	<div class="row" id="post-tags">
		<div class="col s12">
				Tagged under: 
					@foreach($research->Tag as $tag)
					<a href="#"><span class="chip">{{$tag->tag_name}}</span></a>
					@endforeach
			</div>
	</div>

	<!-- CREATOR, ADMIN OPTIONS -->
		<!-- desktop -->
		<div class="row right-align hide-on-med-and-down" id="post-options">
			<div class="col s12">
				@if($research->document_file_name !== "")
				<a href="{{ url('research/download') }}?file_name={{ $research->document_file_name }}" target="_blank" class="green darken-3 waves-effect waves-light btn"><i class="material-icons left">library_books</i>Manuscript</a>
				@endif
				<a href="#post-fund" class="yellow darken-3 waves-effect waves-light btn"><i class="material-icons left">attach_money</i>Fund</a>
				<a href="#post-report" class="red waves-effect waves-light btn"><i class="material-icons left">report_problem</i>Report</a>				
			</div>
		</div>
		<!-- mobile -->
		<div class="row right-align hide-on-large-only" id="post-options">
			<div class="fixed-action-btn horizontal click-to-toggle">
			    <a class="btn-floating btn-large red">
			      <i class="material-icons">menu</i>
			    </a>
			    <ul>
			    @if($research->document_file_name !== "")
			    <li><a href="{{ url('research/download') }}?file_name={{ $research->document_file_name }}" class="btn-floating green darken-3" target="_blank"><i class="material-icons">library_books</i></a></li>
			    @endif		      
		      <li><a href="#post-fund" class="btn-floating yellow darken-3"><i class="material-icons">loyalty</i></a></li>				      
		      <li><a href="#post-report" class="btn-floating red"><i class="material-icons">report_problem</i></a></li>			    
			    </ul>
			  </div>

</div>


<!-- report post -->
		<div id="post-request" class="modal">
			<div class="modal-content">
				<h4>Request claim</h4>
				<p>A request for a claim to this post will be sent to <a href="#">user0805</a>.</p>			
				<div class="modal-footer">
		            <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Cancel</a>
		            <a href="#!" class="blue modal-action modal-close waves-effect waves-lgiht btn-flat" style="color: #fff;">Request Claim</a>
		        </div>
			</div>
		</div>

		<!-- report post -->
		<div id="post-report" class="modal">
			<div class="modal-content">
				<h4>Report post</h4>				
				 <div class="row">
				    <form class="col s12">
				       <div class="row">
				        <div class="input-field col s12">
				          <textarea id="post-report-text" class="materialize-textarea"></textarea>
				          <label for="post-report-text">Comments</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          	<a href="#!" class="red modal-action modal-close waves-effect waves-light btn-flat" style="color: #fff;">Report Post</a>
	            			<a href="#!" class="modal-action modal-close waves-effect waves-lgiht btn-flat" >Cancel</a>
				        </div>
				      </div>				     
				    </form>
				  </div>
			</div>
		</div>

		<!-- fund post -->
		<div id="post-fund" class="modal">
			<div class="modal-content">
				<h4>Propose fund amount</h4>				
				 <div class="row">
				    <form class="col s12" action="{{ url('research/fund') }}/{{ $research->id }}/{{ $user->id }}" method="POST" name="fund-form">
				    {{ csrf_field() }}
				       <div class="row">
				        <div class="input-field col s12">				          
				          <input id="post-fund-text" name='amount' type='number' min='500.00' step='100.00' required>
				          <label for="post-fund-text">Input amount</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          	<a href="#!" class="red modal-action modal-close waves-effect waves-light btn-flat" id="fund-research" style="color: #fff;">Fund</a>
	            			<a href="#!" class="modal-action modal-close waves-effect waves-lgiht btn-flat" >Cancel</a>
				        </div>
				      </div>				     
				    </form>
				  </div>
			</div>
		</div>
@endsection