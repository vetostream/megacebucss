@extends('layouts.general')

@section('content')
<div class="container">
	<div class="row" id="post-title">
		<div class="col s12">
				<h3>Research Title: {{ $research->title }}</h3>
				<p>Posted by <a href="{{ url('profile') }}">{{ $research->user[0]->first_name.' '.$research->user[0]->last_name }}</a> on <span id="post-date">{{ $research->created_at }}</span></p>      				
			</div>
	</div>

	<div class="row" id="post-progress">
		<p>Funding progress: PHP <span id="post-progressamount">{{ $research->fund_total }}</span> received</p>
		<span><a href="{{ url('research/fund/history') }}/{{ $research->id }}">See History</a></span>
		<div id="post-progressbar" style="position: relative; width: 100%; height: 30px; background-color: #bdbdbd">
		  <div id="post-progressstatus" style="position: absolute; width:{{ $research->fund_percent }} %; height: 100%; background-color: #00c853;">
		  	<div id="post-progresslabel" style="text-align: center; line-height: 30px; color: white;">{{ $research->fund_percent }}%</div>
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
						            <div class="col s2">
						              <img src="{{ asset('images/usericon.png') }}" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
						            </div>
						            <div class="col s10">
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
<!-- 				@if($research->document_file_name !== "")
				<a href="{{ url('research/download') }}?file_name={{ $research->document_file_name }}" target="_blank" class="yellow darken-3 waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Download Manuscript</a>
				@endif -->
				<a href="{{ url('research/edit') }}/{{ $research->id }}" class="yellow darken-3 waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Edit</a>
				<a href="#post-delete" class="red waves-effect waves-light btn"><i class="material-icons left">delete</i>Delete</a>
			</div>
		</div>
		<!-- mobile -->
		<div class="row right-align hide-on-large-only" id="post-options">
			<div class="fixed-action-btn horizontal click-to-toggle">
			    <a class="btn-floating btn-large red">
			      <i class="material-icons">menu</i>
			    </a>
			    <ul>
<!-- 			    @if($research->document_file_name !== "")
			    <li><a href="{{ url('research/download') }}?file_name={{ $research->document_file_name }}" class="btn-floating yellow darken-3" target="_blank"><i class="material-icons">mode_edit</i></a></li>
			    @endif -->
			      <li><a href="{{ url('research/edit') }}/{{ $research->id }}" class="btn-floating yellow darken-3"><i class="material-icons">mode_edit</i></a></li>			      
			      <li><a href="#post-delete" class="btn-floating red"><i class="material-icons">delete</i></a></li>
			    </ul>
			  </div>

</div>

<!-- MODALS -->	
<!-- delete post -->
<div id="post-delete" class="modal">
	<div class="modal-content">
		<h4>Delete post</h4>
		<p>Are you sure you want to delete this post? This cannot be undone.</p>				 
	</div>
	<div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Yes, Delete</a>
        <a href="#!" class="blue modal-action modal-close waves-effect waves-lgiht btn-flat" style="color: #fff;">No, go back</a>
     </div>
</div>
<!-- request post -->
<!-- <div id="post-request" class="modal">
	<div class="modal-content">
		<h4>Request claim</h4>
		<p>A request for a claim to this post will be sent to <a href="#">user0805</a>.</p>			
		<div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Cancel</a>
            <a href="#!" class="blue modal-action modal-close waves-effect waves-lgiht btn-flat" style="color: #fff;">Request Claim</a>
        </div>
	</div>
</div> -->

<!-- report post -->
<!-- <div id="post-report" class="modal">
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
</div> -->
@endsection